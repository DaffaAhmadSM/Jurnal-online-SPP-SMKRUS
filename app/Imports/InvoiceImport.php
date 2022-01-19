<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

HeadingRowFormatter::extend('custom', function($value, $key) {
    return 'nis' . $value; 
    
    // And you can use heading column index.
    // return 'column-' . $key; 
});
class InvoiceImport implements ToCollection, WithCalculatedFormulas, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        
        
    foreach ($rows as $row) 
    {
        $i = 2;
        while ($i < count($_SESSION['heading'][0][0])) {
            Invoice::Create([
                'nisn' => $row['nis'],
                'wali_kelas_id' => backpack_user()->id,
                'namaColumn' => $_SESSION['heading'][0][0][$i],
                'jumlah' => $row[$_SESSION['heading'][0][0][$i]]
            ]);
            $i++;
    }
        
    } 
        // foreach ($_SESSION['heading'][0][0] as $heading) {
                    
        // }
    }
}
