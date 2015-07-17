<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUI CMS</title>

    <link href="/css/app.css" rel="stylesheet">

    <!-- Fonts -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    {!! Rapyd::head() !!}
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin/pages">TUI CMS</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/admin/pages">Pages</a></li>
                </ul>

<!--                 <ul class="nav navbar-nav navbar-right">
                    @if (!Auth::guest())
                        <li><a href="/admin/dashboard" style="margin-right: 20px;">Home</a></li>
                    @else
                        <li><a href="//www.hometitlelock.com/" style="margin-right: 20px;">Home</a></li>
                    @endif

                    @if (Auth::guest())
                        <li><a href="/login">Login</a></li>
                    @else
                        <li><img class="img-circle" src="/avatar/{{Auth::user()->id}}" style="margin-top: 8px; width: 30px; height: 30px;"></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/admin/users/edit/{{Auth::user()->id}}">Account Settings</a></li>
                                <li><a target="_blank" href="//www.hometitlelock.com/">Visit Main Site</a></li>
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                        </li>
                        <li><a href="/admin/users/edit/{{Auth::user()->id}}"><img src="/images/icons/gear_ico.png" style="margin-top: -10px;" border="0"></a></li>
                    @endif
                </ul>
 -->            </div>
        </div>
    </nav>
    @include('errors.header')
    @yield('content')
</body>
</html>
