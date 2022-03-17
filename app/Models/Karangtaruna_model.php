<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Karangtaruna_model extends Model
{

	protected $table 		= "karangtaruna";
	protected $primaryKey 	= 'id_karangtaruna';

    // listing
    public function semua()
    {
        $query = DB::table('karangtaruna')
            ->select('karangtaruna.*')
            ->orderBy('karangtaruna.id_karangtaruna','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('karangtaruna')
            ->select('karangtaruna.*')
            ->where('karangtaruna.nama_karangtaruna', 'LIKE', "%{$keywords}%") 
            ->orWhere('karangtaruna.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_karangtaruna','DESC')
            ->get();
        return $query;
    }

    // // listing
    // public function listing()
    // {
    // 	$query = DB::table('karangtaruna')
    //         ->select('karangtaruna.*')
    //         ->orderBy('id_karangtaruna','DESC')
    //         ->get();
    //     return $query;
    // }

    // // kategori
    // public function kategori_karangtaruna($id_kategori_karangtaruna)
    // {
    //     $query = DB::table('karangtaruna')
    //         ->join('kategori_karangtaruna', 'kategori_karangtaruna.id_kategori_karangtaruna', '=', 'karangtaruna.id_kategori_karangtaruna','LEFT')
    //         ->select('karangtaruna.*', 'kategori_karangtaruna.slug_kategori_karangtaruna', 'kategori_karangtaruna.nama_kategori_karangtaruna')
    //         ->where(array(  'karangtaruna.status_karangtaruna'         => 'Publish',
    //                         'karangtaruna.id_kategori_karangtaruna'    => $id_kategori_karangtaruna))
    //         ->orderBy('id_karangtaruna','DESC')
    //         ->get();
    //     return $query;
    // }

    // // Kategori
    // public function kategori()
    // {
    //      $query = DB::table('karangtaruna')
    //         ->join('kategori_karangtaruna', 'kategori_karangtaruna.id_kategori_karangtaruna', '=', 'karangtaruna.id_kategori_karangtaruna')
    //         ->select('karangtaruna.*', 'kategori_karangtaruna.slug_kategori_karangtaruna', 'kategori_karangtaruna.nama_kategori_karangtaruna')
    //         ->where(array(  'karangtaruna.status_karangtaruna'         => 'Publish'))
    //         ->groupBy('karangtaruna.id_kategori_karangtaruna')
    //         ->orderBy('kategori_karangtaruna.urutan','ASC')
    //         ->get();
    //     return $query;
    // }

    // // kategori
    // public function all_kategori_karangtaruna($id_kategori_karangtaruna)
    // {
    //     $query = DB::table('karangtaruna')
    //         ->join('kategori_karangtaruna', 'kategori_karangtaruna.id_kategori_karangtaruna', '=', 'karangtaruna.id_kategori_karangtaruna','LEFT')
    //         ->select('karangtaruna.*', 'kategori_karangtaruna.slug_kategori_karangtaruna', 'kategori_karangtaruna.nama_kategori_karangtaruna')
    //         ->where(array(  'karangtaruna.id_kategori_karangtaruna'    => $id_kategori_karangtaruna))
    //         ->orderBy('id_karangtaruna','DESC')
    //         ->get();
    //     return $query;
    // }

    // // kategori
    // public function status_karangtaruna($status_karangtaruna)
    // {
    //     $query = DB::table('karangtaruna')
    //         ->join('kategori_karangtaruna', 'kategori_karangtaruna.id_kategori_karangtaruna', '=', 'karangtaruna.id_kategori_karangtaruna','LEFT')
    //         ->select('karangtaruna.*', 'kategori_karangtaruna.slug_kategori_karangtaruna', 'kategori_karangtaruna.nama_kategori_karangtaruna')
    //         ->where(array(  'karangtaruna.status_karangtaruna'         => $status_karangtaruna))
    //         ->orderBy('id_karangtaruna','DESC')
    //         ->get();
    //     return $query;
    // }

    // // kategori
    public function detail_kategori_karangtaruna($id_kategori_karangtaruna)
    {
        $query = DB::table('karangtaruna')
            ->select('karangtaruna.*')
            
            ->first();
        return $query;
    }

    // // kategori
    // public function detail_slug_kategori_karangtaruna($slug_kategori_karangtaruna)
    // {
    //     $query = DB::table('karangtaruna')
    //         ->join('kategori_karangtaruna', 'kategori_karangtaruna.id_kategori_karangtaruna', '=', 'karangtaruna.id_kategori_karangtaruna','LEFT')
    //         ->select('karangtaruna.*', 'kategori_karangtaruna.slug_kategori_karangtaruna', 'kategori_karangtaruna.nama_kategori_karangtaruna')
    //         ->where(array(  'karangtaruna.status_karangtaruna'                  => 'Publish',
    //                         'kategori_karangtaruna.slug_kategori_karangtaruna'  => $slug_kategori_karangtaruna))
    //         ->orderBy('id_karangtaruna','DESC')
    //         ->first();
    //     return $query;
    // }


    // // kategori
    // public function slug_kategori_karangtaruna($slug_kategori_karangtaruna)
    // {
    //     $query = DB::table('karangtaruna')
    //         ->join('kategori_karangtaruna', 'kategori_karangtaruna.id_kategori_karangtaruna', '=', 'karangtaruna.id_kategori_karangtaruna','LEFT')
    //         ->select('karangtaruna.*', 'kategori_karangtaruna.slug_kategori_karangtaruna', 'kategori_karangtaruna.nama_kategori_karangtaruna')
    //         ->where(array(  'karangtaruna.status_karangtaruna'                  => 'Publish',
    //                         'kategori_karangtaruna.slug_kategori_karangtaruna'  => $slug_kategori_karangtaruna))
    //         ->orderBy('id_karangtaruna','DESC')
    //         ->get();
    //     return $query;
    // }

    // detail
    // public function read($slug_karangtaruna)
    // {
    //     $query = DB::table('karangtaruna')
    //         ->join('kategori_karangtaruna', 'kategori_karangtaruna.id_kategori_karangtaruna', '=', 'karangtaruna.id_kategori_karangtaruna','LEFT')
    //         ->select('karangtaruna.*', 'kategori_karangtaruna.slug_kategori_karangtaruna', 'kategori_karangtaruna.nama_kategori_karangtaruna')
    //         ->where('karangtaruna.slug_karangtaruna',$slug_karangtaruna)
    //         ->orderBy('id_karangtaruna','DESC')
    //         ->first();
    //     return $query;
    // }

     // detail
    public function detail($id_karangtaruna)
    {
        $query = DB::table('karangtaruna')
            ->select('karangtaruna.*')
            ->where('karangtaruna.id_karangtaruna',$id_karangtaruna)
            ->orderBy('id_karangtaruna','DESC')
            ->first();
        return $query;
    }

    // Gambar
    public function gambar($id_karangtaruna)
    {
        $query = DB::table('gambar_karangtaruna')
            ->select('*')
            ->where('gambar_karangtaruna.id_karangtaruna',$id_karangtaruna)
            ->orderBy('id_karangtaruna','DESC')
            ->get();
        return $query;
    }
}
