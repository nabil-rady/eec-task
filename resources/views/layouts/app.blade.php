<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>EEC - Task</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    </head>
    <body>
        <nav class="flex p-3 shadow-xl">
            <h2><a href="/" class="text-black text-decoration-none">EEC - Task</a></h2>
        </nav>
        <main class="container">
            @yield('content')
        </main>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>