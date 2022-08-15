<?php
/*
 * *************************************************************************
 * Copyright (C) 9/23/20, 3:18 AM. Lintasevolusi - All Rights Reserved
 *
 * @author  Heri Setia Wardoyo
 * @site    https://lintasevolusi.com
 * @date    9/23/20, 3:18 AM
 *
 */

defined('BASEPATH') or exit('No direct script access allowed');
if (!function_exists('create')) {
    /**
     * @param $tableName
     * @param $arrayParameter
     * @return mixed
     */
    function create($tableName, $arrayParameter)
    {
        $CI = get_instance();
        $CI->load->model('M_base_model');
        return $CI->M_base_model->create($tableName, $arrayParameter);
    }
}
if (!function_exists('get')) {
    /**
     * @param $tableName
     * @param $andFilterParameter
     * @return mixed
     */
    function get($tableName, $andFilterParameter)
    {
        $CI = get_instance();
        $CI->load->model('M_base_model');
        return $CI->M_base_model->get($tableName, $andFilterParameter);
    }
}
if (!function_exists('search')) {
    /**
     * @param $tableName
     * @param $searchParameter
     * @return mixed
     */
    function search($tableName, $searchParameter)
    {
        $CI = get_instance();
        $CI->load->model('M_base_model');
        return $CI->M_base_model->search($tableName, $searchParameter);
    }
}
if (!function_exists('update')) {
    /**
     * @param $tableName
     * @param $andArrayParameter
     * @return mixed
     */
    function update($tableName, $andArrayParameter)
    {
        $CI = get_instance();
        $CI->load->model('M_base_model');
        return $CI->M_base_model->update($tableName, $andArrayParameter);
    }
}
if (!function_exists('delete')) {
    /**
     * @param $tableName
     * @param $andArrayParameter
     * @return mixed
     */
    function delete($tableName, $andArrayParameter)
    {
        $CI = get_instance();
        $CI->load->model('M_base_model');
        return $CI->M_base_model->delete($tableName, $andArrayParameter);
    }
}
if (!function_exists('file_upload')) {
    function file_upload($uploadPath, $postFiles)
    {
        if (isset($postFiles)) {
            $data = [];
            foreach ($postFiles as $index => $value) {
                $CI = get_instance();
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif|avi|flv|wmv|mp3|mp4';
                $CI->load->library('upload', $config);

                if (is_array($postFiles[$index]['name'])) {
                    $countFiles = count($postFiles[$index]['name']);
                    for ($i = 0; $i < $countFiles; $i++) {

                        if (!empty($postFiles[$index]['name'][$i])) {

                            // Define new $_FILES array - $_FILES['file']
                            $_FILES['file']['name'] = $index."_".$postFiles[$index]['name'][$i];
                            $_FILES['file']['type'] = $postFiles[$index]['type'][$i];
                            $_FILES['file']['tmp_name'] = $postFiles[$index]['tmp_name'][$i];
                            $_FILES['file']['error'] = $postFiles[$index]['error'][$i];
                            $_FILES['file']['size'] = $postFiles[$index]['size'][$i];

                            // Set preference
                            /*$config['upload_path'] = 'uploads/';
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';
                            $config['max_size'] = '5000'; // max_size in kb
                            $config['file_name'] = $_FILES['files']['name'][$i];

                            //Load upload library
                            $this->load->library('upload', $config);*/

                            // File upload
                            if ($CI->upload->do_upload('file')) {
                                // Get data about the file
                                $uploadData = $CI->upload->data();
                                $filename = $uploadData['file_name'];

                                // Initialize array
                                $data[$index][] = $filename;
                            }
                        }
                    }
                } else {
                    $_FILES['file']['name'] = $index."_".$postFiles[$index]['name'];
                    $_FILES['file']['type'] = $postFiles[$index]['type'];
                    $_FILES['file']['tmp_name'] = $postFiles[$index]['tmp_name'];
                    $_FILES['file']['error'] = $postFiles[$index]['error'];
                    $_FILES['file']['size'] = $postFiles[$index]['size'];

                    // File upload
                    if ($CI->upload->do_upload('file')) {
                        // Get data about the file
                        $uploadData = $CI->upload->data();
                        $filename = $uploadData['file_name'];

                        // Initialize array
                        $data[$index][] = $filename;
                    }
                }
            }
            foreach ($data as $index => $value) {
                $data[$index] = implode(',',$value);
            }
            return $data;
        }

        return null;
    }
}
