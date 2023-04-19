<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Banner1;
use App\Models\Gallery;
use App\Models\Categories;
use App\Models\Video;
use App\Models\Package;
use App\Models\DetailPackage;
use App\Models\ClientAccount;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
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
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    protected $banner1;
    protected $gallery;
    protected $categories;
    protected $video;
    protected $package;
    protected $detailpackage;
    protected $clientaccount;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->banner1 = new Banner1();
        $this->gallery = new Gallery();
        $this->categories = new Categories();
        $this->video = new Video();
        $this->package = new Package();
        $this->detailpackage = new DetailPackage();
        $this->client = new ClientAccount();
        $this->session = \Config\Services::session();
        // E.g.: $this->session = \Config\Services::session();
    }
}