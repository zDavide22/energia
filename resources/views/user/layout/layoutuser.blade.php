<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="icon" href="{{ asset('/images/logo/energia/logo_small_icon_only_inverted.png') }}">
        <title>Energy+</title>
    </head>
    <body x-data="{ showModal1: false, showModal2: false}" :class="{'overflow-y-hidden': showModal1 || showModal2}">
        @include('user.layout.navuser')
        
        <main>
            {{ $slot }}
        </main>

        @include('footer')
        <script src="{{ asset('js/app.js') }}" defer></script>

    </body>
</html>
