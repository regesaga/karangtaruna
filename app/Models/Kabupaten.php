<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kabupaten extends Model
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
    
    public function AllData(){
        return DB::table('tbl_kabupaten')->get();
    }

    public function InsertData($data){
        DB::table('tbl_kabupaten')->insert($data);
    }

    public function DetailData($kab_kode)
    {
        return DB::table('tbl_kabupaten')->where('kab_kode', $kab_kode)->first();
    }

    public function UpdateData($kab_kode, $data)
    {
         DB::table('tbl_kabupaten')->where('kab_kode', $kab_kode)->update($data);
    }

    public function DeleteData($kab_kode)
    {
         DB::table('tbl_kabupaten')->where('kab_kode', $kab_kode)->delete();
    }
}
