<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kecamatan extends Model
{   
    use HasFactory;
    protected $table = 'tbl_kecamatan';
    protected $fillable = [
        'kec_nama',
        'kec_kab'
    ];
    protected $primaryKey = 'kec_kode';
    public $incrementing = false;
    protected $keyType = 'string';
    
    public function AllData(){
        return DB::table('tbl_kecamatan')->get();
    }

    public function InsertData($data){
        DB::table('tbl_kecamatan')->insert($data);
    }

    public function DetailData($kec_kode)
    {
        return DB::table('tbl_kecamatan')->where('kec_kode', $kec_kode)->first();
    }

    public function UpdateData($kec_kode, $data)
    {
         DB::table('tbl_kecamatan')->where('kec_kode', $kec_kode)->update($data);
    }

    public function DeleteData($kec_kode)
    {
         DB::table('tbl_kecamatan')->where('kec_kode', $kec_kode)->delete();
    }
}
