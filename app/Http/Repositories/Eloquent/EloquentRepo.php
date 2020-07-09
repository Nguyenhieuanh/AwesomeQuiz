<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\CRUDInterfaceRepo;

abstract class EloquentRepo implements CRUDInterfaceRepo
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get Model
     * @return string
     */
    abstract public function getModel();

    /**
     * set Model
     */
    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        $result = $this->model->find($id);
        return $result;
    }

    public function create($data)
    {
        try {
            $object = $this->model->create($data);
        } catch (\Exception $e) {
            return null;
        }
        return $object;
    }

    public function update($data, $object)
    {
        return $object->update($data);
    }

    public function destroy($id)
    {
        $result = $this->findById($id);
        if ($result) {
            $result->delete();
            return true;
        }

        return false;
    }
}
