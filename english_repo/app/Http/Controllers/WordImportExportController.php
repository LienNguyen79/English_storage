<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\WordExport;
use App\Imports\WordImport;
use Maatwebsite\Excel\Facades\Excel;

class WordImportExportController extends Controller
{
    public function importExportView(){
        return view('word.guide_add_many_words');
    }
    public function export() 
    {
        return Excel::download(new WordExport, 'words.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        $import = Excel::import(new WordImport,request()->file('file'));
             
        return redirect()->back()->with('success','Success');
    }
    // export danh sach tu cua user 
    // public function export(){
    //     return Excel::download(new WordExport,'Words.xlsx');//downlload file 
    //     return Excel::store(new WordExport,'Words.xlsx','disk-name');//luu file ve local 
    // }
}
