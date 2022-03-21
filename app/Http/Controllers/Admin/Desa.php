<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Desa extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$tbl_desa 	= DB::table('tbl_desa')->get();

		$data = array(  'title'             => 'Peta Desa di Kabupaten Kuningan',
						'tbl_desa'	=> $tbl_desa,
                        'content'           => 'admin/desa/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'desa_nama' => 'required|unique:tbl_desa'
					        ]);
        DB::table('tbl_desa')->insert([
            'desa_nama'   => $request->desa_nama,
            
        ]);
        return redirect('admin/desa')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'desa_nama' => 'required'
					        ]);
        DB::table('tbl_desa')->where('desa_kode',$request->desa_kode)->update([
            'desa_nama'   => $request->desa_nama
            
        ]);
        return redirect('admin/desa')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($desa_kode)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('tbl_desa')->where('desa_kode',$desa_kode)->delete();
    	return redirect('admin/desa')->with(['sukses' => 'Data telah dihapus']);
    }
}
