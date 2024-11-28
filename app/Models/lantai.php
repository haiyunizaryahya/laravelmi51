<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lantai extends Model
{
    use HasFactory;
    protected $table = 'lantais'; //nama tabel
    protected $fillable = ['nama_lantai'];    
    
public function lokasis()
    {
        return $this->hasMany(Lokasi::class);
    }


    
}

