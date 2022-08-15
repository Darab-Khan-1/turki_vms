<?php
namespace App\Controllers;

use App\Libraries\TraccarApi;
use CodeIgniter\Controller;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Language\Language;
use CodeIgniter\Session\Session;
use Config\Database;
use Config\Services;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 * @property Session $session
 * @property Language $language
 * @property BaseConnection $db
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['url','common_helper'];

    protected array $data = [];
    protected object $account;
    protected TraccarApi $traccarApi;

    /**
     * Constructor.
     */
    public final function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger): void
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->session = Services::session();
        $this->language = Services::language();
        $lang = $this->session->get('lang') !== null ? $this->session->get('lang') : 'tr';
        $this->session->set('lang', $lang);
        $this->language->setLocale($lang);
        $this->db = Database::connect();

        $segment = $this->request->uri->getSegment(1);
        if ($segment) {
            $segment = base_url();
            $subsegment = $this->request->uri->getSegment(2);
        } else {
            $subsegment = '';
        }

        $this->data = [
            'segment' => $segment,
            'subsegment' => $subsegment,
        ];
        if (null !== $this->session->get('account')) {
            $this->account = $this->session->get('account');
            $this->data['account'] = $this->account;
            $this->data['btoa'] = $this->session->get('btoa');
            $this->traccarApi = TraccarApi::getInstance();
            $this->traccarApi->setHost(API_HOST);
            $this->traccarApi->setUsername($this->session->get('username'));
            $this->traccarApi->setPassword($this->session->get('password'));
        } else {
            $this->data['btoa'] = "";
        }
    }
}
