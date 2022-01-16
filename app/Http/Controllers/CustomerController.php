<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kabkot;
use App\Models\Provinsi;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = DB::table('customer')
        ->join('kelurahan', 'customer.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->get();
        $data = array(
            'menu' => 'customer',
            'customer' => $customer,
            'submenu' => ''
        );
        return view('customer/data-customer', $data);
    }

    public function list()
    {
        $provinsi = Provinsi::all();
        $kota = Kabkot::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $kodepos = Kelurahan::all();

        return view('customer/tambah-customer', compact('provinsi', 'kota', 'kecamatan', 'kelurahan', 'kodepos'));
    }
    
    public function insertCustomer(Request $request)
    {
        DB::table('customer')->insert([
            'id_customer' => $request->idcust,
            'id_kelurahan' => $request->kelurahan_dd,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'foto' => $request->imagecam
        ]);

        session()->flash('berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/data-customer');
    }

    public function findKota(Request $request)
    {
        $data = Kabkot::select('id_kabkot', 'nama_kabkot')
        ->where('id_provinsi', $request->prov_id)
        ->get();
        return response()->json($data);
    }

    public function findKecamatan(Request $request)
    {
        $data = Kecamatan::select('id_kecamatan', 'nama_kecamatan')
        ->where('id_kabkot', $request->kota_id)
        ->get();
        return response()->json($data);
    }

    public function findKelurahan(Request $request)
    {
        $data = Kelurahan::select('id_kelurahan', 'nama_kelurahan')
        ->where('id_kecamatan', $request->kec_id)
        ->get();
        return response()->json($data);
    }

    public function list2()
    {
        $provinsi = Provinsi::all();
        $kota = Kabkot::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $kodepos = Kelurahan::all();

        return view('customer/tambah-customer2', compact('provinsi', 'kota', 'kecamatan', 'kelurahan', 'kodepos'));
    }
    
    public function insertCustomer2(Request $request)
    {
        $imagecam = str_replace('data:image/jpeg;base64,', '', $request->imagecam);
        $imagecam = str_replace(' ', '+', $imagecam);
        $imageName = $request->nama.time(). '.jpeg';
        Storage::disk('local')->put($imageName, base64_decode($imagecam));
        DB::table('customer')->insert([
            'id_customer' => $request->idcust,
            'id_kelurahan' => $request->kelurahan_dd,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'file_path' => $imageName
        ]);
        
        session()->flash('berhasil', 'Data Berhasil Ditambahkan');
       
        return redirect('/data-customer');
    }

    public function findKota2(Request $request)
    {
        $data = Kabkot::select('id_kabkot', 'nama_kabkot')
        ->where('id_provinsi', $request->prov_id)
        ->get();
        return response()->json($data);
    }

    public function findKecamatan2(Request $request)
    {
        $data = Kecamatan::select('id_kecamatan', 'nama_kecamatan')
        ->where('id_kabkot', $request->kota_id)
        ->get();
        return response()->json($data);
    }

    public function findKelurahan2(Request $request)
    {
        $data = Kelurahan::select('id_kelurahan', 'nama_kelurahan')
        ->where('id_kecamatan', $request->kec_id)
        ->get();
        return response()->json($data);
    }

    public function findKodepos2(Request $request)
    {
        $data = Kelurahan::select('id_kelurahan', 'kodepos')
        ->where('id_kecamatan', $request->kel_id)
        ->get();
        return response()->json($data);
    }

}
