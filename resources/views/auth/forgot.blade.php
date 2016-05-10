@extends('layouts.loginlayout')

@section('content')

<div class="login-panel">
  <div class="row lgsection">
    <form class="col s12 m8 offset-m2 l6 offset-l3 z-depth-1 #ffffff white" id="loginForm" method="post" action="{{url('/forgot-password')}}">
      {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12 m12 l10 offset-l1">
          <input id="email" type="email" name="email" class="validate" required>
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="loginButton left-align col s12 m12 l10 offset-l1">      
            <button id="btn1" class="btn waves-effect waves-light" type="submit" name="action">{{trans('login.sendEmail')}}</button>
        </div>
      </div>
    </form>
  </div>
  <div class="row">
    <div class="col s12 m8 offset-m2 l6 offset-l3 other-button">
      <label class="left-align col s12 m12 l10 offset-l1">{{trans('login.suggestLogin')}}<a href="{{url('login')}}">{{trans('login.login')}}</a> </label>
    </div>
  </div>
</div>

@endsection