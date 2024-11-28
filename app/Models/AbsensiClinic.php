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
        'room',
        'meet',
        'absent_status'
    ];
}
