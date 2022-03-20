<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Desa extends Model
{   
    use HasFactory;
    protected $table = 'tbl_desa';
    protected $fillable = [
        'desa_nama',
        'desa_kec'
    ];
    protected $primaryKey = 'desa_kode';
    public $incrementing = false;
    protected $keyType = 'string';
    
    public function AllData(){
        return DB::table('tbl_desa')->get();
    }

    public function InsertData($data){
        DB::table('tbl_desa')->insert($data);
    }

    public function DetailData($desa_kode)
    {
        return DB::table('tbl_desa')->where('desa_kode', $desa_kode)->first();
    }

    public function UpdateData($desa_kode, $data)
    {
         DB::table('tbl_desa')->where('desa_kode', $desa_kode)->update($data);
    }

    public function DeleteData($desa_kode)
    {
         DB::table('tbl_desa')->where('desa_kode', $desa_kode)->delete();
    }
}
