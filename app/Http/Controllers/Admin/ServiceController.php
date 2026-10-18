<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // Menampilkan semua layanan
    public function index()
    {
        $services = Service::latest()->get();

        return view('admin.layanan', compact('services'));
    }

    // Menampilkan form tambah layanan
    public function create()
    {
        return view('admin.layanan-tambah');
    }

    // Menyimpan layanan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Simpan foto ke storage/app/public/layanan
        $validated['foto'] = $request->file('foto')
            ->store('layanan', 'public');

        // Simpan hanya data layanan yang divalidasi
        Service::create($validated);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan!');
    }

    // Menampilkan form edit layanan
    public function edit(Service $service)
    {
        return view('admin.layanan-edit', compact('service'));
    }

    // Memperbarui layanan
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Jika foto baru diunggah
        if ($request->hasFile('foto')) {
            $fotoBaru = $request->file('foto')
                ->store('layanan', 'public');

            // Hapus foto lama setelah foto baru berhasil disimpan
            if ($service->foto) {
                Storage::disk('public')->delete($service->foto);
            }

            $validated['foto'] = $fotoBaru;
        }

        $service->update($validated);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui!');
    }

    // Menghapus layanan
    public function destroy(Service $service)
    {
        if ($service->foto) {
            Storage::disk('public')->delete($service->foto);
        }

        $service->delete();

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus!');
    }
}
