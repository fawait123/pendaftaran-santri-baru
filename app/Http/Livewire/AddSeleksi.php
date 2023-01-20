<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pendaftaran;

class AddSeleksi extends Component
{
    public $isShow = false;
    public $tahun= '';
    public $kategori_seleksi = '';

    protected $queryString = ['isShow','tahun','kategori_seleksi'];
    public function render()
    {
        if($this->tahun != '' && $this->kategori_seleksi != ''){
            $this->isShow = true;
        }
        $isShow = $this->isShow;
        $kategori_seleksi = $this->kategori_seleksi;
        $pendaftaran = Pendaftaran::with('santri')->where('thn_daftar',$this->tahun)->with('santri')->get();
        return view('livewire.add-seleksi',compact('pendaftaran','isShow','kategori_seleksi'));
    }
}
