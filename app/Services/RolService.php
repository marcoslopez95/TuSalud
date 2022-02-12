<?php

namespace App\Services;

use App\Repositories\RolRepository;
use App\Services\BaseService;

class RolService extends BaseService{

    public function __construct(RolRepository $repo)
    {
        return parent::__construct($repo);
    }

    
}