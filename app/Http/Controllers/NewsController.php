<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\AppController;
use DB;
use App\Services\NewsService;

class NewsController extends AppController
{
    private $service;

    public function __construct(NewsService $service)
    {
       // parent::__construct();
       $this->service = $service;
    }


}