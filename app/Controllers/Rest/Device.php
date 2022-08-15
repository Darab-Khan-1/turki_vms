
<?php

namespace App\Controllers\Rest;

use App\Libraries\TraccarApi;
use App\Models\TraccarModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Session\Session;
use Config\Services;

class Device extends ResourceController
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

    private function generateGeoJsonFeature(int $idx, array $device, array &$deviceFiltered, array &$geoJson): void
    {
        if (isset($device['position'])) {
            if (floatval($device['position']['longitude']) == 0 && floatval($device['position']['latitude']) == 0) {
                $position = $this->traccarModel->getPatchedPosition($device['id'], $device['position']['id'])['data'];
                if (!empty($position)) {
                    $device['position']['latitude'] = $position['latitude'];
                    $device['position']['longitude'] = $position['longitude'];
                }
            }
            if (floatval($device['position']['longitude']) != 0 && floatval($device['position']['latitude']) != 0) {
                $deviceFiltered[$idx] = $device;
                $coordinate = [$device['position']['longitude'], $device['position']['latitude']];
                $feature = array(
                    'type' => 'Feature',
                    'id' => $idx,
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

    public final function position(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
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
                    if (str_contains(strtoupper($device['name']), strtoupper($input['filter']))) {
                        self::generateGeoJsonFeature($index, $device, $deviceFiltered, $geoJson);
                    }
                } else {
                    self::generateGeoJsonFeature($index, $device, $deviceFiltered, $geoJson);
                }
            }
            $data = array(
                'geoJson' => $geoJson,
                'devices' => $deviceFiltered,
                'total' => count($deviceFiltered)
            );
            return $this->respond($data);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function engine_start(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $result = $this->traccarApi->deviceGet($this->request->getPost("deviceId"));
            if ($result['success']) {
                if ($result['data']['phone'] !== "") {
                    $result['success'] = true;
                    $result['reason'] = "<p>" . lang('phone') . ": " . $result['data']['phone'] . "<br/>" . lang('command') . ": #ID;1234;80!</p>";
                } else {
                    $result['success'] = true;
                    $result['reason'] = "<p>" . lang('phone') . ": -<br/>" . lang('command') . ": #ID;1234;80!</p>";
                }
            }
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function engine_stop(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $result = $this->traccarApi->deviceGet($this->request->getPost("deviceId"));
            if ($result['success']) {
                if ($result['data']['phone'] !== "") {
                    $result['success'] = true;
                    $result['reason'] = "<p>" . lang('phone') . ": " . $result['data']['phone'] . "<br/>" . lang('command') . ": #ID;1234;88!</p>";
                } else {
                    $result['success'] = true;
                    $result['reason'] = "<p>" . lang('phone') . ": -<br/>" . lang('command') . ": #ID;1234;88!</p>";
                }
            }
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function create_device(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $post = $this->request->getPost();
            if (!empty($post['attributes']['speedLimit'])) {
                if ($post['speedUnit'] === "kmh") {
                    if ($post['attributes']['speedLimit'] !== "") {
                        $post['attributes'] = array(
                            'speedLimit' => floatval($post['attributes']['speedLimit']) / 1.852
                        );
                    }
                }
            }
            $device = array(
                'name' => $post['deviceName'],
                'uniqueId' => $post['deviceIdentifier'],
                'model' => $post['model'],
                'contact' => $post['contact'],
                'phone' => $post['phone'],
                'category' => $post['category'],
                'disabled' => isset($post['disabled']) ? 1 : 0,
                'groupId' => $post['group'] ?? 0,
                'attributes' => $post['attributes']
            );
            $result = $this->traccarApi->devicePost($device);
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function update_device(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $post = $this->request->getPost();
            if (!empty($post['attributes']['speedLimit'])) {
                if ($post['speedUnitUpdate'] === "kmh") {
                    if ($post['attributes']['speedLimit'] !== "") {
                        $post['attributes'] = array(
                            'speedLimit' => floatval($post['attributes']['speedLimit']) / 1.852
                        );
                    }
                }
            }
            $device = array(
                'id' => $post['deviceIdUpdate'],
                'name' => $post['deviceNameUpdate'],
                'uniqueId' => $post['deviceIdentifierUpdate'],
                'model' => $post['modelUpdate'],
                'contact' => $post['contactUpdate'],
                'phone' => $post['phoneUpdate'],
                'category' => $post['categoryUpdate'],
                'disabled' => isset($post['disabledUpdate']) ? 1 : 0,
                'groupId' => $post['groupUpdate'] ?? 0,
                'attributes' => $post['attributes']
            );
            $result = $this->traccarApi->devicePut($device);
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function delete_device(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $result = $this->traccarApi->deviceDel($this->request->getPost("id"));
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

    public final function get_device_permission(): Response
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
                $resultDeviceUser = $this->traccarApi->devicesGet(false, $this->request->getPost('id'));
                if ($resultDeviceUser['success']) {
                    $result['success'] = true;
                    $result['deviceUser'] = $resultDeviceUser['data'];
                }
            }
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function assign_user_device(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $userId = $this->request->getPost("userId");
            $deviceId = $this->request->getPost("deviceId");
            $value = $this->request->getPost("value");
            $permission = array(
                "userId" => $userId,
                "deviceId" => $deviceId
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
