<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Seleksi as ModelSeleksi;
use Livewire\WithPagination;

class Seleksi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search='';

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $data = ModelSeleksi::query();
        $data = $data->with('pendaftaran.santri');
        if($this->search != ''){
            $data = $data->where('no_seleksi','like','%'.$this->search.'%')->orWhereHas('pendaftaran.santri',function($q){
                $q->where('nama_lengkap','like','%'.$this->search.'%');
            });
        }
        $data = $data->paginate(10);
        $this->emit('Seleksi');
        return view('livewire.seleksi',compact('data'));
    }
}
