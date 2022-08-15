<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Home extends BaseController
{
    /**
     * @return string
     */
    public final function index(): string
    {
        return view('welcome_message', $this->data);
    }

    /**
     * @return RedirectResponse
     */
    public final function logout(): RedirectResponse
    {
        $this->account = (object)array();
        $this->session->remove('account');
        $this->session->remove('username');
        $this->session->remove('password');
        $this->session->remove('btoa');
        $this->session->remove('lang');
        return redirect()->to(base_url());
    }
}
