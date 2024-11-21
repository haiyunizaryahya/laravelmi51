<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_perawatan extends Model
{
    use HasFactory;

    protected $fillable = ['laporan_id', 'sarana_id', 'upload_poto', 'keterangan'];

    public function laporanPerawatan()
    {
        return $this->belongsTo(laporan_perawatan::class, 'laporan_id');
        return $this->belongsTo(Sarana::class, 'sarana_id');
        
    }
}
