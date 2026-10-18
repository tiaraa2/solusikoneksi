<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();

        return view('admin.artikel', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikel-tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi'     => 'required|string',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('judul', 'tanggal', 'isi');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                                    ->store('artikel', 'public');
        }

        Artikel::create($data);

        return redirect()->route('admin.artikel')
                        ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Artikel $artikel)
    {
        return view('admin.artikel-edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('judul', 'isi');

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()->route('admin.artikel')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}