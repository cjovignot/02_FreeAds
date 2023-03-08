<!doctype html>
<html>

<head>
    <title>@yield('title')</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>

<body>

    <!-- navigation bar -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">

                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/todo/active">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/todo/done">Login</a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
    <!-- navigation bar ends here -->


    @yield('content')




</body>

</html>