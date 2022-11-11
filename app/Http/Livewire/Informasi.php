<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Informasi as ModelInformasi;
use Livewire\WithPagination;


class Informasi extends Component
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
        $data = ModelInformasi::query();
        if($this->search != ''){
            $data = $data->where('title','like','%'.$this->search.'%')->orWhere('description','like','%'.$this->search.'%');
        }
        $data = $data->paginate(10);
        $informasi = ModelInformasi::orderBy('step','asc')->get();
        $this->emit('Informasi');
        return view('livewire.informasi',compact('data','informasi'));
    }
}
