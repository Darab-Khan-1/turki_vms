<?php

use App\Libraries\TraccarApi;

function recursive_convert_array_to_obj($arr)
{
    if (is_array($arr)) {
        $new_arr = array();
        foreach ($arr as $k => $v) {
            /*if (is_integer($k)) {
                // Needs this if you have indexed keys at the top level in the array
                // and want to utilize the indexes: eg. $o->index{1}
                $new_arr['index'][$k] = recursive_convert_array_to_obj($v);
            } else {
                $new_arr[$k] = recursive_convert_array_to_obj($v);
            }*/
            $new_arr[$k] = recursive_convert_array_to_obj($v);
        }

        return (object)$new_arr;
    }

    // else maintain the type of $arr
    return $arr;
}

function check_auth(string $username, $password): bool
{
    $traccarApi = TraccarApi::getInstance();
    $traccarApi->setHost(API_HOST);
    $loginRes = $traccarApi->session($username, $password);
    return $loginRes['success'];
}