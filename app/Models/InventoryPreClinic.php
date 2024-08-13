<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryPreClinic extends Model
{
    protected $table = 'inventory_preclinics';
    protected $fillable = [
        'name',
        'amount',
        'condition',
        'image',
    ];
}
