<?php

namespace App\Models; 
use App\Models\ClassModel;
use App\Models\Extracurrituler;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table            = 'students';   

    protected $fillable         = [
        'name',
        'gender',
        'nis',
        'class_id',
        'image'
    ];

 
    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }
    
 
    public function extracurricular()
    {
        return $this->belongsToMany(Extracurrituler::class, 'student_extracurrituler', 'student_id', 'extracurrituler_id');
    }

    

    

}