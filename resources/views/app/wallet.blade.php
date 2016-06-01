@extends('layouts.app')

@section('content')
	<?php
		$state = array("actived", "", "", "", "");
		$currency = trans('currency.'.Auth::user()->currency);
	?>
	<link rel="stylesheet" type="text/css" href="{{url('css/wallet.css')}}">
	<div class="wallet-content">
		<div class="wallet-list row">
			<a class="wallet_i cell colspan3" href="{{route('wallets.index')}}">
				<img class="wallet-icon" src="{{url('icon/69.png')}}">
				<?php 
					$WalletUse = "";
					if ($currentWallet == -1) $WalletUse = "walletNow";
				?>
				<span class="wallet-name {{$WalletUse}}">Tất cả</span>
			</a>
			@foreach ($wallets as $key=>$wallet)
				<?php $key++?>
					<div class="wallet_i cell colspan3">
						<a class="wallet-info" href="{{route('wallets.show', ['wallet_id' => $wallet->id])}}">
							<img class="wallet-icon" src="{{url('icon/'.$wallet->icon)}}">
							<span class="wallet-name wallet-{{$wallet->id}}">{{$wallet->name}}</span>
							@if ($wallet->id == $currentWallet)
								<script type="text/javascript">
									$(".wallet-{{$currentWallet}}:last").addClass("walletNow");
								</script>
							@endif
						</a>
					</div>
			@endforeach
			<div class="wallet_i cell colspan3" style="border: none">
						<a class="wallet-info" href="#">
							<img class="wallet-icon" src="{{url('icon/39.png')}}">
							<span class="wallet-name">Hướng dẫn</span>
						</a>
					</div>
		</div>
		<div class="grid transaction">
			<div class="row transaction-detail">
				<div class="monthSelect">
					<a class="previousMonth">
						<img class="arrow" src="{{url('icon/left-104.png')}}">
					</a>
					<div class="month" id="month">  </div>
					<button class="nextMonth">
						<img class="arrow" src="{{url('icon/right-104.png')}}">
					</button>
				</div>
			</div>
		</div>
		<div class="tranButton">
			<button class="button cycle-button large-button success ebut" onclick="showDialog('#dialog')" style="font-size: 25px">+</button>
		</div>
	</div>

	<div class="tranlist" id="tranlist"></div>
	<div class="row cell colspan12 sorry" id="sorry"></div>

		<div data-role="dialog" id="dialog" data-overlay="true" data-close-button="true" data-overlay-color="op-dark" data-overlay-click-close="true" data-width="40%" class="add-new-category">
			<div class="grid">
				<div class="panel">
				    <div class="heading bg-lightRed">
				        <span class="title">Giao dịch mới</span>
				    </div>
				    <div class="content bg-white" style="padding: 10px 20px 20px 20px;">
				    	<form method="post" action="{{route('transaction.create', ['wallet_id' => $wallet->id])}}">
				    		{{ csrf_field() }}
					    	<div class="row" style="justify-content: center;">
					    		<div class="cell colspan8 newBillContent">
						    		<div class="row">
						    			<div class="cell colspan2 icon-prefix">
						    				<img class="input-icon group-icon" src="{{url('icon/19.png')}}">
						    			</div>
										<div class="input-control modern text">
										    <input type="text" name="type" required="">
										    <span class="label">Nhóm</span>
										    <span class="placeholder">Nhóm</span>
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
										    <input type="text" name="date" required>
										    <span class="label">Ngày</span>
										    <span class="placeholder">Ngày</span>
										    <button class="button bg-white datepickBut"><span class="mif-calendar"></span></button>
										</div>
									</div>
									<div class="row">
						    			<div class="cell colspan2 icon-prefix">
						    				<img class="input-icon" src="{{url('icon/39.png')}}">
						    			</div>
										<div class="input-control modern" data-role="select" style="width: 100%">
										    <select class="inp-select-wallet" name="wallet">
										    	@foreach ($wallets as $wallet) 
											        <option value="{{$wallet->id}}">
										        		{{$wallet->name}}
										        	</option>
										        @endforeach
										    </select>
										    <span class="label">Ngày</span>
										</div>
									</div>
									<div class="row">
						    			<div class="cell colspan2 icon-prefix">
						    				<img class="input-icon" src="{{url('icon/76.png')}}">
						    			</div>
										<div class="input-control modern text">
										    <input type="text" name="note">
										    <span class="label">Ghi chú</span>
										    <span class="placeholder">Ghi chú</span>
										</div>
									</div>
									<div class="row">
										<div class="cell colspan2"></div>
										<button class="button" style="color: white;">Thêm</button>
									</div>
								</div>
							</div>
			    		</form>
				    </div>
				</div>
		    </div>
		</div>

		<script>
			var tran = <?php echo $trans ?>;
			var eNow = new Date();
			var eMoment = moment(eNow);
			var check = true;
			document.getElementById("month").innerHTML = eMoment.format("MMMM, YYYY");
			document.getElementById("tranlist").innerHTML = "";
			var m = eMoment.format("M"), y = eMoment.format("Y");
			for (i = 0; i < tran.length; i++) {
				date = new Date(tran[i].date);
				var cm = date.format("m");
				var cy = date.format("yyyy");
				if (m == cm && y == cy) {
					document.getElementById("tranlist").innerHTML += '<div class="transactionListThisMonth"><div class="row date-title">'+tran[i].date+'</div><div class="row transactionDetails"><div class="cell colspan1"></div><div class="cell colspan5"><img class="tran-icon" src="{{url('icon/cards.png')}}"><span class="type-transaction">'+ tran[i].type +'</span></div><div class="cell colspan1"></div><div class="cell colspan4 total-transaction">'+tran[i].totalMoney+'</div><div class="cell colspan1"></div></div></div>';
					check=false;
				}
			}
			document.getElementById("sorry").innerHTML = "";
			if (check) document.getElementById("sorry").innerHTML = '<img src="{{url('icon/cry.png')}}"><span> Không có giao dịch nào </span>';

			$('.previousMonth').click(function () {
				check=true;
			    eMoment.subtract(1, 'months');
			    document.getElementById("month").innerHTML = eMoment.format("MMMM, YYYY");
			    document.getElementById("tranlist").innerHTML = "";
				var m = eMoment.format("M"), y = eMoment.format("Y");
				for (i = 0; i < tran.length; i++) {
					date = new Date(tran[i].date);
					var cm = date.format("m");
					var cy = date.format("yyyy");
					if (m == cm && y == cy) {
						document.getElementById("tranlist").innerHTML += '<div class="transactionListThisMonth"><div class="row date-title">'+tran[i].date+'</div><div class="row transactionDetails"><div class="cell colspan1"></div><div class="cell colspan5"><img class="tran-icon" src="{{url('icon/cards.png')}}"><span class="type-transaction">'+ tran[i].type +'</span></div><div class="cell colspan1"></div><div class="cell colspan4 total-transaction">'+tran[i].totalMoney+'</div><div class="cell colspan1"></div></div></div>';
						check=false;
					}
				}
				document.getElementById("sorry").innerHTML = "";
				if (check) document.getElementById("sorry").innerHTML = '<img src="{{url('icon/cry.png')}}"><span> Không có giao dịch nào </span>';
				$(function(){
		            var tiles = $(".tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super, .list, .transactionListThisMonth");
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
			});

			$('.nextMonth').click(function () {
			    eMoment.add(1, 'months');
			    check=true;
			    document.getElementById("month").innerHTML = eMoment.format("MMMM, YYYY");
			    document.getElementById("tranlist").innerHTML = "";
				var m = eMoment.format("M"), y = eMoment.format("Y");
				for (i = 0; i < tran.length; i++) {
					date = new Date(tran[i].date);
					var cm = date.format("m");
					var cy = date.format("yyyy");
					if (m == cm && y == cy) {
						document.getElementById("tranlist").innerHTML += '<div class="transactionListThisMonth"><div class="row date-title">'+tran[i].date+'</div><div class="row transactionDetails"><div class="cell colspan1"></div><div class="cell colspan5"><img class="tran-icon" src="{{url('icon/cards.png')}}"><span class="type-transaction">'+ tran[i].type +'</span></div><div class="cell colspan1"></div><div class="cell colspan4 total-transaction">'+tran[i].totalMoney+'</div><div class="cell colspan1"></div></div></div>';
						check=false;
					}
				}
				document.getElementById("sorry").innerHTML = "";
				if (check) document.getElementById("sorry").innerHTML = '<img src="{{url('icon/cry.png')}}"><span> Không có giao dịch nào </span>';
				$(function(){
		            var tiles = $(".tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super, .list, .transactionListThisMonth");
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
			});
			
			function showDialog(id){
			    var dialog = $(id).data('dialog');
			    dialog.open();
			}

			$(function(){
		        $("#datepicker").datepicker();
		    });

		</script>
@endsection