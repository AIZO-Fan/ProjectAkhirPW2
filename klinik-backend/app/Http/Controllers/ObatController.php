<?php
namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        return response()->json(Obat::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_obat' => 'required|string',
            'jenis'     => 'nullable|string',
            'dosis'     => 'nullable|string',
            'stok'      => 'integer|min:0'
        ]);

        return Obat::create($data);
    }

    public function show(Obat $obat)
    {
        return response()->json($obat);
    }

    public function update(Request $request, Obat $obat)
    {
        $obat->update($request->all());
        return response()->json($obat);
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
