<?php

use chriskacerguis\RestServer\RestController;

class Device extends RestController
{
    protected $data;
    protected $traccarApi;

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

    public final function get_device_permission_post(): void
    {
        //$result = $this->traccarApi->devicesGet($this->post('id'));
        $resultAll = $this->traccarApi->devicesGet(true);
        $code = $resultAll['code'];
        if ($resultAll['success']) {
            $this->data['success'] = true;
            $this->data['deviceAll'] = $resultAll['data'];
            $resultDeviceUser = $this->traccarApi->devicesGet(false, $this->post('id'));
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
        $this->response($this->data, $code);
    }

    public final function assign_user_device_post(): void
    {
        $userId = $this->post('userId');
        $deviceId = $this->post('deviceId');
        $value = $this->post('value');
        $permission = array(
            "userId" => $userId,
            "deviceId" => $deviceId
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

    public final function position_post(): void
    {
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE);
        $devices = $this->traccarApi->devicesGet();
        $positions = $this->traccarApi->positionsGet();
        $deviceSort = array();
        $counter = 0;
        if ($devices['success'] && !empty($devices['data'])) {
            foreach ($devices['data'] as $device) {
                $counter++;
                $device['counter'] = $counter;
                $deviceSort[$counter] = $device;
            }
        }
        if (!empty($deviceSort)) {
            if ($positions['success'] && !empty($positions['data'])) {
                foreach ($deviceSort as $index => $device) {
                    foreach ($positions['data'] as $devicePosition) {
                        if ($devicePosition['deviceId'] == $device['id']) {
                            $device['position'] = $devicePosition;
                            break;
                        }
                    }
                    $deviceSort[$index] = $device;
                }
            }
        }

        $deviceFiltered = array();
        $geoJson['type'] = 'FeatureCollection';
        foreach ($deviceSort as $index => $device) {
            if (isset($input['filter']) && !empty($input['filter'])) {
                if(strpos(strtoupper($device['name']), strtoupper($input['filter'])) !== false){
                    if (isset($device['position'])) {
                        if (floatval($device['position']['longitude']) == 0 && floatval($device['position']['latitude']) == 0) {
                            $position = $this->M_traccar_model->getPatchedPosition(array($device['id'],$device['position']['id']));
                            $device['position']['latitude'] = $position['latitude'];
                            $device['position']['longitude'] = $position['longitude'];
                        }
                        $deviceFiltered[$index] = $device;
                        $coordinate = [$device['position']['longitude'],$device['position']['latitude']];
                        $feature = array(
                            'type' => 'Feature',
                            'id' => $index,
                            'geometry' => array(
                                'type' => 'Point',
                                'coordinates' => $coordinate
                            ),
                            'properties' => $device
                        );
                        $geoJson['features'][] = $feature;
                    }
                }
            } else {
                if (isset($device['position'])) {
                    if (floatval($device['position']['longitude']) == 0 && floatval($device['position']['latitude']) == 0) {
                        $position = $this->M_traccar_model->getPatchedPosition(array($device['id'],$device['position']['id']));
                        $device['position']['latitude'] = $position['latitude'];
                        $device['position']['longitude'] = $position['longitude'];
                    }
                    $deviceFiltered[$index] = $device;
                    $coordinate = [$device['position']['longitude'],$device['position']['latitude']];
                    $feature = array(
                        'type' => 'Feature',
                        'id' => $index,
                        'geometry' => array(
                            'type' => 'Point',
                            'coordinates' => $coordinate
                        ),
                        'properties' => $device
                    );
                    $geoJson['features'][] = $feature;
                }
            }
        }
        $data = array(
            'geoJson' => $geoJson,
            'devices' => $deviceFiltered,
            'total' => count($deviceFiltered)
        );
        $this->response($data, self::HTTP_OK);
    }

    public final function create_post(): void {
        $post = $this->post();
        if (!empty($post['attributes']['speedLimit'])) {
            if ($post['speedUnit'] === "kmh") {
                if ($post['attributes']['speedLimit'] !== "") {
                    $post['attributes'] = array(
                        'speedLimit' => floatval($post['attributes']['speedLimit'])/1.852
                    );
                } else {
                    unset($post['attributes']['speedLimit']);
                }
            } else {
                if ($post['attributes']['speedLimit'] === "") {
                    unset($post['attributes']['speedLimit']);
                }
            }
        } else {
            unset($post['attributes']['speedLimit']);
        }
        $device = array(
          'name' => $post['deviceName'],
          'uniqueId' => $post['deviceIdentifier'],
          'model' => $post['model'],
          'contact' => $post['contact'],
          'phone' => $post['phone'],
          'category' => $post['category'],
          'disabled' => isset($post['disabled'])?1:0,
          'groupId' => $post['group'] ?? 0,
          'attributes' => $post['attributes']
        );
        $result = $this->traccarApi->devicePost($device);
        if ($result['success']) {
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function update_post(): void {
        $post = $this->post();
        if (!empty($post['attributes']['speedLimit'])) {
            if ($post['speedUnitUpdate'] === "kmh") {
                if ($post['attributes']['speedLimit'] !== "") {
                    $post['attributes'] = array(
                        'speedLimit' => floatval($post['attributes']['speedLimit'])/1.852
                    );
                } else {
                    unset($post['attributes']['speedLimit']);
                }
            } else {
                if ($post['attributes']['speedLimit'] === "") {
                    unset($post['attributes']['speedLimit']);
                }
            }
        } else {
            unset($post['attributes']['speedLimit']);
        }
        $device = array(
            'id' => $post['deviceIdUpdate'],
            'name' => $post['deviceNameUpdate'],
            'uniqueId' => $post['deviceIdentifierUpdate'],
            'model' => $post['modelUpdate'],
            'contact' => $post['contactUpdate'],
            'phone' => $post['phoneUpdate'],
            'category' => $post['categoryUpdate'],
            'disabled' => isset($post['disabledUpdate'])?1:0,
            'groupId' => $post['groupUpdate'] ?? 0,
            'attributes' => $post['attributes']
        );
        $result = $this->traccarApi->devicePut($device);
        if ($result['success']) {
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function delete_post(): void {
        $deviceId = $this->post('id');
        $result = $this->traccarApi->deviceDel($deviceId);
        $code = self::HTTP_OK;
        if (intval($result['code']) === 204) {
            $data['success'] = true;
        } else {
            $code = $result['code'];
            $data['success'] = false;
            $data['code'] = $result['code'];
            $data['message'] = $result['message'];
        }
        $this->response($data, $code);
    }

    public final function engine_start_post(): void {
        $result = $this->traccarApi->session($this->session->userdata('username'), $this->post('password'));
        if ($result['success']) {
            $result = $this->traccarApi->deviceGet($this->post('deviceId'));
            if ($result['success']) {
                if ($result['data']['phone'] !== "") {
                    $result['success'] = true;
                    $result['reason'] = "<p>".lang('phone').": ". $result['data']['phone']."<br/>".lang('command').": #ID;1234;80!</p>";
                } else {
                    $result['success'] = true;
                    $result['reason'] = "<p>".lang('phone').": -<br/>".lang('command').": #ID;1234;80!</p>";
                }
            }
        }
        $this->response($result, $result['code']);
    }

    public final function engine_stop_post(): void {
        $result = $this->traccarApi->session($this->session->userdata('username'), $this->post('password'));
        if ($result['success']) {
            $result = $this->traccarApi->deviceGet($this->post('deviceId'));
            if ($result['success']) {
                if ($result['data']['phone'] !== "") {
                    $result['success'] = true;
                    $result['reason'] = "<p>".lang('phone').": ". $result['data']['phone']."<br/>".lang('command').": #ID;1234;88!</p>";
                } else {
                    $result['success'] = true;
                    $result['reason'] = "<p>".lang('phone').": -<br/>".lang('command').": #ID;1234;88!</p>";
                }
            }
        }
        $this->response($result, $result['code']);
    }
}
