<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
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
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $request)
    {
        DB::beginTransaction();
        try{

            $registro = $this->repository->store($request->all());
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
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequest $request, $id)
    {
        DB::beginTransaction();
        try{

            $update = $this->repository->update($request->all(),$id);
            DB::commit();

            return $update;

        }catch(Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $bool = $this->show($id);
            $update = $this->repository->destroy($id);
            DB::commit();

            return [
                'status' => 204,
                'message' => 'Eliminado'
            ];

        }catch(Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
        
    }
}