<?php

namespace App\Models;

use App\Models\StudentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurrituler extends Model
{
    use HasFactory;

    protected $table            = 'extracurritulers';
        
    protected $fillable         = [
        'name', 
    ];


    public function students()
    {
        return $this->belongsToMany(StudentModel::class, 'student_extracurrituler', 'extracurrituler_id', 'student_id');
    }
}
