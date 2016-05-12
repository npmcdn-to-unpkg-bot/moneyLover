@extends('layouts.app')

@section('content')
	<?php
		$state = array("", "actived", "", "", "");
		$currency = trans('currency.'.Auth::user()->currency);
		$color = array("bg-darkGreen", "bg-darkCyan", "bg-lime", "bg-red", "bg-darkCobalt", "bg-orange", "bg-lightBlue", "bg-darkIndigo", "bg-amber", "bg-emerald");
	?>
	<script>
		function showDialog(id){
		    var dialog = $(id).data('dialog');
		    dialog.open();
		}

		$(function(){
	        $("#datepicker").datepicker();
	    });
	</script>
	<link rel="stylesheet" type="text/css" href="{{url('css/bill.css')}}">
	<div class="bill-content">
		<div class="row bill-button">
			<button class="button cycle-button large-button success newBillBut" onclick="showDialog('#dialog')">+</button>
		</div>
		<div class="listview">
			<div class="type-title">
				Hóa đơn
			</div>
			<div class="list-content">
				@if (count($bills) == 0) 
					<div class="row cell colspan12 sorry">
						<img src="{{url('icon/crying.svg')}}">
						<span> Không có hóa đơn nào.</span>
					</div>
				@else
					@foreach ($bills as $bill)
						<?php 
							$BillColor = $color[rand(0, 9)];
						?>
						<script type="text/javascript">
							var bill_{{$bill->id}} = <?php echo $bill; ?>;
						</script>
						<div class="tile-wide {{$BillColor}}" data-role="tile" onclick="showDialog('#dialog2'), setUpdateData({{$bill->id}})">
							<div class="title-content">
								<div class="billName"> {{$bill->name}} </div>
								<div class="billTotalPay">{{$bill->totalPay}} {{$currency}}</div>
								<div class="billDeadline">{{ date('d-m-Y', strtotime($bill->deadLine))}}</div>
							</div>
							<div class="deleteButton">
								<a href="{{route('bill.destroy', $bill->id)}}">
								<span class="mif-cross"></span>
								</a>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
	<div data-role="dialog" id="dialog" data-overlay="true" data-close-button="true" data-overlay-color="op-dark" data-overlay-click-close="true" data-width="40%" class="add-new-category">
			<div class="grid">
				<div class="panel">
				    <div class="heading bg-lightRed">
				        <span class="title">Hóa đơn mới</span>
				    </div>
				    <div class="content bg-white" style="padding: 10px 20px 20px 20px;">
				    	<form method="post" action="{{url('/bills')}}">
				    		{{ csrf_field() }}
					    	<div class="row" style="justify-content: center;">
					    		<div class="cell colspan8 newBillContent">
						    		<div class="row">
						    			<div class="cell colspan2 icon-prefix">
						    				<img class="input-icon" src="{{url('icon/53.png')}}">
						    			</div>
										<div class="input-control modern text">
										    <input type="text" name="name" required="">
										    <span class="label">Hóa đơn</span>
										    <span class="placeholder">Tên hóa đơn</span>
										</div>
									</div>
									<div class="row">
										<div class="cell colspan2 icon-prefix">
						    				<img class="input-icon" src="{{url('icon/currency/'.Auth::user()->currency).'.png'}}">
						    			</div>
										<div class="input-control modern text">
										    <input type="number" name="totalPay" class="totalPayInput" required>
										    <span class="label">Tổng số tiền</span>
										    <span class="placeholder">Tổng số tiền</span>
										</div>
									</div>
									<div class="row">
										<div class="cell colspan2 icon-prefix">
						    				<img class="input-icon" src="{{url('icon/7.png')}}">
						    			</div>
										<div class="input-control modern text datePicker" data-role="datepicker">
										    <input type="text" name="deadLine" required>
										    <span class="label">Hạn thanh toán</span>
										    <span class="placeholder">Hạn thanh toán</span>
										    <button class="button bg-white datepickBut"><span class="mif-calendar"></span></button>
										</div>
									</div>
									<div class="row" style="justify-content: flex-start;">
										<div class="cell colspan2" style="margin-right: 10px"></div>
										<button class="button" style="color: white;">Thêm</button>
									</div>
								</div>
							</div>
			    		</form>
				    </div>
				</div>
		    </div>
		</div>

	<div data-role="dialog" id="dialog2" data-overlay="true" data-close-button="true" data-overlay-color="op-dark" data-overlay-click-close="true" data-width="40%" class="add-new-category">
			<div class="grid">
				<div class="panel">
				    <div class="heading bg-lightRed">
				        <span class="title">Sửa thông tin hóa đơn</span>
				    </div>
				    <div class="content bg-white" style="padding: 10px 20px 20px 20px;">
				    	<form method="post" class="i0" action="">
				    		{{ csrf_field() }}
					    	<div class="row" style="justify-content: center;">
					    		<div class="cell colspan8 newBillContent">
						    		<div class="row">
						    			<div class="cell colspan2 icon-prefix">
						    				<img class="input-icon" src="{{url('icon/53.png')}}">
						    			</div>
										<div class="input-control modern text">
										    <input type="text" name="name" class="i1" required="">
										    <span class="label">Hóa đơn</span>
										    <span class="placeholder">Tên hóa đơn</span>
										</div>
									</div>
									<div class="row">
										<div class="cell colspan2 icon-prefix">
						    				<img class="input-icon" src="{{url('icon/currency/'.Auth::user()->currency).'.png'}}">
						    			</div>
										<div class="input-control modern text">
										    <input type="number" name="totalPay" class="totalPayInput i2" required>
										    <span class="label">Tổng số tiền</span>
										    <span class="placeholder">Tổng số tiền</span>
										</div>
									</div>
									<div class="row">
										<div class="cell colspan2 icon-prefix">
						    				<img class="input-icon" src="{{url('icon/7.png')}}">
						    			</div>
										<div class="input-control modern text datePicker" data-role="datepicker">
										    <input type="text" name="deadLine" class="i3" required>
										    <span class="label">Hạn thanh toán</span>
										    <span class="placeholder">Hạn thanh toán</span>
										    <button class="button bg-white datepickBut"><span class="mif-calendar"></span></button>
										</div>
									</div>
									<div class="row" style="justify-content: flex-start;">
										<div class="cell colspan2"></div>
										<button class="button cycle-button" style="color: white; margin-right: 20px">
											<span class="mif-floppy-disk"></span>
										</button>
									</div>
								</div>
							</div>
			    		</form>
				    </div>
				</div>
		    </div>
		</div>

	<script type="text/javascript">
		function setUpdateData(id) {
			var bill = eval("bill_" + id);
			$(".i1").attr("value", bill.name);
			$(".i2").attr("value", bill.totalPay);
			$(".i3").attr("value", bill.deadLine);;
			var link = "{{url('bills')}}" + "/" + id;
			$(".i0").attr("action", link);
		}
	</script>
@endsection