<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SearchCustomerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group search
     * @return void
     */
    public function testLoginCustomer1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->type('searchForm','a')
                ->assertVisible('.searchForm');
        });
    }
}
