<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(!User::where('email','admin@tusalud.com')->first()){
            User::create([
                'name' => 'Administrador del Sistema',
                'email' => 'admin@tusalud.com',
                'password' => Hash::make('4dM!n_TS'),
                'id_rol' => 1
            ]);
        }

    }
}
