<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InvoiceImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use App\Models\Invoice;
session_start();

class UploadController extends Controller
{
    
        public function import(){
            return view('import');
        }


     public function store(Request $request) 
    {
        $file = $request->file;
        $headings = (new HeadingRowImport)->toArray($file);
        $_SESSION['heading'] = $headings;
        // return $headings[0][0][0];
        Excel::import(new InvoiceImport, $file);
        
        return redirect()->back();
    }
    public function export(){
        return Excel::download(new InvoiceExport, 'siswa.xlsx');
    }
}
