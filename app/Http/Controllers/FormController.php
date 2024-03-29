<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\owners;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function showAccessPage(){
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

        return redirect()->route('access', ['locale' => app()->getLocale()])->with('success', 'Data Berhasil Diubah');
    }

    public function Delete($id_senjata) {
        // delete data
        $hapus = owners::where('id_senjata', $id_senjata)->delete();

        // if successfully deleted, display deleted message and return to data access
        if($hapus) {
            return redirect()->route('access', ['locale' => app() -> getLocale()])->with('status', 'Terhapus');
        } else {
            return redirect()->route('access', ['locale' => app() -> getLocale()])->with('status', 'Gagal Terhapus');
        }
    }

    public function store(Request $request, $locale)
    {
        app()->setLocale($locale);

        $owner = new owners;
        $owner->nokartu = $request->nokartu;
        $owner->id_senjata = $request->id_senjata;
        $owner->id_pengguna = $request->id_pengguna;
        $owner->nama_pengguna = $request->nama_pengguna;
        $owner->pangkat = $request->pangkat;
        $owner->NRP = $request->NRP;
        $owner->jabatan = $request->jabatan;
        $owner->kesatuan = $request->kesatuan;
        $owner->save();

        return redirect()->route('access', ['locale' => $locale]);
    }
}
