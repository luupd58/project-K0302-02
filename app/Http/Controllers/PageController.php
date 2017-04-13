<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Customer;
use App\Http\Requests\CheckoutPostRequest;
use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\SignupPostRequest;
use App\Order;
use App\Product;
use App\Product_type;
use App\Promotion;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use Auth;
use Illuminate\Support\Facades\View;
//use Illuminate\View\View;

class PageController extends Controller
{
    // hàm xử lý lấy dữ liệu trang indexl

    function __construct()
    {

    }
    public function getIndex(){
            $customer = Session::get('customer');

        $slide = Slide::all();

        $new_product = DB::table('products')
            ->orderBy('updated_at')
            ->take(4)
            ->get();

        $product_promotion = Promotion::where('product_id','<>',0)
            ->take(4)
            ->get();
        $product_hot_sale = Product::where('total_buy','<>',0)
            ->orderBy('total_buy','desc')
            ->take(4)
            ->get();

        return view('client.views.index',compact('customer','new_product',
            'product_promotion','slide','product_hot_sale'));
    }

    // hàm xử lý lấy dữ liệu của toàn bộ sản phẩm và lọc
    public function getProductType(){
            $customer = Session::get('customer');

        $product = new Product();
        $product = $product->paginate(12);
        $count_product = DB::table('products')->count();
        return view('client.views.product_type',compact('customer','product',
            'count_product'));
    }
    // hàm xử lý lấy dữ liệu sản phẩm hot nhất
    public function getProductTypeHot(){
            $customer = Session::get('customer');
        $products = new Product();

        $product_hot = $products->where('total_buy','<>',0)
            ->orderBy('total_buy','desc')
            ->take(20)
            ->paginate(8);

        $count_product =$products->where('total_buy','<>',0)
            ->count();

        $count_product = ($count_product > 20) ? 20:$count_product;

        return view('client.views.product_type',compact('customer',
            'product_hot','count_product'));
    }
    // hàm xử lý lấy dữ liệu sản phẩm khuyến mãi
    public function getProductTypePromotion(){
            $customer = Session::get('customer');

        $product_promotion = Promotion::where('product_id','<>',0)
            ->take(20)
            ->paginate(8);

        $count_product =Promotion::where('product_id','<>',0)
            ->count();

        $count_product = ($count_product > 20) ? 20:$count_product;

        return view('client.views.product_type',compact('customer',
            'product_promotion','count_product'));
    }

    // hàm xử lý lấy dữ liệu trang sản phẩm theo loại
    public function getProductTypeDetail($type){
            $customer = Session::get('customer');
        $product = new Product();
        $product = $product->paginate(12);
        $sp_theoloai = Product::where('product_type_id','=',$type)->paginate(12);
        $sp_khac = Product::where('product_type_id','<>',$type)->paginate(3);
        $loai = Product_type::all();
        $product_type = Product_type::where('id',$type)->take(10)->get();
        return view('client.views.product-type-detail', compact('customer',
            'product','count_product','sp_theoloai','sp_khac','loai',
            'product_type'));

    }
    // hàm xử lý lấy dữ liệu trang product ( trang chi tiết sản phẩm)
    public  function getProductDetail(Request $request){
        $customer = Session::get('customer');

        $product = Product::where('id',$request->id)->first();

        $product_same_type = Product::where('product_type_id',
            $product->product_type_id)
            ->where('id','<>',$product->id)
            ->inRandomOrder()
            ->take(2)
            ->get();

        $product_hot_sale = Product::where('total_buy','<>',0)
            ->orderBy('total_buy','desc')
            ->take(4)
            ->get();

        return view('client.views.product', compact('customer','product',
            'product_same_type','product_hot_sale','customer'));

    }

    public function getLogin(){
        return view('client.views.login');
    }

    public function postLogin(LoginPostRequest $request){
        $slide = Slide::all();

        $new_product = DB::table('products')
            ->orderBy('updated_at')
            ->take(4)
            ->get();

        $product_promotion = Promotion::where('product_id','<>',0)
            ->take(4)
            ->get();
        $product_hot_sale = Product::where('total_buy','<>',0)
            ->orderBy('total_buy','desc')
            ->take(4)
            ->get();

        $customer = Customer::where([
            ['email','=',$request->email],
            ['password','=',md5($request->password)]
        ])->first();
        session(['customer' => $customer]);
        if(isset($customer)) {
            $flag = 1;
            return view('client.views.index', ['flag'=>$flag,'customer'=> 
                $customer, 'product_hot_sale' => $product_hot_sale, 'slide' => 
                $slide, 'new_product' => $new_product, 'product_promotion' => 
                $product_promotion]);
        }else{
            $flag = 0;
                return view('client.views.login',['flag'=>$flag]);
        }
    }

    public function getSignup(){
        return view('client.views.signup');
    }

    public function postSignup(SignupPostRequest $request){

        $customer = new Customer();
        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->customer_name = $request->fullname;

        $customer->address = $request->address;
        $customer->phonenumber = $request ->phone;
        $customer->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function getAddToCart(Request $request,$id)
    {
        $product = Product::find($id);

        $oldCart = Session('cart') ? Session::get('cart') : null;
        if(Session::has('Product'.$id) == null){
            session(['Product'.$id => ($product ->quantity - 1)]);
        } else {
            $valueS = Session::get('Product'.$id) - 1;
            if($valueS >= 0){
                session(['Product'.$id => $valueS]);
            }
        }
        $cart = new Cart($oldCart);
        if($cart->items != null){
            foreach ($cart as $key => $value){
                if($key = 'item'){
                    foreach ($value as  $k => $v){
                        $productQuantity = $v['qty'];
                    }
                }
                break;
            }
        }else{
            $productQuantity = 0;
        }
        if ($productQuantity < $product->quantity){

            $cart->add($product, $id);
            $request->session()->put('cart', $cart);
            return redirect()->back();
        } else {
            return redirect()->back()->with('hethang','sản phẩm hết hàng');
        }

    }

    public function getAddToCartCount(Request $request)
    {
        $id = $request->id;
        $price = $request->price;
        $quant = $request->input('color');
        $product = Product::find($id);
        $totalQuantity = $product->quantity;

        if (Session::has('Product' . $id) !=  null) {
            session(['Product' . $id => ($totalQuantity - $quant)]);
        } else {
            $quantitySession = Session::get('Product' . $id);
            $resultOrderQuantity = $totalQuantity - $quant - $quantitySession;
            session(['Product' . $id => $resultOrderQuantity]);
        }

        $oldCart = Session('cart') ? Session::get('cart') : null;
        if ($quant != 0) {

            $cart = new Cart($oldCart);
            $cart->addItem($product, $quant);
            $request->session()->put('cart', $cart);
        }
            return redirect()->back();
    }

    public function getDelAllItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        $customer = Session::get('customer');
        $cart = Session::get('cart');
        return view('client.views.checkout',['cart'=>$cart,
            'customer'=>$customer]);
    }

    public function postCheckout(Request $request){
        $slide = Slide::all();

        $new_product = DB::table('products')
            ->orderBy('updated_at')
            ->take(4)
            ->get();

        $product_promotion = Promotion::where('product_id','<>',0)
            ->take(4)
            ->get();
        $product_hot_sale = Product::where('total_buy','<>',0)
            ->orderBy('total_buy','desc')
            ->take(4)
            ->get();

        if(!Session::has('cart')){
            $thongbao ='chưa có giỏ hàng';
            return view('client.views.checkout',['thongbao'=>$thongbao]);
        }
        $cart = Session::get('cart');

        $orderDetail = array();

        $productIdQty = array();
        foreach ((array)$cart as $key =>$value){
            if($key = 'item'){

                foreach($value as $k =>$pr){
                    $productSessionAll = array();
                    $oneOrder = array();
                    array_push($productSessionAll,$pr['item']->id,
                        $pr['qty']);
                    array_push($productIdQty,$productSessionAll);
                    unset($productSessionAll);
                    array_push($oneOrder, $pr['qty'], $pr['price'], 
                        $pr['item']->id);
                    $some = json_encode($oneOrder);
                    array_push($orderDetail,$some);
                }
            }
            break;
        }
        $orderSimple = json_encode($orderDetail);


        $order = new Order();
        $order-> name_customer = $request ->name;
        $order-> phonenumber = $request->phone;
        $order->address = $request ->address;
        $order->total_cost = $cart->totalPrice;
        $order->status = 0;
        $order -> order_detail = $orderSimple;


        if($request ->payment_method == 0){
            $order ->is_card = 0;
        }elseif($request ->payment_method == 1){
            $order ->is_card = 1;
            $order ->card = $request ->card;
        }

        $order->save();

        foreach ($productIdQty as $pr){
            $idA = $pr[0];
            $qtyA = $pr[1];
            $qtyB = Product::find($idA);
            $qtyResult = $qtyB ->quantity - $qtyA;
            Product::where('id',$idA)
                ->update(['quantity'=>$qtyResult]);
        }
        Session::flush();

        echo '<script>alert("Bạn đã đặt hàng thành công")</script>';
        return view('client.views.index',['slide'=>$slide,'new_product'=>
            $new_product,
            'product_promotion'=>$product_promotion,'product_hot_sale'=>
            $product_hot_sale]);
    }
    public function getCheckoutCustomer(){
        $customer = Session::get('customer');
        $cart = Session::get('cart');
        return view('client.views.checkout2',['cart'=>$cart,
            'customer'=>$customer]);
    }

    public function postCheckoutCustomer(Request $request){
        $slide = Slide::all();

        $new_product = DB::table('products')
            ->orderBy('updated_at')
            ->take(4)
            ->get();

        $product_promotion = Promotion::where('product_id','<>',0)
            ->take(4)
            ->get();
        $product_hot_sale = Product::where('total_buy','<>',0)
            ->orderBy('total_buy','desc')
            ->take(4)
            ->get();
        if(!Session::has('cart')){
            $thongbao ='chưa có giỏ hàng';
            return view('client.views.checkout',['thongbao'=>$thongbao]);
        }
        $cart = Session::get('cart');
        $customer =  Session::get('customer');
        $orderDetail = array();

        $productIdQty = array();
        foreach ((array)$cart as $key =>$value){
            if($key = 'item'){
                foreach($value as $k =>$pr){
                    $productSessionAll = array();
                    $oneOrder = array();
                    array_push($productSessionAll,$pr['item']->id,$pr['qty']);
                    array_push($productIdQty,$productSessionAll);
                    unset($productSessionAll);
                    array_push($oneOrder, $pr['qty'], $pr['price'], 
                        $pr['item']->id);
                    $some = json_encode($oneOrder);
                    array_push($orderDetail,$some);
                }
            }
            break;
        }
        $orderSimple = json_encode($orderDetail);

        $order = new Order();
        $order-> name_customer = $customer ->customer_name;
        $order-> phonenumber = $customer->phone;
        $order->address = $customer ->address;
        $order->total_cost = $cart->totalPrice;
        $order->status = 0;
        $order -> order_detail = $orderSimple;

        if($request ->payment_method == 0){
            $order ->is_card = 0;
        }elseif($request ->payment_method == 1){
            $order ->is_card = 1;
            $order ->card = $request ->card;
        }

        $order->save();

        foreach ($productIdQty as $pr){
            $idA = $pr[0];
            $qtyA = $pr[1];
            $qtyB = Product::find($idA);
            $qtyResult = $qtyB ->quantity - $qtyA;
            Product::where('id',$idA)
                ->update(['quantity'=>$qtyResult]);
        }
        Session::forget('cart');
        $thongbao = 'đặt hàng thành công';
        echo '<script>alert("Bạn đã đặt hàng thành công")</script>';
        return view('client.views.index',['thongbao'=>$thongbao,
            'customer'=>$customer,
            'slide'=>$slide,'new_product'=>$new_product,
            'product_promotion'=>$product_promotion,
            'product_hot_sale'=>$product_hot_sale]);
    }

    public function getLogout(){

        if(Session::has('customer')){
            Session::flush();
        }

        return redirect()->route('index');
    }

    public function  getSearch(Request $request){
        $product = Product::where('product_name','like',$request->key.'%')
            ->orWhere('price',$request->key)
            ->paginate(4);

        if($product){
            return view('client.views.search',compact('product'));
        }else{
            return view('client.views.search-fail',compact('product'));
        }
    }
}
