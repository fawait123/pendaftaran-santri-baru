<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pendaftaran;

class AddSeleksi extends Component
{
    public $isShow = false;
    public $tahun= '';
    public function render()
    {
        if($this->tahun != ''){
            $this->isShow = true;
        }
        $isShow = $this->isShow;
        $pendaftaran = Pendaftaran::with('santri')->where('thn_daftar',$this->tahun)->with('santri')->get();
        return view('livewire.add-seleksi',compact('pendaftaran','isShow'));
    }
}
