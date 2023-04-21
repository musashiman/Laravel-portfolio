<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("posts")->insert([
                "title" => "データ1",
                "created_at" => new DateTime(),
                "updated_at" => new DateTime(),
        ]);
        
        DB::table("posts")->insert([
                "title" => "データ2",
                "created_at" => new DateTime(),
                "updated_at" => new DateTime(),
        ]);
    }
}
