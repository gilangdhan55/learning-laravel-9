<?php

namespace App\Models;

use App\Models\StudentModel;
use App\Models\TeacherModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassModel extends Model
{
    use HasFactory;

    protected $table        = 'class';  

    protected $fillable         = [
        'name', 
        'teacher_id'
    ];

    
    public function students()
    {
        return $this->hasMany(StudentModel::class, 'class_id', 'id');
    }

 
    public function homeroomTeacher()
    {
        return $this->belongsTo(TeacherModel::class, 'teacher_id', 'id');
    }
}
