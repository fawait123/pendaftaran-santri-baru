<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Pengguna extends Component
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
        $data = User::query();
        if($this->search != ''){
            $data = $data->where('nama_lengkap','like','%'.$this->search.'%')->where('username','like','%'.$this->search.'%');
        }
        $data = $data->paginate(10);
        $this->emit('Pengguna');
        return view('livewire.pengguna',compact('data'));
    }
}
