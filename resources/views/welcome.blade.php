<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel/vue</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="antialiased">
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <router-link class="nav-link" to="/">Home</router-link>
                    </li>
                    <li class="nav-item active">
                      <router-link class="nav-link" to="/tasks">Tasks</router-link>
                    </li>
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/add-task">Add Task</router-link>
                      </li>
                </div>
            </nav>
              <router-view />
        </div>
     <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
