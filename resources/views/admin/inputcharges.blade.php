@extends('layouts.try')

@section('content')
<div class="container-fluid">
		<div class="row justify-content-around">
	<div class="col-md-10 col-xs-12 col-sm-12 col-lg-9">
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
			<form id='form1' action="{{ url('admin/charges') }}" method= "POST">
				{{ csrf_field() }}
				<!-- select NSE OR BSE -->
				<div class="input-group mb-3">
				  <select class="custom-select" id="inputGroupSelect02">
					<option selected>Choose...</option>
					<option value="0" name="">NSE</option>
					<option value="1" name="nse_or_bse">BSE</option>
					
				  </select>
					  <div class="input-group-append">
							<label class="input-group-text" for="inputGroupSelect02">Stock Exchange</label>
					  </div>
				</div>
				{{-- ------------------------------------------------------------------------------------ --}}
				<hr class="hr-warning" />
				<h2><center>Buy</center></h2>
				<div class="row">
					<h4>SD Charges</h4>
					<div class="col">
						<label for="intra_buy_sd_percent" class="sr-only">Intra Day Buy SD Charges</label>
					  <input type="text" class="form-control validate" id="intra_buy_sd_percent" name="intra_buy_sd_percent" placeholder="Intra Day">
					</div>
					<div class="col">
						<label for="del_buy_sd_percent" class="sr-only">Delivery Day SD Charges</label>
					  <input type="text" class="form-control validate" id="del_buy_sd_percent" name="del_buy_sd_percent" placeholder="Delivery Day">
					</div>
				</div>
				<hr class="hr-warning" />
				<div class="row">
					<h4>STT Charges</h4>
					<div class="col">
						<label for="intra_buy_stt_percent" class="sr-only">Intra Day Buy STT Charges</label>
					  <input type="text" class="form-control validate" id="intra_buy_stt_percent" name="intra_buy_stt_percent" placeholder="Intra Day">
					</div>
					<div class="col">
						<label for="del_buy_stt_percent" class="sr-only">Delivery Day STT Charges</label>
					  <input type="text" class="form-control validate" id="del_buy_stt_percent" name="del_buy_stt_percent" placeholder="Delivery Day">
					</div>
				</div>
				<hr class="hr-warning" />
				<div class="row">
					<h4>Brokerage Charges</h4>
					<div class="col">
						<label for="intra_buy_b_percent" class="sr-only">Intra Day Buy SD Charges</label>
					  <input type="text" class="form-control validate" id="intra_buy_b_percent" name="intra_buy_b_percent" placeholder="Intra Day">
					</div>
					<div class="col">
						<label for="del_buy_b_percent" class="sr-only">Delivery Day SD Charges</label>
					  <input type="text" class="form-control validate" id="del_buy_b_percent" name="del_buy_b_percent" placeholder="Delivery Day">
					</div>
				</div>
				<hr class="hr-warning" />
				<div class="row">
					<h4>GST Charges</h4>
					<div class="col">
						<label for="buy_gst_percent" class="sr-only">GST Charges</label>
					  <input type="text" class="form-control validate" id="buy_gst_percent" name="buy_gst_percent" placeholder="Intra Day">
					</div>
				
				</div>
				<hr class="hr-warning" />
				<div class="row">
					<h4>Transaction Charges</h4>
					<div class="col">
						<label for="intra_buy_trans_charges" class="sr-only">Intra Day Buy Transaction Charges</label>
					  <input type="text" class="form-control validate" id="intra_buy_trans_charges" name="intra_buy_trans_charges" placeholder="Intra Day">
					</div>
					<div class="col">
						<label for="del_buy_trans_charges" class="sr-only">Delivery Day Transaction Charges</label>
					  <input type="text" class="form-control validate" id="del_buy_trans_charges" name="del_buy_trans_charges" placeholder="Delivery Day">
					</div>
				</div>
				<hr class="hr-success" />
				<h2><center>Sell</center></h2>
				<hr class="hr-warning" />
				<div class="row">
					<h4>SD Charges</h4>
					<div class="col">
						<label for="intra_sell_sd_percent" class="sr-only">Intra Day Sell SD Charges</label>
					  <input type="text" class="form-control validate" id="intra_sell_sd_percent" name="intra_sell_sd_percent" placeholder="Intra Day">
					</div>
					<div class="col">
						<label for="del_sell_sd_percent" class="sr-only">Delivery Day SD Charges</label>
					  <input type="text" class="form-control validate" id="del_sell_sd_percent" name="del_sell_sd_percent" placeholder="Delivery Day">
					</div>
				</div>
				<hr class="hr-warning" />
				<div class="row">
					<h4>STT Charges</h4>
					<div class="col">
						<label for="intra_sell_stt_percent" class="sr-only">Intra Day Buy SD Charges</label>
					  <input type="text" class="form-control validate" id="intra_sell_stt_percent" name="intra_sell_stt_percent" placeholder="Intra Day">
					</div>
					<div class="col">
						<label for="del_sell_stt_percent" class="sr-only">Delivery Day SD Charges</label>
					  <input type="text" class="form-control validate" id="del_sell_stt_percent" name="del_sell_stt_percent" placeholder="Delivery Day">
					</div>
				</div>
				<hr class="hr-warning" />
				<div class="row">
					<h4>Brokerage Charges</h4>
					<div class="col">
						<label for="intra_sell_b_percent" class="sr-only">Intra Day Brokerage Charges</label>
					  <input type="text" class="form-control validate" id="intra_sell_b_percent" name="intra_sell_b_percent" placeholder="Intra Day">
					</div>
					<div class="col">
						<label for="del_sell_b_percent" class="sr-only">Delivery Day Brokerage Charges</label>
					  <input type="text" class="form-control validate" id="del_sell_b_percent" name="del_sell_b_percent" placeholder="Delivery Day">
					</div>
				</div>
				<hr class="hr-warning" />
				<div class="row">
					<h4>GST Charges</h4>
					<div class="col">
						<label for="sell_gst_percent" class="sr-only">GST Charges</label>
					  <input type="text" class="form-control validate" id="sell_gst_percent" name="sell_gst_percent" placeholder="Intra Day">
					</div>
					
				</div>
				<hr class="hr-warning" />
				<div class="row">
					<h4>SD Charges</h4>
					<div class="col">
						<label for="intra_sell_trans_charges" class="sr-only">Intra Day Sell Transaction Charges</label>
					  <input type="text" class="form-control validate" id="intra_sell_trans_charges" name="intra_sell_trans_charges" placeholder="Intra Day">
					</div>
					<div class="col">
						<label for="del_sell_trans_charges" class="sr-only">Delivery Day Trnsaction Charges</label>
					  <input type="text" class="form-control validate" id="del_sell_trans_charges" name="del_sell_trans_charges" placeholder="Delivery Day">
					</div>
				</div>
			
				<button type="submit" class="btn btn-outline-dark"> Submit </button>
			</form>	
	</div>
	
			
	</div>
</div>


@endsection