<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Ambil semua produk
     * 
     * Menampilkan daftar semua produk elektronik
     */
    // GET /products
    public function index()
    {
        $products = Product::all();
        
        return response()->json([
            'status' => true,
            'data' => $products
        ]);
    }

    /**
     * Ambil satu produk berdasarkan ID
     * 
     * Menampilkan detail satu produk berdasarkan ID
     */
    // GET /products/{id}
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }

    /**
     * Membuat Produk Baru
     * 
     * Menambahkan produk baru ke database
     */
    // POST /products
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric'
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Product berhasil ditambahkan',
            'data' => $product
        ]);
    }

    /**
     * Perbarui Produk Berdasarkan ID
     * 
     * Mengupdate data produk berdasarkan ID
     */
    // PUT /products/{id}
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric'
        ]);

        $product->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Product berhasil diupdate',
            'data' => $product
        ]);
    }

    /**
     * Hapus Produk Berdasarkan ID
     * 
     * Menghapus produk berdasarkan ID
     */
    // DELETE /products/{id}
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product berhasil dihapus'
        ]);
    }
}
