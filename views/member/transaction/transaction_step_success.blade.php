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
								<h2>Step 5 of 5: Funding Instructions</h2>
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
						
							Congratulations! Your <? if(isset($data)){ echo $data[0]->invest_ownership_percentage;}?>% has been Reserved. While we have reserved your <? if(isset($data)){ echo $data[0]->invest_ownership_percentage;}?>% for this property, you will need to wire funds to the title company. Please send a bank wire within 72 hours to guarantee your investment. If the wire is not received within this timeframe, we will revoke your percentage, and will make it available to other investors.
							
							
							<div style="padding:20px;text-decoration:underline;text-align:right;"><a href="/member/download-bank-wiring?id=<?= $data[0]->id ?>">Download Wiring Instructions</a></div>
							<?
							
							$bank_data = DB::table('__bank_wiring_data')->where("id","=",1)->get();
							
							if(count($bank_data)>0){
							
							
							?>
							
							<table>
								<tr>
									<td style="font-weight: bold; width: 300px;">Bank Name: </td><td><?= $bank_data[0]->bank_name ?></td>
								</tr>
								<tr>
									<td style="font-weight: bold;">Address: </td><td><?= $bank_data[0]->address ?></td>
								</tr>
								<tr>
									<td style="font-weight: bold;">Account Number: </td><td><?= $bank_data[0]->account_number ?></td>
								</tr>
								<tr>
									<td style="font-weight: bold;">Routing Number: </td><td><?= $bank_data[0]->routing_number ?></td>
								</tr>
								<tr>
									<td style="font-weight: bold;">Swift Code: </td><td><?= $bank_data[0]->swift ?></td>
								</tr>
								<tr>
									<td style="font-weight: bold;">Amount to Send: </td><td>$<? if(isset($data)){ echo number_format((float)$data[0]->invest_amount, 2, '.', ',');}?></td>
								</tr>
								<tr>
									<td style="font-weight: bold;">Ownership Percentage: </td><td><? if(isset($data)){ echo $data[0]->invest_ownership_percentage;}?>%</td>
								</tr>
								<tr>
									<td style="font-weight: bold;">Address of Investment Property: </td><td><?
									
									if(isset($data)){ 
										
										$tabPropertyIds = "";
										$tabPropertyAddresses = "";
										$tabInvestAmount = "";
										$tabOwnershipPercentage = "";
										
										$transactionData = $data;
										
										$property_data_array_json = $transactionData[0]->property_data_array;
										
										if(!is_null($property_data_array_json)){
											
											$property_data_array = json_decode($property_data_array_json, true);
											
											foreach($property_data_array as $transaction_property_item){
												
												$current_property_id = $transaction_property_item["property_id"];
												$current_property_invest_amount = $transaction_property_item["invest_amount"];
												$current_property_invest_ownership_percentage = $transaction_property_item["invest_ownership_percentage"];
												
												$property_data = DB::table('_property_details')
													->where("id","=",$current_property_id)
													->get();
													
												if(count($property_data)>0){
													
													$property_item = $property_data[0];
													
													$property_address_text = $property_item->address . ", " . $property_item->city . ", " . $property_item->state . " " . $property_item->zip;
													
													$tabPropertyIds .= "#" . $property_item->id . "; ";
													$tabPropertyAddresses .= $property_address_text . "; ";
													$tabInvestAmount .= $current_property_invest_amount . "; ";
													$tabOwnershipPercentage .= $current_property_invest_ownership_percentage . "; ";
													
												}
												
											}
										
										}
										
										echo $tabPropertyAddresses;
										
									}
									
									?></td>
								</tr>
							
							</table>
							<? } ?>
							<div style="padding:30px;text-align:center;">--- OR ---</div>
							
							<a href="/stripe/bit-test?id=<? if(isset($data)){ echo $data[0]->id; }?>">Pay with Bitcoin</a>
							
							</div>
						</div>
					</div>

				</div>

			</div>
          </div>
        </div>
      </div>	

@endsection