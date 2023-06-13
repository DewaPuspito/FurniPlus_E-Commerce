<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPesanan;

class DataPesananController extends Controller
{
    /**
     * Menampilkan semua data pesanan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPesanan = DataPesanan::all();
        return response()->json([
            'message' => '200 = Ok',
            'response' => $dataPesanan
        ]);
    }

    /**
     * Menyimpan data pesanan baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_user' => 'required',
            'nama_pengguna' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jumlah_pesanan' => 'required|integer',
            'total_harga' => 'required|integer',
            'status' => 'required',
            'resi' => 'required',
        ]);

        $dataPesanan = DataPesanan::create($request->all());
        return response()->json($dataPesanan, 201);
    }

    /**
     * Menampilkan data pesanan berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataPesanan = DataPesanan::find($id);
        if (!$dataPesanan) {
            return response()->json(['message' => 'Data pesanan tidak ditemukan'], 404);
        }
        return response()->json($dataPesanan);
    }

    /**
     * Mengupdate data pesanan berdasarkan ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_user' => 'required',
            'nama_pengguna' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jumlah_pesanan' => 'required|integer',
            'total_harga' => 'required|integer',
            'status' => 'required',
            'resi' => 'required',
        ]);

        $dataPesanan = DataPesanan::find($id);
        if (!$dataPesanan) {
            return response()->json(['message' => 'Data pesanan tidak ditemukan'], 404);
        }

        $dataPesanan->update($request->all());
        return response()->json($dataPesanan);
    }

    /**
     * Menghapus data pesanan berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataPesanan = DataPesanan::find($id);
        if (!$dataPesanan) {
            return response()->json(['message' => 'Data pesanan tidak ditemukan'], 404);
        }

        $dataPesanan->delete();
        return response()->json(['message' => 'Data pesanan berhasil dihapus']);
    }
}
