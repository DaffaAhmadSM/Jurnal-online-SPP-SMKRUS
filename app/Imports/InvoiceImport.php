<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class InvoiceImport implements ToModel, WithHeadingRow
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
            'wali_kelas_id' => Auth::user(),
            'namaColumn' => '',
            'jumlah' => ''
        ]);
    }
    public function headingRow(): int
    {
        return 7;
    }
}
