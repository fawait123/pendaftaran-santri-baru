<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'seleksi';
    protected $primaryKey = 'id_seleksi';



    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class,'pendaftaran_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailSeleksi::class,'seleksi_id');
    }
}
