<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'nis' => 'required|string',
        ]);
        $namaSiswa = DB::table('invoices')
                    ->select('nama')
                    ->where('nis', $fields['nis'])
                    ->first();
        //check nis
        $user = Invoice::where('nis', $fields['nis'])->first();
        $token = $user->createToken('token')->plainTextToken; 

        return [
            'user' => $fields['nis'],
            'nama_siswa' => $namaSiswa->nama,
            'wali_kelas' => $user->wali_kelas->name,
            'kelas' => $user->Wali_kelas->kelas,    
            'token' => $token,
        ];
        
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    
    }

    public function search($nisn)
    {
        
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'massage' => 'Logged Out'
        ];
    }
}
