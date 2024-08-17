<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>EEC - Task</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <header class="d-flex gap-5 p-3 shadow-xl align-items-center">
            <h2><a href="/" class="text-black text-decoration-none">EEC - Task</a></h2>
            <form class="flex-grow-1 d-none d-md-flex gap-2 align-items-center justify-content-space-around" action="/products/search">
                <input id="q" type="text" class="form-control d-block" required name="q" />
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <nav class="ms-auto">
                <ul class="list-unstyled d-flex gap-3 m-0">
                    <li><a href="/products">Products</a></li>
                    <li><a href="/pharmacies">Pharmacies</a></li>
                </ul>
            </nav>
        </header>
        <main class="container">
            @yield('content')
        </main>
    </body>
</html>