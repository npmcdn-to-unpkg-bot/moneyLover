
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
	    		<div class="cell colspan3 cat_img">
	    			<img src="{{url('/icon/'.$cat->icon)}}">
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
							<span class="mif-pencil"></span>
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