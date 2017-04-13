<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SignupCustomerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group signup
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('signup'))
                ->type('username', 'hoangnv09010')
                ->type('email', 'hoangnv0801@gmail.com')
                ->type('password', '123456')
                ->type('re_password', '123456')
                ->type('fullname','Nguyễn Văn Hoàng')
                ->type('address','Hà Đông, Hà Nội')
                ->type('phone', '0979096640')
                ->press('signup');
//                ->assertsee('email');
        });
    }
    /**
     * @group signup
     */
    public function testExampleEmail()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('signup'))
                ->type('username', '')
                ->type('email', '')
                ->type('password', '123456')
                ->type('re_password', '123456')
                ->type('fullname','Nguyễn Văn Hoàng')
                ->type('address','Hà Đông, Hà Nội')
                ->type('phone', '0979096640')
                ->press('signup');
//                ->assertsee('email');
        });
    }
    /**
     * @group signup
     */
    public function testExampleEmail2()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('signup'))
                ->type('username', 'hoangnv09010')
                ->type('email', '')
                ->type('password', '123456')
                ->type('re_password', '123456')
                ->type('fullname', 'Nguyễn Văn Hoàng')
                ->type('address', 'Hà Đông, Hà Nội')
                ->type('phone', '0979096640')
                ->press('signup');
//                ->assertsee('email');
        });
    }

    /**
     * @group signup
     */
    public function testExampleEmail3()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('signup'))
                ->type('username', 'hoangnv09010')
                ->type('email', '12345@gmail.com')
                ->type('password', '')
                ->type('re_password', '123456')
                ->type('fullname', 'Nguyễn Văn Hoàng')
                ->type('address', 'Hà Đông, Hà Nội')
                ->type('phone', '0979096640')
                ->press('signup');
//                ->assertsee('email');
        });
    }
    /**
     * @group signup
     */
    public function testExample4()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('signup'))
                ->type('username', 'hoangnv09010')
                ->type('email', 'hoangnv0801@gmail.com')
                ->type('password', '123456')
                ->type('re_password', '')
                ->type('fullname','Nguyễn Văn Hoàng')
                ->type('address','Hà Đông, Hà Nội')
                ->type('phone', '0979096640')
                ->press('signup');
//                ->assertsee('email');
        });
    }

    /**
     * @group signup
     */
    public function testExample5()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('signup'))
                ->type('username', 'hoangnv09010')
                ->type('email', 'hoangnv0801@gmail.com')
                ->type('password', '123456')
                ->type('re_password', '123456')
                ->type('fullname','')
                ->type('address','Hà Đông, Hà Nội')
                ->type('phone', '0979096640')
                ->press('signup');
//                ->assertsee('email');
        });
    }

    /**
     * @group signup
     */
    public function testExample6()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('signup'))
                ->type('username', 'hoangnv09010')
                ->type('email', 'hoangnv0801@gmail.com')
                ->type('password', '123456')
                ->type('re_password', '123456')
                ->type('fullname','Nguyễn Văn Hoàng')
                ->type('address','')
                ->type('phone', '0979096640')
                ->press('signup');
//                ->assertsee('email');
        });
    }

    /**
     * @group signup
     */
    public function testExample7()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('signup'))
                ->type('username', 'hoangnv09010')
                ->type('email', 'hoangnv0801@gmail.com')
                ->type('password', '123456')
                ->type('re_password', '123456')
                ->type('fullname','Nguyễn Văn Hoàng')
                ->type('address','Hà Đông, Hà Nội')
                ->type('phone', '')
                ->press('signup');
//                ->assertsee('email');
        });
    }

    /**
     * @group signup
     */
    public function testExample8()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('signup'))
                ->type('username', '')
                ->type('email', '')
                ->type('password', '')
                ->type('re_password', '')
                ->type('fullname','')
                ->type('address','')
                ->type('phone', '')
                ->press('signup');
//                ->assertsee('email');
        });
    }

    /**
     * @group signup
     */
    public function testExample9()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('signup'))
                ->type('username', 'hoangnv02107')
                ->type('email', 'hoangnv02107@gmail.com')
                ->type('password', '123456')
                ->type('re_password', '123456')
                ->type('fullname','Nguyễn Văn Hoàng')
                ->type('address','Hà Đông, Hà Nội')
                ->type('phone', '0979096640')
                ->press('signup');
//                ->assertsee('email');
        });
    }

}
