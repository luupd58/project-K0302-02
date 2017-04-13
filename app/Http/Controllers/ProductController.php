<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
// use Laravel\Scout\Searchable ;
// use Symfony\Component\HttpFoundation\Request;
// use Illuminate\Support\Facades\Validator;
use Image;
use Validator;
use Storage;
// use Illuminate\Pagination;
// use App\Repositories\Product\ProductEloquentRepository;

class ProductController extends Controller
{
    // use Searchable;
    // use Storage;
    /**
     * @var _modelInterface|\App\Repositories\RepositoryInterface
     */
    protected $_model;


    public function __construct(ProductRepositoryInterface $_model)
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
        $product = $this->_model->paginate(4);
        // dd($product);
        foreach ($product as $key => $value) {
            // Lấy ra array product_type dựa vào belongsTo
            $name = $this->_model->showType($value['id']);
            // Chỉ lấy ra tên của array vừa lấy
            foreach ($name as $k => $v) {
                $product_type_name = $v->product_type_name;
            }
            //Thêm trường vào array $product cần hiển thị cả product_type
            $value['product_type_name'] = $product_type_name;
        }
        return view('admin.views.superadmin.product.list_product', 
            compact('product'));
    }

    /**
     * Show form
     * 
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $product = new \App\Product();
        $product_type = $this->_model->showAllType();

        return view('admin.views.superadmin.product.add_product', 
            compact('product_type', 'product'));
    }

    /**
     * Show single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->_model->find($id);
        
        return view('home.post', compact('post'));
    }

    /**
     * Search for field
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search-product');
        $field = "product_name";
        $product = $this->_model->search($field, $search)->paginate(4);
        foreach ($product as $key => $value) {
            // Lấy ra array product_type dựa vào belongsTo
            $name = $this->_model->showType($value['id']);
            // Chỉ lấy ra tên của array vừa lấy
            foreach ($name as $k => $v) {
                $product_type_name = $v->product_type_name;
            }
            //Thêm trường vào array $product cần hiển thị cả product_type
            $value['product_type_name'] = $product_type_name;
        }
        $flagsearch = 1;
        return view('admin.views.superadmin.product.list_product', 
            compact('product', 'flagsearch'));
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
            $data = \App\Product::findorfail($request->input('id'));
            $flag = 0;
            $dataName = $data->product_name;
        }else{
            $data = new \App\Product();
            $flag = 1;
        }  
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqueString($request->input('type')) . 
                "." . $file->extension();
            // $path = $file->storeAs('customer/images/products', $fileName);
            $path = 'customer/images/products/'.$fileName;
            $data->image = $path;
        }
        $resource = $request->only(['product_name','quantity', 'price',
            'type','description']);
        $data->forceFill($resource);
        $data->product_type_id = $request->input('type');
        $data = $data->toArray();
        if($flag == 1){
            $errors= Validator::make($request->all(),[
                'product_name' =>'required|between:3,191|unique:products',
                'price' =>"required|integer|min:1000",
                'image' =>'required|image|max:2048',
                'quantity'=>'required|integer',
                ],
                
                [   
                'between' => 'Độ dài phải nằm giữa :min và :max',
                'unique'=>':attribute không được trùng nhau',
                'required'=>':attribute không được để trống',
                'min'=>':attribute không được nhỏ hơn :min',
                'max'=>':attribute không được lớn hơn :max',
                'image'=>':attribute phải đúng định dạng',
                'integer'=>':attribute phải là dạng số',          
                ],
                
                [
                'product_name'=>'Tên sản phẩm',
                'price'=>'Giá sản phẩm',
                'image'=>'Hình ảnh',
                'quantity'=>'Số lượng',
                ]                       
            );
        } else {
            if($data['product_name'] == $dataName){
                $errors= Validator::make($request->all(),[
                    'product_name' =>'required|between:3,191',
                    'price' =>"required|integer|min:1000",
                    'image' =>'image|max:2048',
                    'quantity'=>'required|integer',
                    ],
                    
                    [   
                    'between' => 'Độ dài phải nằm giữa :min và :max',
                    'required'=>':attribute không được để trống',
                    'min'=>':attribute không được nhỏ hơn :min',
                    'max'=>':attribute không được lớn hơn :max',
                    'image'=>':attribute phải đúng định dạng',
                    'integer'=>':attribute phải là dạng số',          
                    ],
                    
                    [
                    'product_name'=>'Tên sản phẩm',
                    'price'=>'Giá sản phẩm',
                    'image'=>'Hình ảnh',
                    'quantity'=>'Số lượng',
                    ]                       
                );
            } else{
                $errors= Validator::make($request->all(),[
                    'product_name' =>'required|between:3,191|unique:products',
                    'price' =>"required|integer|min:1000",
                    'image' =>'image|max:2048',
                    'quantity'=>'required|integer',
                    ],
                    
                    [   
                    'between' => 'Độ dài phải nằm giữa :min và :max',
                    'unique'=>':attribute không được trùng nhau',
                    'required'=>':attribute không được để trống',
                    'min'=>':attribute không được nhỏ hơn :min',
                    'max'=>':attribute không được lớn hơn :max',
                    'image'=>':attribute phải đúng định dạng',
                    'integer'=>':attribute phải là dạng số',          
                    ],
                    
                    [
                    'product_name'=>'Tên sản phẩm',
                    'price'=>'Giá sản phẩm',
                    'image'=>'Hình ảnh',
                    'quantity'=>'Số lượng',
                    ]                       
                );

            }
        }

        if($flag == 1){
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');

                return redirect()->back()->withErrors($errors);
            } else {
                $this->_model->create($data);
                $path = $file->storeAs('customer/images/products', $fileName);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.product.list"));
            }
        } else {
            if($errors->fails()){
                $request->session()->flash('alert-danger', 'Lỗi!');

                return redirect(route("admin.product.update", 
                    ['id' => $request->id]))->withErrors($errors);
            } else {
                $this->_model->update($data['id'], $data);
                $path = $file->storeAs('customer/images/products', $fileName);
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.product.list"));
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

        $product = $this->_model->find($id);
        $product_type = $this->_model->showAllType();
        // dd($product);
        return view('admin.views.superadmin.product.add_product', 
            compact('product_type', 'product'));
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = $this->_model->find($id);
        $name_image = $product->toArray();
        $name_image = $name_image['image'];
        $name_image = explode('/', $name_image);
        $name_image = array_pop($name_image);
        Storage::delete('customer/images/products/' . $name_image);
        try{
            if($post = $this->_model->delete($id)){;
                $request->session()->flash('alert-success', 'Thành công!');

                return redirect(route("admin.product.list"));
            }

            return "error!";
        }catch (\Exception $error){
            $request->session()->flash('alert-danger', 'Lỗi! Sản phẩm có 
                khuyến mại, Xóa danh mục khuyến mại trước');

            return redirect()->back();
        }
    }

}
