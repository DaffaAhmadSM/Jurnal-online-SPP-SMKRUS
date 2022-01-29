<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Invoice extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['nis','wali_kelas_id','namaColumn', 'jumlah', 'nama'];
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'wali_kelas_id'
    ];

    public function Wali_kelas()
    {
        return $this->belongsTo(User::class);
    }
}
