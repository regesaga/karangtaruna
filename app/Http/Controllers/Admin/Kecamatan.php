<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Kecamatan_model;

class Kecamatan extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mykecamatan 			= new Kecamatan_model();
		$kecamatan 			= $mykecamatan->semua();
		//$kategori_kecamatan 	= DB::table('tbl_kecamatan')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data kecamatan',
						'kecamatan'			=> $kecamatan,
						//'kategori_kecamatan'	=> $kategori_kecamatan,
                        'content'			=> 'admin/kecamatan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // // Main page
    // public function detail($kec_kode)
    // {
    //     if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    //     $mykecamatan        = new Kecamatan_model();
    //     $kecamatan          = $mykecamatan->detail($kec_kode);

    //     $data = array(  'title'             => $kecamatan->kec_nama,
    //                     'kecamatan'             => $kecamatan,
    //                     'content'           => 'admin/kecamatan/detail'
    //                 );
    //     return view('admin/layout/wrapper',$data);
    // }

    // // Cari
    // public function cari(Request $request)
    // {
    //     if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    //     $mykecamatan           = new Kecamatan_model();
    //     $keywords           = $request->keywords;
    //     $kecamatan             = $mykecamatan->cari($keywords);
    //     //$kategori_kecamatan    = DB::table('tbl_kecamatan')->orderBy('urutan','ASC')->get();

    //     $data = array(  'title'             => 'Data kecamatan ',
    //                     'kecamatan'            => $kecamatan,
    //                    // 'kategori_kecamatan'   => $kategori_kecamatan,
    //                     'content'           => 'admin/kecamatan/index'
    //                 );
    //     return view('admin/layout/wrapper',$data);
    // }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('tbl_kecamatan')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $kec_kodenya       = $request->kec_kode;
            for($i=0; $i < sizeof($kec_kodenya);$i++) {
                DB::table('tbl_kecamatan')->where('kec_kode',$kec_kodenya[$i])->delete();
            }
            return redirect('admin/kecamatan')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $kec_kodenya       = $request->kec_kode;
            for($i=0; $i < sizeof($kec_kodenya);$i++) {
                DB::table('tbl_kecamatan')->where('kec_kode',$kec_kodenya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_kecamatan'    => $request->id_kategori_kecamatan
                    ]);
            }
            return redirect('admin/kecamatan')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    // public function status_kecamatan($status_kecamatan)
    // {
    //     if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    //     $mykecamatan           = new Kecamatan_model();
    //     $kecamatan             = $mykecamatan->status_kecamatan($status_kecamatan);
    //     //$kategori_kecamatan    = DB::table('tbl_kecamatan')->orderBy('urutan','ASC')->get();

    //     $data = array(  'title'             => 'Data kecamatan',
    //                     'kecamatan'            => $kecamatan,
    //                     //'kategori_kecamatan'   => $kategori_kecamatan,
    //                     'content'           => 'admin/kecamatan/index'
    //                 );
    //     return view('admin/layout/wrapper',$data);
    // }

    // //Kategori
    // public function kategori($id_kategori_kecamatan)
    // {
    //     if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    //     $mykecamatan           = new Kecamatan_model();
    //     $kecamatan             = $mykecamatan->all_kategori_kecamatan($id_kategori_kecamatan);
    //     $kategori_kecamatan    = DB::table('tbl_kecamatan')->orderBy('urutan','ASC')->get();

    //     $data = array(  'title'             => 'Data kecamatan (Board and Team)',
    //                     'kecamatan'            => $kecamatan,
    //                     'kategori_kecamatan'   => $kategori_kecamatan,
    //                     'content'           => 'admin/kecamatan/index'
    //                 );
    //     return view('admin/layout/wrapper',$data);
    // }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        //$kategori_kecamatan    = DB::table('tbl_kecamatan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah kecamatan',
                        //'kategori_kecamatan'   => $kategori_kecamatan,
                        'content'           => 'admin/kecamatan/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($kec_kode)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykecamatan           = new Kecamatan_model();
        $kecamatan             = $mykecamatan->detail($kec_kode);
        //$kategori_kecamatan    = DB::table('tbl_kecamatan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit kecamatan ',
                        'kecamatan'            => $kecamatan,
                        //'kategori_kecamatan'   => $kategori_kecamatan,
                        'content'           => 'admin/kecamatan/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'kec_nama'  => 'required|unique:kecamatan',
                            ]);
        // UPLOAD START
       
            // END UPLOAD
            DB::table('tbl_kecamatan')->insert([
                // 'id_user'               => Session()->get('id_user'),
                // 'id_kategori_kecamatan'     => $request->id_kategori_kecamatan,
                'kec_kode'           => $request->kec_kode,
                'kec_nama' => $request->kec_nama,
                'kec_kab'         => $request->kec_kab,
                'geojson'              => $request->geojson,
                'warna'            => $request->warna,
            ]);
      
        
        return redirect('admin/kecamatan')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'kec_nama'  => 'required',
                            ]);
        // UPLOAD START
       
            // END UPLOAD
            DB::table('tbl_kecamatan')->where('kec_kode',$request->kec_kode)->update([
                'kec_kode'           => $request->kec_kode,
                'kec_nama'  => $request->kec_nama,
                'kec_kab'         => $request->kec_kab,
                'geojson'              => $request->geojson,
                'warna'            => $request->warna,

            ]);
       
        return redirect('admin/kecamatan')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($kec_kode)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('tbl_kecamatan')->where('kec_kode',$kec_kode)->delete();
        return redirect('admin/kecamatan')->with(['sukses' => 'Data telah dihapus']);
    }
}
