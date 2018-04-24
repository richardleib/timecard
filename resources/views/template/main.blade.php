<!doctype html>
<html>
    <head>
        {{-- Meta tags --}}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}" />
        <meta name="X-Requested-With" content="XMLHttpRequest" />

        {{-- Assets --}}
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

        {{-- TODO: Title --}}
    </head>

    <body>
        @yield('content')
    </body>
</html>