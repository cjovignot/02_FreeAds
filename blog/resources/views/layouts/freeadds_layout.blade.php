<html>
<style>
    .navbar {
        display: flex;
        margin: 10px;
    }

    a {
        margin: 10px;
    }
</style>

<head>
    <title>Freeads - @yield('title')</title>
</head>

<body style="margin: auto;">

        <nav style="background-color: #607d8b;z-index: 950; height: 100px; display: flex; justify-content: flex-end; line-height: 64px; position: fixed; top: 0;">
            <div style="display: flex; align-items: center;" class="nav-wrapper">
            <ul class="right hide-on-med-and-down">
                <li><a href="/" class="waves-effect waves-light btn">Home</a></li>
                <li><a href="/login" class="waves-effect waves-light btn">Login</a></li>
                <li><a href="/admin" class="waves-effect waves-light btn">Admin</a></li>
            </ul>
            </div>
        </nav>
        @yield('content')
</body>




</html>