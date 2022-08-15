<?php

namespace App\Controllers\Rest;

use App\Libraries\TraccarApi;
use CodeIgniter\HTTP\Response;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Session\Session;
use Config\Services;

class Account extends ResourceController
{
    protected TraccarApi $traccarApi;
    protected Session $session;

    function __construct()
    {
        helper(['common_helper']);
        $this->traccarApi = TraccarApi::getInstance();
        $this->traccarApi->setHost(API_HOST);
        $this->session = Services::session();
    }

    public final function login(): Response
    {
        $loginRes = $this->traccarApi->session($this->request->getPost("username"), $this->request->getPost("password"));
        if ($loginRes['success']) {
            $this->session->set('account', recursive_convert_array_to_obj($loginRes['data']));
            $this->session->set('username', $this->request->getPost("username"));
            $this->session->set('password', $this->request->getPost("password"));
            $this->session->set('btoa', base64_encode($this->request->getPost("username").":".$this->request->getPost("password")));
            $loginRes['url'] = base_url('panel/map');
            return $this->respond($loginRes);
        } else {
            return $this->failUnauthorized();
        }
    }
}