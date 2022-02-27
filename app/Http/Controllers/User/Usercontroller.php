<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BasController;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Models\Rol;
use App\Models\User;
use App\Repositories\RolRepository;
use App\Services\RolService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class Usercontroller extends BasController
{
    protected $rol;
    protected $namePlural = 'users';

    public function __construct(UserService $service){
        $this->rol = (new RolService(new RolRepository(new Rol())));
        parent::__construct($service);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = parent::index($request);
        
        return Inertia::render('Users/index',[
           'users'=> $users
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
        $rol = $this->rol->index();
        return Inertia::render('Users/Store',[
            'tipos' => $rol
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
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
    public function edit(User $user)
    {
        //
        $rol = Rol::all();
        return Inertia::render('Users/Edit',[
            'tipos' => $rol,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
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
