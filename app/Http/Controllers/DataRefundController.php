<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataRefund;


class DataRefundController extends Controller
{
    /**
     * Menampilkan semua data refund.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataRefund = DataRefund::all();
        return response()->json(['response' => $dataRefund]);
    }

    /**
     * Menyimpan data refund baru.
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
            'alasan_refund' => 'required',
        ]);

        $dataRefund = DataRefund::create($request->all());
        return response()->json($dataRefund, 201);
    }

    /**
     * Menampilkan data refund berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataRefund = DataRefund::find($id);
        if (!$dataRefund) {
            return response()->json(['message' => 'Data refund tidak ditemukan'], 404);
        }
        return response()->json($dataRefund);
    }

    /**
     * Mengupdate data refund berdasarkan ID.
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
            'alasan_refund' => 'required',
        ]);

        $dataRefund = DataRefund::find($id);
        if (!$dataRefund) {
            return response()->json(['message' => 'Data refund tidak ditemukan'], 404);
        }

        $dataRefund->update($request->all());
        return response()->json($dataRefund);
    }

    /**
     * Menghapus data refund berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataRefund = DataRefund::find($id);
        if (!$dataRefund) {
            return response()->json(['message' => 'Data refund tidak ditemukan'], 404);
        }

        $dataRefund->delete();
        return response()->json(['message' => 'Data refund berhasil dihapus']);
    }
}
