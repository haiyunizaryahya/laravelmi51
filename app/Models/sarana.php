<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sarana extends Model
{
    use HasFactory;

    // protected $table = 'saranas'; //nama tabel
    protected $fillable = ['nama_sarana','kategori'];
    public function sarana() {
        return $this->belongsTo(sarana::class, 'sarana_id','id');
   }
   


}
