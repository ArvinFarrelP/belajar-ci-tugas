<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\DiskonModel;
use Config\Services;

abstract class BaseController extends Controller
{
    /**
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * @var list<string>
     */
    protected $helpers = ['form'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // Ambil diskon hari ini
        $diskonModel = new DiskonModel();
        $todayDiskon = $diskonModel->where('tanggal', date('Y-m-d'))->first();
        $nominalDiskon = $todayDiskon ? $todayDiskon['nominal'] : null;

        // Set variabel global ke semua view
        Services::renderer()->setVar('diskon_hari_ini', $nominalDiskon);
    }
}