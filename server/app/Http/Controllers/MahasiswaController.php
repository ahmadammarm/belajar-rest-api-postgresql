<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa::select('id', 'nama', 'jurusan')->orderBy('id')->get();
        return response()->json([
            'status' => 200,
            'data' => $mahasiswa
        ], Response::HTTP_OK);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|integer',
            'status' => 'required|in:Aktif,Cuti,Lulus',
            'nim' => 'required|string|unique:mahasiswas,nim'
        ]);

        $mahasiswa = Mahasiswa::create($validated);

        return response()->json([
            'status' => 201,
            'data' => $mahasiswa
        ], Response::HTTP_CREATED);
    }


    public function show($id) {
        $mahasiswa = Mahasiswa::find($id);
        return response()->json([
            'status' => 200,
            'data' => $mahasiswa
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id) {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        return response()->json([
            'status' => 200,
            'data' => $mahasiswa
        ], Response::HTTP_OK);
    }

    public function destroy($id) {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return response()->json([
            'status' => 200,
            'data' => $mahasiswa
        ], Response::HTTP_OK);
    }


}
