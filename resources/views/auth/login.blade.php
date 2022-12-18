<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel todolist</title>
    </head>
    <body>
        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <h1>Log in</h1>
            <form autocomplete="off" action="{{ route('auth') }}" method="post">
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
        </div>
    </body>
</html>
