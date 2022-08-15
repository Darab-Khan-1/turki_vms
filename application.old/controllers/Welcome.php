<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    protected $data;

    public function __construct()
    {
        parent:: __construct();
        $html_lang = $this->session->userdata('html_lang') !== null ? $this->session->userdata('html_lang') : 'tr';
        $this->data['html_lang'] = $html_lang;
    }

    public final function index(): void
    {
        $this->load->view('welcome_message', $this->data);
    }
}
