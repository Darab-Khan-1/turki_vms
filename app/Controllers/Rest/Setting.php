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

class Setting extends ResourceController
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

    public final function user_list(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $result = $this->traccarApi->userGet(-1);
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function create_user(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $user = json_decode(file_get_contents('php://input'),true);
            if (isset($user['twelveHourFormat'])) {
                $user['twelveHourFormat'] = true;
            } else {
                $user['twelveHourFormat'] = false;
            }
            $user['coordinateFormat'] = 0;
            $user['poiLayer'] = "";

            if (isset($user['disabled'])) {
                $user['disabled'] = true;
            } else {
                $user['disabled'] = false;
            }
            if (isset($user['administrator'])) {
                $user['administrator'] = true;
            } else {
                $user['administrator'] = false;
            }
            if (isset($user['readonly'])) {
                $user['readonly'] = true;
            } else {
                $user['readonly'] = false;
            }
            if (isset($user['deviceReadonly'])) {
                $user['deviceReadonly'] = true;
            } else {
                $user['deviceReadonly'] = false;
            }
            if (isset($user['limitCommands'])) {
                $user['limitCommands'] = true;
            } else {
                $user['limitCommands'] = false;
            }
            if (!empty($user['expirationTime'])) {
                $expirationTime = DateTime::createFromFormat('d-m-Y H:i:s', $user['expirationTime']);
                $expirationTime = $expirationTime->format('Y-m-d\TH:i') . ":00.000Z";
                $user['expirationTime'] = $expirationTime;
            } else {
                $user['expirationTime'] = 'null';
            }
            if (empty($user['deviceLimit'])) {
                $user['deviceLimit'] = -1;
            }
            if (empty($user['userLimit'])) {
                $user['userLimit'] = 0;
            }
            if (isset($user['attributes']['mailSmtpAuth'])) {
                $user['attributes']['mailSmtpAuth'] = true;
            } else {
                $user['attributes']['mailSmtpAuth'] = false;
            }
            if (isset($user['attributes']['mailSmtpStarttlsEnable'])) {
                $user['attributes']['mailSmtpStarttlsEnable'] = true;
            } else {
                $user['attributes']['mailSmtpStarttlsEnable'] = false;
            }
            if (isset($user['attributes']['mailSmtpStarttlsEnable'])) {
                $user['attributes']['mailSmtpStarttlsRequired'] = true;
            } else {
                $user['attributes']['mailSmtpStarttlsRequired'] = false;
            }
            if (isset($user['attributes']['mailSmtpSslEnable'])) {
                $user['attributes']['mailSmtpSslEnable'] = true;
            } else {
                $user['attributes']['mailSmtpSslEnable'] = false;
            }
            if (isset($user['attributes']['mailSmtpSslTrust'])) {
                $user['attributes']['mailSmtpSslTrust'] = true;
            } else {
                $user['attributes']['mailSmtpSslTrust'] = false;
            }
            if (isset($user['attributes']['mailSmtpSslProtocols'])) {
                $user['attributes']['mailSmtpSslProtocols'] = true;
            } else {
                $user['attributes']['mailSmtpSslProtocols'] = false;
            }
            if (isset($user['attributes']['uiDisableReport'])) {
                $user['attributes']['uiDisableReport'] = true;
            } else {
                $user['attributes']['uiDisableReport'] = false;
            }
            if (isset($user['attributes']['uiDisableEvents'])) {
                $user['attributes']['uiDisableEvents'] = true;
            } else {
                $user['attributes']['uiDisableEvents'] = false;
            }
            if (isset($user['attributes']['uiDisableVehicleFeatures'])) {
                $user['attributes']['uiDisableVehicleFeatures'] = true;
            } else {
                $user['attributes']['uiDisableVehicleFeatures'] = false;
            }
            if (isset($user['attributes']['uiDisableDrivers'])) {
                $user['attributes']['uiDisableDrivers'] = true;
            } else {
                $user['attributes']['uiDisableDrivers'] = false;
            }
            if (isset($user['attributes']['uiDisableComputedAttributes'])) {
                $user['attributes']['uiDisableComputedAttributes'] = true;
            } else {
                $user['attributes']['uiDisableComputedAttributes'] = false;
            }
            if (isset($user['attributes']['uiDisableCalendars'])) {
                $user['attributes']['uiDisableCalendars'] = true;
            } else {
                $user['attributes']['uiDisableCalendars'] = false;
            }
            if (isset($user['attributes']['uiDisableMaintenance'])) {
                $user['attributes']['uiDisableMaintenance'] = true;
            } else {
                $user['attributes']['uiDisableMaintenance'] = false;
            }
            if (isset($user['attributes']['uiHidePositionAttributes'])) {
                $user['attributes']['uiHidePositionAttributes'] = true;
            } else {
                $user['attributes']['uiHidePositionAttributes'] = false;
            }
            $result = $this->traccarApi->userPost($user);
            $result['url'] = base_url('panel/users');
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function update_user(): Response
    {

        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            //$user = $this->request->getPost();
            $user = json_decode(file_get_contents('php://input'),true);
            if (empty($user['password'])) {
                unset($user['password']);
            }
            if (isset($user['twelveHourFormat'])) {
                $user['twelveHourFormat'] = true;
            } else {
                $user['twelveHourFormat'] = false;
            }
            $user['coordinateFormat'] = 0;
            $user['poiLayer'] = "";

            if (isset($user['disabled'])) {
                $user['disabled'] = true;
            } else {
                $user['disabled'] = false;
            }
            if (isset($user['administrator'])) {
                $user['administrator'] = true;
            } else {
                $user['administrator'] = false;
            }
            if (isset($user['readonly'])) {
                $user['readonly'] = true;
            } else {
                $user['readonly'] = false;
            }
            if (isset($user['deviceReadonly'])) {
                $user['deviceReadonly'] = true;
            } else {
                $user['deviceReadonly'] = false;
            }
            if (isset($user['limitCommands'])) {
                $user['limitCommands'] = true;
            } else {
                $user['limitCommands'] = false;
            }
            if (!empty($user['expirationTime'])) {
                $expirationTime = DateTime::createFromFormat('d-m-Y H:i:s', $user['expirationTime']);
                $expirationTime = $expirationTime->format('Y-m-d\TH:i') . ":00.000Z";
                $user['expirationTime'] = $expirationTime;
            } else {
                $user['expirationTime'] = 'null';
            }
            if (empty($user['deviceLimit'])) {
                $user['deviceLimit'] = -1;
            }
            if (empty($user['userLimit'])) {
                $user['userLimit'] = 0;
            }
            if (isset($user['attributes']['mailSmtpAuth'])) {
                $user['attributes']['mailSmtpAuth'] = true;
            } else {
                $user['attributes']['mailSmtpAuth'] = false;
            }
            if (isset($user['attributes']['mailSmtpStarttlsEnable'])) {
                $user['attributes']['mailSmtpStarttlsEnable'] = true;
            } else {
                $user['attributes']['mailSmtpStarttlsEnable'] = false;
            }
            if (isset($user['attributes']['mailSmtpStarttlsEnable'])) {
                $user['attributes']['mailSmtpStarttlsRequired'] = true;
            } else {
                $user['attributes']['mailSmtpStarttlsRequired'] = false;
            }
            if (isset($user['attributes']['mailSmtpSslEnable'])) {
                $user['attributes']['mailSmtpSslEnable'] = true;
            } else {
                $user['attributes']['mailSmtpSslEnable'] = false;
            }
            if (isset($user['attributes']['mailSmtpSslTrust'])) {
                $user['attributes']['mailSmtpSslTrust'] = true;
            } else {
                $user['attributes']['mailSmtpSslTrust'] = false;
            }
            if (isset($user['attributes']['mailSmtpSslProtocols'])) {
                $user['attributes']['mailSmtpSslProtocols'] = true;
            } else {
                $user['attributes']['mailSmtpSslProtocols'] = false;
            }
            if (isset($user['attributes']['uiDisableReport'])) {
                $user['attributes']['uiDisableReport'] = true;
            } else {
                $user['attributes']['uiDisableReport'] = false;
            }
            if (isset($user['attributes']['uiDisableEvents'])) {
                $user['attributes']['uiDisableEvents'] = true;
            } else {
                $user['attributes']['uiDisableEvents'] = false;
            }
            if (isset($user['attributes']['uiDisableVehicleFeatures'])) {
                $user['attributes']['uiDisableVehicleFeatures'] = true;
            } else {
                $user['attributes']['uiDisableVehicleFeatures'] = false;
            }
            if (isset($user['attributes']['uiDisableDrivers'])) {
                $user['attributes']['uiDisableDrivers'] = true;
            } else {
                $user['attributes']['uiDisableDrivers'] = false;
            }
            if (isset($user['attributes']['uiDisableComputedAttributes'])) {
                $user['attributes']['uiDisableComputedAttributes'] = true;
            } else {
                $user['attributes']['uiDisableComputedAttributes'] = false;
            }
            if (isset($user['attributes']['uiDisableCalendars'])) {
                $user['attributes']['uiDisableCalendars'] = true;
            } else {
                $user['attributes']['uiDisableCalendars'] = false;
            }
            if (isset($user['attributes']['uiDisableMaintenance'])) {
                $user['attributes']['uiDisableMaintenance'] = true;
            } else {
                $user['attributes']['uiDisableMaintenance'] = false;
            }
            if (isset($user['attributes']['uiHidePositionAttributes'])) {
                $user['attributes']['uiHidePositionAttributes'] = true;
            } else {
                $user['attributes']['uiHidePositionAttributes'] = false;
            }

            $result = $this->traccarApi->userPut($user);
            $result['url'] = base_url('panel/users');
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function update_profile(): Response
    {

        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $session = Services::session();
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            //$user = $this->request->getPost();
            $user = json_decode(file_get_contents('php://input'),true);
            $userRes = $this->traccarApi->userGet($user['profile_id']);
            $userOri = $userRes['data'];
            $userOri['name'] = $user['profile_name'];
            $userOri['email'] = $user['profile_email'];
            if (empty($user['password'])) {
                unset($userOri['password']);
            } else {
                $userOri['password'] = $user['profile_password'];
            }
            $result = $this->traccarApi->userPut($userOri);
            if ($result['success']) {
                $session->set('account', recursive_convert_array_to_obj($userOri));
                $session->set('username', $user['profile_name']);

                if (!empty($user['password'])) {
                    $session->set('password', $user['password']);
                    $session->set('btoa', base64_encode($user['profile_name'].":".$user['password']));
                } else {
                    $userSessionPwd = $session->get('password');
                    $session->set('btoa', base64_encode($user['profile_email'] . ':' . $userSessionPwd));
                }
            }
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function delete_user(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $result = $this->traccarApi->userDel($this->request->getPost("id"));
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

    public final function geofence_list(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $result = $this->traccarApi->geofencesGet();
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function create_geofence(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $geofenceInput = json_decode(file_get_contents('php://input'),true);
            $geofence = array(
                "id" => $geofenceInput['id'],
                "name" => $geofenceInput['name'],
                "description" => $geofenceInput['description'],
                "calendarId" => $geofenceInput['calendarData'],
                "area" => $geofenceInput['wktData'],
                "attributes" => $geofenceInput['attributes']
            );
            $result = $this->traccarApi->geofencesPost($geofence);
            $result['url'] = base_url('panel/geofence');
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function update_geofence(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $geofenceInput = json_decode(file_get_contents('php://input'),true);
            $geofence = array(
                "id" => $geofenceInput['id'],
                "name" => $geofenceInput['name'],
                "description" => $geofenceInput['description'],
                "calendarId" => $geofenceInput['calendarData'],
                "area" => $geofenceInput['wktData'],
                "attributes" => $geofenceInput['attributes']
            );
            $result = $this->traccarApi->geofencesPut($geofence);
            $result['url'] = base_url('panel/geofence');
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }

    public final function delete_geofence(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $result = $this->traccarApi->geofencesDel($this->request->getPost("id"));
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

    public final function notification_type_list(): Response
    {
        $username = $this->request->getServer("PHP_AUTH_USER") !== null ? $this->request->getServer("PHP_AUTH_USER") : "";
        $password = $this->request->getServer("PHP_AUTH_PW") !== null ? $this->request->getServer("PHP_AUTH_PW") : "";
        if (check_auth($username, $password)) {
            $this->traccarApi->setUsername($username);
            $this->traccarApi->setPassword($password);
            $result = $this->traccarApi->notificationsTypeGet();
            return $this->respond($result);
        } else {
            return $this->failUnauthorized();
        }
    }
}