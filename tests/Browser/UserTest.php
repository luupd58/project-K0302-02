<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group adminLogin
     * @return void
     */
    public function testExample()
    {
        /**
         * @group adminLogin
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.login'))
                    ->type('username', 'admin1')
                    ->type('password', '123456')
                    ->press('login')
                    ->assertPathIs('/admin/index');
        });

        /**
         * @group adminLogin
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                    ->click('.user')
                    ->click('.list-user')
                    ->assertPathIs('/admin/user');
        });

        /**
         * @group adminLogin
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                    ->click('.user')
                    ->click('.add-user')
                    ->type('user_name', '1')
                    ->press('add-user')
                    ->assertPathIs('/admin/user/add');
        });

        /**
         * @group adminLogin
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                    ->click('.user')
                    ->click('.add-user')
                    ->type('user_name', '1234')
                    ->press('add-user')
                    ->assertPathIs('/admin/user/add');
        });

        /**
         * @group adminLogin
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                    ->click('.user')
                    ->click('.add-user')
                    ->type('user_name', '1234')
                    ->type('username', '1')
                    ->press('add-user')
                    ->assertPathIs('/admin/user/add');
        });

        /**
         * @group adminLogin
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                    ->click('.user')
                    ->click('.add-user')
                    ->type('user_name', '1234')
                    ->type('username', '1234')
                    ->type('password', '1')
                    ->press('add-user')
                    ->assertPathIs('/admin/user/add');
        });

         /**
         * @group adminLogin
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                    ->click('.user')
                    ->click('.add-user')
                    ->type('user_name', '1234')
                    ->type('username', '1234')
                    ->type('password', '1234')
                    ->type('email', '1234')
                    ->press('add-user')
                    ->assertPathIs('/admin/user/add');
        });

         /**
         * @group adminLogin
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                    ->click('.user')
                    ->click('.add-user')
                    ->type('user_name', '1234')
                    ->type('username', '1234')
                    ->type('password', '1234')
                    ->type('email', '123445@example.com')
                    ->press('add-user')
                    ->assertPathIs('/admin/user/add');
        });
        
        // /**
        //  * @group adminLogin
        //  */
        // $this->browse(function (Browser $browser) {
        //     $browser->visit(route('index'))
        //             ->click('.user')
        //             ->click('.list-user')
        //             ->click('#user-1')
        //             ->keys(['{enter}'])
        //             ->assertPathIs('/admin/user');
        // });
    }
}
