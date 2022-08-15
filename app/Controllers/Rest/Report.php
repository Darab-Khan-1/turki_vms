<?php

namespace App\Controllers\Rest;

use App\Libraries\TraccarApi;
use App\Models\TraccarModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Session\Session;
use Config\Services;
use DateTime;
use DateTimeZone;

class Report extends ResourceController
{
    protected TraccarApi $traccarApi;
    protected TraccarModel $traccarModel;

    function __construct()
    {
        helper(['common_helper']);
        $this->traccarApi = TraccarApi::getInstance();
        $this->traccarApi->setHost(API_HOST);
        $this->traccarModel = new TraccarModel();
    }

    public final function route(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $deviceId = $this->request->getPost("device_id");
            $tz = $this->request->getPost("timezone");
            $startDate = $this->request->getPost("start_date") . ":00";
            $endDate = $this->request->getPost("end_date") . ":59";
            if (!empty($tz)) {
                $startDateTime = DateTime::createFromFormat('d/m/Y H:i:s', $startDate, new DateTimeZone($tz));
                $endDateTime = DateTime::createFromFormat('d/m/Y H:i:s', $endDate, new DateTimeZone($tz));
                $startDateTime->setTimeZone(new DateTimeZone('UTC'));
                $endDateTime->setTimeZone(new DateTimeZone('UTC'));
            } else {
                $startDateTime = DateTime::createFromFormat('d/m/Y H:i:s', $startDate);
                $endDateTime = DateTime::createFromFormat('d/m/Y H:i:s', $endDate);
            }
            $startPeriod = $startDateTime->format('Y-m-d\TH:i') . ":00.000Z";
            $endPeriod = $endDateTime->format('Y-m-d\TH:i') . ":59.000Z";
            $result = $this->traccarApi->reportsRouteGet($deviceId, -1, $startPeriod, $endPeriod);
            if ($result['success']) {
                $deviceResultArray = $result['data'];
                $deviceObjectArray = [];
                if (!empty($deviceResultArray)) {
                    $deviceRes = (object) $this->traccarModel->getDevice($deviceResultArray[0]['deviceId'])['data'];
                    foreach ($deviceResultArray as $deviceResult) {
                        if (floatval($deviceResult['longitude']) == 0 && floatval($deviceResult['latitude']) == 0) {
                            $position = $this->traccarModel->getPatchedPosition($deviceResult['deviceId'], $deviceResult['id'])['data'];
                            $deviceResult['latitude'] = $position['latitude'];
                            $deviceResult['longitude'] = $position['longitude'];
                        }
                        $device = (object)$deviceResult;
                        $device->deviceName = $deviceRes->name;
                        array_push($deviceObjectArray, $device);
                    }
                }
                $result['positions'] = $deviceObjectArray;
            }
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function summary(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $deviceId = $this->request->getPost("device_id");
            $tz = $this->request->getPost("timezone");
            $startDate = $this->request->getPost("start_date") . ":00";
            $endDate = $this->request->getPost("end_date") . ":59";
            $deviceIdArr = [];
            foreach ($deviceId as $value) {
                array_push($deviceIdArr, intval($value));
            }
            if (!empty($tz)) {
                $startDateTime = DateTime::createFromFormat('d/m/Y H:i:s', $startDate, new DateTimeZone($tz));
                $endDateTime = DateTime::createFromFormat('d/m/Y H:i:s', $endDate, new DateTimeZone($tz));
                $startDateTime->setTimeZone(new DateTimeZone('UTC'));
                $endDateTime->setTimeZone(new DateTimeZone('UTC'));
            } else {
                $startDateTime = DateTime::createFromFormat('d/m/Y H:i:s', $startDate);
                $endDateTime = DateTime::createFromFormat('d/m/Y H:i:s', $endDate);
            }
            $startPeriod = $startDateTime->format('Y-m-d\TH:i') . ":00.000Z";
            $endPeriod = $endDateTime->format('Y-m-d\TH:i') . ":59.000Z";
            $result = $this->traccarApi->reportsSummaryGet($deviceIdArr, [], $startPeriod, $endPeriod);
            if ($result['success']) {
                $this->data['success'] = $result['success'];
                $this->data['code'] = $result['code'];

                //FIX AVERAGE SPEED BUG FROM TRACCAR API
                foreach ($result['data'] as $index => $reportSummary) {
                    $reportSummary['averageSpeed'] = $this->traccarModel->getAvgSpeedSummary(array($reportSummary['deviceId'],$startDateTime->format('Y-m-d H:i:s'), $endDateTime->format('Y-m-d H:i:s')));
                    $result['data'][$index] = $reportSummary;
                }
            }
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }
}