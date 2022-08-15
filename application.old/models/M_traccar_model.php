<?php

class M_traccar_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public final function avgSpeed(array $parameter): float
    {
        $sql = "select avg(speed) avg_speed
                from tc_positions
                where deviceid = ? and fixtime between ? and ?";
        return floatval($this->db->query($sql, $parameter)->row()->avg_speed);
    }

    public final function getPatchedPosition(array $parameter): array
    {
        $sql = "select id,
                       protocol,
                       deviceid,
                       servertime,
                       devicetime,
                       fixtime,
                       valid,
                       latitude,
                       longitude,
                       altitude,
                       speed,
                       course,
                       address,
                       attributes,
                       accuracy,
                       network
                from tc_positions
                where deviceid = ? and id <= ? and latitude != 0 and longitude != 0
                order by id desc limit 1";
        return (array) $this->db->query($sql, $parameter)->row();
    }
}
