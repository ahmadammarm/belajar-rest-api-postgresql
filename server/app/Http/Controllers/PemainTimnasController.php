<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PemainTimnas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PemainTimnasController extends Controller
{
    public function index() {
        $pemain = PemainTimnas::all();
        return response()->json([
            'status' => 200,
            'data' => $pemain
        ], Response::HTTP_OK);
    }

    public function store(Request $request) {
        $pemain = PemainTimnas::create($request->all());
        return response()->json([
            'status' => 200,
            'data' => $pemain
        ], Response::HTTP_CREATED);
    }

    public function show($id) {
        $pemain = PemainTimnas::find($id);
        return response()->json([
            'status' => 200,
            'data' => $pemain
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id) {
        $pemain = PemainTimnas::find($id);
        $pemain->update($request->all());
        return response()->json([
            'status' => 200,
            'data' => $pemain
        ], Response::HTTP_OK);
    }

    public function destroy($id) {
        $pemain = PemainTimnas::find($id);
        $pemain->delete();
        return response()->json([
            'status' => 200,
            'data' => $pemain
        ], Response::HTTP_OK);
    }
}
