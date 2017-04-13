<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductTypeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     *
     */
    public function testProductTypeTest(){
        $this->browse(function (Browser $browser){
            $browser->visit(route('index'))
                ->click('.dropdown-togglte')
                ->click('.all-product')
                ->click('.hot-product')
                ->click('.promotion-product');
        });
    }
}
