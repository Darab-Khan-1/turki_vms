<?php

use chriskacerguis\RestServer\RestController;

class Calendar extends RestController
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

    public final function get_calendar_post(): void
    {
        $result = $this->traccarApi->calendarsGet();
        if ($result['success']) {
            $this->data['success'] = true;
            $this->data['calendars'] = $result['data'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function create_calendar_post(): void
    {
        $result = $this->traccarApi->calendarsPost($this->post());
        if ($result['success']) {
            $this->data['success'] = true;
            $this->data['calendars'] = $result['data'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function update_calendar_post(): void
    {
        $result = $this->traccarApi->calendarsPut($this->post());
        if ($result['success']) {
            $this->data['success'] = true;
            $this->data['calendars'] = $result['data'];
        } else {
            $this->data['success'] = false;
            $this->data['code'] = $result['code'];
            $this->data['message'] = $result['message'];
        }
        $this->response($this->data, $result['code']);
    }

    public final function delete_calendar_post(): void
    {
        $result = $this->traccarApi->calendarsDel($this->post());
        $code = RestController::HTTP_OK;
        if (intval($result['code']) === 204 ) {
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
