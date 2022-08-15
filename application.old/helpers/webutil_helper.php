<?php
if (!function_exists('bt_search')) {
    function bt_search($get, $modelName)
    {
        $CI = get_instance();
        $CI->load->model($modelName);
        $merk = null;
        $model = null;
        $transmissie = null;
        $min = null;
        $max = null;
        $search = null;
        $exclude = null;
        $code = null;
        $last_update_by = null;
        $order_by = null;
        $order_type = null;
        if (isset($get['merk'])) {
            $merk = $get['merk'];
        }
        if (isset($get['model'])) {
            $model = $get['model'];
        }
        if (isset($get['transmissie'])) {
            $transmissie = $get['transmissie'];
        }
        if (isset($get['min'])) {
            $min = $get['min'];
        }
        if (isset($get['max'])) {
            $max = $get['max'];
        }
        if (isset($get['search'])) {
            $search = $get['search'];
        }
        if (isset($get['last_update_by'])) {
            $search = $get['last_update_by'];
        }
        if (isset($get['code'])) {
            $code = str_replace(";", ",", $get['code']);
        }
        if (isset($get['order_by'])) {
            $order_by = $get['order_by'];
        }
        if (isset($get['order_type'])) {
            $order_type = $get['order_type'];
        }
        $start = $get['offset'];
        $length = $get['limit'];

        $param = array(
            "start" => (int)$start,
            "length" => (int)$length,
            "merk" => $merk,
            "model" => $model,
            "transmissie" => $transmissie,
            "min" => $min,
            "max" => $max,
            "search" => $search,
            "exclude" => $exclude,
            "code" => $code,
            "last_update_by" => $last_update_by,
            "order_by" => $order_by,
            "order_type" => $order_type
        );
        $result = $CI->$modelName->bt_search($param);
        $formattedResult = array(
            "total" => (int)$result['total'],
            "totalNotFiltered" => (int)$result['total'],
            "rows" => $result['data'],
            "success" => $result['success']
        );

        return $formattedResult;
    }
}
