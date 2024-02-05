<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APILoadHomeController extends Controller
{
    //
    public function index(){
        $dataowners = DB::table('owners')->get();
        $datastatus = DB::table('status')->get();

        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => [$dataowners, $datastatus]
        ]);
    }

    public function show(){
        $data = DB::table('owners')
        ->join('status', 'owners.id_senjata', '=', 'status.id_senjata')
        ->select('owners.id_senjata', 'owners.id_pengguna', 'owners.nama_pengguna', 'status.tanggal', 'status.keluar', 'status.masuk') // Menampilkan semua kolom dari kedua tabel
        ->get();

    return response()->json([
        'code' => 200,
        'message' => 'success',
        'data' => $data
    ]);
    }
}
