@extends('layouts.app')

@section('content')
	<?php
		$state = array("", "", "", "actived", "");
	?>
	<script>
		function showDialog(id){
		    var dialog = $(id).data('dialog');
		    dialog.open();
		}
	</script>

	<div class="categories-list">
		{{--Add new category--}}
		<div class="row button-list" style="padding-bottom: 20px;">
			<button class="button cycle-button large-button primary" onclick="showDialog('#dialog')" style="margin-right: 20px;">+</button>
			<a href="{{url('/categories/reset')}}">
				<button class="button cycle-button large-button" style="background-color: #F44336">
					<span class="mif-spinner4"></span>
				</button>
			</a>
		</div>
		<div data-role="dialog" id="dialog" data-overlay="true" data-close-button="true" data-overlay-color="op-dark" data-overlay-click-close="true" data-width="30%" class="add-new-category">
			<div class="grid">
				<div class="panel">
				    <div class="heading bg-lightRed">
				        <span class="title">Thêm nhóm</span>
				    </div>
				    <div class="content bg-white" style="padding: 10px 20px 20px 20px;">
				    	<form method="post" action="{{url('categories/add-new-category')}}">
				    		{{ csrf_field() }}
					    	<div class="row" style="justify-content: center;">
					    		<div class="cell colspan3 cat_img">
					    			<img src="{{url('/icon/image_file1.png')}}">
					    		</div>
					    		<div class="cell colspan1"></div>
					    		<div class="cell colspan8">
						    		<div class="row">
										<div class="input-control modern text" style="width: 78%">
										    <input type="text" name="category" required>
										    <span class="label">Nhóm</span>
										    <span class="placeholder">Tên nhóm</span>
										</div>
									</div>
									<div class="row">
										<label class="input-control radio small-check" style="padding-right: 20px">
											<input type="radio" name="type" value="1" checked>
											<span class="check"></span>
											<span class="caption">Thu nhập</span>
										</label>
										<label class="input-control radio small-check">
											<input type="radio" name="type" value="2">
											<span class="check"></span>
											<span class="caption">Chi tiêu</span>
										</label>
									</div>
									<div class="row">
										<button class="button" style="color: white;">Thêm</button>
									</div>
								</div>
							</div>
			    		</form>
				    </div>
				</div>
		    </div>
		</div>
		{{--List categories--}}
		@if (count($categories) == 0) 
			<div class="sorry">
				<img src="{{url('icon/crying.svg')}}">
				<span> Không có nhóm nào.</span>
			</div>
		@else
			<div class="listview list-type-icons" style="background-color: #ffffff;">
				<div class="type-title">Thu nhập</div>
				<div class="listview">
					@foreach ($categories as $cat)
						@if ($cat->type == 1)
						    <div class="list" onclick="showDialog('#dialog_{{$cat->id}}')">
						        <img src="{{url('/icon/'.$cat->icon)}}" class="list-icon">
						        <span class="list-title">{{$cat->name}}</span>
						    </div>
						    <div data-role="dialog" id="dialog_{{$cat->id}}" data-overlay="true" data-close-button="true" data-overlay-color="op-dark" data-overlay-click-close="true" data-width="30%" class="add-new-category" data-href="{{url('/categories/'.$cat->id)}}"> </div>
					    @endif
					@endforeach
				</div>
			</div>
			<div class="listview list-type-icons" style="margin-top: 20px; background-color: #ffffff;">
				<div class="type-title">Chi tiêu</div>
				<div class="listview">
					@foreach ($categories as $cat)
						@if ($cat->type == 2)
						    <div class="list" onclick="showDialog('#dialog_{{$cat->id}}')">
						        <img src="{{url('/icon/'.$cat->icon)}}" class="list-icon">
						        <span class="list-title">{{$cat->name}}</span>
						    </div>
						    <div data-role="dialog" id="dialog_{{$cat->id}}" data-overlay="true" data-close-button="true" data-overlay-color="op-dark" data-overlay-click-close="true" data-width="30%" class="add-new-category" data-href="{{url('/categories/'.$cat->id)}}"> </div>
					    @endif
					@endforeach
				</div>
			</div>
		@endif
	</div>
@endsection
