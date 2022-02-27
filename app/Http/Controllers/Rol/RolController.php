<?php

namespace App\Http\Controllers\Rol;

use App\Http\Controllers\BasController;
use App\Http\Requests\StoreRolRequest;
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

    public function __construct(RolService$rol)
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
    public function store(Request $request)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required|string|unique:App\Models\Rol',
                'descripcion' => 'required|string'
            ],
            [
                'required'  => 'El campo :attribute es requerido',
                'string'    => 'El campo :attribute debe ser un string',
                'unique'    => 'Ya existe un Rol con ese nombre'
            ]
        );
        
        if($validator-> fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $bool = $this->service->store($request);
        return ($bool) ? redirect()->route('roles-index') : redirect()->back()->withErrors($bool)->withInput();
        
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
    public function update(Request $request, $id)
    {
        //
        //
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => ['required','string', Rule::unique('roles')->ignore($id)],
                'descripcion' => 'required|string'
            ],
            [
                'required'  => 'El campo :attribute es requerido',
                'string'    => 'El campo :attribute debe ser un string',
                'unique'    => 'Ya existe un Rol con ese nombre'
            ]
        );
        
        if($validator-> fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $bool = $this->service->update($request, $id);

        return ($bool) ? redirect()->route('roles-index') : redirect()->back()->withErrors($bool)->withInput();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bool = parent::destroy($id);

        return ($bool) ? redirect()->route('roles-index') : redirect()->back()->withErrors($bool)->withInput();
    }
}
