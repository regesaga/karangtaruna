<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;

class DesaController extends Controller
{
    public function __construct()
    {
        $this->Desa = new Desa();
        $this->middleware('auth');

    }


    public function index(){
        $data = [
            'title' => 'Desa',
            'desa_nama' => $this->Desa->AllData(),
        
    ];
        return view('admin.desa.v_index', $data);

    }
    
    public function add(){
        $data = [
            'title' => 'Add Data Desa',
            'desa_nama' => $this->Desa->AllData(),
        
    ];
        return view('admin.desa.v_add', $data);

    }

    public function insert()
    {
        Request()->validate([
            'desa_nama' => 'required',
            'geojson' => 'required',
            'warna' => 'required',

        ],
        [
            'desa_nama.required' => 'Wajib di isi !!',
            'geojson.required' => 'Wajib di isi !!',
            'warna.required' => 'Wajib di isi !!',

        ]
    );
        //jika validasi tidak ada  maka lakukan simpan
        $data =[
            'desa_nama' => Request()->desa,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
        ];
        $this->Desa->InsertData($data);
        return redirect()->route('desa')->with('pesan', 'Data Berhasil ditambahkan');

    }

    public function edit($kab_kode){
        $data = [
        'title' => 'edit Data Desa',
        'desa_nama' => $this->Desa->DetailData($kab_kode),
        ];
        return view('admin.desa.v_edit', $data);
    }

    public function update($kab_kode){
        Request()->validate([
            'desa_nama' => 'required',
            'desa_kec' => 'required',
            'geojson' => 'required',
            'warna' => 'required',

        ],
        [
            'desa_nama.required' => 'Wajib di isi !!',
            'desa_kec.required' => 'Wajib di isi !!',
            'geojson.required' => 'Wajib di isi !!',
            'warna.required' => 'Wajib di isi !!',

        ]
    );
        //jika validasi tidak ada  maka lakukan simpan
        $data =[
            'desa_nama' => Request()->desa_nama,
            'desa_kec' => Request()->desa_kec,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
        ];
        $this->Desa->UpdateData($kab_kode, $data);
        return redirect()->route('desa')->with('pesan', 'Data Berhasil di Update');
    }

    public function delete($kab_kode){

        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	// DB::table('tbl_Desa')->where('kab_kode',$kab_kode)->delete();
    	// return redirect('/Desa')->with(['sukses' => 'Data telah dihapus']);
         $this->Desa->DeleteData($kab_kode, $data);
        return redirect()->route('desa')->with('pesan', 'Data Berhasil di Dihapus');

    }

}
