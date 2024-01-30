<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\owners;
use App\Models\tmploadcells;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LoadController extends Controller
{
    //
    public function load()
    {
        // Mengambil table status dan id_senjata
        $statusAbsen = tmploadcells::pluck('status')->toArray();
        $idSenjata = tmploadcells::pluck('id_senjata')->toArray();

        //   Berikan status 1 = masuk, 0 = keluar
        $mode = '';
        foreach ($statusAbsen as $nilai){
            if($nilai == 1){
                $mode = 'Masuk';
            } else if ($nilai == 0){
                $mode = 'Keluar';
            }
        }
        //   Ngambil data dari table owner
        $cari_karyawan = owners::where('id_senjata', $idSenjata)->get();

    }

    public function processStatus()
    {
        $loadCells = DB::table('tmploadcells')->get();

        foreach ($loadCells as $loadCell) {
            $statusAbsen = $loadCell->status;
            $idSenjata = $loadCell->id_senjata;

            $mode = $statusAbsen == 1 ? "Masuk" : "Keluar";

            $owner = DB::table('owners')->where('id_senjata', $idSenjata)->first();

            if ($owner) {
                $nama = $owner->nama_pengguna;

                $tanggal = Carbon::now()->format('Y-m-d');
                $jam = Carbon::now()->format('H:i:s');

                $status = DB::table('status')->where('id_senjata', $idSenjata)->where('tanggal', $tanggal)->first();

                if ($statusAbsen == 0 && !$status) {
                    DB::table('status')->insert([
                        'id_senjata' => $idSenjata,
                        'tanggal' => $tanggal,
                        'keluar' => $jam
                    ]);
                } else if ($statusAbsen == 1 && $status) {
                    DB::table('status')
                        ->where('id_senjata', $idSenjata)
                        ->where('tanggal', $tanggal)
                        ->whereNull('durasi')
                        ->update([
                            'masuk' => $jam,
                            'durasi' => DB::raw("TIMEDIFF('$jam', keluar)")
                        ]);
                }
            }
        }

        $tanggal = Carbon::now()->format('Y-m-d');
        $statuses = DB::table('status')
            ->join('owners', 'status.id_senjata', '=', 'owners.id_senjata')
            ->where('status.tanggal', $tanggal)
            ->select('status.*', 'owners.id_pengguna', 'owners.nama_pengguna')
            ->get();

        // Pass the $statuses variable to your view to display the data
        // return view('webpage.home', ['statuses' => $statuses]);
    }
}
