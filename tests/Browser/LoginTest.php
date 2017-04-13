<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     * @return void
     */
    public function testExample()
    {
        /**
         * @group login
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.login'))
                    ->type('username', '')
                    ->type('password', '')
                    ->press('login');
        });

        /**
         * @group login
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.login'))
                    ->type('username', '123123')
                    ->type('password', '')
                    ->press('login');
        });

        /**
         * @group login
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.login'))
                    ->type('username', 'admin1')
                    ->type('password', '123456')
                    ->press('login')
                    ->assertPathIs('/admin/index');
        });

        /**
         * @group login
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                    ->click('.dropdown-toggle')
                    ->click('.input-logout')
                    ->assertPathIs('/login');
        });

        /**
         * @group login
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.login'))
                    ->type('username', 'user100')
                    ->type('password', '123456')
                    ->press('login')
                    ->assertPathIs('/admin/index');
        });

        /**
         * @group login
         */
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                    ->click('.dropdown-toggle')
                    ->click('.input-logout')
                    ->assertPathIs('/login');
        });
    }
}
// 