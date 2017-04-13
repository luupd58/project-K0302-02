<?php

namespace App;
use App\Product;
use Illuminate\Http\Request;
use Session;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	// khởi tạo giỏ hàng
	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}
    // thêm 1
	public function add($item, $id){
		$storedItem = ['qty'=> 1, 'price' => $item->unit_price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
			}
		}
        $flag = 0;
        if($this->items){
            foreach ($this->items as $key => $value){
                if($value['item'] == $storedItem['item']){
                    $value['qty']++;
                    $flag = 1;
                    $this->items[$key]['qty'] = $value['qty'];
                }
            }
        }
        $storedItem['price'] = $item->price * $storedItem['qty'];

        if($flag != 1) {
            if($this->items == null){
                $this->items = [];
            }
            array_push($this->items, $storedItem);
            $this->totalQty++;
        }
        $this->totalPrice += $item->price;
	}
	// thêm nhiều
    public function addItem($item, $id){
        $storedItem = ['qty'=>$id, 'price' => $item->unit_price, 'item' => $item];
        $flag = 0;
        if($this->items){
            foreach ($this->items as $key => $value){
                if($value['item'] == $storedItem['item']){
                    $value['qty'] = $value['qty'] + $id;
                    $flag = 1;
                    $this->items[$key]['qty'] = $value['qty'];
                }
            }
        }
        $storedItem['price'] = $item->price * $storedItem['qty'];

        if($flag != 1) {
            if($this->items == null){
                $this->items = [];
            }
            array_push($this->items, $storedItem);
            $this->totalQty++;
        }
        $this->totalPrice += $item->price * $id;
    }

	//xóa 1
	public function reduceByOne($id){
        foreach ($this->items as $key => $value){
            if($value['item']->id == $id){
                $idCheck = $key;
                $quantiCheck = $value['qty'];
                $totalCheck = $value['price'];
            }
        }
//        dd(Session::get('Product'.$id));

            $valueSession = Session::get('Product'.$id) + 1;



        Session::put('Product'.$id, $valueSession);
//        parseInt(Session::get('Product'.$id)) = parseInt($valueSession);
//        dd(  Session::get('Product'.$id));
        $this->items[$idCheck]['qty'] --;
        $this->items[$idCheck]['price'] -= $this->items[$idCheck]['item']['price'];
		$this->totalPrice -= $this->items[$idCheck]['item']['price'];

		if($this->items[$idCheck]['qty']<=0){
			unset($this->items[$idCheck]);
            $this->totalQty --;
		}
	}
	//xóa nhiều
	public function removeItem($id){
	    foreach ($this->items as $key => $value){
            if($value['item']->id == $id){
                $idCheck = $key;
//                $quantiCheck = $value['qty'];
                $totalCheck = $value['price'];
            }
        }
        Session::forget('Product'.$id);
//        dd($quantiCheck);
//        foreach ($)
		$this->totalQty --;
		$this->totalPrice -= $totalCheck;
		unset($this->items[$idCheck]);
	}
}
