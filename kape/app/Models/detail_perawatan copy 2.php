<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPerawatan extends Model
{
    use HasFactory;

    protected $fillable = ['laporan_id', 'sarana_id', 'keterangan', 'upload_foto'];

    // Relasi ke model LaporanPerawatan (one-to-many)
    public function laporanPerawatan()
    {
        return $this->belongsTo(LaporanPerawatan::class, 'laporan_id', 'id');
    }

    // Relasi ke model Sarana
    public function sarana()
    {
        return $this->belongsTo(Sarana::class, 'sarana_id', 'id');
    }
}
