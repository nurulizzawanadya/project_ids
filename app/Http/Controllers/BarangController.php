<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use Dompdf\Dompdf;
use PDF;

class BarangController extends Controller
{
    public function index()
    {
        $barang = DB::table('barang')->get();
        $data = array(
            'menu' => 'home',
            'submenu' => 'barang',
            'barang' => $barang
        );
        return view('barang/data-barang', $data);
    }

    public function scanBarcode()
    {
        return view('barang/scan-barcode');
    }

    public function cetak_barcode(Request $request)
    {
        $no = 1;
    	//$barang = barang::all();
        $barang = Barang::whereIn('id_barang', $request->ids)->get();
        $data = array(
            'menu' => 'barang',
            'submenu' => '',
            'barang' => $barang,
            'no' => $no
            
        );
    	$pdf = PDF::loadview('barang/cetak_barcode',['barang'=>$barang], $data);
        $pdf->setPaper('A4', 'landscape');
    	return $pdf->download('data-barang.pdf');
    }

    public function findBarang(Request $request)
    {
        $data = Barang::select('id_barang', 'nama')
        ->where('id_barang',$request->scan_id)
        ->get();
        return response()->json($data);
    }

    public function cetak_barcode2(Request $request)
    {
        $row= $request->row;
        $col= $request->col;
        $panjang=(($row-1)*5)+($col-1);
        $no = 1;
        $x = 1;
        $barang = Barang::whereIn('id_barang', $request->ids)->get();
        $data = array(
            'menu' => 'barang',
            'submenu' => '',
            'barang' => $barang,
            'no' => $no,
            'row'=> $row,
            'col'=> $col,
            'x'=> $x,
            'panjang'=> $panjang
        );
    	$pdf = PDF::loadview('barang/cetak_barcode',compact('barang','data','no','row','col','x','panjang'))->setPaper('a5', 'landscape');
    	return $pdf->stream('data-barang-barcode.pdf');
    }
}
