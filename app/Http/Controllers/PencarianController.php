<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class PencarianController extends Controller
{
    public function index(){
        try {
            $response = Http::get('http://127.0.0.1:8000/api/data-barang/');
            $data = $response->json();
            return response()->json($data);
        } catch (RequestException $e) {
            return response()->json(['status' => '500', 'message' => "Bad Request"], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'message' => "Intrnal Service Error"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id_barang){
        try {
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
        } catch (RequestException $e) {
            return response()->json(['status' => '500', 'message' => "Bad Request"], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'message' => "Internal Service Error"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
