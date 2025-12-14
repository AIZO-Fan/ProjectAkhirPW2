<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'no_rm', 'nama', 'nik', 'tanggal_lahir', 'jenis_kelamin',
        'dokter_id', 'penyakit_id', 'tanggal_pemeriksaan',
        'gol_darah', 'jaminan', 'alamat'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'pasien_obat')
            ->withPivot('jumlah', 'catatan')
            ->withTimestamps();
    }
}
