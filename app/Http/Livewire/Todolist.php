<?php

namespace App\Http\Livewire;

use App\Models\Todoitem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Todolist extends Component
{
    protected $listeners = ['refreshList'];
    protected function getData()
    {
        return Todoitem::where(['user_id' => Auth::id()])->where('text', 'LIKE', "%{$this->search}%")->get();
    }

    public $search = "";
    public $list = [];

    public function render()
    {
        return view('livewire.todolist');
    }

    public function deleteItem($id)
    {
        Todoitem::where('id', $id)->delete();
        $this->refreshList();
    }

    public function refreshList()
    {
        $this->fill(['list' => $this->getData()]); //instead of $this->>list = ... it produces no visual noise
    }

    public function mount()
    {
        $this->refreshList();
    }

    public function updated()
    {
        $this->refreshList();
    }
}
