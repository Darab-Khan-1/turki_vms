<?php

use chriskacerguis\RestServer\RestController;

class Setting extends RestController
{
    protected $traccarApi;
    protected $data;
    protected $user;

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

    public final function user_list_post(): void
    {
        $user = $this->session->userdata('user');
        $result = $this->traccarApi->userGet(-1);
        if ($result['success']) {
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
            $this->data['data'] = $result['data'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function create_user_post(): void
    {
        $user = $this->post();
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
        if ($result['success']) {
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
            $this->data['url'] = base_url('panel/users');
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function update_user_post(): void
    {
        $user = $this->post();
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
        if ($result['success']) {
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
            $this->data['url'] = base_url('panel/users');
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function delete_user_post(): void
    {
        $result = $this->traccarApi->userDel($this->post('id'));
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

    public final function update_profile_post(): void
    {
        $user = $this->post();
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
            $this->session->set_userdata('user', $userOri);
            $this->session->set_userdata('username', $this->post('profile_email'));
            if (!empty($user['password'])) {
                $this->session->set_userdata('password', $user['profile_password']);
                $this->session->set_userdata('btoa', base64_encode($user('profile_email') . ':' . $user['profile_password']));
            } else {
                $userSessionPwd = $this->session->userdata('password');
                $this->session->set_userdata('btoa', base64_encode($user('profile_email') . ':' . $userSessionPwd));
            }
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function geofence_list_post(): void
    {
        $user = $this->session->userdata('user');
        $result = $this->traccarApi->geofencesGet();
        if ($result['success']) {
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
            $this->data['data'] = $result['data'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function create_geofence_post(): void
    {
        $geofence = array(
            "name" => $this->post('name'),
            "description" => $this->post('description'),
            "calendarId" => $this->post('calendarData'),
            "area" => $this->post('wktData'),
            "attributes" => $this->post('attributes')
        );
        $result = $this->traccarApi->geofencesPost($geofence);
        if ($result['success']) {
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
            $this->data['url'] = base_url('panel/geofence');
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function update_geofence_post(): void
    {
        $geofence = array(
            "id" => $this->post('id'),
            "name" => $this->post('name'),
            "description" => $this->post('description'),
            "calendarId" => $this->post('calendarData'),
            "area" => $this->post('wktData'),
            "attributes" => $this->post('attributes')
        );
        $result = $this->traccarApi->geofencesPut($geofence);
        if ($result['success']) {
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
            $this->data['url'] = base_url('panel/geofence');
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function delete_geofence_post(): void
    {
        $result = $this->traccarApi->geofencesDel($this->post('id'));
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

    public final function notification_type_list_post(): void
    {
        $user = $this->session->userdata('user');
        $result = $this->traccarApi->notificationsTypeGet();
        if ($result['success']) {
            $this->data['success'] = $result['success'];
            $this->data['code'] = $result['code'];
            $this->data['data'] = $result['data'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }
}
