<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Checkout2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group checkout2
     * @return void
     */
    public function testCheckoutTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.login')
                ->type('email','admin@gmail.com')
                ->type('password','123456')
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->radio('radio','')
                ->click('beta-btn');
        });
    }
    /**
     * A Dusk test example.
     * @group checkout2
     *
     */
    public function testCheckoutTest1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.login')
                ->type('email','admin@gmail.com')
                ->type('password','123456')
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->type('address','ha dong, ha')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }
    /**
     * A Dusk test example.
     * @group checkout2
     *
     */
    public function testCheckoutTest2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.login')
                ->type('email','admin@gmail.com')
                ->type('password','123456')
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }

    /**
     * A Dusk test example.
     * @group checkout2
     *
     */
    public function testCheckoutTest3()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.login')
                ->type('email','admin@gmail.com')
                ->type('password','123456')
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }

    /**
     * A Dusk test example.
     * @group checkout2
     *
     */
    public function testCheckoutTest4()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.login')
                ->type('email','admin@gmail.com')
                ->type('password','123456')
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }

    /**
     * A Dusk test example.
     * @group checkout2
     *
     */
    public function testCheckoutTest5()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.login')
                ->type('email','admin@gmail.com')
                ->type('password','123456')
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }

    /**
     * A Dusk test example.
     * @group checkout2
     *
     */
    public function testCheckoutTest6()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.login')
                ->type('email','admin@gmail.com')
                ->type('password','123456')
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }
}
