<?php

namespace App\Repositories;

use App\Models\Rol;
use App\Repositories\BaseRepository;

class RolRepository extends BaseRepository{
    
    public function __construct(Rol $rol)
    {
        return parent::__construct($rol);
    }

    

}