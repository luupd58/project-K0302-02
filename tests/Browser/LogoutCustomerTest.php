<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogoutCustomerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     * @return void
     */
    public function testLoginCustomer(){
        $this->browse(function (Browser $browser){
            $browser->visit(route('login'))
                ->type('email','admin@gmail.com')
                ->type('password','123456')
                ->press('Login');
        });
    }

    /**
     * A Dusk test example.
     * @group logout
     *
     */
    public function testLogoutCustomer1(){
        $this->browse(function (Browser $browser){
            $browser->visit(route('index'))
                ->click('.logout');
        });
    }
}
