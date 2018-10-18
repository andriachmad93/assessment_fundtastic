<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call(UserTableSeeder::class);
        $this->call(OrdersTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'andri',
            'email' => 'andri@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}

class OrdersTableSeeder extends seeder
{
    public function run()
    {
        DB::table('orders')->truncate();

        $data = array(
            ['invoice'=>str_random(10), 'product_name'=>'HP', 'email'=>str_random(10).'@gmail.com', 'price'=>1000000, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['invoice'=>str_random(10), 'product_name'=>'Komputer', 'email'=>str_random(10).'@gmail.com', 'price'=>1000000, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['invoice'=>str_random(10), 'product_name'=>'Mac', 'email'=>str_random(10).'@gmail.com', 'price'=>1000000, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['invoice'=>str_random(10), 'product_name'=>'TV', 'email'=>str_random(10).'@gmail.com', 'price'=>1000000, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['invoice'=>str_random(10), 'product_name'=>'Kabel', 'email'=>str_random(10).'@gmail.com', 'price'=>1000000, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
        );

        foreach($data as $key => $val){
            DB::table('orders')->insert($val);
        }
    }
}