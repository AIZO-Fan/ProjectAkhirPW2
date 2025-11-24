<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pasien extends Model
{
    protected $fillable = [
        'no_rm',
        'nama',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_dokter',
        'diagnosa',
        'tanggal_pemeriksaan',
        'gol_darah',
        'jaminan',
        'alamat',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_pemeriksaan' => 'date',
    ];

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTanggalPemeriksaanAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
