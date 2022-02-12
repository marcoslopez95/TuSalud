<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseRepository {

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Model
     */
    public function index()
    {
        return $this->model->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  array $data
     * @return Model
     */
    public function store($data)
    {
        return $this->model->create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Model
     */
    public function show($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @param  int  $id
     * @return Model
     */
    public function update($data, $id)
    {
        return ($this->model->find($id))->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return bool
     */
    public function destroy($id)
    {
        //
        return ($this->model->find($id))->delete();
    }
}