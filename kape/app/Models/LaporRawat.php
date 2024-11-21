<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporRawat extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'lokasi_id', 'user_id'];

    // Relasi dengan DetailLaporRawat
    public function details()
    {
        return $this->hasMany(DetailLaporRawat::class, 'laporan_id');
    } 
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    



    
    

}
