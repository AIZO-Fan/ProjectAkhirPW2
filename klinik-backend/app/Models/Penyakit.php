<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakits';

    protected $fillable = [
        'nama_penyakit',
        'deskripsi',
    ];

    /**
     * Relasi: 1 Penyakit dimiliki banyak Pasien
     */
    public function pasiens()
    {
        return $this->hasMany(Pasien::class);
    }
}
