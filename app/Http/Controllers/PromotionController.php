<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Promotion\PromotionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Validator;

class PromotionController extends Controller
{
    /**
     * @var _modelInterface|\App\Repositories\RepositoryInterface
     */
    protected $_model;


    public function __construct(PromotionRepositoryInterface $_model)
    {
        $this->_model = $_model;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion = $this->_model->paginate(4);
        foreach ($promotion as $key => $value) {
            // Lấy ra array product_type dựa vào belongsTo
            $name = $this->_model->showProduct($value['id']);
            if($name->toArray() != null){
            // Chỉ lấy ra tên của array vừa lấy
	            foreach ($name as $k => $v) {
	                $product_name = $v->product_name;
	            }
	            //Thêm trường vào array $product cần hiển thị cả product_type
	            $value['product_name'] = $product_name;
	        } else {
	        	$value['product_name'] = '';
	        }
        }
        foreach ($promotion as $key => $value) {
            // Lấy ra array product_type dựa vào belongsTo
            $name = $this->_model->showProductType($value['id']);
            if($name->toArray() != null){
            // Chỉ lấy ra tên của array vừa lấy
	            foreach ($name as $k => $v) {
	                $product_type_name = $v->product_type_name;
	            }
	            //Thêm trường vào array $product cần hiển thị cả product_type
	            $value['product_type_name'] = $product_type_name;
	        } else {
	        	$value['product_type_name'] = '';
	        }
        }

        foreach ($promotion as $key => $value) {
            // Chuyển đổi định dạng ngày tháng
            $valuecheck = $value->toArray();
            $date_start = $valuecheck['date_start'];           
            $date_start = explode('-', $date_start);
        	$date_start = $date_start[1].'/'.$date_start[2].'/'.$date_start[0];
        	$value->date_start = $date_start;           
        }

        foreach ($promotion as $key => $value) {
            // Lấy ra array product_type dựa vào belongsTo
            $valuecheck = $value->toArray();
            $date_end = $valuecheck['date_end'];           
            $date_end = explode('-', $date_end);
        	$date_end = $date_end[1].'/'.$date_end[2].'/'.$date_end[0];
        	$value->date_end = $date_end;           
        }
        return view('admin.views.superadmin.promotion.list_promotion', 
            compact('promotion'));
    }

    /**
     * Show form
     * 
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $promotion = new \App\Promotion();
        $product_type = $this->_model->showAllProductType();
        $product = $this->_model->showAllProduct();
        return view('admin.views.superadmin.promotion.add_promotion', 
            compact('promotion', 'product_type', 'product'));
    }

    /**
     * Search for field
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search-promotion');
        $field = "promotion_name";
        $promotion = $this->_model->search($field, $search)->paginate(4);
        foreach ($promotion as $key => $value) {
            // Lấy ra array product_type dựa vào belongsTo
            $name = $this->_model->showProduct($value['id']);
            if($name->toArray() != null){
            // Chỉ lấy ra tên của array vừa lấy
                foreach ($name as $k => $v) {
                    $product_name = $v->product_name;
                }
                //Thêm trường vào array $product cần hiển thị cả product_type
                $value['product_name'] = $product_name;
            } else {
                $value['product_name'] = '';
            }
        }
        foreach ($promotion as $key => $value) {
            // Lấy ra array product_type dựa vào belongsTo
            $name = $this->_model->showProductType($value['id']);
            if($name->toArray() != null){
            // Chỉ lấy ra tên của array vừa lấy
                foreach ($name as $k => $v) {
                    $product_type_name = $v->product_type_name;
                }
                //Thêm trường vào array $product cần hiển thị cả product_type
                $value['product_type_name'] = $product_type_name;
            } else {
                $value['product_type_name'] = '';
            }
        }
        $flagsearch = 1;
        return view('admin.views.superadmin.promotion.list_promotion', 
            compact('promotion', 'flagsearch'));
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
            $data = \App\Promotion::findorfail($request->input('id'));
            $flag = 0;
        }else{
            $data = new \App\Promotion();
            $flag = 1;
        }
        if($request->date_start == null || $request->date_start == '' || 
            $request->date_end == null || $request->date_end == ''){
            $request->session()->flash('alert-danger', 'Lỗi! Khởi tạo ngày');
            return redirect()->back();
        }
        $date_start = $request->date_start;
        $date_start = explode('/', $date_start);
        $date_starts = $date_start[2].'/'.$date_start[0].'/'.$date_start[1];
        $data->date_start = $date_starts;
        $date_end = $request->date_end;
        $date_end = explode('/', $date_end);
        $date_ends = $date_end[2].'/'.$date_end[0].'/'.$date_end[1];
        $data->date_end = $date_ends;
        $resource = $request->only(['promotion_name','product_id',
            'product_type_id','percent']);
        $data->forceFill($resource);
        if($request->date_end < $request->date_start){
        	$request->session()->flash('alert-danger', 'Lỗi! Ngày bắt đầu phải 
                trước ngày kết thúc!');
            return redirect()->back();
        }
        if($data->product_id == null && $data->product_type_id == null){
        	$request->session()->flash('alert-danger', 'Lỗi! Phải có danh mục 
                sản phẩm hoặc loại sản phẩm');
            return redirect()->back();
        }
        $data = $data->toArray();
       
        $errors= Validator::make($request->all(),[
            'promotion_name' =>'required|min:3|max:191',
            'percent' =>'required|integer|max:100',
            'date_start' =>'required',
            'date_end'=>'required',
            ],
            
            [
            'required'=>':attribute không được để trống',
            'min'=>':attribute không được nhỏ hơn :min',
            'max'=>':attribute không được lớn hơn :max',
            'integer'=>':attribute phải là dạng số',
            ],
            
            [
            'promotion_name'=>'Tên khuyến mại',
            'percent'=>'Phần trăm khuyến mại',
            'date_start'=>'Ngày bắt đầu',
            'date_end'=>'Ngày kết thúc',
            ]                       
        );
        if($flag == 1){
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');
                return redirect()->back()->withErrors($errors);
            } else {
                $post = $this->_model->create($data);
                $request->session()->flash('alert-success', 'Thành công!');

                    return redirect(route("admin.promotion.list"));
            }
        } else {   
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');
                return redirect(route("admin.promotion.update", ['id' => 
                    $request->id]))->withErrors($errors);
            } else {
                $post = $this->_model->update($data['id'], $data);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.promotion.list"));
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

        $promotion = $this->_model->find($id);
        $product_type = $this->_model->showAllProductType();
        $product = $this->_model->showAllProduct();
        return view('admin.views.superadmin.promotion.add_promotion', compact('promotion', 'product_type', 'product'));
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try{
            if($post = $this->_model->delete($id)){
                $request->session()->flash('alert-success', 'Thành công!');
                
                return redirect(route("admin.promotion.list"));
            }

            return "error!";

        }catch (\Exception $error){
            $request->session()->flash('alert-danger', 'Lỗi!');

            return redirect()->back();
        }
    }
}
