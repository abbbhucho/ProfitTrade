<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'admin@profittrade.in',
            'phone'=> '999991111112',
            'address' => 'nowheretobefound, Earth',
            'avatar' => 'default.png',
            'password' => bcrypt('admin1234'),
            'isadmin' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            
         ]);
    }
}
