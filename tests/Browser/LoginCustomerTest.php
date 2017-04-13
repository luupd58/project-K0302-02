<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginCustomerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     * @return void
     */
    public function testLoginCustomer1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('login'))
                ->type('email','')
                ->type('password','')
                ->press('Login');
        });
    }



    /**
     * @group login
     */
    public function testLoginCustomer3(){
        $this->browse(function (Browser $browser){
            $browser->visit(route('login'))
                ->type('email','admin@gmail.com')
                ->type('password','')
                ->press('Login');
//                ->assertSee('Vui lòng nhập mật khẩu');
        });
    }
    /**
     * @group login
     */
    public function testLoginCustomer4(){
        $this->browse(function (Browser $browser){
            $browser->visit(route('login'))
                ->type('email','admin@gmail.com')
                ->type('password','12345')
                ->press('Login');
//                ->assertSee('Mật khẩu ít nhất 6 kí tự');
        });
    }
    /**
     * @group login
     */
    public function testLoginCustomer5(){
        $this->browse(function (Browser $browser){
            $browser->visit(route('login'))
                ->type('email','admin@gmail.com')
                ->type('password','12312311231321313123123131322313')
                ->press('Login');
//                ->assertSee('Mật khẩu không quá 20 kí tự');
        });
    }
    /**
     * @group login
     */
    public function testLoginCustomer6(){
        $this->browse(function (Browser $browser){
            $browser->visit(route('login'))
                ->type('email','admin')
                ->type('password','123456')
                ->press('Login');
//                ->assertSee('Email không đúng định dạng');
        });
    }
    /**
     * @group login
     */
    public function testLoginCustomer7(){
        $this->browse(function (Browser $browser){
            $browser->visit(route('login'))
                ->type('email','')
                ->type('password','123456')
                ->press('Login');
//                ->assertSee('Vui lòng nhập email');
        });
    }
    /**
     * @group login
     */
    public function testLoginCustomer8(){
        $this->browse(function (Browser $browser){
            $browser->visit(route('login'))
                ->type('email','nguyenhoang@gmail.com')
                ->type('password','123456')
                ->press('Login')
                ->assertSee('Tài khoản chưa kích hoạt');
        });
    }

    /**
     * @group login
     */
    public function testLoginCustomer2(){
        $this->browse(function (Browser $browser){
            $browser->visit(route('login'))
                ->type('email','admin@gmail.com')
                ->type('password','123456')
                ->press('Login');
//                ->assertSee('Đăng nhập thành công');
        });
    }
}
