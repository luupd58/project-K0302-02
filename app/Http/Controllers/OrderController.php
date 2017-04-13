<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Validator;
use Storage;
use DateTime;
use App\Order;

class OrderController extends Controller
{
    /**
     * @var _modelInterface|\App\Repositories\RepositoryInterface
     */
    protected $_model;


    public function __construct(OrderRepositoryInterface $_model)
    {
        $this->_model = $_model;
        $this->changeName();    
    }



    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function sum(){
    	$time = getdate();
    	$mon = $time['mon'];
    	$day = $time['mday'];
    	$year = $time['year'];
    	$totalMonth = 0;
    	$totalDay = 0;
    	$totalYear = 0;
    	$total = 0;
    	$orderMonth = $this->_model->month($mon)->toArray();
    	foreach ($orderMonth as $key => $value) {
    		$totalMonth += $value['total_cost'];
    	}
    	$orderDay = $this->_model->day($day);
    	foreach ($orderDay as $key => $value) {
    		$totalDay += $value['total_cost'];
    	}
    	$orderYear = $this->_model->year($year);
    	foreach ($orderYear as $key => $value) {
    		$totalYear += $value['total_cost'];
    	}
    	$order = $this->_model->getAll()->where('status', '=', 1)->toArray();
    	foreach ($order as $key => $value) {
    		$total += $value['total_cost'];
    	}
    	return view('admin.views.superadmin.order.show_order', 
            compact('totalDay', 'totalMonth', 'totalYear', 'total')); 
    }

    /**
     * show all Order
     * @return view
     */
    public function index()
    {
        $order = $this->_model->paginate(4);
        return view('admin.views.superadmin.order.list_order', 
            compact('order'));
    }

    /**
     * Chuyển đổi tên khách hàng có tài khoản vào trong cột name_customer
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function changeName()
    {
        $order = $this->_model->getAll();
        foreach ($order as $key => $value) {
            if($value->name_customer == null || $value->name_customer == ''){
                $name = $this->_model->showCustomer($value->id)->toArray();
                foreach ($name as $k => $v) {
                    $value->name_customer = $v['customer_name'];
                    $value->address = $v['address'];
                    $value->phonenumber = $v['phonenumber'];

                }
                if($value->status == 1){
                    $value->date_transfer = date("Y-m-d H:i:s");
                } else if($value->status == 2){
                    $value->date_transfer = null;
                }
            }
        }
        $order = $order->toArray();
        $object = $this->_model->getAll();
        foreach ($object as $key => $value) {
            foreach ($order as $k => $v) {
                if($value->id == $v['id']){
                    $this->_model->update($value->id, $v);
                }
            }
        }
    }

    /**
     * Search for field
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search-order');
        // dd($search);
        $field = "name_customer";
        
        $order = $this->_model->search($field, $search)->paginate(4);
        $flagsearch = 1;
        return view('admin.views.superadmin.order.list_order', 
            compact('order', 'flagsearch'));
    }

     /**
     * Create single post
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('id') != '' || $request->input('id') != null){
            $data = \App\Order::findorfail($request->input('id'));
            $flag = 0;
        }else{
            $data = new \App\Order();
            $flag = 1;
        }
        $data->fill($request->all());
        if($data->status == 1){
            $date_transfer = date("Y-m-d H:i:s");
            $data->date_transfer = $date_transfer;
        }
        if($data->status == 2){
            $date_transfer = null;
            $data->date_transfer = $date_transfer;
        }
        $total_cost = number_format($request->total_cost);
        $data->total_cost = $total_cost;
        $data = $data->toArray();
        $errors= Validator::make($request->all(),[
                'total_cost' =>'required|integer',
                'date_buy' =>'required',
                'name_customer'=>'required|between:3, 191',
                'phonenumber' =>'required|integer',
                'address' =>'required',
            ],
            
            [
                'between' => 'Độ dài phải nằm giữa :min và :max',
                'required'=>':attribute không được để trống',
                'image'=>':attribute phải đúng định dạng',
                'integer'=>':attribute phải là dạng số',
            ],
            
            [
                'total_cost'=>'Tổng giá',
                'date_buy'=>'Ngày mua',
                'name_customer'=>'Tên người mua',
                'phonenumber'=>'Số điện thoại',
                'address'=>'Địa chỉ',
            ]                       
        );
        if($flag == 1){
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');

                return redirect()->back()->withErrors($errors);
            } else {
                $post = $this->_model->create($data);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.order.list"));
            }
        } else {
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');

                return redirect(route("admin.order.update", 
                    ['id' => $request->id]))->withErrors($errors);
            } else {
                $post = $this->_model->update($data['id'], $data);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.order.list"));
            }
        }
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $order = $this->_model->find($id);
        // dd($order);
        return view('admin.views.superadmin.order.edit_order', 
            compact('order'));
    }

    /**
     * [editStatus use Ajax]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function editStatus(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $order = Order::find($id);

            return view('admin.views.superadmin.order.edit_status', 
                compact('order'));
        }
    }

    /**
     * [updateStatus with Ajax]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateStatus(Request $request)
    {
        $data = $request->only('status');
        $orderId = $request->id;
        if ($this->_model->update($orderId, $data)) {
            return response()->json(['status' => 200]);
        }
    }
}
