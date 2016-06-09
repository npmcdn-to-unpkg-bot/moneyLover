@extends('layouts.app')

<?php
	$state = array("", "", "", "", "actived");
	$name = Auth::user()->name;
?>

<link rel="stylesheet" type="text/css" href="{{url('css/user.css')}}">

@section('content')
	<div class="main-content">
		<div class="flex-grid">
			<div class="row">
				<div class="left-model cell colspan2">
					<img src="{{url('/icon/other/femaleModel.svg')}}">
				</div>
				<div class="user-content cell colspan8">
					<div class="user-title">
						Đổi mật khẩu
					</div>
					<form method="post" action="{{route('user.post')}}">
						{{ csrf_field() }}
						<div class="user-update">
							<div class="input-control modern text">
							    <input type="password" name="current_password" required="">
							    <span class="label">Mật khẩu hiện tại</span>
							    <span class="placeholder">Mật khẩu hiện tại</span>
							</div>
							@if ($errors->has('curPass'))
						        <div class="errors">
						          <div class="Error">
						            <strong>{{ $errors->first('curPass') }}</strong>
						          </div>
						        </div>
						     @endif
							<div class="input-control modern text">
							    <input type="password" name="password" required="">
							    <span class="label">Mật khẩu mới</span>
							    <span class="placeholder">Mật khẩu mới</span>
							</div>
							@if ($errors->has('rePass'))
						        <div class="errors">
						          <div class="Error">
						            <strong>{{ $errors->first('rePass') }}</strong>
						          </div>
						        </div>
						     @endif
							<div class="input-control modern text">
							    <input type="password" name="re_password" required="">
							    <span class="label">Xác nhận mật khẩu</span>
							    <span class="placeholder">Xác nhận mật khẩu</span>
							</div>
							@if ($errors->has('changeSucc'))
						        <div class="errors">
						          <div class="Success">
						            <strong>{{ $errors->first('changeSucc') }}</strong>
						          </div>
						        </div>
						     @endif
							<div class="row save-button">
								<button class="button cycle-button" style="color: white; background-color: #26a69a">
									<span class="mif-floppy-disk"></span>
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="right-model cell colspan2">
					<img src="{{url('/icon/other/maleModel.svg')}}">
				</div>
			</div>
		</div>
	</div>
@endsection