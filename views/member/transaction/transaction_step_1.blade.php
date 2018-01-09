@extends('member.dash')

@section('content')


<? if (Auth::check()) {
	
	
		$existedViData_1 = DB::table("_member_vi_data")
			->where("user_id","=",Auth::user()->id)
			->get();
		
		$vi_status = 0;
		
		if(count($existedViData_1)>0 && !empty($existedViData_1[0]->vi_user_id)){
				
			if($existedViData_1[0]->status == 2){$vi_status = 1;}
			
		}
	
	
	
		if($vi_status == 1){
	
	?>


<div class="section">
        <div class="row">
          <div class="column">
            <div class="section box-shadow box-padding">
	<div class="col-md-12 col-sm-12 col-xs-12">

        <div class="col-md-12">
			<div class="x_panel">
                 <div class="x_title">
					<h2>Step 1 of 3: Investor Details</h2>
                    <p>Please complete the fields below, and ensure your personal correctly input, as this information will be used in your e-sign Offering Statment.</p>
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
			
				<form action="/transaction/transaction-step-one" method="post" enctype="multipart/form-data">
			
				{{ csrf_field() }}
            
				<? if(isset($_GET["property_id"])){ ?>
				<input type="hidden" name="property_id" value="<? echo $_GET["property_id"]; ?>">
				<? } ?>
				
				<? if(isset($_GET["transaction_id"])){ ?>
				<input type="hidden" name="transaction_id" value="<? echo $_GET["transaction_id"]; ?>">
				<? } ?>
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<? if(isset($data[0])){ echo $data[0]->email; }elseif(!empty(Auth::user()->email)){echo Auth::user()->email;} ?>" placeholder="Email">
                    </div>
                </div>
				
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="<? if(isset($data[0])){ echo $data[0]->phone; }elseif(!empty(Auth::user()->phone)){echo Auth::user()->phone;} ?>" placeholder="phone">
                    </div>
                </div>
				
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="<? if(isset($data[0])){ echo $data[0]->address; }elseif(!empty(Auth::user()->address)){echo Auth::user()->address;}elseif(isset($user_address_array) && $user_address_array!=""){ echo $user_address_array["user_address"]; } ?>" placeholder="address">
                    </div>
                </div>
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="address2" value="<? if(isset($data[0])){ echo $data[0]->address_2; }elseif(isset($user_address_array) && $user_address_array!=""){ echo $user_address_array["user_address_2"]; } ?>" placeholder="address 2">
                    </div>
                </div>
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" value="<? if(isset($data[0])){ echo $data[0]->city; }elseif(isset($user_address_array) && $user_address_array!=""){ echo $user_address_array["user_city"]; } ?>" placeholder="city">
                    </div>
                </div>
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" name="state" value="<? if(isset($data[0])){ echo $data[0]->state; }elseif(isset($user_address_array) && $user_address_array!=""){ echo $user_address_array["user_state"]; } ?>" placeholder="state">
                    </div>
                </div>
				
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Zip</label>
                        <input type="text" class="form-control" name="zip" value="<? if(isset($data[0])){ echo $data[0]->zip; }elseif(isset($user_address_array) && $user_address_array!=""){ echo $user_address_array["user_zip"]; }  ?>" placeholder="zip">
                    </div>
                </div>
				
                <div class="col-sm-12 col-md-12">
				
                    <div class="form-group col-sm-6 col-md-6">
                        <label>Invest, $</label>
                        <input type="text" class="form-control" value="<? if(isset($data[0])){ echo number_format((float)$data[0]->invest_amount, 2, '.', ','); }elseif(isset($_GET['invest_amount'])){echo number_format((float)$_GET['invest_amount'], 2, '.', ',');} ?>" placeholder="Amount" readonly>
						
						<input type="hidden" name="amount" value="<? if(isset($data[0])){ echo $data[0]->invest_amount; }elseif(isset($_GET['invest_amount'])){echo $_GET['invest_amount'];} ?>">
                    </div>
					
                </div>
				
				
                <div class="form-group col-sm-12 col-md-12">
                    <input type="submit" class="button tiny btn btn-primary waves-effect waves-light" value="Continue to Step 2"/>
                </div>

            </form>
				
				<br><br>
				
				
				</div>
			</div>
		</div>

	</div>

		 </div>
          </div>
        </div>
      </div>
<? }} ?>
@endsection