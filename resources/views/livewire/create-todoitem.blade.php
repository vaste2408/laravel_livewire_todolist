<div class="todoitem-create">
    <form wire:submit.prevent="save">
        <input type="text" wire:model.lazy="text" placeholder="Type to create new item">
        <button type="submit">Add</button>
        @error('text') <span class="error">{{ $message }}</span> @enderror
    </form>
</div>
