<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->insert([
            'name' => 'Ali Hamedah',
            'email' => 'ali.hamedah77@yahoo.com',
            'password' => Hash::make('123456'),
        ]);

    }
}
