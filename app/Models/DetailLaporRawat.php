<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sarana;

class DetailLaporRawat extends Model
{
    use HasFactory;

    protected $fillable = ['laporan_id', 'sarana_id', 'upload_poto', 'keterangan'];

    // Relasi dengan LaporRawat
    public function laporan()
    {
        return $this->belongsTo(LaporRawat::class, 'laporan_id');
       
    }
    public function sarana()
    {
        return $this->belongsTo(Sarana::class, 'sarana_id');
    }


}
