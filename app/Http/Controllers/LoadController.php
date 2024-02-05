<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\owners;
use App\Models\status;
use App\Models\tmploadcells;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class LoadController extends Controller
{
    //
    // Home Page

    public function showDATAHome()
    {
        $date = Carbon::now()->format('Y-m-d');

        $status = Status::join('owners', 'status.id_senjata', '=', 'owners.id_senjata')
            ->where('status.tanggal', $date)
            ->select('status.*', 'owners.id_pengguna', 'owners.nama_pengguna')
            ->get();

        return view('webpage.home', ['status' => $status]);
    }
    public function LoadStatusHome()
    {
        $loadCells = tmploadcells::all();

        foreach ($loadCells as $dataLoadCell) {
            $statusAbsen = $dataLoadCell->status;
            $idSenjata = $dataLoadCell->id_senjata;

            $mode = ($statusAbsen == 1) ? "Masuk" : "Keluar";

            $jumlah_data = owners::where('id_senjata', $idSenjata)->count();

            if ($jumlah_data > 0 && $statusAbsen !== "") {
                $data_karyawan = owners::where('id_senjata', $idSenjata)->first();
                $nama = $data_karyawan->nama_pengguna;

                $tanggal = now()->format('Y-m-d');
                $jam = now()->format('H:i:s');

                $jumlah_absen = status::where('id_senjata', $idSenjata)->where('tanggal', $tanggal)->count();

                if ($statusAbsen == 0 && $jumlah_absen == 0) {
                    status::create([
                        'id_senjata' => $idSenjata,
                        'tanggal' => $tanggal,
                        'keluar' => $jam,
                    ]);
                } elseif ($statusAbsen == 1 && $jumlah_absen > 0) {
                    status::where('id_senjata', $idSenjata)
                        ->where('tanggal', $tanggal)
                        ->whereNull('durasi')
                        ->update([
                            'masuk' => $jam,
                            'durasi' => DB::raw("TIMEDIFF('$jam', keluar)"),
                        ]);
                }
            }
        }

        $tanggal = now()->format('Y-m-d');
        $statusData = status::select('status.*', 'owners.id_pengguna', 'owners.nama_pengguna')
            ->join('owners', 'status.id_senjata', '=', 'owners.id_senjata')
            ->where('status.tanggal', $tanggal)
            ->get();

        $no = 0;
        $output = "";

        foreach ($statusData as $row) {
            $no++;
            $output .= "<tr>";
            $output .= "<td>" . $no . "</td>";
            $output .= "<td>" . $row->id_senjata . "</td>";
            $output .= "<td>" . $row->id_pengguna . "</td>";
            $output .= "<td>" . $row->nama_pengguna . "</td>";
            $output .= "<td>" . $row->tanggal . "</td>";
            $output .= "<td>" . $row->keluar . "</td>";
            $output .= "<td>" . $row->masuk . "</td>";
            $output .= "</tr>";
        }
        return $output;
    }

    // End of Home Page

    // Access Page
    public function LoadStatusAccess(){
        return view('webpage.access');
    }

    // End of Access Page

    // Weapon Page
    public function showDataWeapon()
    {
        return view('webpage.weapon');
    }

    // End of Weapon Page
}
