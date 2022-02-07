<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(!Rol::where('nombre','Administrador')->first()){
            (new Rol)->create([
                'nombre'=>'Administrador',
                'descripcion' => 'Administrador del Sistema'
            ]);
        }
    }
}
