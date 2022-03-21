<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kabupaten extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$tbl_kabupaten 	= DB::table('tbl_kabupaten')->get();

		$data = array(  'title'             => 'Peta Kabupaten Kuningan',
						'tbl_kabupaten'	=> $tbl_kabupaten,
                        'content'           => 'admin/kabupaten/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'kab_nama' => 'required|unique:tbl_kabupaten'
					        ]);
        DB::table('tbl_kabupaten')->insert([
            'kab_nama'   => $request->kab_nama,
            
        ]);
        return redirect('admin/kabupaten')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'kab_nama' => 'required'
					        ]);
        DB::table('tbl_kabupaten')->where('kab_kode',$request->kab_kode)->update([
            'kab_nama'   => $request->kab_nama
            
        ]);
        return redirect('admin/kabupaten')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($kab_kode)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('tbl_kabupaten')->where('kab_kode',$kab_kode)->delete();
    	return redirect('admin/kabupaten')->with(['sukses' => 'Data telah dihapus']);
    }
}
