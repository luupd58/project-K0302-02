<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
	/**
     * 
     * @param $id
     * @return mixed
     */
    public function showType($id);
}