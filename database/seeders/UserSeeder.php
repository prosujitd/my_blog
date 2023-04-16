<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => "admin@gmail.com",
            'password' => "$2y$10$"."X9nJuPx5qISSMw5IVrB0kumIfTHpEJJGar12vazjGhAo1tQk5v36C",   // Default Username: admin@gmail.com     password: Demos@12
            'name' => "Admin Sharma",
            'status' => 1,
            'role_id' => 1,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => "author@gmail.com",
            'password' => "$2y$10$"."E2DLDN/pfw7ZjWaRhXOGb.sewks38KXGoBn2KFNrXwm5udjHHQM7C",
            'name' => "Author Baral",
            'status' => 1,
            'role_id' => 2,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
