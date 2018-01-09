@extends('common.dash')

@section('content')

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Bank Wiring Data Add/Edit</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
	  
					<form action="/admin/bank-data-update" method="post" enctype="multipart/form-data">
					
						{{ csrf_field() }}
				
						<? if(isset($data[0])){ ?>
						<input type="hidden" name="id" value="{{ $data[0]->id }}">
						<? } ?>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Bank name</label>
								<input type="text" class="form-control" name="bank_name" value="<? if(isset($data[0])){?>{{ Request::old('bank_name') ? : $data[0]->bank_name }}<?}?>" placeholder="bank_name">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" name="address" value="<? if(isset($data[0])){?>{{ Request::old('address') ? : $data[0]->address }}<?}?>" placeholder="address">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Account number</label>
								<input type="text" class="form-control" name="account_number" value="<? if(isset($data[0])){?>{{ Request::old('account_number') ? : $data[0]->account_number }}<?}?>" placeholder="account_number">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Routing number</label>
								<input type="text" class="form-control" name="routing_number" value="<? if(isset($data[0])){?>{{ Request::old('routing_number') ? : $data[0]->routing_number }}<?}?>" placeholder="routing_number">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Swift</label>
								<input type="text" class="form-control" name="swift" value="<? if(isset($data[0])){?>{{ Request::old('swift') ? : $data[0]->swift }}<?}?>" placeholder="swift">
							</div>
						</div>
						
						<div class="form-group col-sm-12 col-md-12">
							<input type="submit" class="btn btn-primary waves-effect waves-light" value="Save"/>
						</div>
						
					</form>
				
				<? if(isset($data[0])){ ?>
						<div class="form-group col-sm-12 col-md-12">
						<br><br>
						<a href="/admin/bank-data-delete?id={{ $data[0]->id }}" class="btn btn-danger">Delete</a>
						</div>
				<? } ?>
				
				</div>
			</div>
		</div>

@endsection


@section('footer')

<script>



</script>

@endsection