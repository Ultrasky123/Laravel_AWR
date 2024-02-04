<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\owners;
use App\Models\tmprfids;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function index(){
        return view('webpage.access');
    }

    public function edit($id_senjata)
    {
        $owner = owners::where('id_senjata', $id_senjata)->first();
        return view('webpage.forms.edit', ['id_senjata' => $id_senjata])->with('owner', $owner);
    }

    public function update(Request $request, $id_senjata)
    {
        $owner = owners::where('id_senjata', $id_senjata)->first();
        $owner->update($request->only('nokartu', 'nama_pengguna', 'pangkat', 'NRP', 'jabatan', 'kesatuan', 'id_senjata'));

        return redirect()->route('access')->with('success', 'Data Berhasil Diubah');
    }

    public function Delete($id_senjata) {
        // delete data
        $hapus = owners::where('id_senjata', $id_senjata)->delete();

        // if successfully deleted, display deleted message and return to data access
        if($hapus) {
            return redirect('access')->with('status', 'Terhapus');
        } else {
            return redirect('access')->with('status', 'Gagal Terhapus');
        }
    }

    public function showForm()
    {
        dd('masuk kesini');
        $tmprfid = tmprfids::first();
        return view('webpage.forms.tambah', ['nokartu' => $tmprfid->nokartu]);
    }
}
