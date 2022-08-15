<?php

namespace App\Libraries;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class TraccarApi
{
    private static $instance;
    private string $host;
    private string $username;
    private string $password;
    private Client $client;

    public static function getInstance():TraccarApi
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
     * @return string
     */
    public final function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public final function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public final function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public final function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public final function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public final function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return Client
     */
    public final function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public final function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @param string $mode
     * @param string $context
     * @param array $params
     * @return array
     */
    private function request(string $mode, string $context, array $params): array
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

    /**
     * @param string $email
     * @param string $password
     * @return array
     */
    public final function session(string $email, string $password): array
    {
        return self::request("POST", "session", [
            RequestOptions::FORM_PARAMS => ["email" => $email, "password" => $password]
        ]);
    }

    /**
     * @return array
     */
    public final function positionsGet():array
    {
        return self::request("GET", "positions", [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    /**
     * @param bool $all
     * @param int|null $userId
     * @return array
     */
    public final function groupsGet(bool $all = true, int $userId = null):array
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

    /**
     * @param bool $all
     * @param int|null $userId
     * @param array|null $id
     * @param array|null $uniqueId
     * @return array
     */
    public final function devicesGet(bool $all = true, int $userId = null, array $id = null, array $uniqueId = null):array
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

    /**
     * @param array $device
     * @return array
     */
    public final function devicePost(array $device):array
    {
        return self::request("POST", "devices", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $device
        ]);
    }

    /**
     * @param array $device
     * @return array
     */
    public final function devicePut(array $device):array
    {
        $query = "devices/" . $device['id'];

        return self::request("PUT", $query, [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $device
        ]);
    }

    /**
     * @param int $deviceId
     * @return array
     */
    public final function deviceGet(int $deviceId):array
    {
        $query = "devices";
        if ($deviceId > -1) {
            $query .= "/" . $deviceId;
        }
        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    /**
     * @param int $deviceId
     * @return array
     */
    public final function deviceDel(int $deviceId):array
    {
        $query = "devices/" . $deviceId;
        return self::request("DELETE", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    /**
     * @param int $deviceId
     * @param int $groupId
     * @param string $from
     * @param string $to
     * @return array
     */
    public final function reportsRouteGet(int $deviceId, int $groupId, string $from, string $to):array
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

    /**
     * @param array $deviceId
     * @param array $groupId
     * @param string $from
     * @param string $to
     * @return array
     */
    public final function reportsSummaryGet(array $deviceId, array $groupId, string $from, string $to):array
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

    /**
     * @param int $userId
     * @return array
     */
    public final function userGet(int $userId):array
    {
        $query = "users";
        if ($userId > -1) {
            $query .= "/" . $userId;
        }
        return self::request("GET", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    /**
     * @param array $user
     * @return array
     */
    public final function userPost(array $user):array
    {
        return self::request("POST", "users", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $user
        ]);
    }

    /**
     * @param array $user
     * @return array
     */
    public final function userPut(array $user):array
    {
        $query = "users/" . $user['id'];

        return self::request("PUT", $query, [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $user
        ]);
    }

    /**
     * @param int $userId
     * @return array
     */
    public final function userDel(int $userId):array
    {
        $query = "users/" . $userId;
        return self::request("DELETE", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    /**
     * @param array $permission
     * @return array
     */
    public final function permissionsPost(array $permission):array
    {
        return self::request("POST", "permissions", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $permission
        ]);
    }

    /**
     * @param array $permission
     * @return array
     */
    public final function permissionsDel(array $permission):array
    {
        return self::request("DELETE", "permissions", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $permission
        ]);
    }

    /**
     * @param bool $all
     * @param int|null $userId
     * @param int|null $deviceId
     * @param int|null $groupId
     * @param bool $refresh
     * @return array
     */
    public final function geofencesGet(bool $all = true, int $userId = null, int $deviceId = null, int $groupId = null, bool $refresh = true):array
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

    /**
     * @param int $geofenceId
     * @return array
     */
    public final function geofenceGet(int $geofenceId):array
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

    /**
     * @param int $geofenceId
     * @return array
     */
    public final function geofencesDel(int $geofenceId):array
    {
        $query = "geofences/" . $geofenceId;
        return self::request("DELETE", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    /**
     * @param bool $all
     * @param int|null $userId
     * @return array
     */
    public final function calendarsGet(bool $all = true, int $userId = null):array
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

    /**
     * @param array $calendar
     * @return array
     */
    public final function calendarsPost(array $calendar):array
    {
        return self::request("POST", "calendars", [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $calendar
        ]);
    }

    /**
     * @param array $calendar
     * @return array
     */
    public final function calendarsPut(array $calendar): array
    {
        $query = "calendars/" . $calendar['id'];
        return self::request("PUT", $query, [
            RequestOptions::AUTH => [$this->username, $this->password],
            RequestOptions::JSON => $calendar
        ]);
    }

    /**
     * @param array $calendar
     * @return array
     */
    public final function calendarsDel(array $calendar): array
    {
        $query = "calendars/" . $calendar['id'];
        return self::request("DELETE", $query, [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }

    /**
     * @return array
     */
    public final function notificationsTypeGet():array
    {
        return self::request("GET", "notifications/types", [
            RequestOptions::AUTH => [$this->username, $this->password]
        ]);
    }
}