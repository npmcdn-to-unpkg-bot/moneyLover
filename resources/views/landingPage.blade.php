@extends('layouts.loginlayout')

@section('content')

<style>

body {
  background-color: #E57373 !important;
}

.home-button {
  color: #fff;
  font-weight: bold;
}

.home-button:hover {
  border: 1pt solid;
}

</style>

<div class="row center-align">
  <a class="btn-flat home-button" href="{{url('login')}}">Login</a>
  <a class="btn-flat home-button" href="{{url('register')}}">Register</a>
  <a class="btn-flat home-button" href="{{url('register')}}">Guide</a>
</div>

@endsection