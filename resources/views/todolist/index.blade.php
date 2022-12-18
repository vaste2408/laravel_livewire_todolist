@extends('template')
@section('content')
    <h1>Todos</h1>
    @foreach($list as $item)
        <p>{{$item->text}}</p>
    @endforeach
@endsection
