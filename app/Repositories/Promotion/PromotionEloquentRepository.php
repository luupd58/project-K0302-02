<?php
namespace App\Repositories\Promotion;

use App\Repositories\EloquentRepository;

class PromotionEloquentRepository extends EloquentRepository implements PromotionRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Promotion::class;
    }

    /**
     * [showType lấy ra product_type dựa vào liên kết belongsTo]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showProduct($id)
    {
    	$result = $this->_model->findorfail($id)->product()->get();
    	return $result;
    }

    /**
     * [showType lấy ra product_type dựa vào liên kết belongsTo]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showAllProduct()
    {
    	$product = \App\Product::all();
        return $product;
    }

    /**
     * [showType lấy ra product_type dựa vào liên kết belongsTo]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showProductType($id)
    {
    	$result = $this->_model->findorfail($id)->product_type()->get();
    	return $result;
    }

    /**
     * [showType lấy ra product_type dựa vào liên kết belongsTo]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showAllProductType()
    {
    	$product = \App\Product_type::all();
        return $product;
    }
}