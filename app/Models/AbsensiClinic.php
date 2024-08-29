<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiClinic extends Model
{
    use HasFactory;
    protected $table = "absensi_for_clinic";

    protected $filable = [
        'name',
        'nim',
        'class',
        'semester',
        'absent_status'
    ];
}
