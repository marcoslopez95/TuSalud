<?php

namespace App\Http\Controllers\Rol;

use App\Http\Controllers\BasController;
use App\Http\Requests\StoreRol;
use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRol;
use App\Models\Rol;
use App\Services\RolService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class RolController extends BasController
{
    //
    protected $namePlural = 'roles';

    public function __construct(RolService $rol)
    {
        return parent::__construct($rol);
    }


    public function Todos(){
        return 'asd';
        return $this->service->index();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = parent::index($request);
        
        return Inertia::render('Roles/index',[
           'roles'=> $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Roles/Store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRol $request)
    {
        //
        
        return parent::_store($request);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        //
        // return $rol;
        return Inertia::render('Roles/Edit',[
            'rol' => $rol
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRol $request, $id)
    {
        //
        //
       return parent::_update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return parent::destroy($id);
    }
}
