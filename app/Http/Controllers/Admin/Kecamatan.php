<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kecamatan extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$tbl_kecamatan 	= DB::table('tbl_kecamatan')->get();

		$data = array(  'title'             => 'Peta Kecamatan Kabupaten Kuningan',
						'tbl_kecamatan'	=> $tbl_kecamatan,
                        'content'           => 'admin/kecamatan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'kec_nama' => 'required|unique:tbl_kecamatan'
					        ]);
        DB::table('tbl_kecamatan')->insert([
            'kec_nama'   => $request->kec_nama,
            
        ]);
        return redirect('admin/kecamatan')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit($kec_kode)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
            'kec_nama' => 'required',
            'kec_kab' => 'required',
            'geojson' => 'required',
            'warna' => 'required',

        ]);
        DB::table('tbl_kecamatan')->where('kec_kode',$request->kec_kode)->update([
            'kec_nama'   => $request->kec_nama
            
        ]);
        return redirect('admin/kecamatan')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($kec_kode)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('tbl_kecamatan')->where('kec_kode',$kec_kode)->delete();
    	return redirect('admin/kecamatan')->with(['sukses' => 'Data telah dihapus']);
    }
}
