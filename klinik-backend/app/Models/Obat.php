<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = ['nama_obat', 'jenis', 'dosis', 'stok'];

    public function pasiens()
    {
        return $this->belongsToMany(Pasien::class, 'pasien_obat')
            ->withPivot('jumlah', 'catatan')
            ->withTimestamps();
    }
}

