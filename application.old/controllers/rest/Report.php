<?php

use chriskacerguis\RestServer\RestController;

class Report extends RestController
{
    protected $traccarApi;
    protected $data;
    protected $user;

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_traccar_model');
        $this->traccarApi = TraccarApi::getInstance();
        $this->traccarApi->setHost(API_HOST);
        $this->user = $this->session->userdata('user');
        if (!empty($this->user)) {
            $this->traccarApi->setUsername($this->session->userdata('username'));
            $this->traccarApi->setPassword($this->session->userdata('password'));
        }
    }

    public final function route_post(): void
    {
        $deviceId = $this->post('device_id');
        $tz = $this->post('timezone');
        $startDate = $this->post('start_date') . ":00";
        $endDate = $this->post('end_date') . ":59";
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
                $deviceRes = get('tc_devices', array('id' => $deviceResultArray[0]['deviceId']));
                foreach ($deviceResultArray as $deviceResult) {
                    if (floatval($deviceResult['longitude']) == 0 && floatval($deviceResult['latitude']) == 0) {
                        $position = $this->M_traccar_model->getPatchedPosition(array($deviceResult['deviceId'],$deviceResult['id']));
                        $deviceResult['latitude'] = $position['latitude'];
                        $deviceResult['longitude'] = $position['longitude'];
                    }
                    $device = (object)$deviceResult;
                    $device->deviceName = $deviceRes->name;
                    array_push($deviceObjectArray, $device);
                }
            }
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
            $this->data['positions'] = $deviceObjectArray;
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function summary_post(): void
    {
        $deviceId = $this->post('device_id');
        $tz = $this->post('timezone');
        $startDate = $this->post('start_date') . ":00";
        $endDate = $this->post('end_date') . ":59";
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
                $reportSummary['averageSpeed'] = $this->M_traccar_model->avgSpeed(array($reportSummary['deviceId'],$startDateTime->format('Y-m-d H:i:s'), $endDateTime->format('Y-m-d H:i:s')));
                $result['data'][$index] = $reportSummary;
            }
            $this->data['reports'] = $result['data'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }
}
