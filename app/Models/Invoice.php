<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['nis','nama_siswa','smt_gasal','spp_jan','pkl1','osis_genap','pas_genap','admin_bank','jumlah','keterangan'];
}
