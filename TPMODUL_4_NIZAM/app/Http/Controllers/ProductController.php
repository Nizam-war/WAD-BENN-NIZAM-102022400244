<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // 1. Import model Product
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // 2. tampilkan daftar semua produk dari tabel product menggunakan compact
    public function index()
    {
        $products = Product::all(); // ambil semua data produk
        return view('admin.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */

    // 3. tampilkan form untuk menambah produk baru
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // 4. simpan produk baru ke dalam tabel products
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $productData = $request->only('name', 'description', 'price');

        // upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        // simpan lewat relasi user -> products
        Auth::user()->products()->create($productData);

        session()->flash('success', 'Produk berhasil dibuat!');
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */

    // 5. Ambil data produk berdasarkan id dan tampilkan di halaman detail produk
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    // 6. Tampilkan form edit produk berdasarkan id
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */

    // 7. Simpan perubahan data produk berdasarkan id
    public function update(Request $request, string $id)
    {
        // Cari produk berdasarkan id
        $product = Product::findOrFail($id);

        // Validasi
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $productData = $request->only('name', 'description', 'price');

        // handle upload baru
        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        $product->update($productData);

        session()->flash('success', 'Produk berhasil diperbarui!');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    // 8. Hapus produk berdasarkan id
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // hapus gambar dari storage
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        session()->flash('success', 'Produk berhasil dihapus!');
        return redirect()->route('admin.index');
    }
}
