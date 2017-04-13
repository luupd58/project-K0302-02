<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductType\ProductTypeRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductTypeController extends Controller
{
    /**
     * @var _modelInterface|\App\Repositories\RepositoryInterface
     */
    protected $_model;


    public function __construct(ProductTypeRepositoryInterface $_model)
    {
        $this->_model = $_model;
        // dd($this->_model);
    }
    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_type = $this->_model->paginate(4);
        return view('admin.views.superadmin.product_type.list_product_type', 
            compact('product_type'));
    }

     /**
     * Show form
     * 
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $product_type = new \App\Product_type();
        return view('admin.views.superadmin.product_type.add_product_type', 
            compact('product_type'));
    }

    /**
     * Search for field
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search-product_type');
        $field = "product_type_name";
        $product_type = $this->_model->search($field, $search)->paginate(4);
        $flagsearch = 1;
        return view('admin.views.superadmin.product_type.list_product_type', 
            compact('product_type', 'flagsearch'));
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
            $data = \App\Product_type::findorfail($request->input('id'));
            $flag = 0;
        }else{
            $data = new \App\Product_type();
            $flag = 1;
        }
        $data->fill($request->all());
        $data = $data->toArray();
        $errors= Validator::make($data,[
            'product_type_name' =>'required|min:3|max:191',
            ],
            
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute không được nhỏ hơn :min',
                'max'=>':attribute không được lớn hơn :max',         
            ],
            
            [
            'product_type_name'=>'Tên loại sản phẩm',
            ]                       
        );
        if($flag == 1){
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');

                return redirect()->back()->withErrors($errors);
            } else {
                $post = $this->_model->create($data);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.product_type.list"));
            }
        } else {
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');

                return redirect(route("admin.product_type.update", 
                    ['id' => $request->id]))->withErrors($errors);
            } else {
                $post = $this->_model->update($data['id'], $data);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.product_type.list"));
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

        $product_type = $this->_model->find($id);
        return view('admin.views.superadmin.product_type.add_product_type', 
            compact('product_type'));
    }

    /**
     * Update single post by Ajax
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function updateAjax(Request $request)
    {

        $data = $request->only('product_type_name');
        // $datas = $data->toArray();
        $errors = Validator::make($data,[
            'product_type_name' =>'required',
            ],
            
            [
                'required'=>':attribute không được để trống',         
            ],
            
            [
            'product_type_name'=>'Tên',
            ]                       
        );
        $PRTId = $request->id;
        if($errors->fails()){
            $errors = $errors->toJson();
            return response()->json(
                    ['errors' => $errors]
                    );
        } else {
            $this->_model->update($PRTId, $data);
            return response()->json(['status' => 200]);
        }        
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
                return redirect(route("admin.product_type.list"));
            }

            return "error!";

        }catch (\Exception $error){
            $request->session()->flash('alert-danger', 'Lỗi! Có nhiều sản phẩm 
                thuộc danh mục này hoặc có khuyến mại thuộc danh mục này');
            return redirect()->back();
        }
    }
}
