<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifkasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'notifikasi';
    protected $primaryKey = 'id_notifikasi';

}
