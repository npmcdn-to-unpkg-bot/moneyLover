<!DOCTYPE html>
<html>
<head>
	@include('layouts.head')
	<link rel="stylesheet" type="text/css" href="{{url('/MetroUI/css/metro.css')}}">
	<link href="{{url('/MetroUI/css/metro-icons.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{url('/MetroUI/css/metro-responsive.css')}}">
	<link href="{{url('/MetroUI/css/metro-schemes.css')}}" rel="stylesheet">
	<link href="{{url('/MetroUI/css/docs.css')}}" rel="stylesheet">
	<link href="{{url('/css/main.css')}}" rel="stylesheet">
	<link href="{{url('/css/app.css')}}" rel="stylesheet">
	<link href="{{url('/css/categories.css')}}" rel="stylesheet">
	<script type="text/javascript" src="{{url('/MetroUI/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{url('/MetroUI/js/metro.js')}}"></script>
	<script type="text/javascript" src="{{url('/MetroUI/js/docs.js')}}"></script>
	<script type="text/javascript" src="{{url('/js/moment.js')}}"></script>
	<script type="text/javascript" src="{{url('/MetroUI/js/select2.min.js')}}"></script>
</head>
<body spellcheck="false" ng-app="app">
	<?php 
		$currency = 'currency.'.Auth::user()->currency;
		$name = Auth::user()->name;
		$sex = Auth::user()->sex;
		if ($sex == 2) $avatar = url('/icon/User-Female.png');
		else $avatar = url('/icon/User-Male.png');
	?>
	<script type="text/javascript">
		$(function(){
            var tiles = $(".tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super, .list, .transactionListThisMonth, .icon");
            $.each(tiles, function(){
                var tile = $(this);
                setTimeout(function(){
                    tile.css({
                        opacity: 1,
                        "-webkit-transform": "scale(1)",
                        "transform": "scale(1)",
                        "-webkit-transition": ".3s",
                        "transition": ".3s"
                    });
                }, Math.floor(Math.random()*500));
            });

            $(".tile-group").animate({
                left: 0
            });
        });
	</script>
	<div class="app">
		<div class="row">
		    <div class="app-bar">
		    	<div class="bar-logo">
				    <a class="notHover logo" href="{{url('/')}}"> 
				    	<img class="logo-img" src="{{url('/images/logo.png')}}">
				    	<span class="logo-name"> Money Lover </span>
				    </a>
				</div>
		    	<ul class="app-bar-menu">
		    		<li class="app-element">
		    			<a href="" class="dropdown-toggle notHover place-right">Xin chào, {{$name}} </a>
			    		<ul class="d-menu place-right" data-role="dropdown">
			    			<li>
				    			<a href="{{route('user.index')}}">
						    		<span class="mif-user"></span>
						    		<span class="menu-button">Tài khoản</span>
						    	</a>
						    </li>
						    <li>
				    			<a href="{{url('/logout')}}">
						    		<span class="mif-switch"></span>
						    		<span class="menu-button">Đăng xuất</span>
						    	</a>
						    </li>
	                    </ul>
	              	</li>
		    	</ul>
		    </div>
	    </div>
	    <div class="flex-grid">
	    	<div class="row">
			    <div class="cell colspan2 menu-bar">
			    	<ul class="v-menu subdown">
					    <li>
					    	<a href="{{url('/wallets')}}" class="{{$state[0]}}">
					    		<img src="{{url('/icon/12.png')}}">
					    		<span class="menu-button">Sổ giao dịch</span>
					    	</a>
					    </li>
					    <li>
					    	<a href="{{route('bill.index')}}" class="{{$state[1]}}">
					    		<img src="{{url('/icon/53.png')}}">
					    		<span class="menu-button">Hóa đơn</span>
					    	</a>
					    </li>
					    <li>
					    	<a href="#" class="{{$state[2]}}">
					    		<img src="{{url('/icon/14.png')}}">
					    		<span class="menu-button">Thống kê</span>
					    	</a>
					    </li>
					    <li>
					    	<a href="{{url('/categories')}}" class="{{$state[3]}}">
					    		<img src="{{url('/icon/19.png')}}">
					    		<span class="menu-button">Nhóm</span>
					    	</a>
					    </li>
					    <li>
					    	<a href="{{route('user.index')}}" class="{{$state[4]}}">
					    		<img src="{{url('/icon/63.png')}}">
					    		<span class="menu-button">Cài đặt</span>
					    	</a>
					    </li>
			    	</ul>
			    </div>
			    <div class="cell colspan7 app-content" style="height: 100%">
					@yield('content')
				</div>
				<div class="cell colspan3" style="position: relative;">
					<div class="app-notify">
						<div class="notify-title row" style="align-items: center;"> 
							<span class="mif-alarm-on"> </span>
							 Nhắc nhở 
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="row"></div>
		</div>
	</div>
</body>
</html>