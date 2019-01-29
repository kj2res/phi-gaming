<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Cruds</title>
        <style>
            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>
