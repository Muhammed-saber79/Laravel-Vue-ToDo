<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200&family=Noto+Sans+Arabic:wght@500&family=Noto+Serif:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body>
        <div id="app">
            <app />
        </div>
    </body>
</html>
