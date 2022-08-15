<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class TraccarApi
{
    private static $instance = null;
    private $host;
    private $username;
    private $password;
    private $client;

    public static function getInstance()
    {
        if (self::$instance === NULL)
            self::$instance = new TraccarApi();
        return self::$instance;
    }

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost(string $host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    private function request(string $mode, string $context, array $params)
    {
        try {
            $res = $this->client->request($mode, $this->host . $context, $params);
            //$cookie = $result->getHeader("Set-Cookie")[0];
            $data = json_decode($res->getBody()->getContents(), TRUE);
            //$user['cookie'] = $cookie;
            $result = array(
                "success" => TRUE,
                "code" => $res->getStatusCode(),
                "message" => "",
                "data" => $data,
            );
        } catch (ClientException $e) {
            $message = explode("-", $e->getResponse()->getBody()->getContents())[0];
            $result = array(
                "success" => FALSE,
                "code" => $e->getResponse()->getStatusCode(),
                "message" => trim($message),
                "data" => ""
            );
        } catch (GuzzleException $e) {
            $message = explode("-", $e->getResponse()->getBody()->getContents())[0];
            $result = array(
                "success" => FALSE,
                "code" => $e->getResponse()->getStatusCode(),
                "message" => trim($message),
                "data" => ""
            );
        }

        return $result;
    }

    public function session(string $email, string $password)
    {
        return self::request("POST", "session", [
            RequestOptions::FORM_PARAMS => ["email" => $email, "password" => $password]
        ]);
    }

    public function positionsGet()
    {
        return self::request("GET", "positions", [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function groupsGet(bool $all = true, int $userId = null)
    {
        $query = "groups";
        if ($all) {
            $query = $query . "?all=true";
        } else {
            $query = $query . "?all=false";
        }
        if ($userId != null) {
            $query .= "&userId=" . $userId;
        }
        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function devicesGet(bool $all = true, int $userId = null, array $id = null, array $uniqueId = null)
    {
        $query = "devices";
        if ($all) {
            $query = $query . "?all=true";
        } else {
            $query = $query . "?all=false";
        }
        if ($userId != null) {
            $query .= "&userId=" . $userId;
        }
        if ($id != null && !empty($id)) {
            foreach ($id as $item) {
                $query .= "&id=" . $item;
            }
        }
        if ($uniqueId != null && !empty($uniqueId)) {
            foreach ($uniqueId as $item) {
                $query .= "&uniqueId=" . $item;
            }
        }
        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function devicePost(array $device)
    {
        return self::request("POST", "devices", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $device
        ]);
    }

    public function devicePut(array $device)
    {
        $query = "devices/" . $device['id'];

        return self::request("PUT", $query, [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $device
        ]);
    }

    public function deviceGet(int $deviceId)
    {
        $query = "devices";
        if ($deviceId > -1) {
            $query .= "/" . $deviceId;
        }
        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function deviceDel(int $deviceId)
    {
        $query = "devices/" . $deviceId;
        return self::request("DELETE", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function reportsRouteGet(int $deviceId, int $groupId, string $from, string $to)
    {
        $query = "reports/route?deviceId=" . $deviceId;
        if ($groupId > -1) {
            $query .= "&groupId=" . $groupId;
        }
        $query .= "&from=" . $from;
        $query .= "&to=" . $to;

        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::HEADERS => [
                'accept' => 'application/json'
            ]
        ]);
    }

    public function reportsSummaryGet(array $deviceId, array $groupId, string $from, string $to)
    {
        $query = "reports/summary?";
        if ($deviceId != null && !empty($deviceId)) {
            foreach ($deviceId as $item) {
                $query .= "&deviceId=" . $item;
            }
        }
        if ($groupId != null && !empty($groupId)) {
            foreach ($groupId as $item) {
                $query .= "&groupId=" . $item;
            }
        }
        $query .= "&from=" . $from;
        $query .= "&to=" . $to;

        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::HEADERS => [
                'accept' => 'application/json'
            ]
        ]);
    }

    public function userGet(int $userId)
    {
        $query = "users";
        if ($userId > -1) {
            $query .= "/" . $userId;
        }
        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function userPost(array $user)
    {
        return self::request("POST", "users", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $user
        ]);
    }

    public function userPut(array $user)
    {
        $query = "users/" . $user['id'];

        return self::request("PUT", $query, [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $user
        ]);
    }

    public function userDel(int $userId)
    {
        $query = "users/" . $userId;
        return self::request("DELETE", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function permissionsPost(array $permission)
    {
        return self::request("POST", "permissions", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $permission
        ]);
    }

    public function permissionsDel(array $permission)
    {
        return self::request("DELETE", "permissions", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $permission
        ]);
    }

    public function geofencesGet(bool $all = true, int $userId = null, int $deviceId = null, int $groupId = null, bool $refresh = true)
    {
        $query = "geofences";
        if ($all) {
            $query = $query . "?all=true";
        } else {
            $query = $query . "?all=false";
        }
        if ($userId != null) {
            $query .= "&userId=" . $userId;
        }
        if ($deviceId != null) {
            $query .= "&deviceId=" . $deviceId;
        }
        if ($groupId != null) {
            $query .= "&groupId=" . $groupId;
        }
        if ($refresh) {
            $query = $query . "&refresh=true";
        } else {
            $query = $query . "&refresh=false";
        }
        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function geofenceGet(int $geofenceId)
    {
        $query = "geofences";
        if ($geofenceId > -1) {
            $query .= "/" . $geofenceId;
        }
        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function geofencesPost(array $geofence)
    {
        return self::request("POST", "geofences", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $geofence
        ]);
    }

    public function geofencesPut(array $geofence)
    {
        $query = "geofences/" . $geofence['id'];

        return self::request("PUT", $query, [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $geofence
        ]);
    }

    public function geofencesDel(int $geofenceId)
    {
        $query = "geofences/" . $geofenceId;
        return self::request("DELETE", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function calendarsGet(bool $all = true, int $userId = null)
    {
        $query = "calendars";
        if ($all) {
            $query = $query . "?all=true";
        } else {
            $query = $query . "?all=false";
        }
        if ($userId != null) {
            $query .= "&userId=" . $userId;
        }
        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function calendarsPost(array $calendar)
    {
        return self::request("POST", "calendars", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $calendar
        ]);
    }

    public function calendarsPut(array $calendar)
    {
        $query = "calendars/" . $calendar['id'];
        return self::request("PUT", $query, [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $calendar
        ]);
    }

    public function calendarsDel(array $calendar)
    {
        $query = "calendars/" . $calendar['id'];
        return self::request("DELETE", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    public function notificationsTypeGet()
    {
        return self::request("GET", "notifications/types", [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }
}
