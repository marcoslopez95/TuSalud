<?php

namespace App\Http\Controllers;

use App\Services\BaseService;

class BasController extends Controller
{
    protected $service;

    public function __construct(BaseService $service)
    {
        $this->service = $service;
    }
}
