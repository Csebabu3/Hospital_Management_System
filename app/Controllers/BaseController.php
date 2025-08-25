<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class BaseController extends Controller
{
    protected $helpers = [];

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, 
                                   \CodeIgniter\HTTP\ResponseInterface $response, 
                                   \Psr\Log\LoggerInterface $logger)
    {
        // Do not forget to call parent initController
        parent::initController($request, $response, $logger);

        // Load any models, helpers, or libraries you need here
        // Example: $this->session = \Config\Services::session();
    }
}
