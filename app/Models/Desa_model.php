<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Desa_model extends Model
{

	protected $table 		= "tbl_desa";
	protected $primaryKey 	= 'desa_kode';

    // listing
    public function semua()
    {
        $query = DB::table('tbl_desa')
            ->select('tbl_desa.*')
            ->orderBy('tbl_desa.desa_kode','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('tbl_desa')
            ->select('tbl_desa.*')
            ->where('tbl_desa.desa_nama', 'LIKE', "%{$keywords}%") 
            ->orderBy('kab_kod','DESC')
            ->get();
        return $query;
    }

    
   
}
