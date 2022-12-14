<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';



    public function santri()
    {
        return $this->belongsTo(Santri::class,'santri_id');
    }

    public function seleksi()
    {
        return $this->hasMany(Seleksi::class,'pendaftaran_id');
    }
}
