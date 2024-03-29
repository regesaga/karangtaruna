<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class WebModel extends Model
{
    public function DataKecamatan(){
        return DB::table('tbl_kecamatan')->get();
    }

    public function DataKabupaten(){
        return DB::table('tbl_kabupaten')->get();
    }

    public function DataDesa(){
        return DB::table('tbl_desa')->get();
    }
  
}
