<?php

namespace Database\Seeders;

use App\Models\Todoitem;
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
        User::factory(10)->has(Todoitem::factory(10))->create();
    }
}
