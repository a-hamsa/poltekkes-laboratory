<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentList extends Model
{
    protected $table = 'student_list_for_d3_t1';

    // Constructor to set the table dynamically
    public function __construct(array $attributes = [], $table = null)
    {
        parent::__construct($attributes);

        if ($table) {
            $this->table = $table;
        }
    }
}
