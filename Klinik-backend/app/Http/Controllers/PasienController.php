<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Menampilkan semua pasien
     */
    public function index()
    {
        return response()->json(Pasien::all());
    }

    /**
     * Menambah pasien baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:50',
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'nama_dokter' => 'required|string|max:255',
            'diagnosa' => 'required|string|max:255',
            'tanggal_pemeriksaan' => 'required|date',
            'gol_darah' => 'required|string|max:5',
            'jaminan' => 'required|string|max:50',
            'alamat' => 'required|string',
        ]);

        $pasien = Pasien::create(attributes: $validated);

        return response()->json([
            'message' => 'Data pasien berhasil ditambahkan',
            'data' => $pasien
        ], 201);
    }

    /**
     * Menampilkan pasien berdasarkan ID
     */
    public function show($id)
    {
        $pasien = Pasien::find($id);

        if (!$pasien) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($pasien);
    }

    /**
     * Mengupdate data pasien
     */
    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);

        if (!$pasien) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'no_rm' => 'string|max:50',
            'nama' => 'string|max:255',
            'nik' => 'string|max:20',
            'tanggal_lahir' => 'date',
            'jenis_kelamin' => 'string',
            'nama_dokter' => 'string|max:255',
            'diagnosa' => 'string|max:255',
            'tanggal_pemeriksaan' => 'date',
            'gol_darah' => 'string|max:5',
            'jaminan' => 'string|max:50',
            'alamat' => 'string',
        ]);

        $pasien->update($validated);

        return response()->json([
            'message' => 'Data pasien berhasil diperbarui',
            'data' => $pasien
        ]);
    }

    /**
     * Menghapus pasien
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);

        if (!$pasien) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $pasien->delete();

        return response()->json(['message' => 'Data pasien berhasil dihapus']);
    }
}
