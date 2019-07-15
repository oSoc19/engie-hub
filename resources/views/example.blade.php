<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="https://assets.design.digital.engie.com/brand/favicon.ico">
        <title>Engie Hub</title>
        <!-- ENGIE core CSS -->
        <link href="https://assets.design.digital.engie.com/library/latest/css/nj-components.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <link href="https://assets.design.digital.engie.com/library/latest/css/nj-components.min.css" rel="stylesheet">
        <link href="cover.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <body>
    <div id="app">
    </div>
    
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
        <script src="https://assets.design.digital.engie.com/library/latest/js/nj-components.min.js"></script>
    </body>
</html>
