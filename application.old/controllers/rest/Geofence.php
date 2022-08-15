<?php

use chriskacerguis\RestServer\RestController;

class Geofence extends RestController
{
    protected $traccarApi;

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->traccarApi = TraccarApi::getInstance();
        $this->traccarApi->setHost(API_HOST);
        $this->user = $this->session->userdata('user');
        if (!empty($this->user)) {
            $this->traccarApi->setUsername($this->session->userdata('username'));
            $this->traccarApi->setPassword($this->session->userdata('password'));
        }
    }

    public final function get_geofence_permission_post(): void
    {
        //$result = $this->traccarApi->devicesGet($this->post('id'));
        $resultAll = $this->traccarApi->devicesGet();
        $code = $resultAll['code'];
        if ($resultAll['success']) {
            $this->data['success'] = true;
            $this->data['deviceAll'] = $resultAll['data'];
            $searchParams = array(
                'order_by' => 1,
                'order_mode' => 'asc',
                'and_key_parameters' => array(
                    'geofenceid' => $this->post('geofenceId')
                ),
                'start' => -1,
                'length' => -1
            );
            $deviceGeofence = search('tc_device_geofence', $searchParams)['data'];
            $this->data['deviceGeofence'] = $deviceGeofence;
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $resultAll['code'];
            $this->data['message'] = $resultAll['message'];
        }
        $this->response($this->data, $code);
        //print_r($resultAll);
        /*$code = $resultAll['code'];
        if ($resultAll['success']) {
            $this->data['success'] = true;
            $this->data['deviceAll'] = $resultAll['data'];
            $resultGeofenceUser = $this->traccarApi->geofencesGet(true, $this->post('id'));
            if ($resultDeviceUser['success']) {
                $this->data['success'] = true;
                $this->data['deviceUser'] = $resultDeviceUser['data'];
            } else {
                $this->data['success'] = false;
                $this->data['code'] = $resultDeviceUser['code'];
                $this->data['message'] = $resultDeviceUser['message'];
            }
            $code = $resultDeviceUser['code'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $resultAll['code'];
            $this->data['message'] = $resultAll['message'];
        }
        $this->response($this->data, $code);*/
    }

    public final function assign_geofence_device_post(): void
    {
        $geofenceId = $this->post('geofenceId');
        $deviceId = $this->post('deviceId');
        $value = $this->post('value');
        $permission = array(
            "deviceId" => $deviceId,
            "geofenceId" => $geofenceId
        );
        if (intval($value) === 1) {
            $result = $this->traccarApi->permissionsPost($permission);
        } else {
            $result = $this->traccarApi->permissionsDel($permission);
        }
        $code = RestController::HTTP_OK;
        if (intval($result['code']) === 204) {
            $this->data['success'] = true;
        } else {
            $code = $result['code'];
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $code);
    }
}
