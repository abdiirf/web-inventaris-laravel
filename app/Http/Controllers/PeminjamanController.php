<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\Barang;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('siswa', 'barang')->latest()->paginate(2);
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $barangs = Barang::all();
        return view('peminjaman.create', compact('siswas', 'barangs'));
    }

        public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_barang' => 'required',
            'id_barang' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        Peminjaman::create([
            'id_siswa'  => $request->id_siswa,
            'id_barang' => $request->id_barang,
            'id_barang' => $request->id_barang,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $siswas = Siswa::all();
        $barangs = Barang::all();
        return view('peminjaman.edit', compact('peminjaman', 'siswas', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_barang' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
