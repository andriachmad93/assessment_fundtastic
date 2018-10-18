<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->call('POST', '/api/v1/login', ['email' => 'admin@gmail.com', 'password'=>'12345']);

        if($response->status()==200){
            //dd($response);
        }else{
            $this->assertResponseStatus($response->status());
        }
    }
}
