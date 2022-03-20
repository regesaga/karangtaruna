<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->Kecamatan = new Kecamatan();
        $this->middleware('auth');

    }


    public function index(){
        $data = [
            'title' => 'Kecamatan',
            'kec_nama' => $this->Kecamatan->AllData(),
        
    ];
        return view('admin.kecamatan.v_index', $data);

    }
    
    public function add(){
        $data = [
            'title' => 'Add Data Kecamatan',
            'kec_nama' => $this->Kecamatan->AllData(),
        
    ];
        return view('admin.kecamatan.v_add', $data);

    }

    public function insert()
    {
        Request()->validate([
            'kec_nama' => 'required',
            'geojson' => 'required',
            'warna' => 'required',

        ],
        [
            'kec_nama.required' => 'Wajib di isi !!',
            'geojson.required' => 'Wajib di isi !!',
            'warna.required' => 'Wajib di isi !!',

        ]
    );
        //jika validasi tidak ada  maka lakukan simpan
        $data =[
            'kec_nama' => Request()->kecamatan,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
        ];
        $this->Kecamatan->InsertData($data);
        return redirect()->route('kecamatan')->with('pesan', 'Data Berhasil ditambahkan');

    }

    public function edit($kec_kode){
        $data = [
        'title' => 'edit Data Kecamatan',
        'kec_nama' => $this->Kecamatan->DetailData($kec_kode),
        ];
        return view('admin.kecamatan.v_edit', $data);
    }

    public function update($kec_kode){
        Request()->validate([
            'kec_nama' => 'required',
            'kec_kab' => 'required',
            'geojson' => 'required',
            'warna' => 'required',

        ],
        [
            'kec_nama.required' => 'Wajib di isi !!',
            'kec_kab.required' => 'Wajib di isi !!',
            'geojson.required' => 'Wajib di isi !!',
            'warna.required' => 'Wajib di isi !!',

        ]
    );
        //jika validasi tidak ada  maka lakukan simpan
        $data =[
            'kec_nama' => Request()->kec_nama,
            'kec_kab' => Request()->kec_kab,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
        ];
        $this->Kecamatan->UpdateData($kec_kode, $data);
        return redirect()->route('kecamatan')->with('pesan', 'Data Berhasil di Update');
    }

    public function delete($kec_kode){

        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	// DB::table('tbl_kecamatan')->where('kec_kode',$kec_kode)->delete();
    	// return redirect('/kecamatan')->with(['sukses' => 'Data telah dihapus']);
         $this->Kecamatan->DeleteData($kec_kode, $data);
        return redirect()->route('kecamatan')->with('pesan', 'Data Berhasil di Dihapus');

    }

}
