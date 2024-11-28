<?php

namespace App\Imports;

use App\Models\StudentList;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentsImport implements ToCollection
{
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function collection(Collection $rows)
    {
        // Extract class (I4) and TK_SMT (I3)
        $class = $rows[3][8] ?? null;  // Row 4, Column I (Index 8)
        $tk_smt = $rows[2][8] ?? null; // Row 3, Column I (Index 8)

        // Iterate over students (B11:B60 and C11:C60)
        foreach ($rows as $index => $row) {
            if ($index >= 10 && $index <= 59) { // Rows 11 to 60 (Index starts from 0)
                $name = $row[1] ?? null; // Column B (Index 1)
                $nim = $row[2] ?? null;  // Column C (Index 2)

                if ($name && $nim) {
                     DB::table($this->table)->insert([
                        'name' => $name,
                        'nim' => $nim,
                        'class' => $class,
                        'tk_smt' => $tk_smt,
                    ]);
                }
            }
        }
    }
}
