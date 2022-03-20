<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;

class KabupatenController extends Controller
{
    public function __construct()
    {
        $this->Kabupaten = new Kabupaten();
        $this->middleware('auth');

    }


    public function index(){
        $data = [
            'title' => 'Kabupaten',
            'kab_nama' => $this->Kabupaten->AllData(),
        
    ];
        return view('admin.kabupaten.v_index', $data);

    }
    
    public function add(){
        $data = [
            'title' => 'Add Data Kabupaten',
            'kab_nama' => $this->Kabupaten->AllData(),
        
    ];
        return view('admin.kabupaten.v_add', $data);

    }

    public function insert()
    {
        Request()->validate([
            'kab_nama' => 'required',
            'geojson' => 'required',
            'warna' => 'required',

        ],
        [
            'kab_nama.required' => 'Wajib di isi !!',
            'geojson.required' => 'Wajib di isi !!',
            'warna.required' => 'Wajib di isi !!',

        ]
    );
        //jika validasi tidak ada  maka lakukan simpan
        $data =[
            'kab_nama' => Request()->Kabupaten,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
        ];
        $this->Kabupaten->InsertData($data);
        return redirect()->route('kabupaten')->with('pesan', 'Data Berhasil ditambahkan');

    }

    public function edit($kab_kode){
        $data = [
        'title' => 'edit Data Kabupaten',
        'kab_nama' => $this->Kabupaten->DetailData($kab_kode),
        ];
        return view('admin.kabupaten.v_edit', $data);
    }

    public function update($kab_kode){
        Request()->validate([
            'kab_nama' => 'required',
            'kab_prov' => 'required',
            'geojson' => 'required',
            'warna' => 'required',

        ],
        [
            'kab_nama.required' => 'Wajib di isi !!',
            'kab_prov.required' => 'Wajib di isi !!',
            'geojson.required' => 'Wajib di isi !!',
            'warna.required' => 'Wajib di isi !!',

        ]
    );
        //jika validasi tidak ada  maka lakukan simpan
        $data =[
            'kab_nama' => Request()->kab_nama,
            'kab_prov' => Request()->kab_prov,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
        ];
        $this->Kabupaten->UpdateData($kab_kode, $data);
        return redirect()->route('kabupaten')->with('pesan', 'Data Berhasil di Update');
    }

    public function delete($kab_kode){

        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	// DB::table('tbl_Kabupaten')->where('kab_kode',$kab_kode)->delete();
    	// return redirect('/Kabupaten')->with(['sukses' => 'Data telah dihapus']);
         $this->Kabupaten->DeleteData($kab_kode, $data);
        return redirect()->route('kabupaten')->with('pesan', 'Data Berhasil di Dihapus');

    }

}
