<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kategori_tupoksi extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_tupoksi 	= DB::table('kategori_tupoksi')->get();

		$data = array(  'title'             => 'Kategori tupoksi',
						'kategori_tupoksi'	=> $kategori_tupoksi,
                        'content'           => 'admin/kategori_tupoksi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_tupoksi' => 'required|unique:kategori_tupoksi',
					        ]);
        DB::table('kategori_tupoksi')->insert([
            'nama_kategori_tupoksi'   => $request->nama_kategori_tupoksi,
            'keterangan'            => $request->keterangan
            
        ]);
        return redirect('admin/kategori_tupoksi')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_tupoksi' => 'required'
					        ]);
        DB::table('kategori_tupoksi')->where('id_kategori_tupoksi',$request->id_kategori_tupoksi)->update([
            'nama_kategori_tupoksi'   => $request->nama_kategori_tupoksi,
            'keterangan'            => $request->keterangan
            
        ]);
        return redirect('admin/kategori_tupoksi')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_tupoksi)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_tupoksi')->where('id_kategori_tupoksi',$id_kategori_tupoksi)->delete();
    	return redirect('admin/kategori_tupoksi')->with(['sukses' => 'Data telah dihapus']);
    }
}
