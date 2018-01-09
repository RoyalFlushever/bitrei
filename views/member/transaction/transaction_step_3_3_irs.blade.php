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
								<h2>E-sign IRS</h2>
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
						
							if(isset($data) && count($data)>0 && $data[0]->irs_sign_status == 2){
								
								echo "You successfully signed \"IRS\". Please follow next step: <a class='btn btn-primary' href='/transaction/transaction-step-four/".$_GET["transaction_id"]."'>NEXT</a>";
								
							}elseif(isset($data) && count($data)>0 && $data[0]->irs_sign_status == 1){
								
								$userName = $data[0]->first_name . " " . $data[0]->last_name;
								if(strlen($userName)<3){$userName = "BitREI Member";}
								
								$DocusignController = new \App\Http\Controllers\Member\DocusignController();
								$result = $DocusignController->testCreateEmbeddedSigningView(
									$data[0]->docusign_3_envelope_id, 
									"http://104.236.93.221/transaction/sign-irs-success/".$data[0]->id, 
									$data[0]->user_id, 
									$userName, 
									$data[0]->email
								);
							
								$embedded_frame_src = $result->getUrl();
								
								echo "After signing this IRS, this PDF will be available in Transaction History. Wiring instructions are included in the next step.<br/><br/>";
								
								echo '<iframe class="embediframe" frameborder="0" width="100%" height="600" src="'.$embedded_frame_src.'" id="hostiframe" name="hostiframe"></iframe>';
								
							}else{
						
						?>
						
							<form action="/transaction/sign-irs" method="post" enctype="multipart/form-data">
							
								{{ csrf_field() }}
							
								<? if(isset($_GET["transaction_id"])){ ?>
								<input type="hidden" name="transaction_id" value="<? echo $_GET["transaction_id"]; ?>">
								<? } ?>
								
								<div class="form-group col-sm-12 col-md-12">
								Please select the button below to generate your personalized IRS.
								</div>
								
								<div class="form-group col-sm-12 col-md-12">
									<input type="submit" class="button tiny btn btn-primary waves-effect waves-light" value="Sign IRS"/>
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