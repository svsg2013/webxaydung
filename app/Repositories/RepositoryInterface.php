<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 8:51 PM
 */

namespace App\Repositories;


interface RepositoryInterface
{
    public function getAll();
    public function create(array $attributes);
    public function find($id);
    public function delete($id);
    public function update($id, array $attributes);

}