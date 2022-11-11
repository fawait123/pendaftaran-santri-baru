<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;


class InformasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $informasi = Informasi::orderBy('step','asc')->get();
        return view('pages.informasi.index',compact('informasi'));
    }
}
