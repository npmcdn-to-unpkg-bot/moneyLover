<?php 
	$checked = array("", "");
	if ($cat->type == 1) $checked[0] = "checked";
	else $checked[1] = "checked";
?>
<div class="panel">
    <div class="heading bg-lightRed">
        <span class="title">{{$cat->name}}</span>
    </div>
    <div class="content bg-white" style="padding: 10px 20px 20px 20px;">
    	<form action="{{url('/categories/update/'.$cat->id)}}" method="POST">
    		{{ csrf_field() }}
	    	<div class="row" style="justify-content: center;">
	    		<div class="cell colspan3 cat_img choose_categories">
	    			<img class="category-icon" src="{{url('/icon/'.$cat->icon)}}">
	    			<input type="hidden" name="icon" value="{{$cat->icon}}" class="iconInput">
	    		</div>
	    		<div class="cell colspan1"></div>
	    		<div class="cell colspan8">
		    		<div class="row">
						<div class="input-control modern text" style="width: 78%">
						    <input type="text" name="category" value="{{$cat->name}}" required>
						    <span class="label">Nhóm</span>
						    <span class="placeholder">Tên nhóm</span>
						</div>
					</div>
					<div class="row">
						<label class="input-control radio small-check" style="padding-right: 20px">
							<input type="radio" name="type" value="1" {{$checked[0]}}>
							<span class="check"></span>
							<span class="caption">Thu nhập</span>
						</label>
						<label class="input-control radio small-check">
							<input type="radio" name="type" value="2" {{$checked[1]}}>
							<span class="check"></span>
							<span class="caption">Chi tiêu</span>
						</label>
					</div>
					<div class="row" style="margin-top: 10px">
						<button class="button cycle-button" style="color: white; margin-right: 20px">
							<span class="mif-floppy-disk"></span>
						</button>
						<a href="{{route('categories.destroy', $cat->id)}}" class="deleteBut">
							Xóa
						</a>
					</div>
				</div>
			</div>
		</form>
    </div>
</div>

<div class="choose-icon">
	<div class="row" style="background-color: #26a69a; padding-left: 20px; padding-right: 20px; align-items: center; width: 100%; justify-content: space-between;">
		<div class="choose-icon-title">Chọn biểu tượng</div>
		<button class="close"><span class="mif-backward"></span></button>
	</div>
	<div class="icon-list">
    	@foreach ($icons as $icon)
    		<div class="tile-small icon" data-role="title" onclick="choose_img('{{$icon->iconName}}')">
				<img src="{{url('icon/'.$icon->iconName)}}">
			</div>
    	@endforeach
	</div>
</div>
<script type="text/javascript">
	$(".choose-icon").hide();
	$(".dialog-close-button").show();

	$(".choose_categories").click(function() {
		$(".choose-icon").show();
		$(".panel").hide();
		$(".dialog-close-button").hide();
	});

	function choose_img(icon) {
		$(".choose-icon").hide();
		$(".panel").show();
		$(".dialog-close-button").show();
		var link = "{{url('icon')}}" + "/" + icon;
		$(".category-icon").attr("src", link);
		$(".iconInput").attr("value", icon);
	};

	$(".close").click(function() {
		$(".choose-icon").hide();
		$(".panel").show();
		$(".dialog-close-button").show();
	});
</script>