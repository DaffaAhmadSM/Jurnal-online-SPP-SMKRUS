<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InvoiceImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller
{
    
        public function import(){
            return view('import');
        }
        public function store(Request $request) 
    {
        $user = backpack_user()->id;
        $_SESSION['user'] = $user;

        $file = $request->file;

        Excel::import(new InvoiceImport, $file);
        
        return redirect()->back();
    }
    public function export(){
        return Excel::download(new InvoiceExport, 'siswa.xlsx');
    }
}
