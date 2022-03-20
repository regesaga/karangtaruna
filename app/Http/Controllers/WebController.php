<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;

class WebController extends Controller
{
    public function __construct(){
        $this->WebModel = new WebModel();
    }
        public function index()
        {
            $data = ['title' => 'Pemetaan',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'kabupaten' => $this->WebModel->DataKabupaten(),
            'desa' => $this->WebModel->DataDesa(),
        ];
            return view('v_web', $data);
        }
   
}
 