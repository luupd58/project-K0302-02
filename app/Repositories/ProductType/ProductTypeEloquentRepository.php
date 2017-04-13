<?php
namespace App\Repositories\ProductType;

use App\Repositories\EloquentRepository;

class ProductTypeEloquentRepository extends EloquentRepository implements ProductTypeRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Product_type::class;
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
}