<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\CateFur;


Interface CateFurRepositoryInterface
{
    public function getAll();
    public function getDataMenu();
    public function getCreateAndEdit($inputFile);
    public function getDelete($id);
}