<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ClassModel::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [ 'name' => '2A' ],
            [ 'name' => '2B' ],
            [ 'name' => '1A' ],
            [ 'name' => '1B' ],
        ];
        
        foreach($data as $v){
            ClassModel::insert([
                'name' => $v['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
     
    }
}
