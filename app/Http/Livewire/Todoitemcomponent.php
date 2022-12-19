<?php

namespace App\Http\Livewire;

use App\Models\Todoitem;
use Livewire\Component;

class Todoitemcomponent extends Component
{
    public Todoitem $item;
    public string $text = '';
    public bool $editMode = false;

    protected $rules = [
        'text' => 'required|string',
    ];

    protected function flush()
    {
        $this->fill(['text' => $this->item->text]);
    }

    public function mount()
    {
        $this->flush();
    }

    public function render()
    {
        return view('livewire.todoitemcomponent');
    }

    public function deleteItem()
    {
        $this->item->delete();
        $this->emitTo('todolist', 'refreshList');
    }

    public function switchComplete()
    {
        $this->item->switchComplete();
    }

    public function editItem()
    {
        $this->validate();
        $this->item->changeText($this->text);
        $this->offEditMode();
    }

    public function cancelEdit()
    {
        $this->flush();
        $this->offEditMode();
    }

    public function onEditMode()
    {
        $this->editMode = true;
    }

    public function offEditMode()
    {
        $this->editMode = false;
    }
}
