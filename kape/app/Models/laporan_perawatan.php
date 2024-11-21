<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_perawatan  extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'user_id', 'lokasi_id'];

    public function details()
    {
        return $this->hasMany(detail_perawatan::class, 'laporan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }


}

