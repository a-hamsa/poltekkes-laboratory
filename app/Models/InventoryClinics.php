<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryClinics extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'condition',
        'image',
    ];
}
