<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $fillable = ['kategori','nama_lokasi','lantai_id'];

    public function lantai() {
        return $this->belongsTo(Lantai::class);
    
        // return $this->belongsTo(lantai::class, 'lantai_id','id');
    }
    
    
}
