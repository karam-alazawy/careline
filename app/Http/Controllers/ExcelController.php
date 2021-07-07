<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Exports\TransactionsExport;
use App\Imports\TransactionsImport;
use App\Imports\Sales;
use App\Imports\Stores;


class ExcelController extends Controller
{
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('excel.index');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcel($type) 
    {
        return \Excel::download(new TransactionsExport, 'transactions.'.$type);
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcel(Request $request) 
    {
        if ($request->type==0) {
            \Excel::import(new Sales,$request->import_file);
        } elseif ($request->type==1) {
            \Excel::import(new Stores,$request->import_file);
        }else
        \Excel::import(new TransactionsImport,$request->import_file);

        \Session::put('success', 'Your file is imported successfully in database.');
           
        return back();
    }

    
    
}
