<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BarangCart;

class CartController extends Controller
{
    public function index()
    {
        $barangCart = BarangCart::all();
        return view('barang', compact('keranjang'));
    }
  
    public function tambahCart()
    {
        return view('cart');
    }
    public function addBarangtoCart($id)
    {
        $barang = BarangCart::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                  "id_barang" => $barang->id_barang,
                  "nama_barang" => $barang->nama_barang,
                  "foto_barang" => $barang->foto_barang,
                  "deskripsi_barang" => $barang->deskripsi_barang,
                  "jumlah" => 1,
                  "harga_barang" => $barang->harga_barang,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Berhasil menambahkan produk ke keranjang');
    }
    
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Berhasil menambahkan ke keranjang');
        }
    }
  
    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success', 'Berhasil menghapus produk dari keranjang.');
        }
    }
}