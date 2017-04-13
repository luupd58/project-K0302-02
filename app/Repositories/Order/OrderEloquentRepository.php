<?php
namespace App\Repositories\Order;

use App\Repositories\EloquentRepository;

class OrderEloquentRepository extends EloquentRepository implements 
    OrderRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Order::class;
    }

    /**
     * [Lấy ra dữ liệu thuộc tháng cho trước]
     * @return [type] [description]
     */
    public function month($mont)
    {
        $time = getdate();
        $year = $time['year'];
        $type = new \App\Order;
        $num = $type->whereMonth('date_buy', '=', $mont)
                    ->whereYear('date_buy', '=', $year)
                    ->where('status', '=', 1)
                    ->get();
        return $num;
    }

    /**
     * [Lấy ra dữ liệu thuộc ngày cho trước]
     * @return [type] [description]
     */
    public function day($day)
    {
        $time = getdate();
        $mon = $time['mon'];
        $year = $time['year'];
        $type = new \App\Order;
        $num = $type->whereDay('date_buy', '=', $day)
                    ->whereMonth('date_buy', '=', $mon)
                    ->whereYear('date_buy', '=', $year)
                    ->where('status', '=', 1)->get();
        return $num;
    }

    /**
     * [Lấy ra dữ liệu thuộc ngày cho trước]
     * @return [type] [description]
     */
    public function year($year)
    {
        $type = new \App\Order;
        $num = $type->whereYear('date_buy', '=', $year)
                    ->where('status', '=', 1)->get();
        return $num;
    }

    /**
     * [showType lấy ra product_type dựa vào liên kết belongsTo]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showCustomer($id)
    {
        // dd($this->_model);
        $result = $this->_model->findorfail($id)->customer()->get();
        return $result;
    }

}