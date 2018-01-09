@extends('common.dash')

@section('content')




        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
				
                    <h2>Add new property</h2>
                    
					
                    <div class="clearfix"></div>
					
                  </div>
				  
                  <div class="x_content">
				  
					<form action="/admin/property-add-update" method="post" enctype="multipart/form-data">
					
						{{ csrf_field() }}
				
						<? if(isset($data[0])){ ?>
						<input type="hidden" name="id" value="{{ $data[0]->id }}">
						<?}?>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<h3>Address details</h3>
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
								<label>City</label>
								<input type="text" class="form-control" name="city" value="<? if(isset($data[0])){?>{{ Request::old('city') ? : $data[0]->city }}<?}?>" placeholder="city">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>State</label>
								<input type="text" class="form-control" name="state" value="<? if(isset($data[0])){?>{{ Request::old('state') ? : $data[0]->state }}<?}?>" placeholder="state">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Zip</label>
								<input type="text" class="form-control" name="zip" value="<? if(isset($data[0])){?>{{ Request::old('zip') ? : $data[0]->zip }}<?}?>" placeholder="zip">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Map Url</label>
								<input type="text" class="form-control" name="map_url" value="<? if(isset($data[0])){?>{{ Request::old('map_url') ? : $data[0]->map_url }}<?}?>" placeholder="map_url">
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
								<label>Bedroom</label>
								<input type="text" class="form-control" name="bedroom" value="<? if(isset($data[0])){?>{{ Request::old('bedroom') ? : $data[0]->bedroom }}<?}?>" placeholder="bedroom">
							</div>
						</div>
						<?/*

id
address++
city++
state++
zip++
bedroom++
bathroom++
sq_ft++
year_house_built++
year_roof++
year_ac++
//available_number_of_points
//price_per_point
thumbnail++
description++
created_timestamp
minimum_investment++
closing_date++
status++
map_url++
estimated_market_rent++
estimated_repairs++
title++
sort++
property_price++
available_percent_to_invest++
_default_gross_yield++
_default_net_yield++
_default_cash_flow++
_default_hoa++
_forecast_growth_rate_1year++
watch_count
is_featured++

*/?>	
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Bathroom</label>
								<input type="text" class="form-control" name="bathroom" value="<? if(isset($data[0])){?>{{ Request::old('bathroom') ? : $data[0]->bathroom }}<?}?>" placeholder="bathroom">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Sq.ft.</label>
								<input type="text" class="form-control" name="sq_ft" value="<? if(isset($data[0])){?>{{ Request::old('sq_ft') ? : $data[0]->sq_ft }}<?}?>" placeholder="sq_ft">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Year House Built</label>
								<input type="text" class="form-control" name="year_house_built" value="<? if(isset($data[0])){?>{{ Request::old('year_house_built') ? : $data[0]->year_house_built }}<?}?>" placeholder="year_house_built">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Year Roof Built</label>
								<input type="text" class="form-control" name="year_roof" value="<? if(isset($data[0])){?>{{ Request::old('year_roof') ? : $data[0]->year_roof }}<?}?>" placeholder="year_roof">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Year AC</label>
								<input type="text" class="form-control" name="year_ac" value="<? if(isset($data[0])){?>{{ Request::old('year_ac') ? : $data[0]->year_ac }}<?}?>" placeholder="year_ac">
							</div>
						</div>
						
						<? /* ----- */ ?>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<h3>Maintenance</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Current Rent, $</label>
								<input type="text" class="form-control" name="current_rent" value="<? if(isset($data[0])){?>{{ Request::old('current_rent') ? : $data[0]->current_rent }}<?}?>" placeholder="current_rent">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Market Rent, $</label>
								<input type="text" class="form-control" name="estimated_market_rent" value="<? if(isset($data[0])){?>{{ Request::old('estimated_market_rent') ? : $data[0]->estimated_market_rent }}<?}?>" placeholder="estimated_market_rent">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Estimated Repairs, $</label>
								<input type="text" class="form-control" name="estimated_repairs" value="<? if(isset($data[0])){?>{{ Request::old('estimated_repairs') ? : $data[0]->estimated_repairs }}<?}?>" placeholder="estimated_repairs">
							</div>
						</div>
						
						
						<? /* ----- */ ?>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<h3>Financial Details</h3>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Property price, $</label>
								<input type="text" class="form-control" name="property_price" value="<? if(isset($data[0])){?>{{ Request::old('property_price') ? : $data[0]->property_price }}<?}?>" placeholder="property_price">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Available percents to Invest, %</label>
								<input type="text" class="form-control" name="available_percent_to_invest" value="<? if(isset($data[0])){?>{{ Request::old('available_percent_to_invest') ? : $data[0]->available_percent_to_invest }}<?}else{ echo "20"; }?>" placeholder="available_percent_to_invest">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Default Gross Yield, %</label>
								<input type="text" class="form-control" name="_default_gross_yield" value="<? if(isset($data[0])){?>{{ Request::old('_default_gross_yield') ? : $data[0]->_default_gross_yield }}<?}?>" placeholder="_default_gross_yield">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Default Net Yield, %</label>
								<input type="text" class="form-control" name="_default_net_yield" value="<? if(isset($data[0])){?>{{ Request::old('_default_net_yield') ? : $data[0]->_default_net_yield }}<?}?>" placeholder="_default_net_yield">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Default Cash Flow, $</label>
								<input type="text" class="form-control" name="_default_cash_flow" value="<? if(isset($data[0])){?>{{ Request::old('_default_cash_flow') ? : $data[0]->_default_cash_flow }}<?}?>" placeholder="_default_cash_flow">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Default HOA, $</label>
								<input type="text" class="form-control" name="_default_hoa" value="<? if(isset($data[0])){?>{{ Request::old('_default_hoa') ? : $data[0]->_default_hoa }}<?}?>" placeholder="_default_hoa">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Forecast Growth Rate: First Year, %</label>
								<input type="text" class="form-control" name="_forecast_growth_rate_1year" value="<? if(isset($data[0])){?>{{ Request::old('_forecast_growth_rate_1year') ? : $data[0]->_forecast_growth_rate_1year }}<?}?>" placeholder="_forecast_growth_rate_1year">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Minimum Investment, $</label>
								<input type="text" class="form-control" name="minimum_investment" value="<? if(isset($data[0])){?>{{ Request::old('minimum_investment') ? : $data[0]->minimum_investment }}<?}?>" placeholder="minimum_investment">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Closing Date</label>
								<input type="text" class="form-control" name="closing_date" value="<? if(isset($data[0])){?>{{ Request::old('closing_date') ? : $data[0]->closing_date }}<?}?>" placeholder="closing_date">
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
								<label>Title</label>
								<input type="text" class="form-control" name="title" value="<? if(isset($data[0])){?>{{ Request::old('title') ? : $data[0]->title }}<?}?>" placeholder="title">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group ">
								<label for="description">Text</label>
								
								<textarea name="description" id="editor1" style="border: 1px solid #ccc;width:100%;height:200px;display:block;"><? if(isset($data[0])){?>{{ $data[0]->text }}<?}?></textarea>
								
								
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Thumbnail</label>
								<input type="text" class="form-control" name="thumbnail" value="<? if(isset($data[0])){?>{{ Request::old('thumbnail') ? : $data[0]->thumbnail }}<?}?>" placeholder="thumbnail">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Is featured?</label>
								<input type="checkbox" name="is_featured" value="<? if(isset($data[0])){?>{{ Request::old('is_featured') ? : $data[0]->is_featured }}<?}?>">
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Featured sort order</label>
								<input type="text" name="sort" class="form-control" value="<? if(isset($data[0])){?>{{ Request::old('sort') ? : $data[0]->sort }}<?}?>">
							</div>
						</div>
						
						<!--<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control">
									<option value="1">Visible</option>
									<option value="0">Hidden</option>
								</select>
							</div>
						</div>-->
						
						
						
						
						<div class="form-group col-sm-12 col-md-12" style="color:red;">
						ATTENTION: After creating this property, please visit Klaviyo and create a new segment for this property.
						</div>
						
						
						
						
						<div class="form-group col-sm-12 col-md-12">
							<input type="submit" class="btn btn-primary waves-effect waves-light" value="Save"/>
						</div>

					</form>
					
                </div>
            </div>
        </div>


@endsection