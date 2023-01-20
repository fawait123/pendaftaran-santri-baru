<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSeleksi extends Model
{
    use HasFactory;

    protected $table = 'detail_seleksi';

    protected $guarded = ['id'];
}
