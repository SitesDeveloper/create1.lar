<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Base Laravel Step1 lessons </title>

</head>

<body>
    <div>
    <div>
        <nav>
            <ul>
                <li><a href="{{ route('main.index') }}">Main</a></li>
                <li><a href="{{ route('post.index') }}">Posts</a></li>
                <li><a href="{{ route('about.index') }}">About</a></li>
                <li><a href="{{ route('contacts.index') }}">Contacts</a></li>
            </ul>
        </nav>
    </div>


        @yield('content')
    </div>
</body>

</html>
