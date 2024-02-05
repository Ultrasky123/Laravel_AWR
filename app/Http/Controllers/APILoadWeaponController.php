<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APILoadWeaponController extends Controller
{
    //
    public function index(){
        $data = DB::table('tmploadcells')->get();

        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => $data,
        ]);
    }
}
