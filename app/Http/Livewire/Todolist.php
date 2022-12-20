<?php

namespace App\Http\Livewire;

use App\Models\Todoitem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Todolist extends Component
{
    protected $listeners = ['refreshList'];
    public $lifecycle = [];

    protected function getData()
    {
        return Todoitem::where(['user_id' => Auth::id()])->where('text', 'LIKE', "%{$this->search}%")->get();
    }

    protected function clearData()
    {
        $this->list = [];
    }

    public $search = "";
    public $list = [];

    public function render()
    {
        $this->lifecycle[] = 'render->';
        return view('livewire.todolist');
    }

    public function refreshList()
    {
        $this->clearData();
        $this->fill(['list' => $this->getData()]); //instead of $this->>list = ... it produces no visual noise
    }

    public function mount()
    {
        $this->lifecycle[] = 'mount->';
        $this->refreshList();
    }

    public function updated()
    {
        $this->lifecycle[] = 'updated->';
        $this->refreshList();
    }

    public function boot()
    {
        $this->lifecycle[] = 'boot->';
    }

    public function booted()
    {
        $this->lifecycle[] = 'booted->';
    }

    public function hydrate()
    {
        $this->lifecycle[] = 'hydrate->';
    }

    public function dehydrate()
    {
        $this->lifecycle = [];
        $this->lifecycle[] = 'dehydrate->';
    }

    public function updating()
    {
        $this->lifecycle[] = 'updating->';
    }
}
