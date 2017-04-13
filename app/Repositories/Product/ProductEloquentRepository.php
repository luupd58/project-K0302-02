<?php
namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;

class ProductEloquentRepository extends EloquentRepository implements 
    ProductRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Product::class;
    }

    /**
     * [showType lấy ra product_type dựa vào liên kết belongsTo]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showType($id)
    {
    	$result = $this->_model->findorfail($id)->product_type()->get();
    	return $result;
    	
    }
    /**
     * [showAllType lấy ra tất cả product_type]
     * @return [type] [description]
     */
    public function showAllType()
    {
        $type = \App\Product_type::all();
        return $type;
    }
}