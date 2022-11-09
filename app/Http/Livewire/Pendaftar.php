<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pendaftaran;
use Livewire\WithPagination;

class Pendaftar extends Component
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
        $data = Pendaftaran::query();
        $data = $data->with('santri');
        if($this->search != ''){
            $data = $data->where('no_daftar','like','%'.$this->search.'%')->orWhereHas('santri',function($q){
                $q->where('nama_lengkap','like','%'.$this->search.'%');
            });
        }
        $data = $data->paginate(10);
        $this->emit('Pendaftar');
        return view('livewire.pendaftar',compact('data'));
    }
}
