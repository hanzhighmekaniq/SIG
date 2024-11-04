<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataKategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    public function index()
    {
        $showDataKategori = DataKategori::all();
        return view('admin.Kategori', ['DataKategori' => $showDataKategori]);
    }

    public function create() {}

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'detail_kategori' => 'required'
        ]);

        try {
            DataKategori::create([
                'nama_kategori' => $request->nama_kategori,
                'detail_kategori' => $request->detail_kategori
            ]);

            return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Ditambahkan']);
        } catch (\Exception $e) {
            // $e->getMessage()])
            return redirect()->route('kategori.index')->with(['error' => 'Data Sudah Ada']);
        }
    }



    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);


        try {
            // Temukan kategori berdasarkan ID
            $kategori = DataKategori::findOrFail($id);
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->detail_kategori = $request->detail_kategori;

            // Simpan perubahan
            $kategori->save();
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('kategori.index')->with(['error' => 'Data Sudah Ada']);
        }
    }






    public function destroy($id)
    {
        // Temukan kategori berdasarkan ID
        $kategori = DataKategori::findOrFail($id);

        // Hapus kategori
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }


    public function show($id) {}
}
