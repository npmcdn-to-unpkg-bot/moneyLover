<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
    <script src="{{url('/js/angular-1.5.2/angular.js')}}"></script>
    <link href="{{url('/materialize/css/materialize.css')}}" rel="stylesheet" media="screen,projection">
    <script src="{{url('/js/jquery-2.2.2.js')}}"></script>
    <script src="{{url('/materialize/js/materialize.js')}}"></script>
    <link href="{{url('/css/login.css')}}" rel="stylesheet">
    <link href="{{url('/css/main.css')}}" rel="stylesheet">
</head>
<body ng-app="loginApp" ng-controller="loginController" class="" spellcheck="false">
    <div class="nav-header col s12 m12 l12 center-align red lighten-2" >
        <div class="row">
            <div class="logoSection">
                <a href="{{url('/')}}"><img class="responsive-img" src="{{url('/images/logo.png')}}" alt="Logo"></a>
                <div class="name-slogan">
                    <h1 class="appName"> Money lover</h1>
                    <label class="slogan"> {{trans('login.slogan')}}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="loginSection">
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>