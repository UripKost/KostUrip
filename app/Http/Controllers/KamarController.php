<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{

    public function user()
    {
        $kamars = Kamar::all();
        return view('pages.user.index', compact('kamars'));
    }

    public function index()
    {
        $dtkamar = Kamar::all();
        return view('pages.admin.kamar.index', compact('dtkamar'));
    }

    public function tambah()
    {
        return view('pages.admin.kamar.tambah');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|max:2048',
            'tipe' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            // 'gambar' => 'required|image',
            // 'tipe' => 'required|string|max:255',
            // 'harga' => 'required|numeric',
            // 'deskripsi' => 'required|string',
        ]);

        // Simpan data ke database
        $kamar = new Kamar();
        $kamar->gambar = $request->file('gambar')->store('gambar_kamar', 'public');
        $kamar->tipe = $validatedData['tipe'];
        $kamar->harga = $validatedData['harga'];
        $kamar->deskripsi = $validatedData['deskripsi'];
        $kamar->save();

        // Redirect atau response
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil disimpan.');
    }

    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('pages.admin.kamar.edit', compact('kamar'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'tipe' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $kamar = Kamar::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_kamar', 'public');
            $kamar->gambar = $gambarPath;
        }

        $kamar->tipe = $request->tipe;
        $kamar->harga = $request->harga;
        $kamar->deskripsi = $request->deskripsi;

        $kamar->save();

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus!');
    }
}
