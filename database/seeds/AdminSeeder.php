<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
          'name' => 'Admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('12345678'),
          'phone' => '092928282',
          'category' => '1',
          'brand' => '1',
          'cupon' => '1',
          'product' => '1',
          'blog' => '1',
          'order' => '1',
          'stock' => '1',
          'report' => '1',
          'user' => '1',
          'contact' => '1',
          'subscriber' => '1',
          'others' => '1'
      ]);
    }
}
