<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddToCartCountTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group addToCart
     *
     */
    public function testAddToCastCustomer()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.beta-btn')
                ->click('.plusQuantity')
                ->click('.plusQuantity')
                ->click('cart-product')
                ->click('.beta-select')
                ->click('cart-item-delete');
        });
    }

    /**
     * A Dusk test example.
     * @group addToCart
     *
     */
    public function testAddToCastCustomer1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->click('.beta-btn')
                ->click('.subQuantity ')
                ->click('.subQuantity ')
                ->click('cart-product')
                ->click('.beta-select')
                ->click('cart-item-delete');
        });
    }

}
