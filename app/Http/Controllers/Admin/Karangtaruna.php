<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Karangtaruna_model;
use App\Models\Desa_model;
use App\Models\Kecamatan_model;
use App\Models\Kabupaten_model;

class Karangtaruna extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mykarangtaruna 			= new Karangtaruna_model();
		$karangtaruna 			= $mykarangtaruna->semua();
		//$kategori_karangtaruna 	= DB::table('kategori_karangtaruna')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data karangtaruna',
						'karangtaruna'			=> $karangtaruna,
						//'kategori_karangtaruna'	=> $kategori_karangtaruna,
                        'content'			=> 'admin/karangtaruna/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Main page
    public function detail($id_karangtaruna)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykarangtaruna        = new Karangtaruna_model();
        $karangtaruna          = $mykarangtaruna->detail($id_karangtaruna);

        $data = array(  'title'             => $karangtaruna->nama_karangtaruna,
                        'karangtaruna'             => $karangtaruna,
                        'content'           => 'admin/karangtaruna/detail'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykarangtaruna           = new Karangtaruna_model();
        $keywords           = $request->keywords;
        $karangtaruna             = $mykarangtaruna->cari($keywords);
        //$kategori_karangtaruna    = DB::table('kategori_karangtaruna')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data karangtaruna ',
                        'karangtaruna'            => $karangtaruna,
                       // 'kategori_karangtaruna'   => $kategori_karangtaruna,
                        'content'           => 'admin/karangtaruna/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_karangtarunanya       = $request->id_karangtaruna;
            for($i=0; $i < sizeof($id_karangtarunanya);$i++) {
                DB::table('karangtaruna')->where('id_karangtaruna',$id_karangtarunanya[$i])->delete();
            }
            return redirect('admin/karangtaruna')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_karangtarunanya       = $request->id_karangtaruna;
            for($i=0; $i < sizeof($id_karangtarunanya);$i++) {
                DB::table('karangtaruna')->where('id_karangtaruna',$id_karangtarunanya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_karangtaruna'    => $request->id_kategori_karangtaruna
                    ]);
            }
            return redirect('admin/karangtaruna')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_karangtaruna($status_karangtaruna)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykarangtaruna           = new Karangtaruna_model();
        $karangtaruna             = $mykarangtaruna->status_karangtaruna($status_karangtaruna);
        //$kategori_karangtaruna    = DB::table('kategori_karangtaruna')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data karangtaruna',
                        'karangtaruna'            => $karangtaruna,
                        //'kategori_karangtaruna'   => $kategori_karangtaruna,
                        'content'           => 'admin/karangtaruna/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    
    
  


    public function tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        //$kategori_karangtaruna    = DB::table('kategori_karangtaruna')->orderBy('urutan','ASC')->get();
        $kabupaten = Kabupaten_model::all();
        $data = array(  'title'             => 'Tambah karangtaruna',
                        //'kategori_karangtaruna'   => $kategori_karangtaruna,
                        'content'           => 'admin/karangtaruna/tambah',
                        'kabupaten'=>$kabupaten

                    );
        return view('admin/layout/wrapper',$data );
    }
    public function getKabupaten(){
        $kabupaten = Kabupaten_model::all();
        return view('admin/layout/wrapper',['title'=>'Daftar Kabupaten','content'=> 'admin/karangtaruna/tambah','kabupaten'=>$kabupaten]);
    }
    public function getKecamatan(Request $request){
        $kecamatan = Kecamatan_model::where("kec_kab",$request->kabID)->pluck('kec_kode','kec_nama');
        return response()->json($kecamatan);
    }
    public function getDesa(Request $request){
        $desa = Desa_model::where("desa_kec",$request->kecID)->pluck('desa_kode','desa_nama');
        return response()->json($desa);
    }
    // edit
    public function edit($id_karangtaruna)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykarangtaruna           = new Karangtaruna_model();
        $karangtaruna             = $mykarangtaruna->detail($id_karangtaruna);
        //$kategori_karangtaruna    = DB::table('kategori_karangtaruna')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit karangtaruna ',
                        'karangtaruna'            => $karangtaruna,
                        //'kategori_karangtaruna'   => $kategori_karangtaruna,
                        'content'           => 'admin/karangtaruna/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama_karangtaruna'  => 'required|unique:karangtaruna',
                            'gambar'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './assets/upload/karangtaruna/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './assets/upload/karangtaruna/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            DB::table('karangtaruna')->insert([
                // 'id_user'               => Session()->get('id_user'),
                // 'id_kategori_karangtaruna'     => $request->id_kategori_karangtaruna,
                'nama_karangtaruna' => $request->nama_karangtaruna,
                'tingkat'           => $request->tingkat,
                'kecamatan'         => $request->kecamatan,
                'desa'              => $request->desa,
                'lokasi'            => $request->lokasi,
                'sk'                => $request->sk,
                'ttd'               => $request->ttd,
                'periode'   		=> $request->periode,
                'gambar'                => $input['nama_file'],
                'isi'   		=> $request->isi

                
            ]);
        }else{
            DB::table('karangtaruna')->insert([
                'nama_karangtaruna' => $request->nama_karangtaruna,
                'tingkat'           => $request->tingkat,
                'kecamatan'         => $request->kecamatan,
                'desa'              => $request->desa,
                'lokasi'            => $request->lokasi,
                'sk'                => $request->sk,
                'ttd'               => $request->ttd,
                'periode'   		=> $request->periode,
                'isi'   		=> $request->isi
                // 'gambar'                => $input['nama_file']
            ]);
        }
        return redirect('admin/karangtaruna')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama_karangtaruna'  => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './assets/upload/karangtaruna/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './assets/upload/karangtaruna/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            DB::table('karangtaruna')->where('id_karangtaruna',$request->id_karangtaruna)->update([
                'nama_karangtaruna' => $request->nama_karangtaruna,
                'tingkat'           => $request->tingkat,
                'kecamatan'         => $request->kecamatan,
                'desa'              => $request->desa,
                'lokasi'            => $request->lokasi,
                'sk'                => $request->sk,
                'ttd'               => $request->ttd,
                'periode'   		=> $request->periode,
                'gambar'                => $input['nama_file'],
                'isi'   		=> $request->isi

            ]);
        }else{
            DB::table('karangtaruna')->where('id_karangtaruna',$request->id_karangtaruna)->update([
                'nama_karangtaruna' => $request->nama_karangtaruna,
                'tingkat'           => $request->tingkat,
                'kecamatan'         => $request->kecamatan,
                'desa'              => $request->desa,
                'lokasi'            => $request->lokasi,
                'sk'                => $request->sk,
                'ttd'               => $request->ttd,
                'periode'   		=> $request->periode,
                'isi'   		=> $request->isi,
                // 'gambar'                => $input['nama_file']
            ]);
        }
        return redirect('admin/karangtaruna')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_karangtaruna)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('karangtaruna')->where('id_karangtaruna',$id_karangtaruna)->delete();
        return redirect('admin/karangtaruna')->with(['sukses' => 'Data telah dihapus']);
    }
}
