<?php

namespace Database\Seeders;

use App\Models\StudentModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // StudentModel::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'Ayu', 'gender' => 'P', 'nis' => '0101001', 'class_id'=> '1'],
        //     ['name' => 'Eti', 'gender' => 'P', 'nis' => '0101002', 'class_id'=> '2'],
        //     ['name' => 'Budi', 'gender' => 'L', 'nis' => '0101003', 'class_id'=> '3'],
        //     ['name' => 'GILANG', 'gender' => 'L', 'nis' => '0101004', 'class_id'=> '2'],
        //     ['name' => 'YOLLA', 'gender' => 'P', 'nis' => '0101005', 'class_id'=> '3'],
        // ];

        // foreach($data as $v){
        //     StudentModel::insert([
        //         'name'      => $v['name'],
        //         'gender'    => $v['gender'],
        //         'nis'       => $v['nis'],
        //         'class_id'  => $v['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }
 

        StudentModel::factory()->count(20)->create();

    }
}
