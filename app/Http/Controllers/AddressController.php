<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Address\AddressRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Validator;
use Storage;

class AddressController extends Controller
{
    /**
     * @var _modelInterface|\App\Repositories\RepositoryInterface
     */
    protected $_model;


    public function __construct(AddressRepositoryInterface $_model)
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
    	$address = $this->_model->find(1);
    	// dd($address);  
        return view('admin.views.superadmin.address.list_address', 
            compact('address'));
    }

    /**
     * Create single post
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$data = \App\Address::findorfail($request->input('id'));
        $data -> fill($request->all());
        $data = $data->toArray();
        $errors= Validator::make($data,[
            'address' =>'required|between:3,191',
            ],
            
            [
            'required'=>':attribute không được để trống',
            'between' => 'Độ dài phải nằm giữa :min và :max',       
            ],
            
            [
            'address'=>'Địa chỉ',
            ]                       
        );
        if($errors->fails()){
            $request->session()->flash('alert-danger', 'Lỗi!');

            return redirect(route("admin.address.update", 
                ['id' => $request->id]))->withErrors($errors);;
        } else {
            $post = $this->_model->update($data['id'], $data);
            $request->session()->flash('alert-success', 'Thành công!');

            return redirect(route("admin.address.list"));
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
        $address = $this->_model->find($id);
        return view('admin.views.superadmin.address.edit_address', 
            compact('address'));
    }

    /**
     * Update single post with ajax
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function updateAjax(Request $request)
    {

        $data = $request->only('address');
        // $datas = $data->toArray();
        $errors = Validator::make($data,[
            'address' =>'required',
            ],
            
            [
            'required'=>':attribute không được để trống',         
            ],
            
            [
            'address'=>'Địa chỉ',
            ]                       
        );
        $ADSId = $request->id;
        if ($this->_model->update($ADSId, $data)) {
            return response()->json(['status' => 200]);
        } else {
            
            return response()->json(
                ['message' => 'Địa chỉ không được để trống']
                );
        }
    }
}
