<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="/resources/css/main.css" rel="stylesheet" type="text/css" >
    {{--<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">--}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<div class="header">
    <div class="header-top">
        <div class="logo container"><h2><span>Thieme</span> Relaunch Marketingseite</h2></div>
    </div>
    <div class="header-bottom container">
        <div class="row">
            <ul class="navigation col-md-6 col-sm-6 col-xs-12">
                {{--<li class="">--}}
                    {{--<a href=""> Übersicht </a>--}}
                {{--</li>--}}
                {{--<li class="play">--}}
                    {{--<a href=""> Abspielen </a>--}}
                {{--</li>--}}
                {{--<li class="feedback active">--}}
                    {{--<a href=""> Feedback </a>--}}
                {{--</li>--}}
                <li><a href="{{ url('/click-dummy') }}">Click-Dummy</a></li>
                <li><a href="{{ url('/click-dummy/create') }}">Click-Dummy create</a></li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/editusers/'.Auth::user()->id) }}"><i class="fa fa-btn fa-sign-out"></i>Edit Profile</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            {{--<div class="filter col-md-6 col-sm-6 col-xs-12">--}}
                {{--<span>Filter:</span>--}}
                {{--<select class="form-control">--}}
                    {{--<option>freigebene Screens anzeigen</option>--}}
                    {{--<option>Facharztfragen</option>--}}
                    {{--<option>Markieren</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
{{--<nav class="navbar navbar-default">--}}
        {{--<div class="container">--}}
            {{--<div class="navbar-header">--}}

                {{--<!-- Collapsed Hamburger -->--}}
                {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
                    {{--<span class="sr-only">Toggle Navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}

                {{--<!-- Branding Image -->--}}
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--Laravel--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                {{--<!-- Left Side Of Navbar -->--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<li><a href="{{ url('/click-dummy') }}">Click-Dummy</a></li>--}}
                    {{--<li><a href="{{ url('/click-dummy/create') }}">Click-Dummy create</a></li>--}}
                {{--</ul>--}}

                {{--<!-- Right Side Of Navbar -->--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<!-- Authentication Links -->--}}
                    {{--@if (Auth::guest())--}}
                        {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                        {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                    {{--@else--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                            {{--</a>--}}

                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li><a href="{{ url('/editusers/'.Auth::user()->id) }}"><i class="fa fa-btn fa-sign-out"></i>Edit Profile</a></li>--}}
                                {{--<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</nav>--}}

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/resources/js/main.js"></script>
    {{--<script src="/resources/js/dropzone-config.js"></script>--}}
    {{--<script src="/resources/dropzone/dropzone.js"></script>--}}
    {{--<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>--}}

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
