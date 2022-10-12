<?php

namespace App\Http\Controllers;

use App\Services\Post\Service;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //  public function __construct() {
    //      dd('construc1');
    //  }

    // public $service;

    // public function __constructor() {
    //     dd('construc2');

    //     $this->service = new Service();

    // }
}
