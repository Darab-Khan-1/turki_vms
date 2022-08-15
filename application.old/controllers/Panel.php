<?php

class Panel extends CI_Controller
{
    protected $user;
    protected $data;
    protected $traccarApi;

    public function __construct()
    {
        parent::__construct();
        $html_lang = $this->session->userdata('html_lang') !== null ? $this->session->userdata('html_lang') : 'tr';
        $this->data['html_lang'] = $html_lang;
        $this->user = $this->session->userdata('user');
        $this->data['user'] = $this->user;
        $this->traccarApi = TraccarApi::getInstance();
        $this->traccarApi->setHost(API_HOST);
        if (!empty($this->user)) {
            $this->traccarApi->setUsername($this->session->userdata('username'));
            $this->traccarApi->setPassword($this->session->userdata('password'));
        }
    }

    public final function index(): void
    {
        redirect(base_url('panel/map'), 'refresh');
    }

    public final function map(): void
    {
        if (!empty($this->user)) {
            $this->data['pageId'] = "map";
            $result = $this->traccarApi->groupsGet(true, $this->user->id);
            if ($result['success']) {
                $groupResultArray = $result['data'];
                $this->data['groups'] = (object) $groupResultArray;
            } else {
                $this->data['groups'] = [];
            }
            $result = $this->traccarApi->geofencesGet(true, $this->user->id);
            if ($result['success']) {
                $geofenceResultArray = $result['data'];
                $this->data['geofences'] = json_encode($geofenceResultArray);
            } else {
                $this->data['geofences'] = [];
            }
            $this->load->view('map', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function route_static(): void
    {
        if (!empty($this->user)) {
            $result = $this->traccarApi->devicesGet(true, $this->user->id);
            if ($result['success']) {
                $deviceResultArray = $result['data'];
                $deviceObjectArray = [];
                foreach ($deviceResultArray as $deviceResult) {
                    $device = (object)$deviceResult;
                    $device->attributes = (object)$device->attributes;
                    array_push($deviceObjectArray, $device);
                }
                $this->data['devices'] = $deviceObjectArray;
            } else {
                $this->data['devices'] = [];
            }
            $this->data['pageId'] = "routeStatic";
            $this->load->view('routeStatic', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function route_animation(): void
    {
        if (!empty($this->user)) {
            $result = $this->traccarApi->devicesGet(true, $this->user->id);
            if ($result['success']) {
                $deviceResultArray = $result['data'];
                $deviceObjectArray = [];
                foreach ($deviceResultArray as $deviceResult) {
                    $device = (object)$deviceResult;
                    $device->attributes = (object)$device->attributes;
                    array_push($deviceObjectArray, $device);
                }
                $this->data['devices'] = $deviceObjectArray;
            } else {
                $this->data['devices'] = [];
            }
            $this->data['pageId'] = "routeAnimation";
            $this->load->view('routeAnimation', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function route_animation_history(): void
    {
        if (!empty($this->user)) {
            $result = $this->traccarApi->devicesGet(true, $this->user->id);
            if ($result['success']) {
                $deviceResultArray = $result['data'];
                $deviceObjectArray = [];
                foreach ($deviceResultArray as $deviceResult) {
                    $device = (object)$deviceResult;
                    $device->attributes = (object)$device->attributes;
                    array_push($deviceObjectArray, $device);
                }
                $this->data['devices'] = $deviceObjectArray;
            } else {
                $this->data['devices'] = [];
            }
            $this->data['pageId'] = "routeAnimation";
            $this->load->view('routeAnimationHistory', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function report_summary(): void
    {
        if (!empty($this->user)) {
            $result = $this->traccarApi->devicesGet(true, $this->user->id);
            if ($result['success']) {
                $deviceResultArray = $result['data'];
                $deviceObjectArray = [];
                foreach ($deviceResultArray as $deviceResult) {
                    $device = (object)$deviceResult;
                    $device->attributes = (object)$device->attributes;
                    array_push($deviceObjectArray, $device);
                }
                $this->data['devices'] = $deviceObjectArray;
            } else {
                $this->data['devices'] = [];
            }
            $this->data['pageId'] = "reportSummary";
            $this->load->view('reportSummary', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function users(): void
    {
        if (!empty($this->user)) {
            $this->data['pageId'] = "users";
            $this->load->view('users', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function create_user(): void
    {
        if (!empty($this->user)) {
            $this->data['pageId'] = "users";
            $this->load->view('userCreate', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function update_user(string $userId): void
    {
        if (!empty($this->user)) {
            $result = $this->traccarApi->userGet($userId);
            if ($result['success']) {
                $this->data['userUpdate'] = json_encode($result['data']);
                $this->data['pageId'] = "users";
                $this->load->view('userUpdate', $this->data);
            } else {
                redirect(base_url(), 'refresh');
            }

        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function geofence(): void
    {
        if (!empty($this->user)) {
            $this->data['pageId'] = "geofence";
            $this->load->view('geofence', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function create_geofence(): void
    {
        if (!empty($this->user)) {
            $this->data['pageId'] = "geofence";
            $this->load->view('geofenceCreate', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function update_geofence(string $geofenceId): void
    {
        if (!empty($this->user)) {
            $result = $this->traccarApi->geofenceGet($geofenceId);
            if ($result['success']) {
                $this->data['geofenceUpdate'] = json_encode($result['data']);
                $this->data['pageId'] = "geofence";
                $this->load->view('geofenceUpdate', $this->data);
            } else {
                redirect(base_url(), 'refresh');
            }

        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function calendar(): void
    {
        if (!empty($this->user)) {
            $this->data['pageId'] = "calendar";
            $this->load->view('calendar', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public final function notification(): void
    {
        if (!empty($this->user)) {
            $this->data['pageId'] = "notification";
            $this->load->view('notification', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
}
