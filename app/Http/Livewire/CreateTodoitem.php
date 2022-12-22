<?php

namespace App\Http\Livewire;

use App\Services\CreateTodoitemService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateTodoitem extends Component
{
    public $text;

    protected $rules = [
        'text' => 'required|string',
    ];

    protected function clearInput()
    {
        $this->text = "";
    }

    public function render()
    {
        return view('livewire.create-todoitem');
    }

    public function save()
    {
        $this->validate();
        CreateTodoitemService::create($this->text, Auth::id());
        $this->clearInput();
        $this->emitTo('todolist', 'refreshList');
    }
}
