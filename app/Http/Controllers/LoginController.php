<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
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
        $namaSiswa = Invoice::where('nis', $fields['nis'])->first();
        //check nis
        $user = Siswa::where('nis', $fields['nis'])->first();
        $token = $user->createToken('token')->plainTextToken; 
        if ($user) {
            return [
                'user' => $fields['nis'],
                'nama_siswa' => $namaSiswa->nama,
                'wali_kelas' => $namaSiswa->wali_kelas->name,
                'kelas' => $namaSiswa->Wali_kelas->kelas,    
                'token' => $token,
            ];
        }else{
            return response()->json([
                'message' => 'NIS tidak ditemukan'
            ], Response::HTTP_NOT_FOUND);
        }
        
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
