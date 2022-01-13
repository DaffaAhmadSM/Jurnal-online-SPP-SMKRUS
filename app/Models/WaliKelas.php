<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facedes\DB;

class WaliKelas extends Model
{
    use HasFactory;

    protected $fillable = ['nama','email','password','kelas'];

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
