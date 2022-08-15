<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Language extends BaseController
{
    /**
     * @return RedirectResponse
     */
    public final function index(): RedirectResponse
    {
        $locale = $this->request->getLocale();
        $this->session->remove('lang');
        $this->session->set('lang', $locale);
        return redirect()->to($this->request->getUserAgent()->getReferrer());
    }
}
