<?php

namespace Database\Seeders;

use App\Models\Promotion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Promotion::factory()->count(10)->create();

        foreach (Promotion::all() as $promotion){
            $users = User::inRandomOrder()->take(rand(1,3))->pluck('id');
            $promotion->users()->attach($users);
        }
    }
}
