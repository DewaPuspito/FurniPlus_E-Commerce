<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PencarianModel;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

class PencarianController extends Controller
{
    public function index(){
        return PencarianModel::all();
        // try {
        //     $response = Http::get('http://127.0.0.1:8000/api/databarang/');
        //     $data = $response->json();
        //     return response()->json($data);
        // } catch (RequestException $e) {
        //     return response()->json(['status' => '500', 'message' => "Bad Request"], Response::HTTP_BAD_REQUEST);
        // } catch (\Exception $e) {
        //     return response()->json(['status' => '500', 'message' => "Intrnal Service Error"], Response::HTTP_INTERNAL_SERVER_ERROR);
        // }
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


    public function fetchDataFromAPI()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', 'http://127.0.0.1:8000/api/data-barang/');
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                $body = json_decode($response->getBody()->getContents(), true);
                $value = $body['data_barang'];
                $urutan = 0;
                foreach ($value as $v) {
                    PencarianModel::updateOrCreate([
                        'id_barang' => $value[$urutan]['id_barang']
                    ], [
                        'id_barang' => $value[$urutan]['id_barang'],
                        'nama_barang' => $value[$urutan]['nama_barang'],
                        'foto_barang' => $value[$urutan]['foto_barang'],
                        'deskripsi_barang' => $value[$urutan]['deskripsi_barang'],
                        'stok_barang' => $value[$urutan]['stok_barang'],
                        'harga_barang' => $value[$urutan]['harga_barang'],
                    ]);
                    $urutan += 1;
                }
                return response()->json([
                    'code' => '200',
                    'message' => 'success',
                ]);
            } else {
                return response()->json([
                    'code' => $statusCode,
                    'message' => 'Request failed',
                ]);
            }
        } catch (RequestException $e) {
            // Handle request exception
            return response()->json([
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json([
                'code' => 500,
                'message' => 'Internal Server Error',
            ]);
        }
    }
}
