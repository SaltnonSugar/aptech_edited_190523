<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('admins')->insert([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin123')
        ]);
        DB::table("size")->insert([
            'size_name'=>'256GB',
        ]);
        DB::table("color")->insert([
            'color_name'=>'Red',
        ]);

    }
}
