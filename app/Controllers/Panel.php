<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Panel extends BaseController
{
    /**
     * @return RedirectResponse
     */
    public final function index(): RedirectResponse
    {
        return redirect()->to(base_url('panel/map'));
    }

    /**
     * @return RedirectResponse|string
     */
    public final function map(): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "map";
            $result = $this->traccarApi->groupsGet(true, $this->account->id);
            if ($result['success']) {
                $this->data['groups'] = recursive_convert_array_to_obj($result['data']);
            } else {
                $this->data['groups'] = [];
            }
            $result = $this->traccarApi->geofencesGet(true, $this->account->id);
            if ($result['success']) {
                $this->data['geofences'] = recursive_convert_array_to_obj($result['data']);
            } else {
                $this->data['geofences'] = [];
            }
            return view('map', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function route_static(): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "routeStatic";
            $result = $this->traccarApi->devicesGet(true, $this->account->id);
            if ($result['success']) {
                $this->data['devices'] = recursive_convert_array_to_obj($result['data']);
            } else {
                $this->data['devices'] = [];
            }
            return view('routeStatic', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function route_animation(): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "routeAnimation";
            $result = $this->traccarApi->devicesGet(true, $this->account->id);
            if ($result['success']) {
                $this->data['devices'] = recursive_convert_array_to_obj($result['data']);
            } else {
                $this->data['devices'] = [];
            }
            return view('routeAnimation', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function route_animation_history(): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "routeAnimation";
            $result = $this->traccarApi->devicesGet(true, $this->account->id);
            if ($result['success']) {
                $this->data['devices'] = recursive_convert_array_to_obj($result['data']);
            } else {
                $this->data['devices'] = [];
            }
            return view('routeAnimationHistory', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function report_summary(): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "reportSummary";
            $result = $this->traccarApi->devicesGet(true, $this->account->id);
            if ($result['success']) {
                $this->data['devices'] = recursive_convert_array_to_obj($result['data']);
            } else {
                $this->data['devices'] = [];
            }
            return view('reportSummary', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function users(): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "users";
            return view('users', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function create_user(): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "users";
            return view('userCreate', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function update_user(string $userId): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "users";
            $result = $this->traccarApi->userGet($userId);
            $this->data['userUpdate'] = json_encode($result['data']);
            return view('userUpdate', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function geofence(): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "geofence";
            return view('geofence', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function create_geofence(): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "geofence";
            return view('geofenceCreate', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function update_geofence(string $geofenceId): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "geofence";
            $result = $this->traccarApi->geofenceGet($geofenceId);
            $this->data['geofenceUpdate'] = json_encode($result['data']);
            return view('geofenceUpdate', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public final function notification(): RedirectResponse|string
    {
        if (!empty($this->account)) {
            $this->data['pageId'] = "notification";
            return view('notification', $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }
}
