<?php
/**
 * Copyright (c) 2016 - 2020. Lintasevolusi (https://lintasevolusi.com). All Rights Reserved.
 */

/**
 * Created by PhpStorm.
 * User: Heri Setia Wardoyo
 * Date: 06/10/2020
 * Time: 7:01 AM
 */

class LanguageLoader
{
    function initialize() {

        $ci =& get_instance();

        $ci->load->helper('language');

        $siteLang = $ci->session->userdata('lang');

        if ($siteLang) {

            $ci->lang->load('message',$siteLang);

        } else {

            $ci->lang->load('message','turkish');

        }

    }
}
