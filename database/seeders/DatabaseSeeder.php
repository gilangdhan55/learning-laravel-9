<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ClassModel;
use Database\Seeders\ClassSeeder;
use Database\Seeders\StudentsSeeder;
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
        $this->call([
            ClassSeeder::class,
            StudentsSeeder::class, 
        ]);
    }

}
