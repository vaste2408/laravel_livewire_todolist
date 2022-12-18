@extends('template')
@section('content')
    <h1>Register</h1>
    <form autocomplete="off" action="{{ route('register') }}" method="post">
        @csrf
        <label> Name:
            <input name="name" />
        </label>
        <label> Password:
            <input type="password" name="password" />
        </label>
        <button>Submit</button>
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </form>
@endsection
