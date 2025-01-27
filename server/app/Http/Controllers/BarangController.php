<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BarangController extends Controller
{
    public function index() {
        $barang = Barang::select('id', 'nama', 'harga', 'kategori')->orderBy('id')->get();
        return response()->json([
            'status' => 200,
            'data' => $barang
        ], Response::HTTP_OK);;
    }

    public function store(Request $request) {
        $barang = Barang::create($request->all());
        return response()->json([
            'status' => 200,
            'data' => $barang
        ], Response::HTTP_CREATED);
    }

    public function show($id) {
        $barang = Barang::find($id);
        return response()->json([
            'status' => 200,
            'data' => $barang
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id) {
        $barang = Barang::find($id);
        $barang->update($request->all());
        return response()->json([
            'status' => 200,
            'data' => $barang
        ], Response::HTTP_OK);
    }

    public function destroy($id) {
        $barang = Barang::find($id);
        $barang->delete();
        return response()->json([
            'status' => 200,
            'data' => $barang
        ], Response::HTTP_OK);
    }
}
