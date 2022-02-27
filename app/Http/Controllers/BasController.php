<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BasController extends Controller
{
    protected $service;
    protected $namePlural;
    protected $index;

    public function __construct(BaseService $service)
    {
        $this->service = $service;
        $this->index = $this->namePlural.'-index';
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function index(Request $request)
    {
        return $this->service->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
     public function _store($request)
     {
         $bool = $this->service->store($request);
         return ($bool) ? redirect()->route($this->index) : redirect()->back()->withErrors($bool)->withInput();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function _update($request, $id)
    {
         $bool = $this->service->update($request,$id);

         return ($bool) ? redirect()->route($this->index) : redirect()->back()->withErrors($bool)->withInput();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
