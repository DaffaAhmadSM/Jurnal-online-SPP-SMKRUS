<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['nis','wali_kelas_id','namaColumn', 'jumlah', 'nama'];
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
        'wali_kelas_id'
    ];

    public function Wali_kelas()
    {
        return $this->belongsTo(User::class);
    }
}
