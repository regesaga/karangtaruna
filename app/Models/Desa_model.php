<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desa_model extends Model

{
    

	protected $table 		= "tbl_desa";
	protected $primaryKey 	= 'desa_kode';
    protected $fillable = [
        'desa_nama',
        'desa_kec'
    ];
    public $incrementing = false;
    protected $keyType = 'string';

    // listing
    public function semua()
    {
        $query = DB::table('tbl_desa')
            ->select('tbl_desa.*')
            ->orderBy('tbl_desa.desa_kode','DESC')
            ->get();
        return $query;
    }

 


    public function detail($desa_kode)
    {
        $query = DB::table('tbl_desa')
            ->select('tbl_desa.*')
            ->where('tbl_desa.desa_kode',$desa_kode)
            ->orderBy('desa_kode','DESC')
            ->first();
        return $query;
    }

   
}
