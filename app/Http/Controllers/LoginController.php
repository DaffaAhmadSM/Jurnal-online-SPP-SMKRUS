<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class LoginController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'nisn' => 'required|string',
        ]);
        //check nisn
        $user = Invoice::where('nisn', $fields['nisn'])->first();
        $token = $user->createToken('token')->plainTextToken; 

        return [
            'user' => $user,
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
