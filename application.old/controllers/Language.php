<?php


class Language extends CI_Controller
{

    /**
     * Language constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public final function select(string $language = ""): void
    {
        $language = ($language !== "") ? $language : "turkish";
        if ($language == 'turkish') {
            $this->session->set_userdata('html_lang', 'tr');
        } else if ($language == 'english') {
            $this->session->set_userdata('html_lang', 'en');
        } else {
            $this->session->set_userdata('html_lang', 'tr');
        }
        $this->session->set_userdata('lang', $language);
        //echo $_SERVER['HTTP_REFERER'];
        redirect($_SERVER['HTTP_REFERER']);

    }
}

