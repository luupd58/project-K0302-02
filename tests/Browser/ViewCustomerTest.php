<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewCustomerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group viewTest
     * @return void
     */
    public function testIndexShow()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/index');
//                    ->assertSee('Laravel');
        });
    }

    /**
     * @group viewTest
     */
    public function testSignupShow()
    {
        $this->browse(function ($browser) {
            $browser->visit('/signup');
//                ->assertSee('Sứ mệnh');
        });
    }

    /**
     * @group viewTest
     */
    public function testLoginShow()
    {
        $this->browse(function ($browser) {
            $browser->visit('/loginCustomer');
//                ->assertSee('Shop');
        });
    }

    /**
     * @group viewTest
     */
    public function testSearchShow()
    {
        $this->browse(function ($browser) {
            $browser->visit('/search-a?key=a');

        });
    }

    /**
     * @group viewTest
     */
    public function testProductShow()
    {
        $this->browse(function ($browser) {
            $browser->visit('/product/1');
        });
    }

    /**
     * @group viewTest
     */
    public function testProductTypeShow()
    {
        $this->browse(function ($browser) {
            $browser->visit('/product-type');
        });
    }

    /**
     * @group viewTest
     */
    public function testPromotionShow()
    {
        $this->browse(function ($browser) {
            $browser->visit('/product-type/promotion');
        });
    }

    /**
     * @group viewTest
     */
    public function testHotShow()
    {
        $this->browse(function ($browser) {
            $browser->visit('/product-type/hot');
        });
    }

    /**
     * @group viewTest
     */
    public function testProductTypeDetailShow()
    {
        $this->browse(function ($browser) {
            $browser->visit('/product-type-detail/11');
        });
    }

    /**
     * @group viewTest
     */
    public function testCheckoutShow()
    {
        $this->browse(function ($browser) {
            $browser->visit('/checkout');
        });
    }

    /**
     * @group viewTest
     */
    public function testCheckout2Show()
    {
        $this->browse(function ($browser) {
            $browser->visit('/checkout2');
        });
    }

}
