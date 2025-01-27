<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PemainTimnas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PemainTimnasController extends Controller
{
    public function index() {
        $pemain = PemainTimnas::select('id', 'nama', 'klub')->get();
        return response()->json([
            "error" => false,
            "message" => "Success",
            "status" => 200,
            "data" => $pemain
        ], Response::HTTP_OK);
    }

    public function store(Request $request) {
        $pemain = PemainTimnas::create($request->all());
        return response()->json([
            "error" => false,
            "message" => "Pemain created",
            "status" => 201,
            "data" => $pemain
        ], Response::HTTP_CREATED);
    }
}
