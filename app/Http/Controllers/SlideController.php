<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Slide\SlideRepositoryInterface;
use Illuminate\Support\Facades\DB;
// use Laravel\Scout\Searchable ;
// use Symfony\Component\HttpFoundation\Request;
// use Illuminate\Support\Facades\Validator;
use Validator;
use Storage;

class SlideController extends Controller
{
     /**
     * @var _modelInterface|\App\Repositories\RepositoryInterface
     */
    protected $_model;


    public function __construct(SlideRepositoryInterface $_model)
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
        $slide = $this->_model->paginate(4);
        // dd($slide);
        return view('admin.views.superadmin.slide.list_slide', compact('slide'));
    }

    /**
     * Show form
     * 
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $slide = new \App\Slide();
        return view('admin.views.superadmin.slide.add_slide', compact('slide'));
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
            $data = \App\Slide::findorfail($request->input('id'));
            $flag = 0;
        }else{
            $data = new \App\Slide();
            $flag = 1;
        }  
        if ($request->hasFile('image_slider')) {
            $file = $request->file('image_slider');
            $fileName = uniqueString($request->input('name_slider')) . 
                "." . $file->extension();
            $path = $file->storeAs('customer/images/slider', $fileName);
            $data->image_slider = $path;
        }
        $data->name_slider = $request->input('name_slider');
        $data = $data->toArray();
        $errors= Validator::make($data,[
            'name_slider' =>'required|min:3|max:191',
            'image_slider' =>'required|max:4096',
            ],
            
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute không được nhỏ hơn :min',
                'max'=>':attribute không được lớn hơn :max',
                'image'=>':attribute phải đúng định dạng',          
            ],
            
            [
            'name_slider'=>'Tên Slider',
            'image_slider'=>'Hình ảnh',
            ]                       
        );
        if($flag == 1){
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');

                return redirect()->back()->withErrors($errors);
            } else {
                $post = $this->_model->create($data);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.slide.list"));
            }
        } else {
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');

                return redirect(route("admin.slide.update", ['id' => 
                    $request->id]))->withErrors($errors);
            } else {
                $post = $this->_model->update($data['id'], $data);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.slide.list"));
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

        $slide = $this->_model->find($id);
        return view('admin.views.superadmin.slide.add_slide', compact('slide'));
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $slide = $this->_model->find($id);
        $name_image = $slide->toArray();
        $name_image = $name_image['image_slider'];
        $name_image = explode('/', $name_image);
        $name_image = array_pop($name_image);
        Storage::delete('customer/images/slider/' . $name_image);
        try{
            if($post = $this->_model->delete($id)){
                $request->session()->flash('alert-success', 'Thành công!');
                return redirect(route("admin.slide.list"));
            }

            return "error!";

        }catch (\Exception $error){
            $request->session()->flash('alert-danger', 'Lỗi!');
            return redirect()->back();
        }
    }

    /**
     * Update single post by ajax
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function updateSlide(Request $request)
    {
        $data = $request->only('name_slider');
        $orderId = $request->id;
        if ($this->_model->update($orderId, $data)) {
            return response()->json(['status' => 200]);
        }
    }
}
