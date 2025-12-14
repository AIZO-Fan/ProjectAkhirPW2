<?php
namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        return response()->json(Dokter::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_dokter' => 'required|string',
            'spesialis'   => 'nullable|string',
            'no_telp'     => 'nullable|string',
        ]);

        $dokter = Dokter::create($data);

        return response()->json($dokter, 201);
    }

    public function show(Dokter $dokter)
    {
        return response()->json($dokter);
    }

    public function update(Request $request, Dokter $dokter)
    {
        $dokter->update($request->all());

        return response()->json($dokter);
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
