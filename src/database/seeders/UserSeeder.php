<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'suzuki',
                'email' => 'tika@hot',
                'password' => Hash::make('2kjraz8982'),
            ],
            [
                'name' => 'takahasi',
                'email' => 'nori@hot',
                'password' => Hash::make('2kjraz8982'),
            ]]);
    }
}
