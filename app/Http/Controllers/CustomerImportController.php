<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class CustomerImportController extends Controller
{
    public function index()
    {
        $customerimp = DB::table('customer_import')->get();
        $data = array(
            'menu' => 'customerimp',
            'submenu' => '',
            'customerimp' => $customerimp
        );

        return view('customer/data-import', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'excel' => 'file'
        ]);
    
        $excel = $request->file('excel');
    
        $import = new CustomerImport;
        $import->import($excel);
    
        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }

        return back()->with('success', 'Your File has been imported!');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
