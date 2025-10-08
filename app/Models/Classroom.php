<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /** @use HasFactory<\Database\Factories\ClassroomFactory> */
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'classrooms'; 
    public function students()
{
    return $this->hasMany(Student::class, 'classroom_id');
}
}
