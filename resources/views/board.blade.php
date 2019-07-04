<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test Laravel - Sami Balouki</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
            crossorigin="anonymous">
        {{csrf_field()}}
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">Idéal Groupe - Test de développement</span>
            <span class="navbar-text">
            Sami Balouki
            </span>
        </nav>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Plateau de jeu
                </div>
                <div id="app">
                    <game></game>
                </div>
            </div>
        </div>
    </body>
    <!-- JavaScripts -->
    <script src="{{URL::asset('js/board.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
</html>
