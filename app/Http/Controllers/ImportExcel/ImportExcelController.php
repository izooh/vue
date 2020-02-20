<?php

namespace App\Http\Controllers\ImportExcel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\Importlead;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\lead;

class ImportExcelController extends Controller
{
  public function index()
      {
          $contacts = lead::orderBy('created_at','DESC')->take(10)->get();
          return view('import_excel.index',compact('contacts'));
      }

      public function import(Request $request)
      {
        ini_set('max_execution_time', -1);
          $request->validate([
              'import_file' => 'required'
          ]);
          Excel::import(new Importlead, request()->file('import_file'));
          return back()->with('success', 'Leads imported successfully.');
      }
}
