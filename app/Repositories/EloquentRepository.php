<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 8:49 PM
 */

namespace App\Repositories;


abstract class EloquentRepository implements RepositoryInterface
{
    protected $_model;

//cau hinh model
    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->_model = app()->make($this->getModel());
    }

// phan thuc thi
    public function getAll()
    {
        return $this->_model->all();
    }

    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }

    public function find($id)
    {
        $result = $this->_model->find($id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $result = $this->_model->find($id);
        if ($result) {
            return $result->delete($id);
        } else {
            return false;
        }
    }

    public function update($id, array $attributes)
    {
        $result = $this->_model->find($id);
        if ($result) {
            return $result->update($attributes);
        } else {
            return false;
        }
    }

}