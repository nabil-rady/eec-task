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
        <nav class="d-flex p-3 shadow-xl">
            <h2><a href="/" class="text-black text-decoration-none">EEC - Task</a></h2>
        </nav>
        <main class="mb-5 flex-grow-1 flex-column d-flex justify-content-center align-items-center">
            <h2>Search for products</h2>
            <form action="/products/search">
                <input id="q" type="text" class="w-100" required name="q" />
                <button class="d-block mx-auto mt-2 btn btn-primary" type="submit">Search</button>
            </form>
        </main>
    </body>
</html>