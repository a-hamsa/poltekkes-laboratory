<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'semester_id', 'pdf_file'];

    // Relationship to Semester
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
