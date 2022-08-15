<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class TraccarModel extends Model
{
    public final function getAvgSpeedSummary(array $params): float
    {
        $sql = "select avg(speed) avg_speed
                from tc_positions
                where deviceid = ? and fixtime between ? and ?";
        return floatval($this->db->query($sql, $params)->getRow()->avg_speed);
    }

    public final function getPatchedPosition(int $deviceId, int $id): array
    {
        try {
            $result['success'] = TRUE;
            $result['data'] = $this->db->table("tc_positions")
                ->select()
                ->where("deviceid", $deviceId)
                ->where("id <=", $id)
                ->where("latitude !=", 0)
                ->where("longitude !=", 0)
                ->orderBy("id desc")
                ->limit(1)
                ->get()->getRowArray();
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            $result = $this->db->error();
            $result['success'] = FALSE;
        }
        return $result;
    }

    public final function getDevice(int $deviceId): array
    {
        try {
            $result['success'] = TRUE;
            $result['data'] = $this->db->table("tc_devices")
                ->select()
                ->where("id", $deviceId)
                ->get()->getRowArray();
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            $result = $this->db->error();
            $result['success'] = FALSE;
        }
        return $result;
    }

    public final function searchDeviceGeofence(int $geofenceId): array
    {
        try {
            $result['success'] = TRUE;
            $result['data'] = $this->db->table("tc_device_geofence")
                ->select()
                ->where("geofenceid", $geofenceId)
                ->get()->getResultArray();
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            $result = $this->db->error();
            $result['success'] = FALSE;
        }
        return $result;
    }
}