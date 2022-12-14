<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'santri';
    protected $primaryKey = 'id_santri';



    public function jenjang()
    {
        return $this->belongsTo(Pendidikan::class,'jenjang_pendidikan_id');
    }
}
