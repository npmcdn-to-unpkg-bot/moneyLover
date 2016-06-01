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
						Chỉnh sửa thông tin cá nhân
					</div>
					<form>
						<div class="user-update">
							<div class="input-control modern text">
							    <input type="text" name="name" value="{{$name}}" required="">
							    <span class="label">Tên</span>
							    <span class="placeholder">Tên</span>
							</div>
							<div class="input-control modern text">
							    <input type="password" name="current_password" required="">
							    <span class="label">Mật khẩu hiện tại</span>
							    <span class="placeholder">Mật khẩu hiện tại</span>
							</div>
							<div class="input-control modern text">
							    <input type="password" name="password" required="">
							    <span class="label">Mật khẩu mới</span>
							    <span class="placeholder">Mật khẩu mới</span>
							</div>
							<div class="input-control modern text">
							    <input type="password" name="confirm_password" required="">
							    <span class="label">Xác nhận mật khẩu</span>
							    <span class="placeholder">Xác nhận mật khẩu</span>
							</div>
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