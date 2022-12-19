<div>
    <h1>Todos</h1>
    <input wire:model="search" type="text" placeholder="Type to search" />
    @forelse ($list as $item)
        <p wire:key="item-{{ $item->id }}">
            {{$item->text}}
            <button wire:click="deleteItem({{$item->id}})">Del</button>
        </p>
    @empty
        <p>No items yet</p>
    @endforelse
    <livewire:create-todoitem />
</div>
