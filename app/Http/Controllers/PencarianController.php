<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class PencarianController extends Controller
{
    public function index (){
        $response = Http::get('http://127.0.0.1:8000/api/data-barang');
        $data= $response->json();
        return response()->json($data);
        // return view('index', compact('data'));
    }
}
