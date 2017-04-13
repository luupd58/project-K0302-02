<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SearchTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group search
     * @return void
     */
    public function testExample()
    {
        /**
         * @group search
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.login'))
                    ->type('username', 'admin1')
                    ->type('password', '123456')
                    ->press('login')
                    ->assertPathIs('/admin/index');
        });

        /**
         * @group search
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.product.list'))
                    ->type('search-product', 'abcd')
                    ->press('submit-product-search')
                    ->assertPathIs('/admin/product/search');
        });

        /**
         * @group search
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.product.list'))
                    ->type('search-product', 'nhân dâu')
                    ->press('submit-product-search')
                    ->assertPathIs('/admin/product/search');
        });

        /**
         * @group search
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.product.list'))
                    ->type('search-product', 'valentine')
                    ->press('submit-product-search')
                    ->assertPathIs('/admin/product/search');
        });
    }
}
