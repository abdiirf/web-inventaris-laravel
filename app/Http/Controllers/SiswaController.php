<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $siswa = Siswa::latest()->paginate(2);

        //render view with posts
        return view('siswa.index', compact('siswa'));
    }
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
{
    // Validate form
    $this->validate($request, [
        'nama'  => 'required',
        'kelas' => 'required',
    ]);

    // Create siswa
    Siswa::create([
        'nama'  => $request->nama,
        'kelas' => $request->kelas,
    ]);

    // Redirect to index
    return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
}

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
        {
            // Validate form
            $this->validate($request, [
                'nama'  => 'required',
                'kelas' => 'required',
            ]);

            // Update siswa
            $siswa->update([
                'nama'  => $request->nama,
                'kelas' => $request->kelas,
            ]);

            // Redirect to index
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diubah!']);
        }


        public function destroy(Siswa $siswa)
    {

        //delete siswa
        $siswa->delete();

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
