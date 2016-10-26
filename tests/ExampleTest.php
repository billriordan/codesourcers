<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Adrian Gracia');



    }



    /*
     *
     * Test login
     */
    public function testLogin(){

        $this->visit('/login')
            ->type('jared@gmail.com', 'email')
            ->type('password', 'password')
            ->press('login')
            ->seePageIs('/');
    }


}
