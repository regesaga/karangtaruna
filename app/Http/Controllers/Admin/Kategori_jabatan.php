<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kategori_jabatan extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_jabatan 	= DB::table('kategori_jabatan')->get();

		$data = array(  'title'             => 'Kategori jabatan',
						'kategori_jabatan'	=> $kategori_jabatan,
                        'content'           => 'admin/kategori_jabatan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_jabatan' => 'required|unique:kategori_jabatan',
					        ]);
    	$slug_kategori_jabatan = Str::slug($request->nama_kategori_jabatan, '-');
        DB::table('kategori_jabatan')->insert([
            'nama_kategori_jabatan'   => $request->nama_kategori_jabatan,
            
        ]);
        return redirect('admin/kategori_jabatan')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_jabatan' => 'required',
					        'urutan'               => 'required',
					        ]);
    	$slug_kategori_jabatan = Str::slug($request->nama_kategori_jabatan, '-');
        DB::table('kategori_jabatan')->where('id_kategori_jabatan',$request->id_kategori_jabatan)->update([
            'nama_kategori_jabatan'   => $request->nama_kategori_jabatan,
            
        ]);
        return redirect('admin/kategori_jabatan')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_jabatan)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_jabatan')->where('id_kategori_jabatan',$id_kategori_jabatan)->delete();
    	return redirect('admin/kategori_jabatan')->with(['sukses' => 'Data telah dihapus']);
    }
}
