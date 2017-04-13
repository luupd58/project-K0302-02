<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddToCastCustomerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group add-to-cart
     *
     */
    public function testAddToCastCustomer()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('cart-item-delete');
        });
    }

    /**
     * A Dusk test example.
     * @group add-to-cart
     *
     */
    public function testAddToCastCustomer1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.add-to-cart')
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('cart-item-delete');
        });
    }

    /**
     * A Dusk test example.
     * @group add-to-cart
     *
     */
    public function testAddToCastCustomer2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.add-to-cart')
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('cart-item-delete')
                ->click('.beta-select')
                ->click('cart-item-delete');
        });
    }

    /**
     * A Dusk test example.
     * @group add-to-cart
     *
     */
    public function testAddToCastCustomer3()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.add-to-cart')
                ->click('.add-to-cart')
                ->click('.add-to-cart')
                ->click('.beta-select')
                ->click('cart-item-delete-all');
        });
    }
}
