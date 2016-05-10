@extends('layouts.loginlayout')

@section('content')

<div class="login-panel">
  <div class="row lgsection">
    <form class="col s12 m8 offset-m2 l6 offset-l3 z-depth-1 #ffffff white" id="loginForm" method="post" action="{{url('/login')}}">
      {{ csrf_field() }}
      <style>
        form .row {
          margin-bottom: 0;
        }
      </style>
      <div class="row">
        <div class="input-field col s12 m12 l10 offset-l1">
          <input id="email" type="email" name="email" value="{{old('email')}}" class="validate" required>
          <label for="email">Email</label>
        </div>
      </div>
      @if ($errors->has('email'))
        <div class="row">
          <div class="Error left-align col s12 m12 l10 offset-l1">
            <strong>{{ $errors->first('email') }}</strong>
          </div>
        </div>
      @endif
      <div class="row" style="margin-bottom: 20px; margin-top: 10px">
        <div class="input-field col s12 m12 l10 offset-l1">
          <input id="password" type="password" name="password" class="validate" required>
          <label for="password">{{trans('login.password')}}</label>
        </div>
      </div>
      <div class="row" style="margin-bottom: 20px; margin-top: 10px">
        <div class="loginButton left-align col s12 m12 l10 offset-l1">      
            <button id="btn1" class="btn waves-effect waves-light" type="submit" name="action">{{trans('login.login')}}</button>
            <a href="{{route('forgot')}}" class="forgot" style="color: #333333 !important">{{trans('login.forgotPassword')}}</a>
        </div>
      </div>
    </form>
  </div>
  <div class="row">
    <div class="col s12 m8 offset-m2 l6 offset-l3 other-button">
      <label class="left-align col s12 m12 l10 offset-l1">{{trans('login.suggestRegister')}} <a href="{{url('register')}}">{{trans('login.register')}}</a></label>
    </div>
  </div>
</div>

@endsection