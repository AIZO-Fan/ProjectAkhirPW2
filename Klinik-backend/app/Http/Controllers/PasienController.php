<?php
namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        return Pasien::with(['dokter', 'penyakit', 'obats'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'no_rm'              => 'required|unique:pasiens',
            'nama'               => 'required|string',
            'nik'                => 'required|string|max:16',
            'tanggal_lahir'      => 'required|date',
            'jenis_kelamin'      => 'required',
            'dokter_id'          => 'required|exists:dokters,id',
            'penyakit_id'        => 'nullable|exists:penyakits,id',
            'tanggal_pemeriksaan'=> 'required|date',
            'gol_darah'          => 'nullable',
            'jaminan'            => 'nullable',
            'alamat'             => 'required|string',
            'obats'              => 'array', // [id1, id2, ...]
        ]);

        $pasien = Pasien::create($data);

        if ($request->obats) {
            $pasien->obats()->attach($request->obats);
        }

        return $pasien->load(['dokter', 'penyakit', 'obats']);
    }

    public function show(Pasien $pasien)
    {
        return $pasien->load(['dokter', 'penyakit', 'obats']);
    }

    public function update(Request $request, Pasien $pasien)
    {
        $pasien->update($request->all());

        if ($request->obats) {
            $pasien->obats()->sync($request->obats);
        }

        return $pasien->load(['dokter', 'penyakit', 'obats']);
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
