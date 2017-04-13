<?php

namespace App\Repositories;

abstract class EloquentRepository implements RepositoryInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->_model = $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
        return $this->_model;
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        // dd($this->_model);
        return $this->_model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->_model->find($id);
        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return bool|mixed
     */
    public function create(array $attributes)
    {
        // $model = $this->_model->newInstance($attributes);
        // $model->save();
        // return false;
        return $this->_model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    /**
     * Delete
     * 
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if($result) {
            $result->delete();
            return true;
        }
        return false;
    }

    /**
    * pagination
    * @param $limit
    * @return mixed
    */
    public function paginate($limit = null)
    {
        $result =  $this->_model->paginate($limit);
        return $result;
    }

    /**
     * [search lấy ra theo field]
     * @return [type] [description]
     */
    public function search($field, $data)
    {
        $search = $this->_model->whereRaw("match($field) against 
            ('$data' in boolean mode)");
        return $search;
    }
}