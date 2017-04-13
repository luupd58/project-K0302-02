<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Laravel\Scout\Searchable ;
// use Symfony\Component\HttpFoundation\Request;
// use Illuminate\Support\Facades\Validator;
use Validator;
use Storage;

class UserController extends Controller
{
    /**
     * @var _modelInterface|\App\Repositories\RepositoryInterface
     */
    protected $_model;

    public function __construct(UserRepositoryInterface $_model)
    {
        $this->_model = $_model;
        // dd($this->_model);
    }

    /**
     * Show all user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->_model->paginate(4);
        return view('admin.views.superadmin.user.list_user', compact('user'));
    }

    /**
     * Show form
     * 
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $user = new \App\User();
        // dd($product);
        // dd($product_type);
        return view('admin.views.superadmin.user.add_user', compact('user'));
    }

    /**
     * Search for field
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search-user');
        $field = "user_name";
        $user = $this->_model->search($field, $search)->paginate(4);
        $flagsearch = 1;
        return view('admin.views.superadmin.user.list_user', 
            compact('user', 'flagsearch'));
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
            $data = \App\User::findorfail($request->input('id'));
            $flag = 0;
        }else{
            $data = new \App\User();
            $flag = 1;
        } 
        $resource = $request->only(['user_name','username','password', 
            'email','_token']);
        $data->forceFill($resource);
        // dd($data);
        $some =  bcrypt($data->password);
        $data = $data->toArray();
        $data['password'] = $some;
        $data['remember_token'] = $resource['_token'];
        // dd($data);
        $errors= Validator::make($request->all(),[
            'user_name' =>'required|min:3|max:191',
            'username' =>'required|min:3|max:30|unique:users',
            'password' =>'required|min:3|max:30',
            'email'=>'required|unique:users',
            ],
            
            [
                'unique'=>':attribute không được trùng nhau',
                'required'=>':attribute không được để trống',
                'min'=>':attribute không được nhỏ hơn :min',
                'max'=>':attribute không được lớn hơn :max',         
            ],
            
            [
            'user_name'=>'Tên',
            'username'=>'Tài khoản',
            'password'=>'Mật khẩu',
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
                
                return redirect(route("admin.user.list"));
            }
            
        } else {
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');
                return redirect(route("admin.user.update", ['id' => 
                    $request->id]))->withErrors($errors);
            } else {
                $post = $this->_model->update($data['id'], $data);
                $request->session()->flash('alert-success', 'Thành công!');
                return redirect(route("admin.user.list"));
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
        $user = $this->_model->find($id);
        return view('admin.views.superadmin.user.add_user', compact('user'));
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
                return redirect(route("admin.user.list"));
            }

            return "error!";

        }catch (\Exception $error){
            $request->session()->flash('alert-danger', 'Lỗi!');
            
            return redirect()->back();
        }
    }
}
