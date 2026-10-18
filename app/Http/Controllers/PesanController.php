<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    // Simpan pesan dari pengunjung
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'pesan' => 'required|string|max:5000',
        ]);

        Pesan::create($data);

        return redirect()
            ->route('kontak')
            ->with('success', 'Pesan berhasil dikirim. Terima kasih!');
    }

    // Tampilkan pesan di admin
    public function index()
    {
        $pesans = Pesan::latest()->paginate(10);

        return view('admin.kontak', compact('pesans'));
    }

    // Hapus pesan
    public function destroy(Pesan $pesan)
    {
        $pesan->delete();

        return redirect()
            ->route('admin.kontak')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
