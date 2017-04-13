<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;
use App\Cart;
use App\Product_type;
use Session;
use App\Customer;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        view()->composer(['client.layout.header','client.views.product-type','client.views.product-type-detail'],function($view){
            $product_type = Product_type::all();

            return $view -> with('product_type',$product_type);

        });
        view()->composer(['client.layout.header'],function ($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>
                    $cart->items,'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty]);
            }

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
        $this->app->singleton(        
        \App\Repositories\ProductType\ProductTypeRepositoryInterface::class,
        \App\Repositories\ProductType\ProductTypeEloquentRepository::class
        );
        $this->app->singleton(        
        \App\Repositories\Product\ProductRepositoryInterface::class,
        \App\Repositories\Product\ProductEloquentRepository::class
        );
        $this->app->singleton(      
        \App\Repositories\User\UserRepositoryInterface::class,
        \App\Repositories\User\UserEloquentRepository::class
        );
        $this->app->singleton(
        \App\Repositories\Customer\CustomerRepositoryInterface::class,
        \App\Repositories\Customer\CustomerEloquentRepository::class
        );
        $this->app->singleton(
        \App\Repositories\Order\OrderRepositoryInterface::class,
        \App\Repositories\Order\OrderEloquentRepository::class
        );
        $this->app->singleton(
        \App\Repositories\Address\AddressRepositoryInterface::class,
        \App\Repositories\Address\AddressEloquentRepository::class
        );
        $this->app->singleton(
        \App\Repositories\Promotion\PromotionRepositoryInterface::class,
        \App\Repositories\Promotion\PromotionEloquentRepository::class
        );
        $this->app->singleton(
        \App\Repositories\Slide\SlideRepositoryInterface::class,
        \App\Repositories\Slide\SlideEloquentRepository::class
        );
    }
}
