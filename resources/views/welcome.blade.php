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
    <body class="vh-100 d-flex flex-column">
        <header class="d-flex p-3 shadow-xl">
            <h2><a href="/" class="text-black text-decoration-none">EEC - Task</a></h2>
            <nav class="ms-auto">
                <ul class="list-unstyled d-flex gap-3">
                    <li><a href="/products">Products</a></li>
                    <li><a href="/pharmacies">Pharmacies</a></li>
                </ul>
            </nav>
        </header>
        <main class="mb-5 flex-grow-1">
            <div class="h-100 container d-flex flex-column justify-content-center align-items-center">
                <h2>Search for products</h2>
                <form class="w-100" action="/products/search">
                    <input id="q" type="text" class="mt-3 w-75 form-control d-block mx-auto" required name="q" />
                    <button class="d-block mx-auto mt-3 btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </main>
    </body>
</html>