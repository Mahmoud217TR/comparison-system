<?php

namespace Database\Seeders;

use App\Models\Comparison;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory()->create([
            'email' => 'user@users.test',
        ])->has(Comparison::factory(15)->withoutUser()->make());
    }
}
