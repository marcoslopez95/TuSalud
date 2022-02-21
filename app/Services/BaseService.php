<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class BaseService {
    
    protected $repository;

    public function __construct(BaseRepository $repository){
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return $this->repository->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        DB::beginTransaction();
        try{

            $registro = $this->repository->store($request);
            DB::commit();

            return $registro;

        }catch(Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        return $this->repository->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}