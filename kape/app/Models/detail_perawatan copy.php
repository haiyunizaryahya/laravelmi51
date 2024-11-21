<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_perawatan extends Model
{
    use HasFactory;
    public function laporan_perawatans() {
        return $this->belongsTo(laporan_perawatan::class, 'laporan_id','id');
        

    }

}
