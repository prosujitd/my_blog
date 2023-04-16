<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => "Sports",
            'status' => 1,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name' => "Technology",
            'status' => 1,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name' => "Politics",
            'status' => 1,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name' => "Entertainment",
            'status' => 1,
            'created_at'=> Carbon::now()
        ]);


    }
}
