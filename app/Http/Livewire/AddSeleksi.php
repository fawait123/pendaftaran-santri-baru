<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pendaftaran;
use App\Models\Seleksi;

class AddSeleksi extends Component
{
    public $isShow = false;
    public $tahun= '';
    public $kategori_seleksi = '';
    public $id_seleksi = '';

    protected $queryString = ['isShow','tahun','kategori_seleksi','id_seleksi'];
    public function render()
    {
        if($this->tahun != '' && $this->kategori_seleksi != ''){
            $this->isShow = true;
        }
        if($this->id_seleksi != ''){
            $pendaftaran = Seleksi::with(['pendaftaran.santri','detail'])->where('id_seleksi',$this->id_seleksi)->get();
        }else{
            $pendaftaran = Pendaftaran::with('santri')->where('thn_daftar',$this->tahun)->with('santri')->get();
        }
        $isShow = $this->isShow;
        $kategori_seleksi = $this->kategori_seleksi;
        $id_seleksi = $this->id_seleksi;
        return view('livewire.add-seleksi',compact('pendaftaran','isShow','kategori_seleksi','id_seleksi'));
    }
}
