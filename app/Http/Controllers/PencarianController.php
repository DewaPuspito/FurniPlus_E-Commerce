<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class PencarianController extends Controller
{
    public function index(){
        $response = Http::get('http://127.0.0.1:8000/api/data-barang/');
        $data= $response->json();
        return response()->json($data);
    }

    public function show($id_barang){
        $response = Http::get('http://127.0.0.1:8000/api/data-barang/'.$id_barang);
        $data= $response->json();
        if($data) {
            return response()->json($data);
        }
        else {
            return response()->json([
                'status' => 404,  
                'message'=> 'Data Barang Not Found'
            ]);
        }
    }

}
