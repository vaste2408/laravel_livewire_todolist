<div class="todolist">
    <h1>Todos</h1>
    {{json_encode($lifecycle)}}
    <br/>
    <input wire:model.lazy="search" type="text" placeholder="Type to search" />
    @forelse ($list as $item)
        <livewire:todoitemcomponent :item="$item"  wire:key="item-{{$item->id}}"/>
    @empty
        <p>No items yet</p>
    @endforelse
    <livewire:create-todoitem />
</div>
