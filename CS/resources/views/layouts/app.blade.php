<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ChirpySCRUM') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <ul id="navbar-user-dropdown" class="dropdown-content">
        <li>
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"
            >
                Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
    <nav class="row">
        <div class="nav-wrapper col m12">
            <a href="{{ url('/') }}" class="brand-logo">{{ config('app.name', 'ChirpySCRUM') }}</a>
            <ul class="right hide-on-med-and-down">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <!-- Dropdown Trigger -->
                    <li>
                        <a class="dropdown-button" href="#" data-hover="true" data-beloworigin="true" data-activates="navbar-user-dropdown">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
