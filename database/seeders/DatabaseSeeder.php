<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use App\Enums\LeaveStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        DB::table('leaves')->insert([
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addWeeks(1),
            'status' => LeaveStatus::ENATTENTE,
            'user_id' => 2,
        ]);

        DB::table('leaves')->insert([
            'start_date' => Carbon::now()->addWeeks(1),
            'end_date' => Carbon::now()->addWeeks(3),
            'status' => LeaveStatus::ENATTENTE,
            'user_id' => 2,
        ]);
    }
}
