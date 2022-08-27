<?php

namespace Database\Seeders;

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
        DB::table('contracts')->delete();
        DB::table('jobs')->delete();
        DB::table('message_types')->delete();
        DB::table('messages')->delete();
        // \App\Models\User::factory(10)->create();
        // $this->call(ContractsTableSeeder::class);
        \App\Models\Contract::factory(10)->create();
        \App\Models\Job::factory(20)->create();
        \App\Models\MessageType::factory(4)->create();
        \App\Models\Message::factory(10)->create();
    }
}
