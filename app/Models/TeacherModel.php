<?php

namespace App\Models;

use App\Models\ClassModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    use HasFactory;

    protected $table            = 'teachers';  
    
    protected $fillable         = ['name'];
 
    public function class()
    {
        return $this->hasOne(ClassModel::class, 'teacher_id', 'id');
    }
    
}
