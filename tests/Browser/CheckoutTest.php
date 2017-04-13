<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CheckoutTest extends DuskTestCase
{

    /**
     * A Dusk test example.
     * @group checkout
     * @return void
     */
    public function testCheckoutTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->type('name','')
                ->radio('input-radio', '')
                ->type('email','')
                ->type('phone','')
                ->type('address','')
                ->radio('radio','')
                ->click('beta-btn');
        });
    }
    /**
     * A Dusk test example.
     * @group checkout
     *
     */
    public function testCheckoutTest1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->type('name','')
                ->radio('input-radio', 'nam')
                ->type('email','nguyenhoang212313244@gmail.com')
                ->type('phone','097896578996')
                ->type('address','ha dong, ha')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }
    /**
     * A Dusk test example.
     * @group checkout
     *
     */
    public function testCheckoutTest2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->type('name','nguyenvanhoang')
                ->radio('input-radio', 'nam')
                ->type('email','')
                ->type('phone','097896578996')
                ->type('address','ha dong, ha')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }

    /**
     * A Dusk test example.
     * @group checkout
     *
     */
    public function testCheckoutTest3()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->type('name','nguyenvanhoang')
                ->radio('input-radio', 'nam')
                ->type('email','nguyenhoang212313244@gmail.com')
                ->type('phone','')
                ->type('address','ha dong, ha')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }

    /**
     * A Dusk test example.
     * @group checkout
     *
     */
    public function testCheckoutTest4()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->type('name','nguyenvanhoang')
                ->radio('input-radio', 'nam')
                ->type('email','nguyenhoang212313244@gmail.com')
                ->type('phone','097896578996')
                ->type('address','')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }

    /**
     * A Dusk test example.
     * @group checkout
     *
     */
    public function testCheckoutTest5()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->type('name','')
                ->radio('input-radio', 'nam')
                ->type('email','')
                ->type('phone','')
                ->type('address','')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }

    /**
     * A Dusk test example.
     * @group checkout
     *
     */
    public function testCheckoutTest6()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('beta-btn ')
                ->type('name','nguyenvanhoang')
                ->radio('input-radio', 'nam')
                ->type('email','nguyenhoang212313244@gmail.com')
                ->type('phone','097896578996')
                ->type('address','ha dong, ha')
                ->radio('radio','Thanh toán khi nhận hàng')
                ->click('beta-btn');
        });
    }

}
