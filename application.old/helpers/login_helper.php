<?php
/**
 * Created by PhpStorm.
 * User: Heri Setia Wardoyo
 * Date: 5/13/2018
 * Time: 3:55 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_hash')) {
    function get_hash($plainPassword)
    {
        // proses hash sebanyak: 2^5 = 32x
        $option = ['cost' => 10];
        return password_hash($plainPassword, PASSWORD_DEFAULT, $option);
    }
}

if (!function_exists('hash_verified')) {
    function hash_verified($plainPassword, $hashPassword)
    {
        return password_verify($plainPassword, $hashPassword) ? true : false;
    }
}