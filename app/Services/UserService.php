<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\BaseService;

class UserService extends BaseService{

    public function __construct(UserRepository $repo)
    {
        return parent::__construct($repo);
    }

    
}