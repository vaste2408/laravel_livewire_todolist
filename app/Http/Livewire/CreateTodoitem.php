<?php

namespace App\Http\Livewire;

use App\Models\Todoitem;
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
        Todoitem::create(
            array_merge($this->validate(), ['user_id' => Auth::id()])
        );
        $this->clearInput();
        $this->emitTo('todolist', 'refreshList');
    }
}
