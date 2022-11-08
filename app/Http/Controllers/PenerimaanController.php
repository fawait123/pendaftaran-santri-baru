<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PenerimaanController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::with('santri')->where('user_id',auth()->user()->id)->first();
        return view('pages.penerimaan.index',compact('pendaftaran'));
    }
}
