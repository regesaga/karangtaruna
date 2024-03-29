<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabupaten_model extends Model
{

    use HasFactory;
    protected $table = 'tbl_kabupaten';
    protected $fillable = [
        'kab_nama',
        'kab_prov'
    ];
    protected $primaryKey = 'kab_kode';
    public $incrementing = false;
    protected $keyType = 'string';

    // listing
    public function semua()
    {
        $query = DB::table('tbl_kabupaten')
            ->select('tbl_kabupaten.*')
            ->orderBy('tbl_kabupaten.kab_kode','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('tbl_kabupaten')
            ->select('tbl_kabupaten.*')
            ->where('tbl_kabupaten.kab_nama', 'LIKE', "%{$keywords}%") 
            ->orderBy('kab_kod','DESC')
            ->get();
        return $query;
    }

    
   
}
