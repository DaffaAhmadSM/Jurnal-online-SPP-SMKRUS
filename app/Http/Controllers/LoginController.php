<?php

namespace App\Http\Controllers;

use App\Models\LoginApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

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
        $user = LoginApi::where('nisn', $fields['nisn'])->first();
        $token = $user->createToken('token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token

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
