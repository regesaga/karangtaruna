<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kecamatan_model extends Model
{

	protected $table 		= "tbl_kecamatan";
	protected $primaryKey 	= 'kec_kode';

    // listing
    public function semua()
    {
        $query = DB::table('tbl_kecamatan')
            ->select('tbl_kecamatan.*')
            ->orderBy('tbl_kecamatan.kec_kode','DESC')
            ->get();
        return $query;
    }

 


    public function detail($kec_kode)
    {
        $query = DB::table('tbl_kecamatan')
            ->select('tbl_kecamatan.*')
            ->where('tbl_kecamatan.kec_kode',$kec_kode)
            ->orderBy('kec_kode','DESC')
            ->first();
        return $query;
    }

   
}
