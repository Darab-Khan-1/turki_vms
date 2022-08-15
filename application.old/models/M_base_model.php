<?php
/*
 * *************************************************************************
 * Copyright (C) 9/23/20, 3:17 AM. Lintasevolusi - All Rights Reserved
 *
 * @author  Heri Setia Wardoyo
 * @site    https://lintasevolusi.com
 * @date    9/23/20, 3:17 AM
 *
 */

class M_base_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $tableName
     * @param $arrayParameter
     * @return array|bool[]
     */

	public function create($tableName, $arrayParameter)
	{
		$sql = "insert into " . $tableName . "(";
		foreach ($arrayParameter as $column => $value) {
			$sql .= $column . ",";
		}
		$sql = rtrim($sql, ",") . ") values (";
		foreach ($arrayParameter as $column => $value) {
			$sql .= "?,";
		}
		$sql = rtrim($sql, ",") . ")";
		$result = $this->db->query($sql, $arrayParameter);

		if ($result) {
			return array(
				'success' => TRUE
			);
		}

		return array(
			'success' => FALSE,
			'reason' => $this->db->error(),
		);
	}

    /**
     * @param $tableName
     * @param $andArrayFilterParameter
     * @Example array('column_name_1' => 'value_1','column_name_2' => 'value_2')
     * @return mixed
     */
    public function get($tableName, $andArrayFilterParameter)
    {
        $fields = $this->db->list_fields($tableName);

        $sql = "select ";
        foreach ($fields as $field) {
            $sql .= $field . ",";
        }
        $sql = rtrim($sql, ",") . " from " . $tableName;
        if (isset($andArrayFilterParameter)) {
            $sql .= " where ";
            foreach ($andArrayFilterParameter as $column => $value) {
                $sql .= $column . " = ? and ";
            }
            $sql = rtrim($sql, " and ");
            $result = $this->db->query($sql, $andArrayFilterParameter)->row();
        } else {
            $result = $this->db->query($sql)->row();
        }
        return $result;
    }

    /**
     * @param $tableName
     * @param $searchParameter
     * @return array
     */
    public function search($tableName, $searchParameter)
    {
        $fields = $this->db->list_fields($tableName);

        $sql = "select ";
        foreach ($fields as $field) {
            $sql .= $field . ",";
        }
        $sql = rtrim($sql, ",") . " from " . $tableName. " where 1 = 1 ";
        if (!empty($searchParameter['search'])) {
            $sql .= " and (";
            foreach ($fields as $column => $value) {
                $sql .= "upper(". $value . ") like upper('%".$searchParameter['search']. "%') or ";
            }
            $sql = rtrim($sql, " or ").")";
        }

        if (isset($searchParameter['and_key_parameters']) && !empty($searchParameter['and_key_parameters'])) {
            $sql .= " and (";
            foreach ($searchParameter['and_key_parameters'] as $column => $value) {
                $sql .= $column." in ('".$value."') and ";
            }
            $sql = rtrim($sql, " and ").")";
        }
        if (isset($searchParameter['find_in_set']) && !empty($searchParameter['find_in_set'])) {
            $sql .= " and (";
            foreach ($searchParameter['find_in_set'] as $column => $value) {
                $temp = explode(',',$value);
                foreach ($temp as $idx => $vl) {
                    $sql .= "find_in_set('".$vl."',".$column.") or ";
                }
            }
            $sql = rtrim($sql, " or ").")";
        }

        //echo $sql;
        //execute count before limit
        $query = $this->db->query($sql);
        $resultCount = $query->num_rows();

        $sql .= " order by ".$searchParameter["order_by"]." ".$searchParameter["order_mode"]." ";
        if ($searchParameter["start"] >= 0 && $searchParameter["length"] >= 1) {
            $sql .= "limit " . $searchParameter["start"] . "," . $searchParameter["length"];
        }
        $query = $this->db->query($sql);
        $resultArray = $query->result_array();

        return array(
            "data" => $resultArray,
            "total" => $resultCount,
            "recordsTotal" => $resultCount,
            "recordsFiltered" => $resultCount
        );
    }

    /**
     * @param $tableName
     * @param $andArrayFilterParameter
     * @Example array('column_name_1' => 'value_1','column_name_2' => 'value_2', 'parameter_keys' => array('param_key_1' => 'param_value_1','param_key_2' => 'param_value_2'))
     * @return mixed
     */
    public function update($tableName, $andArrayFilterParameter)
    {
        $sql = "update " . $tableName . " set ";
        $normalizeParameter = array();
        foreach ($andArrayFilterParameter as $column => $value) {
            if ($column !== 'parameter_keys') {
                $sql .= $column . " = ?, ";
                $normalizeParameter[$column] = $value;
            }
        }
        $sql = rtrim($sql, ", ") . " where ";
        foreach ($andArrayFilterParameter as $column => $value) {
            if ($column === 'parameter_keys') {
                foreach ($value as $indexKey => $valueKey) {
                    $sql .= $indexKey . " = ? and ";
                    $normalizeParameter[$indexKey] = $valueKey;
                }
            }
        }
        $sql = rtrim($sql, " and ");
        /*print_r($sql);
        print_r($normalizeParameter);*/
        $result = $this->db->query($sql, $normalizeParameter);
        if ($result) {
            $output["success"] = TRUE;
            return $output;
        }

        $output["success"] = FALSE;
        return $output;
    }

    public function delete($tableName, $andArrayFilterParameter)
    {
        $sql = "delete from " . $tableName . " where ";
        foreach ($andArrayFilterParameter as $column => $value) {
            $sql .= $column . " = ? and ";
        }
        $sql = rtrim($sql, " and ");
        /*print_r($sql);
        print_r($normalizeParameter);*/
        $result = $this->db->query($sql, $andArrayFilterParameter);
        if ($result) {
            $output["success"] = TRUE;
            return $output;
        }

        $output["success"] = FALSE;
        return $output;
    }
}
