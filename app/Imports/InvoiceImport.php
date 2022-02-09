<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Siswa;
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
$user = Invoice::where('wali_kelas_id', backpack_user()->id)->first();
    if (!$user) {
        foreach ($rows as $row) {
        $i = 3;
        while ($i < count($_SESSION['heading'][0][0])-1) {
            Invoice::Create([
                'nis' => $row['nis'],
                'nama' => $row['nama_siswa'],
                'wali_kelas_id' => backpack_user()->id,
                'namaColumn' => $_SESSION['heading'][0][0][$i],
                'jumlah' => $row[$_SESSION['heading'][0][0][$i]]
            ]);
            $i++;
        }
        Siswa::Create([
            'nis' => $row['nis']
        ]);
     } 
    }else {
        Invoice::where('wali_kelas_id', backpack_user()->id)->delete();
        foreach ($rows as $row){
        $i = 3;
        while ($i < count($_SESSION['heading'][0][0])-1) {
            Invoice::Create([
                'nis' => $row['nis'],
                'nama' => $row['nama_siswa'],
                'wali_kelas_id' => backpack_user()->id,
                'namaColumn' => $_SESSION['heading'][0][0][$i],
                'jumlah' => $row[$_SESSION['heading'][0][0][$i]]
            ]);
            $i++;
        }
      } 
    }
  }
}
