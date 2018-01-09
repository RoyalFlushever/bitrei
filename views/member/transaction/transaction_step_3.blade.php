@extends('member.dash')

@section('content')
<div class="section">
        <div class="row">
          <div class="column">
            <div class="section box-shadow box-padding">
	<div class="col-md-12 col-sm-12 col-xs-12">

        <div class="col-md-12">
			<div class="x_panel">
                 <div class="x_title">
					<h2>Transaction Step 3 - Payment</h2>
					<div class="clearfix"></div>
				</div>
                <div class="x_content">
				
				@if ($errors->has('errors'))
					<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
					{{ $errors->first('errors') }}
					</div>
				@endif
			
			<?
			
				if(isset($data) && count($data)>0 && $data[0]->payment_status == 2){
					
					echo "You successfully made payment. Please follow next step: <a class='btn btn-primary' href='/transaction/transaction-step-four/".$_GET["transaction_id"]."'>NEXT</a>";
					
				}else{
			
			?>
			
				<form action="/transaction/transaction-step-three" method="post" enctype="multipart/form-data">
			
				{{ csrf_field() }}
            
				<? if(isset($_GET["transaction_id"])){ ?>
					<input type="hidden" name="transaction_id" value="<? echo $_GET["transaction_id"]; ?>">
				<? } ?>
				
                <div class="col-sm-12 col-md-12">
				
                    <div class="form-group col-sm-12 col-md-12">
                        <label>Name on credit card</label>
                        <input type="text" class="form-control" name="card_name" value="">
                    </div>
					
				</div>
				
                <div class="col-sm-12 col-md-12">
				
					<div class="form-group col-sm-12 col-md-12">
                        <label>Credit card number</label>
                        <input type="text" class="form-control" name="card_number" value="">
                    </div>
					
                </div>
				
                <div class="col-sm-12 col-md-12">
				
                    <div class="form-group col-sm-4 col-md-4">
                        <label>CVC</label>
                        <input type="text" class="form-control" name="cvc" value="" placeholder="CVC">
                    </div>
					
					<div class="form-group col-sm-2 col-md-2">
                        <label>Expiration month</label>
                        <input type="text" class="form-control" name="exp_month" value="" placeholder="Expiration date">
                    </div>
					
					<div class="form-group col-sm-2 col-md-2">
                        <label>Expiration year</label>
                        <input type="text" class="form-control" name="exp_year" value="" placeholder="Expiration date">
                    </div>
					
					<div class="form-group col-sm-4 col-md-4">
                        <label>Billing Zip code</label>
                        <input type="text" class="form-control" name="zip" value="" placeholder="Billing Zip code">
                    </div>
					
                </div>
				
                <div class="form-group col-sm-12 col-md-12">
                    <input type="submit" class="button tiny btn btn-primary waves-effect waves-light" value="Next"/>
                </div>

            </form>
				
				<? } ?>
				<br><br>
				</div>
			</div>
		</div>

	</div>

	</div>
          </div>
        </div>
      </div>	

@endsection