<?php
/**
 * Created by PhpStorm.
 * User: Tranh Than
 * Date: 5/5/2018
 * Time: 10:00 AM
 */
namespace App\Repositories\CateProd;


Interface CateProdRepositoryInterface
{
    public function getAll();
    public function getDataMenu();
    public function getCreateAndEdit($inputFile);
    public function getDelete($id);
}