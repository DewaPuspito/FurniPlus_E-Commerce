<?php

namespace App\Http\Controllers;

use App\Models\KeranjangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class KeranjangController extends Controller
{

    public function index()
{
    try {
        $keranjang = KeranjangModel::all();

        return response()->json([
            'code' => 200,
            'message' => 'success',
            'keranjang' => $keranjang
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'code' => 500,
            'message' => 'Internal Server Error',
        ]);
    }
}

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_keranjang' => 'required',
            'nama_barang' => 'required',
            'foto_barang' => 'required',
            'deskripsi_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'code' => 400,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
    
        try {
            $keranjang = KeranjangModel::create([
                'id_keranjang' => $request->id_keranjang,
                'nama_barang' => $request->nama_barang,
                'foto_barang' => $request->foto_barang,
                'deskripsi_barang' => $request->deskripsi_barang,
                'jumlah_barang' => $request->jumlah_barang,
                'harga' => $request->harga,
            ]);
    
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'data' => $keranjang
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'Internal Server Error',
            ]);
        }
    }

    public function showbyid($id_keranjang)
    {
        try {
            $keranjang = KeranjangModel::findOrFail($id_keranjang);
            return response()->json($keranjang);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function update(Request $request, $id_keranjang)
    {
        try {
            $keranjang = KeranjangModel::findOrFail($id_keranjang);

            $validatedData = $request->validate([
                'id_keranjang' => 'required',
                'nama_barang' => 'required',
                'foto_barang' => 'required',
                'deskripsi_barang' => 'required',
                'jumlah_barang' => 'required',
                'harga' => 'required',
            ]);

            $keranjang->id_keranjang = $validatedData['id_keranjang'];
            $keranjang->nama_barang = $validatedData['nama_barang'];
            $keranjag->foto_barang = $validatedData['foto_barang'];
            $keranjang->deskripsi_barang = $validatedData['deskripsi_barang'];
            $keranjang->jumlah_barang = $validatedData['jumlah_barang'];
            $keranjang->harga = $validatedData['harga'];

            $keranjang->save();

            return response()->json([
                'keranjang' => $keranjang
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Internal Server Error',
            ], 500);
        }
    }

}














