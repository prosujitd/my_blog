<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => "Admin",
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('roles')->insert([
            'name' => "Author",
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
