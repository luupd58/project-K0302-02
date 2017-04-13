<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Support\Facades\DB;
// use Laravel\Scout\Searchable ;
// use Symfony\Component\HttpFoundation\Request;
// use Illuminate\Support\Facades\Validator;
use Validator;
use Storage;

class CustomerController extends Controller
{
    /**
     * @var _modelInterface|\App\Repositories\RepositoryInterface
     */
    protected $_model;

    public function __construct(CustomerRepositoryInterface $_model)
    {
        $this->_model = $_model;
        // dd($this->_model);
    }

    /**
     * Show all customer
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = $this->_model->paginate(4);
        return view('admin.views.superadmin.customer.list_customer', 
            compact('customer'));
    }

    /**
     * Show form
     * 
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $customer = new \App\customer();
        return view('admin.views.superadmin.customer.add_customer', 
            compact('customer'));
    }

    /**
     * Search customer_name
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search-customer');
        $field = "customer_name";
        $customer = $this->_model->search($field, $search)->paginate(4);
        $flagsearch = 1;
        return view('admin.views.superadmin.customer.list_customer', 
            compact('customer', 'flagsearch'));
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
            $data = \App\Customer::findorfail($request->input('id'));
            $flag = 0;
        }else{
            $data = new \App\Customer();
            $flag = 1;
        }   
        $data->fill($request->all());
        $some =  bcrypt($data->password);
        $data = $data->toArray();
        $data['password'] = $some;
        $errors= Validator::make($request->all(),[
            'customer_name' =>'required|between:3,191',
            'username' =>'required|between:3,20|unique:customers',
            'password' =>'required|between:3,20',
            'address' =>'required|between:3,191',
            'phonenumber' =>'required|integer',
            'email'=>'required|unique:customers',
            ],
            
            [
            'between' => 'Độ dài phải nằm giữa :min và :max',
            'unique'=>':attribute không được trùng nhau',
            'required'=>':attribute không được để trống',
            'integer'=>':attribute phải là dạng số',
            ],
            
            [
            'customer_name'=>'Tên',
            'username'=>'Tài khoản',
            'password'=>'Mật khẩu',
            'address'=>'Địa chỉ',
            'phonenumber'=>'Số điện thoại',
            'email'=>'Địa chỉ email',
            ]                       
        );

        if($flag == 1){
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');
                return redirect()->back()->withErrors($errors);
            } else {
                $post = $this->_model->create($data);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.customer.list"));
            }
        } else {  
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');

                return redirect(route("admin.customer.update", 
                    ['id' => $request->id]))->withErrors($errors);
            } else {
                $post = $this->_model->update($data['id'], $data);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.customer.list"));
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

        $customer = $this->_model->find($id);
        return view('admin.views.superadmin.customer.add_customer', 
            compact('customer'));
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

                return redirect(route("admin.customer.list"));
            }

            return "error!";

        }catch (\Exception $error){
            $request->session()->flash('alert-danger', 
                'Lỗi! Khách hàng có đơn hàng');
            
            return redirect()->back();
        }
    }
}
