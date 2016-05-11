<!DOCTYPE html>
<html>
<head>
	@include('layouts.head')
	<script src="{{url('/js/angular-1.5.2/angular.js')}}"></script>
    <link href="{{url('/materialize/css/materialize.css')}}" rel="stylesheet" media="screen,projection">
    <script src="{{url('/js/jquery-2.2.2.js')}}"></script>
    <script src="{{url('/materialize/js/materialize.js')}}"></script>
    <link href="{{url('/css/main.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{url('/css/currency.css')}}">
</head>
<body>
	<div class="title">
		{{trans('currency.title')}}
	</div>
	<div class="container">
		<form class="" method="post" action="{{url('/currency')}}">
			{{ csrf_field() }}
			<div class="comment">
				{{Auth::user()->name.trans('currency.comment')}}
			</div>
			<div class="valign-wrapper select-sex">
				<img src="{{url('/icon/68.png')}}">
				<div class="switch">
				    <label>
				      {{trans('currency.male')}}
				      <input type="checkbox" name="sex">
				      <span class="lever"></span>
				      {{trans('currency.female')}}
				    </label>
				</div>
				<img src="{{url('/icon/67.png')}}">
			</div>
			<div class="comment">
				{{trans('currency.currency')}}
			</div>
			<div class="currency_select valign-wrapper">
				<div class="currency">
					<img src="{{url('/icon/currency/Vietnam Dong.png')}}">
					<input class="with-gap" name="currency" value="vnd" type="radio" id="vnd" checked />
	    			<label for="vnd">{{trans('currency.vndN')}}</label>
				</div>
				<div class="currency">
					<img src="{{url('/icon/currency/British Pound.png')}}">
					<input class="with-gap" name="currency" value="pound" type="radio" id="pound"/>
	    			<label for="pound">{{trans('currency.poundN')}}</label>
				</div>
				<div class="currency">
					<img src="{{url('/icon/currency/US Dollar.png')}}">
					<input class="with-gap" name="currency" value="dollar" type="radio" id="dollar"/>
	    			<label for="dollar">{{trans('currency.dollarN')}}</label>
				</div>
				<div class="currency">
					<img src="{{url('/icon/currency/Euro.png')}}">
					<input class="with-gap" name="currency" value="euro" type="radio" id="euro"/>
	    			<label for="euro">{{trans('currency.euroN')}}</label>
				</div>
				<div class="currency">
					<img src="{{url('/icon/currency/Japanese Yen.png')}}">
					<input class="with-gap" name="currency" value="yen" type="radio" id="yen"/>
	    			<label for="yen">{{trans('currency.yenN')}}</label>
				</div>
			</div>
			<div class="center-align">
				<button id="btn1" class="btn waves-effect waves-light" type="submit" name="action">		{{trans('currency.complete')}}
				</button>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
    		$('select').material_select();
  		});
	</script>
</body>
</html>