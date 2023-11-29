<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [ 'name' => 'admin' ],
            [ 'name' => 'teacher' ],
            [ 'name' => 'student' ], 
        ];

        foreach($data as $v){
            Role::insert([
                'name' => $v['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
