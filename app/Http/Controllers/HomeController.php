<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = ['title' => 'Dashboard',
    ];
        return view('v_home', $data);
    }

    // public function index(){
    //     $kabupaten = Kabupaten::all();
    //     return view('home',['page_title'=>'Daftar Kabupaten','kabupaten'=>$kabupaten]);
    // }
    // public function getKecamatan(Request $request){
    //     $kecamatan = Kecamatan::where("kec_kab",$request->kabID)->pluck('kec_kode','kec_nama');
    //     return response()->json($kecamatan);
    // }
    // public function getDesa(Request $request){
    //     $desa = Desa::where("desa_kec",$request->kecID)->pluck('desa_kode','desa_nama');
    //     return response()->json($desa);
    // }
}
