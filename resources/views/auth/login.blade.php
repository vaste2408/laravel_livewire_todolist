@extends('template')
@section('content')
    <h1>Log in</h1>
    <form autocomplete="off" action="{{ route('auth') }}" method="post">
        @csrf
        <label> Name:
            <input name="name" value="123" />
        </label>
        <label> Password:
            <input type="password" name="password" value="123" />
        </label>
        <button>Submit</button>
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </form>
@endsection
