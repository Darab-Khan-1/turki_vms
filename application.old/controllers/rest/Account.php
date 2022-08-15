<?php

use chriskacerguis\RestServer\RestController;

class Account extends RestController
{
    protected $traccarApi;

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->traccarApi = TraccarApi::getInstance();
        $this->traccarApi->setHost(API_HOST);
    }

    public final function login_post(): void
    {
        $result = $this->traccarApi->session($this->post('username'), $this->post('password'));
        if ($result['success']) {
            $user = (object) $result['data'];
            $user->attributes = (object) $user->attributes;
            $this->session->set_userdata('user', $user);
            $this->session->set_userdata('username', $this->post('username'));
            $this->session->set_userdata('password', $this->post('password'));
            $this->session->set_userdata('btoa', base64_encode($this->post('username') . ':' . $this->post('password')));
            $result['url'] = base_url('panel/map');
        }
        $this->response($result, $result['code']);
    }
}
