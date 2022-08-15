<?php

namespace App\Controllers\Rest;

use App\Libraries\TraccarApi;
use App\Models\TraccarModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Session\Session;
use Config\Services;

class Geofence extends ResourceController
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

    public final function get_geofence_permission(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $resultAll = $this->traccarApi->devicesGet(true);
            $result['success'] = false;
            if ($resultAll['success']) {
                $result['success'] = true;
                $result['deviceAll'] = $resultAll['data'];
                $deviceGeofence = $this->traccarModel->searchDeviceGeofence($this->request->getPost('geofenceId'))['data'];
                $result['deviceGeofence'] = $deviceGeofence !== null ? $deviceGeofence : [];
            }
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function assign_geofence_device(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $geofenceId = $this->request->getPost("geofenceId");
            $deviceId = $this->request->getPost("deviceId");
            $value = $this->request->getPost("value");
            $permission = array(
                "deviceId" => $deviceId,
                "geofenceId" => $geofenceId
            );
            if (intval($value) === 1) {
                $result = $this->traccarApi->permissionsPost($permission);
            } else {
                $result = $this->traccarApi->permissionsDel($permission);
            }
            if (intval($result['code']) === 204) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
            }
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }
}