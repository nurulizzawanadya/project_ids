<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Location;
use PDF;

class TokoController extends Controller
{
    public function index()
    {
        $toko = DB::table('lokasi_toko')->get();
        $data = array(
            'menu' => 'home',
            'submenu' => 'toko',
            'toko' => $toko
        );
        return view('lokasi-toko/data-toko', $data);
    }

    public function tambahToko()
    {
        return view('lokasi-toko/tambah-toko');
    }

    public function titikKunjungan()
    {
        return view('lokasi-toko/titik-kunjungan');
    }
    
    public function insertToko(Request $post)
    {
        DB::table('lokasi_toko')->insert([
            'nama_toko' => $post->nama_toko,
            'latitude' => $post->latitude,
            'longitude' => $post->longitude,
            'accuracy' => $post->accuracy
        ]);
    
        session()->flash('berhasil', 'Data Berhasil Ditambahkan');
        return redirect('data-toko');
    }

    public function findToko(Request $request)
    {
        $data = Location::select('barcode', 'nama_toko', 'latitude', 'longitude', 'accuracy')
        ->where('barcode',$request->scan_id)
        ->get();
        return response()->json($data);
    }

    public function cetakBarcode_toko($id)
    {
        $toko = DB::table('lokasi_toko')->where('barcode',$id)->get();
        $id_toko = $id;
        $pdf = PDF::loadview('lokasi-toko/cetak-toko',['toko'=>$toko,'id_toko'=>$id_toko])->setPaper('a4');
        return $pdf->stream('data-toko.pdf');
    }
}
