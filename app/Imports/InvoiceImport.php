<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
session_start();
class InvoiceImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice([
            'nisn' => $row['NIS'],
            'wali_kelas_id' => $_SESSION['user'],
            'namaColumn' => $row['SPP'],
            'jumlah' => 1
        ]);
    }
    public function headingRow(): int
    {
        return 6;
    }
}
