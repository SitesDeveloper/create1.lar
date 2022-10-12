<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Post\Service;


class BaseController extends Controller
{
    public $service;

     public function __construct(Service $service) {
         //dd('construc2');

         $this->service = $service;

    }
}
