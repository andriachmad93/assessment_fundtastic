<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetOrderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetOrder()
    {
        $response = $this->call('GET', '/api/v1/orders?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QvYXBpL3YxL2xvZ2luIiwiaWF0IjoxNTMwMjQyMDg4LCJleHAiOjE1MzAyNDU2ODgsIm5iZiI6MTUzMDI0MjA4OCwianRpIjoiWWJOU0htUkl6MkpxdGdwayJ9.YgPkBo_8lHdHckuJsyWRQD70nze5cu3L2OyK86FQyE4');

        if($response->status()==200){
            dd($response);
        }else{
            $this->assertResponseStatus($response->status());
        }
    }
}
