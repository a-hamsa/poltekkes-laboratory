<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentList extends Model
{
    use HasFactory;

    protected $table = 'student_list_for_clinic';

    protected $fillable = [
        'name',
        'nim',
        'class',
        'tk_smt',
    ];
}
