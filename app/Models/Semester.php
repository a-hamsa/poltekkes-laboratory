<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester'
    ];
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
