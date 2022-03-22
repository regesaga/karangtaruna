<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Desa_model;

class Desa extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mydesa 			= new Desa_model();
		$desa 			= $mydesa->semua();
		//$kategori_desa 	= DB::table('tbl_desa')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data desa',
						'desa'			=> $desa,
						//'kategori_desa'	=> $kategori_desa,
                        'content'			=> 'admin/desa/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // // Main page
    // public function detail($desa_kode)
    // {
    //     if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    //     $mydesa        = new Desa_model();
    //     $desa          = $mydesa->detail($desa_kode);

    //     $data = array(  'title'             => $desa->desa_nama,
    //                     'desa'             => $desa,
    //                     'content'           => 'admin/desa/detail'
    //                 );
    //     return view('admin/layout/wrapper',$data);
    // }

    // // Cari
    // public function cari(Request $request)
    // {
    //     if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    //     $mydesa           = new Desa_model();
    //     $keywords           = $request->keywords;
    //     $desa             = $mydesa->cari($keywords);
    //     //$kategori_desa    = DB::table('tbl_desa')->orderBy('urutan','ASC')->get();

    //     $data = array(  'title'             => 'Data desa ',
    //                     'desa'            => $desa,
    //                    // 'kategori_desa'   => $kategori_desa,
    //                     'content'           => 'admin/desa/index'
    //                 );
    //     return view('admin/layout/wrapper',$data);
    // }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('tbl_desa')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $desa_kodenya       = $request->desa_kode;
            for($i=0; $i < sizeof($desa_kodenya);$i++) {
                DB::table('tbl_desa')->where('desa_kode',$desa_kodenya[$i])->delete();
            }
            return redirect('admin/desa')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $desa_kodenya       = $request->desa_kode;
            for($i=0; $i < sizeof($desa_kodenya);$i++) {
                DB::table('tbl_desa')->where('desa_kode',$desa_kodenya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_desa'    => $request->id_kategori_desa
                    ]);
            }
            return redirect('admin/desa')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    // public function status_desa($status_desa)
    // {
    //     if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    //     $mydesa           = new Desa_model();
    //     $desa             = $mydesa->status_desa($status_desa);
    //     //$kategori_desa    = DB::table('tbl_desa')->orderBy('urutan','ASC')->get();

    //     $data = array(  'title'             => 'Data desa',
    //                     'desa'            => $desa,
    //                     //'kategori_desa'   => $kategori_desa,
    //                     'content'           => 'admin/desa/index'
    //                 );
    //     return view('admin/layout/wrapper',$data);
    // }

    // //Kategori
    // public function kategori($id_kategori_desa)
    // {
    //     if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    //     $mydesa           = new Desa_model();
    //     $desa             = $mydesa->all_kategori_desa($id_kategori_desa);
    //     $kategori_desa    = DB::table('tbl_desa')->orderBy('urutan','ASC')->get();

    //     $data = array(  'title'             => 'Data desa (Board and Team)',
    //                     'desa'            => $desa,
    //                     'kategori_desa'   => $kategori_desa,
    //                     'content'           => 'admin/desa/index'
    //                 );
    //     return view('admin/layout/wrapper',$data);
    // }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        //$kategori_desa    = DB::table('tbl_desa')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah desa',
                        //'kategori_desa'   => $kategori_desa,
                        'content'           => 'admin/desa/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($desa_kode)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydesa           = new Desa_model();
        $desa             = $mydesa->detail($desa_kode);
        //$kategori_desa    = DB::table('tbl_desa')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit desa ',
                        'desa'            => $desa,
                        //'kategori_desa'   => $kategori_desa,
                        'content'           => 'admin/desa/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'desa_nama'  => 'required|unique:desa',
                            ]);
        // UPLOAD START
       
            // END UPLOAD
            DB::table('tbl_desa')->insert([
                // 'id_user'               => Session()->get('id_user'),
                // 'id_kategori_desa'     => $request->id_kategori_desa,
                'desa_kode'           => $request->desa_kode,
                'desa_nama' => $request->desa_nama,
                'desa_kec'         => $request->desa_kec,
                'geojson'              => $request->geojson,
                'warna'            => $request->warna,
            ]);
      
        
        return redirect('admin/desa')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'desa_nama'  => 'required',
                            ]);
        // UPLOAD START
       
            // END UPLOAD
            DB::table('tbl_desa')->where('desa_kode',$request->desa_kode)->update([
                'desa_kode'           => $request->desa_kode,
                'desa_nama' => $request->desa_nama,
                'desa_kec'         => $request->desa_kec,
                'geojson'              => $request->geojson,
                'warna'            => $request->warna,

            ]);
       
        return redirect('admin/desa')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($desa_kode)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('tbl_desa')->where('desa_kode',$desa_kode)->delete();
        return redirect('admin/desa')->with(['sukses' => 'Data telah dihapus']);
    }
}
