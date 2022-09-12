<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::enableQueryLog();

        \App\Models\Admin::factory(1)->create();
        \App\Models\User::factory(5)->create();
        \App\Models\Formation::factory(5)->create();
        \App\Models\Experience::factory(5)->create();
        \App\Models\Offer::factory(5)->create();
        \App\Models\Question::factory(5)->create();
        \App\Models\Answer::factory(25)->create();

        dd(DB::getQueryLog());

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
