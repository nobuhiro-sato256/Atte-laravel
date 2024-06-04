<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Time;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     UserSeeder::class,
        // ]);
        
        $user = User::factory(50)->has(Time::factory()->count(3))->create();
        //50個のUserダミーデータと３個のTimeダミーデータ作成
        
    }
}
