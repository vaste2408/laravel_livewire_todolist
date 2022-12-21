<div class="todoitem">
    <input type="checkbox" wire:click="switchComplete()" @if ($item->complete) checked @endif />
    <span>
        @if ($editMode)
            <input type="text" wire:model.lazy="text"/>
        @else
            {{$item->text}}
        @endif
        (added: {{$item->created_at}})
    </span>
    <div class="button-group">
        @if ($editMode)
            <button wire:click="editItem()">Done</button>
            <button wire:click="cancelEdit()">Cancel</button>
        @else
            <button wire:click="onEditMode()">Edit</button>
        @endif
        <button wire:click="deleteItem()">Del</button>
    </div>
    @error('text') <span class="error">{{ $message }}</span> @enderror
</div>
