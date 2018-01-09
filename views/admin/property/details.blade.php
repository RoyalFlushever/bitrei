@extends('common.dash')

@section('content')




        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
				
                    <h2>Property #<? if(isset($data[0])){ ?>{{ $data[0]->id }}<? } ?></h2>
                     <a href="/admin/property-edit?id=<? if(isset($data[0])){ ?>{{ $data[0]->id }}<? } ?>" class="btn btn-primary pull-right">Edit property details</a>
                    <div class="clearfix"></div>
					
                  </div>
				  
                  <div class="x_content">
				  
				  <div class="col-sm-6 col-md-6">
				  
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<h3>Address details</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Address:</label> <? if(isset($data[0])){?>{{ $data[0]->address }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>City:</label> <? if(isset($data[0])){?>{{ $data[0]->city }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>State:</label> <? if(isset($data[0])){?>{{ $data[0]->state }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Zip:</label> <? if(isset($data[0])){?>{{ $data[0]->zip }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Map Url:</label> <? if(isset($data[0])){?><a href="{{ $data[0]->map_url }}" target="_blank"><u>Map Link</u></a><?}?>
							</div>
						</div>
						
						<? /* ----- */ ?>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<h3>Property details</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Bedroom:</label> <? if(isset($data[0])){?>{{ $data[0]->bedroom }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Bathroom:</label> <? if(isset($data[0])){?>{{ $data[0]->bathroom }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Sq.ft.</label> <? if(isset($data[0])){?>{{ $data[0]->sq_ft }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Year House Built:</label> <? if(isset($data[0])){?>{{ $data[0]->year_house_built }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Year Roof Built:</label> <? if(isset($data[0])){?>{{ $data[0]->year_roof }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Year AC:</label> <? if(isset($data[0])){?>{{ $data[0]->year_ac }}<?}?>
							</div>
						</div>
						
					</div>
						
						<? /* ----- */ ?>
					<div class="col-sm-6 col-md-6">
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<h3>Financial Details</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Property price, $:</label> <? if(isset($data[0])){ echo number_format((float)$data[0]->property_price, 0, '.', ','); } ?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Current Rent, $: </label> <? if(isset($data[0])){ echo number_format((float)$data[0]->current_rent, 0, '.', ','); } ?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Market Rent, $:</label> <? if(isset($data[0])){ echo number_format((float)$data[0]->estimated_market_rent, 0, '.', ','); } ?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Estimated Repairs, $:</label> <? if(isset($data[0])){ echo number_format((float)$data[0]->estimated_repairs, 0, '.', ','); } ?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Available percents to Invest, %:</label> <? if(isset($data[0])){ echo number_format((float)$data[0]->available_percent_to_invest, 0, '.', ','); } ?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Default Gross Yield, %:</label> <? if(isset($data[0])){?>{{ $data[0]->_default_gross_yield }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Default Net Yield, %:</label> <? if(isset($data[0])){?>{{ $data[0]->_default_net_yield }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Default Cash Flow, $:</label> <? if(isset($data[0])){ echo number_format((float)$data[0]->_default_cash_flow, 0, '.', ','); } ?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Default HOA, $:</label> <? if(isset($data[0])){ echo number_format((float)$data[0]->_default_hoa, 0, '.', ','); } ?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Forecast Growth Rate: First Year, %:</label> <? if(isset($data[0])){?>{{ $data[0]->_forecast_growth_rate_1year }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Minimum Investment, $:</label> <? if(isset($data[0])){ echo number_format((float)$data[0]->minimum_investment, 0, '.', ','); } ?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Closing Date: </label> <? if(isset($data[0])){?>{{ $data[0]->closing_date }}<?}?>
							</div>
						</div>
						
					</div>
						
						<? /* ----- */ ?>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<h3>Other</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Title:</label> <? if(isset($data[0])){?>{{ $data[0]->title }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group ">
								<label for="description">Text:</label> <? if(isset($data[0])){?>{{ $data[0]->description }}<?}?>
								
								
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Thumbnail: </label> <? if(isset($data[0])){?>{{ Request::old('thumbnail') ? : $data[0]->thumbnail }}<?}?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Is featured?</label> <? if(isset($data[0]) && $data[0]->is_featured == 1){ echo "Yes"; }else{ echo "No"; } ?>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Featured sort order:</label> <? if(isset($data[0])){?>{{ $data[0]->sort }}<?}?>
							</div>
						</div>
						
					
						<div class="col-sm-12 col-md-12" style="border-top:1px solid #eee;">
							<div class="form-group">
								
							</div>
						</div>
					
					
					
					
					
					
						<? /* ----- */ ?>
						
						<div class="col-sm-12 col-md-12" style="margin-top:40px;">
							<div class="form-group">
								<h3>Property images</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
						
						<div style="padding-bottom:20px;">
							
							<form method="POST" action="/admin/property-image-file-upload" class="dropzone" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input type="hidden" name="property_id" value="<?= $data[0]->id ?>">
							</form>
							
						</div>
						<div style="padding:10px 0;text-align:center;"> - OR add the link - </div>
						
								<form action="/admin/property-image-update" method="post" enctype="multipart/form-data">
								
									{{ csrf_field() }}
									
									<div class="form-group col-sm-10 col-md-10">
										<input type="text" class="form-control" name="img" placeholder="image link">
									</div>
									
									<div class="form-group col-sm-2 col-md-2">
										<input type="hidden" name="property_id" value="<?= $data[0]->id ?>">
										<input type="submit" class="btn btn-primary waves-effect waves-light" value="Add Link"/>
									</div>

								</form>
						
							</div>
							<div class="form-group">
								
								<?
								
								if(isset($data->images) && count($data->images) > 0){
									
									foreach($data->images as $image_item){
										
										if($image_item->is_thumbnail == 1){$borderColor = "33b5e5";}else{$borderColor = "fff";}
										
										
										echo "<div style='border:2px solid #".$borderColor.";width:240px;float:left;overflow:hidden;height:290px;margin:10px;padding:10px;'><div style='overflow:hidden;height:200px;width:100%;background:#aaa;'><img src='".$image_item->img."' class='' style='width:100%;'></div><div><div style='padding:4px 0;text-align:right;float:right;'><a href='/admin/property-image-delete?id=".$image_item->id."' style='color:red;'>X Delete</a></div><div style='padding:4px 0;text-align:left;float:left;'><a href='/admin/property-image-make-thumbnail?id=".$image_item->id."' style=''>Make thumbnail</a></div></div><div style='clear:both;'></div><div style='padding:4px 0;text-align:left;'><form action='/admin/property-image-sort' method='get'><input type='hidden' name='id' value='".$image_item->id."'><input type='text' name='sort' value='".$image_item->sort."' class='form-control' style='width:80px;padding:3px;display:inline-block;height:32px;' placeholder='sort order'><input type='submit' value='OK' class='btn btn-primary' style='margin:0;margin-left:10px;'></form></div></div>";
										
									}
									
								}
								
								?>
								
								
								<div class="clearfix"></div>
							</div>
						</div>
						
					
					
					
						<div class="col-sm-12 col-md-12" style="border-top:1px solid #eee;">
							<div class="form-group">
								
							</div>
						</div>
					
					
					
						<? /* ---financial_data-- */ ?>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<h3>Financial data</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
							
								<form action="/admin/property-financial-data-update" method="post" enctype="multipart/form-data">
								
									{{ csrf_field() }}
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Period start date</label>
										<input type="text" class="form-control" name="date_1" id="financial_data_date_1" placeholder="date_1">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Timeframe</label>
										<select class="form-control" name="timeframe">
											<option value="month">Month</option>
											<option value="quarter">Quarter</option>
											<option value="year">Year</option>
										</select>
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Price</label>
										<input type="text" class="form-control" name="property_price" placeholder="property_price" value="0">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Rent collected</label>
										<input type="text" class="form-control" name="rent_collected" placeholder="rent_collected" value="0">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Total expenses</label>
										<input type="text" class="form-control" name="total_expenses" placeholder="total_expenses" value="0">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Management fee</label>
										<input type="text" class="form-control" name="property_management_fee" placeholder="property_management_fee" value="0">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Operating expenses</label>
										<input type="text" class="form-control" name="operating_expenses" placeholder="operating_expenses" value="0">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Tax</label>
										<input type="text" class="form-control" name="tax" placeholder="tax" value="0">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>HOA</label>
										<input type="text" class="form-control" name="hoa" placeholder="hoa" value="0">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Property insurance</label>
										<input type="text" class="form-control" name="property_insurance" placeholder="property_insurance" value="0">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Occupancy rate</label>
										<input type="text" class="form-control" name="occupancy_rate" placeholder="occupancy_rate" value="0">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<input type="hidden" name="property_id" value="<?= $data[0]->id ?>">
										<input type="submit" class="btn btn-primary waves-effect waves-light" value="Add"/>
									</div>

								</form>
						
							</div>
							<div class="form-group" style="overflow:scroll;">
								
								<table class="table table-hover">
								  <thead>
									<tr>
									  <th>Date from</th>
									  <th>Date to</th>
									  <th>Timeframe</th>
									  <th>Property price</th>
									  <th>Rent collected</th>
									  <th>Total expenses</th>
									  <th>Management fee</th>
									  <th>Operating expenses</th>
									  <th>Tax</th>
									  <th>HOA</th>
									  <th>Property insurance</th>
									  <th>Occupancy rate</th>
									  <th>Delete</th>
									</tr>
								  </thead>
								  <tbody>
									<? if(isset($data->financial_data) && count($data->financial_data) > 0){ ?>
										<? foreach($data->financial_data as $item){ ?>
											<tr>
											  <td><?= date("m/d/Y", strtotime($item->date_1)) ?></td>
											  <td><?= date("m/d/Y", strtotime($item->date_2)) ?></td>
											  <td><?= $item->timeframe ?></td>
											  <td>$<?= number_format((float)$item->property_price, 0, '.', ',') ?></td>
											  <td>$<?= number_format((float)$item->rent_collected, 0, '.', ',') ?></td>
											  <td>$<?= number_format((float)$item->total_expenses, 0, '.', ',') ?></td>
											  <td>$<?= number_format((float)$item->property_management_fee, 0, '.', ',') ?></td>
											  <td>$<?= number_format((float)$item->operating_expenses, 0, '.', ',') ?></td>
											  <td>$<?= number_format((float)$item->tax, 0, '.', ',') ?></td>
											  <td>$<?= number_format((float)$item->hoa, 0, '.', ',') ?></td>
											  <td>$<?= number_format((float)$item->property_insurance, 0, '.', ',') ?></td>
											  <td><?= $item->occupancy_rate ?>%</td>
											  <td><a href="/admin/property-financial-data-delete?id=<?= $item->id ?>">Delete</a></td>
											</tr>
										<? } ?>
									<? } ?>	
									</tbody>
								</table>

								<div class="clearfix"></div>
							</div>
						</div>
						
					
					
					
						<div class="col-sm-12 col-md-12" style="border-top:1px solid #eee;">
							<div class="form-group">
								
							</div>
						</div>
					
					
						<? /* ---tenant_data-- */ ?>
						
						<div class="col-sm-12 col-md-12" style="margin-top:40px;">
							<div class="form-group">
								<h3>Tenant data</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
							
								<form action="/admin/property-tenant-data-update" method="post" enctype="multipart/form-data">
								
									{{ csrf_field() }}
									
									<div class="form-group col-sm-6 col-md-6">
										
										<div class="form-group col-sm-12 col-md-12">
											<label>Property Status</label>
											<input type="text" class="form-control" name="property_status" placeholder="property_status" value="<? if(isset($data->tenant_data)){ echo $data->tenant_data->property_status; }?>">
										</div>
										
										<div class="form-group col-sm-12 col-md-12">
											<label>Lease Start Date</label>
											<input type="text" id="tenant_data_date_1" class="form-control" name="original_lease_start" placeholder="original_lease_start" value="<? if(isset($data->tenant_data)){ echo $data->tenant_data->original_lease_start; }?>">
										</div>
										
										<div class="form-group col-sm-12 col-md-12">
											<label>Lease End Date</label>
											<input type="text" id="tenant_data_date_2" class="form-control" name="lease_end_date" placeholder="lease_end_date" value="<? if(isset($data->tenant_data)){ echo $data->tenant_data->lease_end_date; }?>">
										</div>
										
										<div class="form-group col-sm-12 col-md-12">
											<label>Security deposit</label>
											<input type="text" class="form-control" name="security_deposit" placeholder="security_deposit" value="<? if(isset($data->tenant_data)){ echo $data->tenant_data->security_deposit; }?>">
										</div>
										
										<div class="form-group col-sm-12 col-md-12">
											<label>Lease concessions</label>
											<input type="text" class="form-control" name="lease_concessions" placeholder="lease_concessions" value="<? if(isset($data->tenant_data)){ echo $data->tenant_data->lease_concessions; }?>">
										</div>
										
										<div class="form-group col-sm-12 col-md-12">
											<label>section_8</label>
											<input type="text" class="form-control" name="section_8" placeholder="section_8" value="<? if(isset($data->tenant_data)){ echo $data->tenant_data->section_8; }?>">
										</div>
										
										<div class="form-group col-sm-12 col-md-12">
											<label>Tenant background check</label>
											<input type="text" class="form-control" name="tenant_background_check" placeholder="tenant_background_check" value="<? if(isset($data->tenant_data)){ echo $data->tenant_data->tenant_background_check; }?>">
										</div>
										
										<div class="form-group col-sm-12 col-md-12">
											<label>Income at 3x</label>
											<input type="text" class="form-control" name="income_at_3x" placeholder="income_at_3x" value="<? if(isset($data->tenant_data)){ echo $data->tenant_data->income_at_3x; }?>">
										</div>
										
										<div class="form-group col-sm-12 col-md-12">
											<label>Rent payment status</label>
											<input type="text" class="form-control" name="rent_payment_status" placeholder="rent_payment_status" value="<? if(isset($data->tenant_data)){ echo $data->tenant_data->rent_payment_status; }?>">
										</div>
										
									</div>
									
									<div class="form-group col-sm-6 col-md-6">
										
										<div class="form-group col-sm-12 col-md-12">
	
			
		
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Responsibility</th>
				<th>Owner</th>
				<th>Tenant</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Refrigerator</th>
				<td><input type="radio" name="resp_item_refrigerator" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_refrigerator == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_refrigerator" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_refrigerator == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Stove</th>
				<td><input type="radio" name="resp_item_stove" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_stove == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_stove" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_stove == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Washer</th>
				<td><input type="radio" name="resp_item_washer" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_washer == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_washer" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_washer == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Dryer</th>
				<td><input type="radio" name="resp_item_dryer" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_dryer == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_dryer" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_dryer == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Dishwasher</th>
				<td><input type="radio" name="resp_item_dishwaser" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_dishwaser == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_dishwaser" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_dishwaser == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Microwave</th>
				<td><input type="radio" name="resp_item_microwave" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_microwave == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_microwave" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_microwave == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Gas</th>
				<td><input type="radio" name="resp_item_gas" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_gas == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_gas" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_gas == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Water</th>
				<td><input type="radio" name="resp_item_water" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_water == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_water" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_water == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Electric</th>
				<td><input type="radio" name="resp_item_electric" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_electric == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_electric" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_electric == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Sewer</th>
				<td><input type="radio" name="resp_item_sewer" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_sewer == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_sewer" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_sewer == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Lawn</th>
				<td><input type="radio" name="resp_item_lawn" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_lawn == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_lawn" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_lawn == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>Garbage</th>
				<td><input type="radio" name="resp_item_garbage" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_garbage == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_garbage" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_garbage == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
			<tr>
				<th>HOA</th>
				<td><input type="radio" name="resp_item_hoa" value="1" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_hoa == 1){ echo "checked"; }?><? if(!isset($data->tenant_data)){ echo "checked"; }?>> Owner</td>
				<td><input type="radio" name="resp_item_hoa" value="2" <? if(isset($data->tenant_data) && $data->tenant_data->resp_item_hoa == 2){ echo "checked"; }?>> Tenant</td>
			</tr>
		</tbody>
	</table>
	
										</div>
										
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<input type="hidden" name="property_id" value="<?= $data[0]->id ?>">
										<input type="submit" class="btn btn-primary waves-effect waves-light" value="Save tenant data"/>
									</div>

								</form>
						
							</div>
						</div>
					
					
					
						<? /* ---bank_data-- */ ?>
						
						<div class="col-sm-12 col-md-12" style="margin-top:40px;">
							<div class="form-group">
								<h3>Bank data</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
							
								<form action="/admin/property-bank-update" method="post" enctype="multipart/form-data">
								
									{{ csrf_field() }}
								
									<div class="form-group col-sm-12 col-md-12">
										<label>Choose bank account</label>
										<select class="form-control" name="bank_id">
										<option value='0'>-- choose bank account --</option>
										<?
										
											$bank_data = DB::table('__bank_wiring_data')->get();
											
											foreach($bank_data as $bank_item){
												
												$selected = "";
												if($data[0]->bank_account_id == $bank_item->id){$selected = "selected";}
												
												echo "<option value='".$bank_item->id."' ".$selected.">" . $bank_item->bank_name . " / " . $bank_item->account_number ."</option>";
												
											}
										
										?>
										
										</select>
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<input type="hidden" name="property_id" value="<?= $data[0]->id ?>">
										<input type="submit" class="btn btn-primary waves-effect waves-light" value="Save bank account"/>
									</div>

								</form>
						
							</div>
						</div>
					
					
						<? /* ---invest_data-- */ ?>
						
						<div class="col-sm-12 col-md-12" style="margin-top:40px;">
							<div class="form-group">
								<h3>Investment data</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
							
								<form action="/admin/property-invest-data-update" method="post" enctype="multipart/form-data">
								
									{{ csrf_field() }}
								
									<div class="form-group col-sm-12 col-md-12">
										<label>Current Available Percents To Invest</label>
										<input type="text" class="form-control" name="current_available_percent_to_invest" placeholder="Current Available Percents To Invest" value="<? if(isset($data[0])){ echo $data[0]->current_available_percent_to_invest; } ?>">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<label>Current Invested Amount</label>
										<input type="text" class="form-control" name="current_invested_amount" placeholder="Current Invested Amount" value="<? if(isset($data[0])){ echo $data[0]->current_invested_amount; } ?>">
									</div>
									
									<div class="form-group col-sm-12 col-md-12">
										<input type="hidden" name="property_id" value="<?= $data[0]->id ?>">
										<input type="submit" class="btn btn-primary waves-effect waves-light" value="Save investment data"/>
									</div>

								</form>
						
							</div>
						</div>
					
					
					
					
					
                </div>
            </div>
        </div>


@endsection

@section('footer')
       
    <script>

        Dropzone.options.addProductImages = {
            paramName: 'photo',
            maxFilesize: 3,
            maxFiles: 12,
            acceptedFiles: '.jpg, .jpeg, .png'
        }

    </script>
	<script type="text/javascript">
	
	$(function() {
		
		$('#financial_data_date_1').daterangepicker({
			timePicker: false,
			timePicker24Hour: false,
			singleDatePicker: true,
			locale: {
				format: 'MM/DD/YYYY'
			}
		});
		
		
		<? if(isset($data->tenant_data)){ $strtotimeD1 = strtotime($data->tenant_data->original_lease_start); ?>
		
		$('#tenant_data_date_1').daterangepicker({
			timePicker: false,
			timePicker24Hour: false,
			singleDatePicker: true,
			locale: {
				format: 'MM/DD/YYYY'
			},
			startDate: '<?= date("m", $strtotimeD1); ?>/<?= date("d", $strtotimeD1); ?>/<?= date("Y", $strtotimeD1); ?>',
		});
		
		<? }else{ ?>
		
		$('#tenant_data_date_1').daterangepicker({
			timePicker: false,
			timePicker24Hour: false,
			singleDatePicker: true,
			locale: {
				format: 'MM/DD/YYYY'
			}
		});
		
		<? } ?>
	
	
		<? if(isset($data->tenant_data)){ $strtotimeD2 = strtotime($data->tenant_data->lease_end_date); ?>
		
		$('#tenant_data_date_2').daterangepicker({
			timePicker: false,
			timePicker24Hour: false,
			singleDatePicker: true,
			locale: {
				format: 'MM/DD/YYYY'
			},
			startDate: '<?= date("m", $strtotimeD2); ?>/<?= date("d", $strtotimeD2); ?>/<?= date("Y", $strtotimeD2); ?>',
		});
		
		<? }else{ ?>
		
		$('#tenant_data_date_2').daterangepicker({
			timePicker: false,
			timePicker24Hour: false,
			singleDatePicker: true,
			locale: {
				format: 'MM/DD/YYYY'
			}
		});
		
		<? } ?>
	
		
		
	});
	
	</script>
 
@endsection
