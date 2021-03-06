@extends('member.dash')

@section('content')

		<? // Financial Data
			
			
			
			$property_item = $data[0];
			
			$propertyController = new App\Http\Controllers\Property\PropertyController();
			$property_data = $propertyController->propertyFinancialData($property_item);

			//var_dump($property_data);
			// watch list
			
			$fav_val = 0;
			
			if (Auth::check()) {
					
				$property_favlist = \DB::table('_member_property_favorite_list')
					->where("property_id", "=", $property_item->id)
					->where("member_id", "=", Auth::user()->id)
					->where("value", "=", 1)
					->get();
					
				if(count($property_favlist)>0){
					
					$fav_val = 1;
					
				}
				
			}
			
			$max_invest_amount = $property_data['max_invest'];
			
			
			$defaultInvestAmount = $max_invest_amount/10;
			if($property_data['price'] > 0){
				
				$defaultInvestPercents = $defaultInvestAmount/$property_data['price']*100;
			
			}else{
				
				$defaultInvestPercents = 0;
				
			}
			
			$last_3_days = 0;
			if((float)$property_data['date_left_str'] < 4 && $property_data['left_seconds'] > 0){ $last_3_days = 1; }
			
			
		?>
      <div class="section property-item-expanded-propertypage">
        <div class="section-header">
          <div class="row">
            <div class="column xlarge-6 large-6 xmedium-12 medium-12 property-item-header-column">
              <!-- mixin property-item-header-big begin-->
              <div class="property-item-header section">
                <div class="property-item-price">
                  <h2 class="property-item-price-main bigger">$<?
				  
					//setlocale(LC_MONETARY, 'en_US');
					//echo money_format('%i', $property_data['property_item']->property_price);
				  
				  echo  number_format((float)$property_data['property_item']->property_price, 0, '.', ',');
				  
				  
				  
				  ?></h2>
                  <!-- property-item-price-rent mixin begin-->
                  <div class="property-item-price-rent" style="float: left;">
                    <div class="property-item-price-rent-label">Current Rent</div>
                    <h3 class="property-item-price-rent-value smaller">$<?= number_format((float)$property_data['property_item']->current_rent, 0, '.', ',') ?></h3>
                  </div>
                  <!-- property-item-price-rent mixin end-->
                </div>
                <!-- property-item-address mixin begin-->
                <address class="property-item-address"><img class="property-item-address-icon" src="/member/img/template/location.png" alt="" width="11"/><?= $property_data['address_text'] ?></address>
                <!-- property-item-address mixin end-->
                <!-- mixin property-item-info begin-->
                <p class="property-item-info"><?= $property_data['property_item']->bedroom ?> Bedrooms,  <?= $property_data['property_item']->bathroom ?> Baths | <?= number_format((float)$property_data['property_item']->sq_ft, 0, '.', ','); ?> sq ft | Built in <?= $property_data['property_item']->year_house_built ?></p>
                <!-- mixin property-item-info end-->
              </div>
              <!-- mixin property-item-header-big end-->
            </div>
            <div class="column xlarge-6 large-6 xmedium-12 medium-12 property-item-header-column">
              <div class="property-item-invest-watch section">
			  
        <div class="inputs-inline">
         
         <!-- <input class="medium-6" type="text" name="" id="invest_amount_process_222" value="<?= number_format((float)$defaultInvestAmount, 0, '.', ','); ?>" placeholder="Enter Amount"> -->
		  Bits: <select class="medium-6" type="text" id="invest_amount_process" style="height:50px;display:inline-block;max-width:200px;">
			<?
			
			//$firstInvestAmount = $defaultInvestAmount;
			
			$bitAmount = $property_data['property_item']->property_price / 10;
			
			$investedAmountTotal = $property_data['total_funds'] + $bitAmount*2;
			
			//var_dump($investedAmount);
			
			$maxAmount = $property_data['property_item']->property_price - $investedAmountTotal;//$bitAmount*2;
			//var_dump($maxAmount);
			$firstInvestAmountValue = 0;
			
			for($i=1;$i<9;$i++){
				
				$currentInvestAmount = $bitAmount * $i;
				$currentInvestAmount_text = number_format((float)$currentInvestAmount, 0, '.', ',');
				//var_dump($currentInvestAmount);
				if($currentInvestAmount <= $maxAmount){
					
					if($i == 1){
						
						$firstInvestAmountValue = $currentInvestAmount;
						
					}
					
					echo "<option value='".$currentInvestAmount."'>".$i." bit/-s ($".$currentInvestAmount_text.")</option>";
					
				}
				
			}
			
			$initialInvestPercents = ($firstInvestAmountValue / $property_data['property_item']->property_price)*100;
			
			?>
		  
		  
		  
		  </select>
		  
		  <!--
          <span>&amp; receive</span>
          <input class="medium-6" type="text" name="" id="invest_percent_get" value="<?= number_format((float)$initialInvestPercents, 2, '.', ','); ?>%" readonly><span>Ownership</span>-->
		  
		  
		  <? if($property_data['invested_percents'] == 100){
				  
				  echo '<div class="button expanded" style="background: #fff !important;color: #42609a;">FUNDED</div>'; 
				  
			}else{ ?>
				
					<a id="invest-button" class="button invest-button" style="margin-left:10px;margin-top:5px;padding:15px 25px;" href="javascript:void(0);" href2="/transaction/add-to-cart?property_id=<?= $property_data['property_item']->id ?>" href3="/transaction/transaction-step-one?property_id=<?= $property_data['property_item']->id ?>">Invest In This Property</a>
					
			<? } ?>
		  
		  
		  
		  
        </div>
                <div class="property-watch-social">
                  <div class="property-watch"><a class="button hollow secondary small favorite-item <? if($fav_val==1){echo "is-active";} ?>" href="javascript:void(0);" data-toggler-itself="is-active" data-property-id="<?= $property_item->id ?>" data-fav="<?= $fav_val ?>"><img class="icon-left" src="/member/img/template/heart-gray.png" alt="" width="15"><span class="button-text-normal">Watch</span><span class="button-text-active">Watching</span></a>
                    <p class="property-watch-text"><?= $property_data['watch_count'] ?> Watching</p>
                    <a href="#"><span class="button hollow secondary small favorite-item property-watch-text"><img class="icon-left" src="/member/img/template/chat.png" alt="" width="20"><span class="button-text-normal">Speak with an Advisor</span></span></a>
                  </div>
                  <!-- social-list mixin begin-->
                  <ul class="menu social-list">
					<? $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
					
					<!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  
  


					
					
                    <!-- social-list-item mixin begin-->
                    <li><a href="javascript:void(0);" id="facebookShareLink"><img src="/member/img/template/facebook.png" width="9" alt=""/></a></li>
                    <!-- social-list-item mixin end-->
                    <!-- social-list-item mixin begin-->
                    <li><a href="javascript:void(0);" id="twShareLink"><img src="/member/img/template/twitter.png" width="17" alt=""/></a></li>
                    <!-- social-list-item mixin end-->
                    <!-- social-list-item mixin begin-->
                    <li><a href="javascript:void(0);" id="liShareLink"><img src="/member/img/template/linkedin.png" width="18" alt=""/></a></li>
                    <!-- social-list-item mixin end-->
                  </ul>
                  <!-- social-list mixin end-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="column">
            <div class="property-item-expanded box-white js-property-slider-thumbnails-parent section">
              <div class="row">
                <div class="column large-5 large-push-7 xmedium-9 medium-10 slider-column-translated">
                  <div class="property-item-expanded-caption">
                  
                    <div class="property-item-body">
                      <!-- mixin property-item-characteristics begin-->
                      <div class="property-item-characteristics">
                       <!-- property-item-characteristics-row mixin begin-->
                        <div class="property-item-characteristics-row">
                          <div class="row">
                            <div class="column small-6">
                              <div class="property-item-characteristics-label">current rent <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                            </div>
                            <div class="column small-6">
                              <h3 class="smaller property-item-characteristics-value text-blue">$<?= number_format((float)$property_data['property_item']->current_rent, 0, '.', ',') ?></h3>
                            </div>
                          </div>
                        </div>
                        <!-- property-item-characteristics-row mixin end-->
                        <!-- property-item-characteristics-row mixin begin-->
                        <div class="property-item-characteristics-row">
                          <div class="row">
                            <div class="column small-6">
                              <div class="property-item-characteristics-label">gross yield <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                            </div>
                            <div class="column small-6">
                              <h3 class="smaller property-item-characteristics-value text-blue"><? echo number_format((float)$property_data['averageGrossYield'], 2, '.', ','); ?>%</h3>
                            </div>
                          </div>
                        </div>
                        <!-- property-item-characteristics-row mixin end-->
                        <!-- property-item-characteristics-row mixin begin-->
                        <div class="property-item-characteristics-row">
                          <div class="row">
                            <div class="column small-6">
                              <div class="property-item-characteristics-label">net yield <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                            </div>
                            <div class="column small-6">
                              <h3 class="smaller property-item-characteristics-value text-green"><? echo number_format((float)$property_data['averageNetYield'], 2, '.', ','); ?>%</h3>
                            </div>
                          </div>
                        </div>
                        <!-- property-item-characteristics-row mixin end-->
                        <!-- property-item-characteristics-row mixin begin-->
                        <div class="property-item-characteristics-row">
                          <div class="row">
                            <div class="column small-6">
                              <div class="property-item-characteristics-label">cash flow <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                            </div>
                            <div class="column small-6">
                              <h3 class="smaller property-item-characteristics-value text-blue">$<?= number_format((float)$property_data['cash_flow'], 0, '.', ',') ?></h3>
                            </div>
                          </div>
                        </div>
                        <!-- property-item-characteristics-row mixin end-->
                        <!-- property-item-characteristics-row mixin begin-->
                        <div class="property-item-characteristics-row">
                          <div class="row">
                            <div class="column small-6">
                              <div class="property-item-characteristics-label">growth forecast <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                            </div>
                            <div class="column small-6">
                              <h3 class="smaller property-item-characteristics-value text-blue"><? echo number_format((float)$property_data['property_item']->_forecast_growth_rate_1year, 2, '.', ','); ?>%</h3>
                            </div>
                          </div>
                        </div>
                        <!-- property-item-characteristics-row mixin end-->
                        <!-- property-item-characteristics-row mixin begin-->
                        <div class="property-item-characteristics-row">
                          <div class="row">
                            <div class="column small-6">
                              <div class="property-item-characteristics-label">average occupancy rate <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                            </div>
                            <div class="column small-6">
                              <h3 class="smaller property-item-characteristics-value text-blue"><? echo number_format((float)$property_data['average_occupancy_rate'], 2, '.', ','); ?>%</h3>
                            </div>
                          </div>
                        </div>
                        <!-- property-item-characteristics-row mixin end-->
                        <!-- property-item-characteristics-row mixin begin-->
                        <div class="property-item-characteristics-row">
                          <div class="row">
                            <div class="column small-6">
                              <div class="property-item-characteristics-label">funds invested <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                            </div>
                            <div class="column small-6">
                              <h3 class="smaller property-item-characteristics-value text-blue">$<? echo number_format((float)$property_data['total_funds'], 2, '.', ','); ?></h3>
                            </div>
                          </div>
                        </div>
                        <!-- property-item-characteristics-row mixin end-->
                      </div>
                      <!-- mixin property-item-characteristics end-->
					  
                    </div>
                  </div>
                </div>
                <div class="column large-7 large-pull-5 slider-column-translated">
                  <!-- mixin property-slider begin-->
                  <div class="property-slider-container js-property-slider-container">
                    <ul class="property-slider js-property-slider">
						<? foreach($property_data['property_images'] as $image_item){ ?>
							<li class="property-slider-item js-property-slider-item"><img src="<?= $image_item->img ?>" alt=""/></li>
						<? } ?>
                    </ul>
                    <!-- mixin favorite-heart begin-->
                    <!-- use class .favorite-heart.is-active for active state-->
                    <div class="favorite-heart favorite-item <? if($fav_val==1){echo "is-active";} ?>" href="javascript:void(0);" data-toggler-itself="is-active" data-property-id="<?= $property_data['property_item']->id ?>" data-fav="<?= $fav_val ?>"" data-toggler-itself="is-active"><img class="favorite-heart-icon-normal" src="/member/img/template/heart-white-outline.png" alt=""/><img class="favorite-heart-icon-active" src="/member/img/template/heart-white.png" alt=""/></div>
                    <!-- mixin favorite-heart end-->
                  </div>
                  <!-- mixin property-slider end-->
                </div>
                <!-- mixin property-slider-thumbnails begin-->
                <div class="column large-12 slider-column-translated">
				   <div class="column" style="padding-left:30px;padding-right:0px;">
                  
                  <div class="property-slider-thumbnails-container js-property-slider-thumbnails-container">
                    <ul class="property-slider-thumbnails js-property-slider-thumbnails">
					<? foreach($property_data['property_images'] as $image_item){ ?>
							<li class="property-slider-thumbnails-item js-property-slider-thumbnails-item"><img src="<?= $image_item->img ?>" alt=""/></li>
						<? } ?>
                    </ul>
                  </div>
                  <!-- mixin property-slider-thumbnails end-->
				  </div>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- financial-overview begin-->
      <div class="section">
          <div class="row">
          <div class="column large-6">
            <div class="box-padding section" style="padding: 80px; min-height: 360px; background-color: rgba(36,47,67,1); background: url('/member/img/template/background-blue-box.png') #242f43 top left no-repeat;">
            <h3 style="text-align: center; text-transform: uppercase; color: #fff;">Need for more information on this property?</h3>
      <p style="text-align: center; color: #fff;">Download the extended Pro Forma, compiled by an experienced bitREI advisor, today!</p>
	  
	  <input type="text" id="klaviyo-user-email" placeholder="email">
	  
      <a id="klaviyo-form-submit" class="button expanded" href="javascript:void(0);">Download Now</a>
      </div>
      		</div>
        
          
            <div class="column large-6">
            <div class="box-padding box-white section">
            <h3 class="section-title filters-title">Property Overview</h3>
      <?= $property_data['property_item']->description ?>
      <p>&nbsp;</p>
      </div>
      		</div>
            </div>
      </div>
      
      
      
      <!-- financial-overview begin-->
      <div class="section">
        <div class="section-header">
          <div class="row">
            <div class="column xlarge-6 large-5">
              <h3 class="section-title filters-title">Investment Property Financial Overview</h3>
            </div>
            <div class="column xlarge-6 large-7">
              <!-- filters-date mixin begin-->
			  <!--
              <form class="filters-form">
                <label class="filters-form-item filters-label">filter by date</label>
                <input class="filters-form-item input-rounded" type="text" placeholder="01/01/2017"/>
                <label class="filters-form-item filters-label">TO</label>
                <input class="filters-form-item input-rounded" type="text" placeholder="31/03/2017"/>
              </form>
			  --->
              <!-- filters-date mixin end-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="column large-6">
            <div class="table-scroll">
              <div class="financial-overview-chart box-white section" style="overflow: hidden; padding-top: 20px; text-weight: 300;">
              <h4 class="section-title filters-title" style="font-weight: 500;">Property Value Change</h4>
                <canvas id="financial-overview-chart-x"></canvas>
              </div>
            </div>
          </div>
         
         <div class="column large-6">
            <div class="table-scroll">
              <div class="financial-overview-chart box-white section" style="overflow: hidden; padding-top: 20px; text-weight: 300;">
              <h4 class="section-title filters-title" style="font-weight: 500;">Estimated Total Gain</h4>
                <canvas id="chart" style="display:none;"></canvas>
              </div>
            </div>
          </div>

          <div class="column large-6">
            <div class="table-scroll">
              <div class="financial-overview-chart box-white section" style="overflow: hidden; padding-top: 20px; text-weight: 300;">
              <h4 class="section-title filters-title" style="font-weight: 500;">Estimated Equity Build Up</h4>
                <canvas id="chart2" style="display:none;"></canvas>
              </div>
            </div>
          </div>
			
            <div class="column large-6">
            <div class="table-scroll">
              <div class="financial-overview-chart box-white section" style="overflow: hidden; padding-top: 20px; text-weight: 300;">
              <h4 class="section-title filters-title" style="font-weight: 500;">Estimated Net Cash Flow</h4>
                <canvas id="chart3" style="display:none;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- financial-overview end -->
      <div class="section">
        <div class="row">
          <div class="column">
            <div class="section box-white">
              <div class="tabs-set">
                <ul class="tabs box-padding-side" id="tabs-1" data-tabs>
                  <!--<li class="tabs-title"><a href="#tabs-panel-1">Property Info</a></li>-->
                  <li class="tabs-title property-tabs-title is-active"><a href="#tabs-panel-2">ROI Calculator </a></li>
                  <li class="tabs-title property-tabs-title"><a href="#tabs-panel-3">Current Tenant &amp; Lease</a></li>
                  <li class="tabs-title property-tabs-title"><a href="#tabs-panel-4">Investment Terms</a></li>
                  <li class="tabs-title property-tabs-title"><a href="#tabs-panel-5">FAQ's</a></li>
                </ul>
                <div class="tabs-content" data-tabs-content="tabs-1">
                  <div class="tabs-panel box-padding-side section" id="tabs-panel-1"></div>
                  <div class="tabs-panel box-padding-side section is-active" id="tabs-panel-2">
                    
					
					<div class="wrap-inputs-inline" style="display:none;">
					<div class="inputs-inline">
					  <span>$</span>
					  <input class="medium-6" type="text" name="" id="invest_amount_process_2" value="<?= number_format((float)$defaultInvestAmount, 0, '.', ','); ?>" placeholder="Enter Amount">
					  <span>&amp; receive</span>
					  <input class="medium-6" type="text" name="" id="invest_percent_get_2" value="<?= number_format((float)$defaultInvestPercents, 2, '.', ','); ?>%" readonly> Ownership
					</div>
					  <!--<? if($property_data['left_seconds'] > 0){ ?><a id="invest-button_2" class="button expanded invest-button" href="javascript:void(0);" href2="/transaction/transaction-step-one?property_id=<?= $property_data['property_item']->id ?>">Invest In This Property</a><? } ?>-->
					 </div>
					  
					
					@include('web.property_calculator', ['property_data' => $property_data])
					
					
                  </div>
                  <div class="tabs-panel box-padding-side section" id="tabs-panel-3">
                  <div class="row">
                    <div class="column medium-6 small-6">
                    <h5>Tenant Summary</h5>
                    <div class="table-responsive">
					
                    <table>
                    	<tr>
                        	<td>Property Status</td>
                       		<td><? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->property_status)){echo $property_data['property_tenant_details']->property_status; } ?></td>
                        </tr>
                        <tr>
                        	<td>Original Lease Start</td>
                       		<td><? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->original_lease_start)){echo $property_data['property_tenant_details']->original_lease_start; } ?></td>
                        </tr>
                        <tr>
                        	<td>Lease End Date</td><!-- Kyle, date format: 2017-01-29 17:30:00    Y-m-d H:i:s -->
                       		<td><? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->lease_end_date)){echo $property_data['property_tenant_details']->lease_end_date; } ?></td>
                        </tr>
                        <tr>
                        	<td>Security Deposit</td>
                       		<td>$<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->security_deposit)){echo $property_data['property_tenant_details']->security_deposit; } ?></td>
                        </tr>
                        <tr>
                        	<td>Lease Concessions</td>
                       		<td><? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->lease_concessions)){echo $property_data['property_tenant_details']->lease_concessions; } ?></td>
                        </tr>
                        <tr>
                        	<td>Section 8</td>
                       		<td><? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->section_8)){echo $property_data['property_tenant_details']->section_8; } ?></td>
                        </tr>
                        <tr>
                        	<td>Tenant Background Check</td>
                       		<td><? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->tenant_background_check)){echo $property_data['property_tenant_details']->tenant_background_check; } ?></td>
                        </tr>
                        <tr>
                        	<td>Income At 3x+</td>
                       		<td><? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->income_at_3x)){echo $property_data['property_tenant_details']->income_at_3x; } ?></td>
                        </tr>
                        <tr>
                        	<td>Rent Payment Status</td>
                       		<td><? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->rent_payment_status)){echo $property_data['property_tenant_details']->rent_payment_status; } ?></td>
                        </tr>
                    </table>
                    </div>
                    </div>
                    
                    <div class="column medium-6 small-6">
                    <div class="table-responsive">
                    <table>
                    	<tr>
                        	<td style="font-weight:bold;">Item</td>
                       		<td style="font-weight:bold;">Owner's Responsibilty</td>
                            <td style="font-weight:bold;">Tentant's Responsibilty</td>
                        </tr>
                    	<tr>
                        	<td style="font-weight:bold;">Refrigerator</td>
                       		<td>
							
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_refrigerator) && $property_data['property_tenant_details']->resp_item_refrigerator == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							
							</td>
                            <td>
							
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_refrigerator) && $property_data['property_tenant_details']->resp_item_refrigerator == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">Stove</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_stove) && $property_data['property_tenant_details']->resp_item_stove == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_stove) && $property_data['property_tenant_details']->resp_item_stove == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">Washer</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_washer) && $property_data['property_tenant_details']->resp_item_washer == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_washer) && $property_data['property_tenant_details']->resp_item_washer == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">Dryer</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_dryer) && $property_data['property_tenant_details']->resp_item_dryer == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_dryer) && $property_data['property_tenant_details']->resp_item_dryer == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">Dishwaser</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_dishwaser) && $property_data['property_tenant_details']->resp_item_dishwaser == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_dishwaser) && $property_data['property_tenant_details']->resp_item_dishwaser == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">Microwave</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_microwave) && $property_data['property_tenant_details']->resp_item_microwave == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_microwave) && $property_data['property_tenant_details']->resp_item_microwave == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">Gas</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_gas) && $property_data['property_tenant_details']->resp_item_gas == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_gas) && $property_data['property_tenant_details']->resp_item_gas == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">Water</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_water) && $property_data['property_tenant_details']->resp_item_water == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_water) && $property_data['property_tenant_details']->resp_item_water == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        
                        <tr>
                        	<td style="font-weight:bold;">Electric</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_electric) && $property_data['property_tenant_details']->resp_item_electric == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_electric) && $property_data['property_tenant_details']->resp_item_electric == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">Sewer</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_sewer) && $property_data['property_tenant_details']->resp_item_sewer == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_sewer) && $property_data['property_tenant_details']->resp_item_sewer == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">Lawn</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_lawn) && $property_data['property_tenant_details']->resp_item_lawn == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_lawn) && $property_data['property_tenant_details']->resp_item_lawn == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">Garbage</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_garbage) && $property_data['property_tenant_details']->resp_item_garbage == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_garbage) && $property_data['property_tenant_details']->resp_item_garbage == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold;">HOA</td>
                       		<td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_hoa) && $property_data['property_tenant_details']->resp_item_hoa == 1){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                            <td>
							<? if(isset($property_data['property_tenant_details']) && isset($property_data['property_tenant_details']->resp_item_hoa) && $property_data['property_tenant_details']->resp_item_hoa == 2){ ?>
							
							<center><img src='/member/img/template/check.png' style='height:20px;'></center>
							
							<? } ?>
							</td>
                        </tr>
                    </table>
                    </div>
                    </div>
                  </div>
                  </div>
                  <div class="tabs-panel box-padding-side section" id="tabs-panel-4">
				  <div class="row">
                    Here are the static terms.
					</div>
                  </div>
                  <div class="tabs-panel box-padding-side section" id="tabs-panel-5">
				  <div class="row">
                    Here are the static FAQ's.
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  <? /*
      <div class="section">
        <div class="row">
          <div class="column xlarge-9 large-8">
            <div class="section">
              <h3 class="section-title">Public Comments</h3>
              <div class="box-white box-padding">
                <div class="section">
                  <form class="comments-form">
                    <textarea placeholder="Any thoughts? Share it with us here!"></textarea>
                    <div class="text-right">
                      <button class="button xregular" type="submit">Submit</button>
                    </div>
                  </form>
                  <div class="comments-container">
                    <div class="row">
                      <div class="column float-right">
                        <!-- mixin comment begin-->
                        <div class="comment">
                          <div class="comment-user"><img class="comment-user-photo" src="img/media/comments/photo-1.jpg" alt=""/>
                            <h6 class="comment-user-name">John Doe</h6>
                          </div>
                          <div class="comment-main">
                            <div class="comment-body">
                              <blockquote>
                                <p>Aliquam nisl felis, auctor id facilisis eget, venenatis non ante. Sed pellentesque ante imperdiet diam hendrerit, ut venenatis lacus imperdiet. Donec sit amet diam at nulla interdum sagittis bibendum ut arcu. Morbi accumsan dictum aliquet. Curabitur eros ligula, bibendum sit amet facilisis at, placerat eget augue.</p>
                              </blockquote>
                            </div>
                            <div class="comment-footer">
                              <div class="row">
                                <div class="column medium-6">
                                  <time class="comment-time" datetime="2017-08-31 14:35">31/08/2017; 2:35 PM</time>
                                </div>
                                <div class="column medium-6">
                                  <div class="comment-btn-container"><a class="button secondary xtiny" href="#">Reply</a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- mixin comment end-->
                      </div>
                      <div class="column float-right medium-11">
                        <!-- change widht of comment via .column-...-->
                        <!-- mixin comment begin-->
                        <div class="comment">
                          <div class="comment-user"><img class="comment-user-photo" src="img/media/comments/photo-2.jpg" alt=""/>
                            <h6 class="comment-user-name">Michael Kane</h6>
                          </div>
                          <div class="comment-main">
                            <div class="comment-body">
                              <blockquote>
                                <p>Aliquam nisl felis, auctor id facilisis eget, venenatis non ante. Sed pellentesque ante imperdiet diam hendrerit, ut venenatis lacus imperdiet. Donec sit amet diam at nulla interdum sagittis bibendum ut arcu. Morbi accumsan dictum aliquet. Curabitur eros ligula, bibendum sit amet facilisis at, placerat eget augue.</p>
                              </blockquote>
                            </div>
                            <div class="comment-footer">
                              <div class="row">
                                <div class="column medium-6">
                                  <time class="comment-time" datetime="2017-08-31 14:35">31/08/2017; 2:35 PM</time>
                                </div>
                                <div class="column medium-6">
                                  <div class="comment-btn-container"><a class="button secondary xtiny" href="#">Reply</a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- mixin comment end-->
                      </div>
                      <div class="column float-right">
                        <!-- mixin comment begin-->
                        <div class="comment">
                          <div class="comment-user"><img class="comment-user-photo" src="img/media/comments/photo-3.jpg" alt=""/>
                            <h6 class="comment-user-name">Jessica McKensey</h6>
                          </div>
                          <div class="comment-main">
                            <div class="comment-body">
                              <blockquote>
                                <p>Aliquam nisl felis, auctor id facilisis eget, venenatis non ante. Sed pellentesque ante imperdiet diam hendrerit, ut venenatis lacus imperdiet. Donec sit amet diam at nulla interdum sagittis bibendum ut arcu. Morbi accumsan dictum aliquet. Curabitur eros ligula, bibendum sit amet facilisis at, placerat eget augue.</p>
                              </blockquote>
                            </div>
                            <div class="comment-footer">
                              <div class="row">
                                <div class="column medium-6">
                                  <time class="comment-time" datetime="2017-08-31 14:35">31/08/2017; 2:35 PM</time>
                                </div>
                                <div class="column medium-6">
                                  <div class="comment-btn-container"><a class="button secondary xtiny" href="#">Reply</a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- mixin comment end-->
                      </div>
                    </div>
                  </div>
                  <!-- mixin load-more begin-->
                  <div class="row">
                    <div class="column medium-4 medium-centered">
                      <div class="load-more section"><a class="button hollow secondary xregular expanded" href="#">Load More</a></div>
                    </div>
                  </div>
                  <!-- mixin load-more end-->
                </div>
              </div>
            </div>
          </div>
          <div class="column xlarge-3 large-4">
            <div class="section">
              <h3 class="section-title">Additional Documents</h3>
              <div class="box-white">
                <ul class="documents-list">
                  <li>
                    <!-- mixin document-preview begin--><a class="media-object document-preview" href="#">
                      <div class="media-object-section">
                        <div class="thumbnail"><img src="img/template/folders.png" alt="" width="30"/></div>
                      </div>
                      <div class="media-object-section">
                        <h5 class="document-preview-title">Documents #4511</h5>
                        <p>Sed vulputate sodales lacus, in ullamcorper neque ulla sed.</p>
                      </div></a>
                    <!-- mixin document-preview end-->
                  </li>
                  <li>
                    <!-- mixin document-preview begin--><a class="media-object document-preview" href="#">
                      <div class="media-object-section">
                        <div class="thumbnail"><img src="img/template/video.png" alt="" width="29"/></div>
                      </div>
                      <div class="media-object-section">
                        <h5 class="document-preview-title">Video of property</h5>
                        <p>Vestibulum, at interdum tortor lorem lobortis.</p>
                      </div></a>
                    <!-- mixin document-preview end-->
                  </li>
                  <li>
                    <!-- mixin document-preview begin--><a class="media-object document-preview" href="#">
                      <div class="media-object-section">
                        <div class="thumbnail"><img src="img/template/photo.png" alt="" width="29"/></div>
                      </div>
                      <div class="media-object-section">
                        <h5 class="document-preview-title">All photos in RAR</h5>
                        <p>Quis nibh viverra, egestas magna eget, consequat nisi.</p>
                      </div></a>
                    <!-- mixin document-preview end-->
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
	  */ ?>
	  
	  
	  

	@endsection
	@section('footer')
	<script>


	$(document).ready(function(){
		
	<?
	
	$propertyController = new App\Http\Controllers\Property\PropertyController();
	$payment_periods = $propertyController->propertyPriceChangesChartData($property_item->id);
	
	$js_period_labels = "";
	$js_period_amount = "";
	$i=0;
	$js_array_php = array();
	if(count($payment_periods)>0){
		
		foreach($payment_periods as $period_item){
		
			$js_period_labels .= '"' . date("F-Y", strtotime($period_item['period_start'])) . '"';
			$js_period_amount .= '"' . $period_item['period_amount'] . '"';
			$js_array_php[] = $period_item['period_amount'];
			if($i<count($payment_periods)-1){
				
				$js_period_labels .= ",";
				$js_period_amount .= ",";
				
			}
		
			$i++;
	
		}
		
	}
	
	if(count($js_array_php)>0){ $maxValueChart = max($js_array_php); } else { $maxValueChart = "500000"; }
	
	if(strlen($js_period_labels)<1){
		
		$js_period_labels = '"Jan-' . date("Y") . '","Apr-' . date("Y") . '","Jul-' . date("Y") . '","Oct-' . date("Y") . '",';
		
	}
	
	?>
	
	if( $('#financial-overview-chart-x').length ) {

		var ctx = document.getElementById('financial-overview-chart-x').getContext('2d');

		var data = {
			// yLabels: ['', 'Request Added', 'Request Viewed', 'Request Accepted', 'Request Solved', 'Solving Confirmed'],
			xLabels: [<?= $js_period_labels ?>],
			datasets: [{
				label: "",
				backgroundColor: 'rgba(40, 201, 77, 0.05)',
				borderColor: 'rgb(40, 201, 77)',
				data: [<?= $js_period_amount ?>],
				pointRadius: 7,
			}]
		}
		
		var chart = new Chart.Line(ctx, {
			// The type of chart we want to create
			// The data for our dataset
			data,
		
			// Configuration options go here
			options: {
				responsive: true,
				scaleOverride: true,
				scaleSteps: <?= $maxValueChart/5 ?>,
				// scaleStepWidth: 100,
				scaleStartValue: 0,
				scales: {
					xAxes: [{
						gridLines: {
							color: "#e9ebf1",
							color: "transparent",
						},
						ticks: {
							fontSize: 15
						}
					}],
					yAxes:[{
						// type: 'category',
						gridLines: {
							color: "#e9ebf1",
						},
						ticks: {
							min: <? if(count($js_array_php)>0){ echo min($js_array_php)-$maxValueChart/5; } else {echo "200000";} ?>,
							beginAtZero: false,
							stepSize: <?= $maxValueChart/5 ?>,
							fontSize: 15,
                            userCallback: function(value, index, values) {
        value = value.toString();
        value = value.split(/(?=(?:...)*$)/);
        value = value.join(',');
        return '$' + value;
    }
						},
                        scaleLabel: { 
                            display: true,
                            labelString: 'Price, (USD)'
                        }
					}]
				},
				layout: {
					padding: {
						left: 0,
						right: 0,
						top: 0,
						bottom: 0
					}
				},
				legend: {
					display: false
				},
				
			}
		});

	}
	
	
	
	
	});
	
	</script>
	
	
<!-- !!!!!!!upload to server -->
<script src="http://www.chartjs.org/samples/latest/utils.js"></script>
<!--<script src="/js/chartjs/src/chart.js"></script>-->
<script>

		var barChartData;
		var barChartData3;
		
		var chartBarOptions = {
					
                    title:{
                        display:true,
                        text:""
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
							maxBarThickness:40,
                        }],
                        yAxes: [{
                            stacked: true,
							maxBarThickness:40,
                        }]
                    }
                };
				

        window.onload = function() {
			
			
			
            var ctx = document.getElementById("chart").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: null,
                options: {
					
                    title:{
                        display:false,
                        text:"Estimated Total Gain Per Assumptions"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
						callbacks: {
							label: function(tooltipItem, data) {
								console.log(tooltipItem);console.log(data.datasets[tooltipItem.datasetIndex].label);
								var label = data.datasets[tooltipItem.datasetIndex].label;
								return label+": $" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
									return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
								});
								
							}
					  } // end callbacks:
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
							maxBarThickness:40,
                        }],
                        yAxes: [{
                            stacked: true,
							maxBarThickness:40,
							ticks: {
								//beginAtZero: true,
								userCallback: function(value, index, values) {
									value = value.toString();
									value = value.split(/(?=(?:...)*$)/);
									value = value.join(',');
									return "$"+value;
								}
							}
                        }]
                    }
                }
            });
			
            var ctx2 = document.getElementById("chart2").getContext("2d");
            window.myBar2 = new Chart(ctx2, {
				//scaleOverride : true,
				//scaleSteps : 10,
				//scaleStepWidth : 50,
				//scaleStartValue : 0, 
                type: 'line',
                data: null,
                options: {
					/*tooltips: {
					  callbacks: {
							label: function(tooltipItem, data) {
								var value = data.datasets[0].data[tooltipItem.index];
								value = value.toString();
								value = value.split(/(?=(?:...)*$)/);
								value = value.join(',');
								return "$"+value;
							}
					  } // end callbacks:
					}, //end tooltips
						*/	
                    title:{
                        display:false,
                        text:"Equity Build Up"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
						callbacks: {
							label: function(tooltipItem, data) {
								console.log(tooltipItem);console.log(data.datasets[tooltipItem.datasetIndex].label);
								var label = data.datasets[tooltipItem.datasetIndex].label;
								return label+": $" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
									return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
								});
								
							}
					  } // end callbacks:
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            display: true,
							maxBarThickness:40,
                        }],
                        yAxes: [{
                            display: true,
							maxBarThickness:40,
							ticks: {
								beginAtZero: true,
								userCallback: function(value, index, values) {
									value = value.toString();
									value = value.split(/(?=(?:...)*$)/);
									value = value.join(',');
									return "$"+value;
								}
							}
                        }]
                    }
                }
            });
			
            var ctx3 = document.getElementById("chart3").getContext("2d");
            window.myBar3 = new Chart(ctx3, {
                type: 'bar',
                data: null,
                options: {
					
                    title:{
                        display:false,
                        text:"Net Cash Flow"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
						callbacks: {
							label: function(tooltipItem, data) {
								console.log(tooltipItem);console.log(data.datasets[tooltipItem.datasetIndex].label);
								var label = data.datasets[tooltipItem.datasetIndex].label;
								return label+": $" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
									return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
								});
								
							}
					  } // end callbacks:
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
							maxBarThickness:40,
                        }],
                        yAxes: [{
                            stacked: true,
							maxBarThickness:40,
							ticks: {
								//beginAtZero: true,
								userCallback: function(value, index, values) {
									value = value.toString();
									value = value.split(/(?=(?:...)*$)/);
									value = value.join(',');
									return "$"+value;
								}
							}
                        }]
                    }
                }
            });
			
			
        };

       /*
	   // chart 2
		var barChartData2;

        window.onload = function() {
            var ctx2 = document.getElementById("chart2").getContext("2d");
            window.myBar2 = new Chart(ctx2, {
                type: 'bar',
                data: null,
                options: {
					
                    title:{
                        display:true,
                        text:"Equity Build-up"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
							maxBarThickness:40,
                        }],
                        yAxes: [{
                            stacked: true,
							maxBarThickness:40,
                        }]
                    }
                }
            });
        };
		*/

	   // chart 3
	   /*
		var barChartData3;

        window.onload = function() {
            var ctx3 = document.getElementById("chart3").getContext("2d");
            window.myBar3 = new Chart(ctx3, {
                type: 'bar',
                data: null,
                options: {
					
                    title:{
                        display:true,
                        text:"Net Cash Flow"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
							maxBarThickness:40,
                        }],
                        yAxes: [{
                            stacked: true,
							maxBarThickness:40,
                        }]
                    }
                }
            });
        };
		
		*/
    </script>

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

	<script src="/js/inputmask/dist/jquery.inputmask.bundle.js"></script>
	<script>
	
	var propertyPrice = <?= $property_data['property_item']->property_price ?>;
	var max_invest_amount = <?= $max_invest_amount ?>;
		
	function setPercents(obj_amount, obj_percents, state){
		
		var investAmount = parseFloat($("#"+obj_amount).val());
		
		//alert(investAmount);
		
		if(investAmount > max_invest_amount){
			
			investAmount = max_invest_amount;
			
		}
		
		var investPercents = (investAmount / propertyPrice) * 100;
		
		console.log(investAmount);console.log(investPercents);
		
		$("#"+obj_percents).val(investPercents.toFixed(2)+"%");
		
		if(state == 1){
			
			//var investAmount = parseFloat($("#invest_amount_process").val());
			$("#invest_amount_process_2").val(investAmount);
			//var investPercents = (investAmount / propertyPrice) * 100;
			$("#invest_percent_get_2").val(investPercents.toFixed(2)+"%");
			
		}
		
		if(state == 2){
			
			//var investAmount = parseFloat($("#invest_amount_process_2").val());
			$("#invest_amount_process").val(investAmount);
			//var investPercents = (investAmount / propertyPrice) * 100;
			$("#invest_percent_get").val(investPercents.toFixed(2)+"%");
			
		}
		
		changeCalculatorValues();
		
	}
	


	$(document).ready(function(){
		
		// --- 1
		/*$("#invest_amount_process").inputmask({alias: 'numeric', 
						oncomplete : function(){setPercents("invest_amount_process","invest_percent_get",1);},
						   allowMinus: false,  
						   digits: 2, 
						   max: <? $available_for_invest = $property_data['max_invest']; echo $available_for_invest; ?>});
						   */
		
		
		$("#invest_amount_process").change(function(e) { setPercents("invest_amount_process","invest_percent_get",1); });
		$("#invest_amount_process").keyup(function() { setPercents("invest_amount_process","invest_percent_get",1); });
		
		// --- 2
		$("#invest_amount_process_2").inputmask({alias: 'numeric', 
						oncomplete : function(){setPercents("invest_amount_process_2","invest_percent_get_2",2);}, 
						   allowMinus: false,  
						   digits: 2, 
						   max: <? $available_for_invest = $property_data['max_invest']; echo $available_for_invest; ?>});
		
		
		$("#invest_amount_process_2").change(function(e) { setPercents("invest_amount_process_2","invest_percent_get_2",2); });
		$("#invest_amount_process_2").keyup(function() { setPercents("invest_amount_process_2","invest_percent_get_2",2); });
		
		$("body").on("change","#invest_amount_process_2",function(e) { setPercents("invest_amount_process_2","invest_percent_get_2",2); });
		
		
	});
	
	</script>
	
	<? if (Auth::check()) { ?>
	
	<script>
	
	$(document).ready(function(){
		
		$(".invest-button").click(function(){
			
			var investAmount = parseFloat($("#invest_amount_process").val());
			
			if(investAmount){
				
				if(investAmount > 0){
					
					var link = $(this).attr('href2');
					link += "&invest_amount="+ investAmount;
					
					document.location.href=link;
					
				}
				
			}
			
		});
		
		
		
		
		
		
		$("body").on("click",".favorite-item",function(){
			
			var property_id = $(this).attr("data-property-id");
			var data_fav_1 = parseFloat($(this).attr("data-fav"));
			
			//alert(data_fav_1);
			
			if(data_fav_1 == 0){
				
				var data_fav = 1;
				
			}else{ 
				
				if(data_fav_1 == 1){
					
					var data_fav = 0;
					
				}
				
			}
			
			//alert(data_fav);
			
			$(this).attr("data-fav", data_fav);
			 
			 $.ajax({
					type: "GET",
					url: "/member/addtofavorite",
					data: {
						"property_id": property_id,
						"data_fav": data_fav
					},
					cache: false,
					success: function(response){
						
						
						
					}
				});
			
		});
		
	});

	</script>

	<? }else{ ?>

	<script>

	$(document).ready(function(){

		$(".invest-button").click(function(){
			
			//$("").show();
      location.hash = '#alert-modal';

			
		});

	})	

	</script>

	<? } ?>






    <script src="/js/ionrangeslider/js/ion.rangeSlider.js"></script>
	<script>
	
	function number_format( number, decimals, dec_point, thousands_sep ) {	// Format a number with grouped thousands
		
		var i, j, kw, kd, km;

		// input sanitation & defaults
		if( isNaN(decimals = Math.abs(decimals)) ){
			decimals = 2;
		}
		if( dec_point == undefined ){
			dec_point = ",";
		}
		if( thousands_sep == undefined ){
			thousands_sep = ".";
		}

		i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

		if( (j = i.length) > 3 ){
			j = j % 3;
		} else{
			j = 0;
		}

		km = (j ? i.substr(0, j) + thousands_sep : "");
		kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
		//kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
		kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");


		return km + kw + kd;
		
	}




	function isNumeric(n) {
	  return !isNaN(parseFloat(n)) && isFinite(n);
	}
	
	function changeCalculatorValues(invest_amount){
		
		// Saving it's instance to var
		var sliderCurrentRent = $("#calculator-slider-current-rent").data("ionRangeSlider");
		var sliderChangeRent = $("#calculator-slider-rent-change").data("ionRangeSlider");
		var sliderVacancyRate = $("#calculator-slider-vacancy-rate").data("ionRangeSlider");
		var sliderAppreciationFirst = $("#calculator-slider-appreciation-first").data("ionRangeSlider");
		var sliderAppreciation = $("#calculator-slider-appreciation").data("ionRangeSlider");
		var sliderTaxes = $("#calculator-slider-taxes").data("ionRangeSlider");
		var sliderInsurance = $("#calculator-slider-insurance").data("ionRangeSlider");
		var sliderMaintenance = $("#calculator-slider-maintenance").data("ionRangeSlider");
		var sliderCatex = $("#calculator-slider-catex").data("ionRangeSlider");
		
		
		// Get values
		var currentRentValue = sliderCurrentRent.result.from;
		var rentChangeValue = sliderChangeRent.result.from;
		var vacancyRateValue = sliderVacancyRate.result.from;
		var appreciationFirstValue = sliderAppreciationFirst.result.from;
		var appreciationValue = sliderAppreciation.result.from;
		var taxesValue = sliderTaxes.result.from;
		var insuranceValue = sliderInsurance.result.from;
		var maintenanceValue = sliderMaintenance.result.from;
		var catexValue = sliderCatex.result.from;
		
		// Gross Rent
		
		var grossrent_year_1 = currentRentValue*12;
		var grossrent_year_2 = (rentChangeValue/100)*grossrent_year_1 + grossrent_year_1;
		var grossrent_year_3 = (rentChangeValue/100)*grossrent_year_2 + grossrent_year_2;
		var grossrent_year_4 = (rentChangeValue/100)*grossrent_year_3 + grossrent_year_3;
		var grossrent_year_5 = (rentChangeValue/100)*grossrent_year_4 + grossrent_year_4;
		
		//function gross rent
		grossrent_array = [];
		grossrent_array[0] = 0;
		grossrent_array[1] = currentRentValue*12;
		for(var i=2;i<=30;i++){
			
			grossrent_array[i] = (rentChangeValue/100)*grossrent_array[i-1] + grossrent_array[i-1];
			
		}
		
		console.log("grossrent_array");
		console.log(grossrent_array);
		
		//var grossrent_year_5 = (rentChangeValue/100)*grossrent_year_4 + grossrent_year_4;
		
		$("#calculator-value-gross-rent-0").text("");
		$("#calculator-value-gross-rent-1").text("$"+number_format( grossrent_year_1.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-gross-rent-2").text("$"+number_format( grossrent_year_2.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-gross-rent-3").text("$"+number_format( grossrent_year_3.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-gross-rent-4").text("$"+number_format( grossrent_year_4.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-gross-rent-5").text("$"+number_format( grossrent_year_5.toFixed(2), 2, '.', ',' ));
		
		
		// Economic Vacancy Factor
		
		//var economic_vacancy_factor_year_0 = (vacancyRateValue/100)*grossrent_year_0;
		var economic_vacancy_factor_year_1 = (vacancyRateValue/100)*grossrent_year_1;
		var economic_vacancy_factor_year_2 = (vacancyRateValue/100)*grossrent_year_2;
		var economic_vacancy_factor_year_3 = (vacancyRateValue/100)*grossrent_year_3;
		var economic_vacancy_factor_year_4 = (vacancyRateValue/100)*grossrent_year_4;
		var economic_vacancy_factor_year_5 = (vacancyRateValue/100)*grossrent_year_5;
		
		//function economic_vacancy_factor
		economic_vacancy_factor_array = [];
		economic_vacancy_factor_array[0] = 0;
		for(var i=1;i<=30;i++){
			
			economic_vacancy_factor_array[i] = (vacancyRateValue/100)*grossrent_array[i];
			
		}
		
		console.log("economic_vacancy_factor_array");
		console.log(economic_vacancy_factor_array);
		
		$("#calculator-value-vacancy-factor-0").text("");
		$("#calculator-value-vacancy-factor-1").text("$"+number_format( economic_vacancy_factor_year_1.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-vacancy-factor-2").text("$"+number_format( economic_vacancy_factor_year_2.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-vacancy-factor-3").text("$"+number_format( economic_vacancy_factor_year_3.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-vacancy-factor-4").text("$"+number_format( economic_vacancy_factor_year_4.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-vacancy-factor-5").text("$"+number_format( economic_vacancy_factor_year_5.toFixed(2), 2, '.', ',' ));
		
		
		// Expected Rent
		
		//var expected_rent_year_0 = grossrent_year_0 - economic_vacancy_factor_year_0;
		var expected_rent_year_1 = grossrent_year_1 - economic_vacancy_factor_year_1;
		var expected_rent_year_2 = grossrent_year_2 - economic_vacancy_factor_year_2;
		var expected_rent_year_3 = grossrent_year_3 - economic_vacancy_factor_year_3;
		var expected_rent_year_4 = grossrent_year_4 - economic_vacancy_factor_year_4;
		var expected_rent_year_5 = grossrent_year_5 - economic_vacancy_factor_year_5;
		
		// function expected rent
		expected_rent_array = [];
		expected_rent_array[0] = 0;
		for(var i=1;i<=30;i++){
			
			expected_rent_array[i] = grossrent_array[i] - economic_vacancy_factor_array[i];
			
		}

		console.log("expected_rent_array");
		console.log(expected_rent_array);
		
		
		
		$("#calculator-value-expected-rent-0").text("");
		$("#calculator-value-expected-rent-1").text("$"+number_format( expected_rent_year_1.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-expected-rent-2").text("$"+number_format( expected_rent_year_2.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-expected-rent-3").text("$"+number_format( expected_rent_year_3.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-expected-rent-4").text("$"+number_format( expected_rent_year_4.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-expected-rent-5").text("$"+number_format( expected_rent_year_5.toFixed(2), 2, '.', ',' ));
		
		
		// Property Management
		
		var property_management_fees = 10; //%
		
		//var property_management_year_0 = (property_management_fees/100)*expected_rent_year_0;
		var property_management_year_1 = (property_management_fees/100)*expected_rent_year_1;
		var property_management_year_2 = (property_management_fees/100)*expected_rent_year_2;
		var property_management_year_3 = (property_management_fees/100)*expected_rent_year_3;
		var property_management_year_4 = (property_management_fees/100)*expected_rent_year_4;
		var property_management_year_5 = (property_management_fees/100)*expected_rent_year_5;
		
		
		// function property_management
		property_management_array = [];
		property_management_array[0] = 0;
		for(var i=1;i<=30;i++){
			
			property_management_array[i] = (property_management_fees/100)*expected_rent_array[i];
			
		}

		console.log("property_management_array");
		console.log(property_management_array);
		
		
		$("#calculator-value-property-management-0").text("");
		$("#calculator-value-property-management-1").text("$"+number_format( property_management_year_1.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-property-management-2").text("$"+number_format( property_management_year_2.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-property-management-3").text("$"+number_format( property_management_year_3.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-property-management-4").text("$"+number_format( property_management_year_4.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-property-management-5").text("$"+number_format( property_management_year_5.toFixed(2), 2, '.', ',' ));
		
		
		// Operations & Maintenance
		
		//var maintenance_year_0 = (maintenanceValue/100)*expected_rent_year_0;
		var maintenance_year_1 = (maintenanceValue/100)*expected_rent_year_1;
		var maintenance_year_2 = (maintenanceValue/100)*expected_rent_year_2;
		var maintenance_year_3 = (maintenanceValue/100)*expected_rent_year_3;
		var maintenance_year_4 = (maintenanceValue/100)*expected_rent_year_4;
		var maintenance_year_5 = (maintenanceValue/100)*expected_rent_year_5;
		
		
		// function maintenance
		maintenance_array = [];
		maintenance_array[0] = 0;
		for(var i=1;i<=30;i++){
			
			maintenance_array[i] = (maintenanceValue/100)*expected_rent_array[i];
			
		}

		console.log("maintenance_array");
		console.log(maintenance_array);
		
		
		
		$("#calculator-value-maintenance-0").text("");
		$("#calculator-value-maintenance-1").text("$"+number_format( maintenance_year_1.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-maintenance-2").text("$"+number_format( maintenance_year_2.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-maintenance-3").text("$"+number_format( maintenance_year_3.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-maintenance-4").text("$"+number_format( maintenance_year_4.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-maintenance-5").text("$"+number_format( maintenance_year_5.toFixed(2), 2, '.', ',' ));
		
		
		// Property Taxes
		
		var propertyValue = $("#calculator-slider-property-value").attr("data-price"); //%
		
		
		var property_taxes_year_1 = (taxesValue/100)*propertyValue;
		var property_taxes_year_2 = (appreciationValue/100)*property_taxes_year_1 + property_taxes_year_1;
		var property_taxes_year_3 = (appreciationValue/100)*property_taxes_year_2 + property_taxes_year_2;
		var property_taxes_year_4 = (appreciationValue/100)*property_taxes_year_3 + property_taxes_year_3;
		var property_taxes_year_5 = (appreciationValue/100)*property_taxes_year_4 + property_taxes_year_4;
		//var property_taxes_year_5 = (appreciationValue/100)*property_taxes_year_4 + property_taxes_year_4;
		
		
		// function property_taxes
		property_taxes_array = [];
		property_taxes_array[0] = 0;
		property_taxes_array[1] = (taxesValue/100)*propertyValue;
		for(var i=2;i<=30;i++){
			
			property_taxes_array[i] = (appreciationValue/100)*property_taxes_array[i-1] + property_taxes_array[i-1];
			
		}

		console.log("property_taxes_array");
		console.log(property_taxes_array);
		
		
		
		$("#calculator-value-taxes-0").text("");
		$("#calculator-value-taxes-1").text("$"+number_format( property_taxes_year_1.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-taxes-2").text("$"+number_format( property_taxes_year_2.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-taxes-3").text("$"+number_format( property_taxes_year_3.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-taxes-4").text("$"+number_format( property_taxes_year_4.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-taxes-5").text("$"+number_format( property_taxes_year_5.toFixed(2), 2, '.', ',' ));
		
		
		// Insurance
		
		var insurance_year_1 = (insuranceValue/100)*propertyValue;
		var insurance_year_2 = (appreciationValue/100)*insurance_year_1 + insurance_year_1;
		var insurance_year_3 = (appreciationValue/100)*insurance_year_2 + insurance_year_2;
		var insurance_year_4 = (appreciationValue/100)*insurance_year_3 + insurance_year_3;
		var insurance_year_5 = (appreciationValue/100)*insurance_year_4 + insurance_year_4;
		//var insurance_year_5 = (appreciationValue/100)*insurance_year_4 + insurance_year_4;
		
		
		// function insurance
		insurance_array = [];
		insurance_array[0] = 0;
		insurance_array[1] = (insuranceValue/100)*propertyValue;
		for(var i=2;i<=30;i++){
			
			insurance_array[i] = (appreciationValue/100)*insurance_array[i-1] + insurance_array[i-1];
			
		}

		console.log("insurance_array");
		console.log(insurance_array);
		
		
		
		
		
		$("#calculator-value-insurance-0").text("");
		$("#calculator-value-insurance-1").text("$"+number_format( insurance_year_1.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-insurance-2").text("$"+number_format( insurance_year_2.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-insurance-3").text("$"+number_format( insurance_year_3.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-insurance-4").text("$"+number_format( insurance_year_4.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-insurance-5").text("$"+number_format( insurance_year_5.toFixed(2), 2, '.', ',' ));
		
		
		// Capital Expenditures
		
		var capex_fees = catexValue; //%
		
		//var capex_year_0 = (capex_fees/100)*expected_rent_year_0;
		var capex_year_1 = (capex_fees/100)*expected_rent_year_1;
		var capex_year_2 = (capex_fees/100)*expected_rent_year_2;
		var capex_year_3 = (capex_fees/100)*expected_rent_year_3;
		var capex_year_4 = (capex_fees/100)*expected_rent_year_4;
		var capex_year_5 = (capex_fees/100)*expected_rent_year_5;
		
		
		// function capex
		capex_array = [];
		capex_array[0] = 0;
		for(var i=1;i<=30;i++){
			
			capex_array[i] = (capex_fees/100)*expected_rent_array[i];
			
		}

		console.log("capex_array");
		console.log(capex_array);
		
		
		$("#calculator-value-capital-expenditures-0").text("");
		$("#calculator-value-capital-expenditures-1").text("$"+number_format( capex_year_1.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-capital-expenditures-2").text("$"+number_format( capex_year_2.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-capital-expenditures-3").text("$"+number_format( capex_year_3.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-capital-expenditures-4").text("$"+number_format( capex_year_4.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-capital-expenditures-5").text("$"+number_format( capex_year_5.toFixed(2), 2, '.', ',' ));
		
		
		// Total Expenses
		
		//var total_expenses_year_0 = capex_year_0 + insurance_year_0 + property_taxes_year_0 + maintenance_year_0 + property_management_year_0;
		var total_expenses_year_1 = capex_year_1 + insurance_year_1 + property_taxes_year_1 + maintenance_year_1 + property_management_year_1;
		var total_expenses_year_2 = capex_year_2 + insurance_year_2 + property_taxes_year_2 + maintenance_year_2 + property_management_year_2;
		var total_expenses_year_3 = capex_year_3 + insurance_year_3 + property_taxes_year_3 + maintenance_year_3 + property_management_year_3;
		var total_expenses_year_4 = capex_year_4 + insurance_year_4 + property_taxes_year_4 + maintenance_year_4 + property_management_year_4;
		var total_expenses_year_5 = capex_year_5 + insurance_year_5 + property_taxes_year_5 + maintenance_year_5 + property_management_year_5;
		
		
		// function total_expenses
		total_expenses_array = [];
		total_expenses_array[0] = 0;
		for(var i=1;i<=30;i++){
			
			total_expenses_array[i] = capex_array[i] + insurance_array[i] + property_taxes_array[i] + maintenance_array[i] + property_management_array[i];
			
		}

		console.log("total_expenses_array");
		console.log(total_expenses_array);
		
		$("#calculator-value-total-expenses-0").text("");
		$("#calculator-value-total-expenses-1").text("$"+number_format( total_expenses_year_1.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-total-expenses-2").text("$"+number_format( total_expenses_year_2.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-total-expenses-3").text("$"+number_format( total_expenses_year_3.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-total-expenses-4").text("$"+number_format( total_expenses_year_4.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-total-expenses-5").text("$"+number_format( total_expenses_year_5.toFixed(2), 2, '.', ',' ));
		
		
		// Total Operating Cash Flow
		
		//var total_cash_flow_year_0 = expected_rent_year_0 - total_expenses_year_0;
		var total_cash_flow_year_1 = expected_rent_year_1 - total_expenses_year_1;
		var total_cash_flow_year_2 = expected_rent_year_2 - total_expenses_year_2;
		var total_cash_flow_year_3 = expected_rent_year_3 - total_expenses_year_3;
		var total_cash_flow_year_4 = expected_rent_year_4 - total_expenses_year_4;
		var total_cash_flow_year_5 = expected_rent_year_5 - total_expenses_year_5;
		
		
		// function total_cash_flow
		total_cash_flow_array = [];
		total_cash_flow_array[0] = 0;
		for(var i=1;i<=30;i++){
			
			total_cash_flow_array[i] = expected_rent_array[i] - total_expenses_array[i];
			
		}

		console.log("total_cash_flow_array");
		console.log(total_cash_flow_array);
		
		
		
		$("#calculator-value-cash-flow-0").text("");
		$("#calculator-value-cash-flow-1").text("$"+number_format( total_cash_flow_year_1.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-cash-flow-2").text("$"+number_format( total_cash_flow_year_2.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-cash-flow-3").text("$"+number_format( total_cash_flow_year_3.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-cash-flow-4").text("$"+number_format( total_cash_flow_year_4.toFixed(2), 2, '.', ',' ));
		$("#calculator-value-cash-flow-5").text("$"+number_format( total_cash_flow_year_5.toFixed(2), 2, '.', ',' ));
		
		
		// Asset Property Value
		
		// function property_value
		property_value_array = [];
		property_value_array[0] = parseFloat(propertyValue);
		for(var i=1;i<=30;i++){
			
			if(i==1){
				property_value_array[i] = (appreciationFirstValue/100)*property_value_array[i-1] + property_value_array[i-1];
			}else{
				property_value_array[i] = (appreciationValue/100)*property_value_array[i-1] + property_value_array[i-1];
			}
			
		}

		console.log("property_value_array");
		console.log(property_value_array);
		
		for(var j=0;j<6;j++){
			$("#calculator-value-property-value-"+j).text("$"+number_format( property_value_array[j].toFixed(2), 2, '.', ',' ));
		}
		
		
		// Member Earnings
		if(invest_amount){
			
			var investAmount = invest_amount;
			
		}else{
			
			var investAmount = parseFloat($("#invest_amount_process").val());
			
		}
		
		console.log("InvestAmount");
		console.log(investAmount);
		
		if(isNumeric(investAmount)){
			
			var investFraction = investAmount / propertyPrice;
			
			//var cash_earnings_year_999 = 0-investAmount;
			var cash_earnings_year_0 = investAmount;
			var cash_earnings_year_1 = total_cash_flow_year_1 * investFraction;
			var cash_earnings_year_2 = total_cash_flow_year_2 * investFraction;
			var cash_earnings_year_3 = total_cash_flow_year_3 * investFraction;
			var cash_earnings_year_4 = total_cash_flow_year_4 * investFraction;
			var cash_earnings_year_5 = total_cash_flow_year_5 * investFraction;
			
				
			// function cash_earnings
			cash_earnings_array = [];
			cash_earnings_array[0] = 0-investAmount;
			for(var i=1;i<=30;i++){
				
				cash_earnings_array[i] = total_cash_flow_array[i] * investFraction;
				
			}

			console.log("cash_earnings_array");
			console.log(cash_earnings_array);
		
			
			//$("#calculator-value-cash-earnings-999").text("$"+number_format( cash_earnings_year_0.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-0").text("-$"+number_format( cash_earnings_year_0.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-1").text("$"+number_format( cash_earnings_year_1.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-2").text("$"+number_format( cash_earnings_year_2.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-3").text("$"+number_format( cash_earnings_year_3.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-4").text("$"+number_format( cash_earnings_year_4.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-5").text("$"+number_format( cash_earnings_year_5.toFixed(2), 2, '.', ',' ));
            
            //var cash_earnings_year_999 = 0-investAmount;
			var cash_earnings_year_quarterly_0 = investAmount * .25;
			var cash_earnings_year_quarterly_1 = total_cash_flow_year_1 * investFraction * .25;
			var cash_earnings_year_quarterly_2 = total_cash_flow_year_2 * investFraction * .25;
			var cash_earnings_year_quarterly_3 = total_cash_flow_year_3 * investFraction * .25;
			var cash_earnings_year_quarterly_4 = total_cash_flow_year_4 * investFraction * .25;
			var cash_earnings_year_quarterly_5 = total_cash_flow_year_5 * investFraction * .25;
			
			//$("#calculator-value-cash-earnings-999").text("$"+number_format( cash_earnings_year_quarterly_0.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-quarterly-0").text("-$"+number_format( cash_earnings_year_quarterly_0.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-quarterly-1").text("$"+number_format( cash_earnings_year_quarterly_1.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-quarterly-2").text("$"+number_format( cash_earnings_year_quarterly_2.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-quarterly-3").text("$"+number_format( cash_earnings_year_quarterly_3.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-quarterly-4").text("$"+number_format( cash_earnings_year_quarterly_4.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-earnings-quarterly-5").text("$"+number_format( cash_earnings_year_quarterly_5.toFixed(2), 2, '.', ',' ));
			
            //Kyle - Cash Yield Calculations
            //var cash_earnings_year_999 = 0-investAmount;
			var cash_earnings_cash_yield_0 = investAmount;
			var cash_earnings_cash_yield_1 = total_cash_flow_year_1 * investFraction;
			var cash_earnings_cash_yield_2 = total_cash_flow_year_2 * investFraction;
			var cash_earnings_cash_yield_3 = total_cash_flow_year_3 * investFraction;
			var cash_earnings_cash_yield_4 = total_cash_flow_year_4 * investFraction;
			var cash_earnings_cash_yield_5 = total_cash_flow_year_5 * investFraction;
			
			

			//$("#calculator-value-cash-yield-999").text("$"+number_format( cash_earnings_cash_yield_0.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-yield-0").text("-$"+number_format( cash_earnings_cash_yield_0.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-yield-1").text("$"+number_format( cash_earnings_cash_yield_1.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-yield-2").text("$"+number_format( cash_earnings_cash_yield_2.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-yield-3").text("$"+number_format( cash_earnings_cash_yield_3.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-yield-4").text("$"+number_format( cash_earnings_cash_yield_4.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-cash-yield-5").text("$"+number_format( cash_earnings_cash_yield_5.toFixed(2), 2, '.', ',' ));
            
			
			
			
			
			// Asset Value: function asset_value
			asset_value_array = [];
			asset_value_array[0] = investAmount;
			for(var i=1;i<=30;i++){
				
				asset_value_array[i] = property_value_array[i]/property_value_array[i-1] * asset_value_array[i-1];
				
			}

			console.log("asset_value_array");
			console.log(asset_value_array);
			
			for(var j=0;j<6;j++){
				$("#calculator-value-asset-value-"+j).text("$"+number_format( asset_value_array[j].toFixed(2), 2, '.', ',' ));
			}
			
			
		
		
		
		
		
		
		
			//Kyle - Asset Value Growth Calculations
            var asset_growth_year_0 = investAmount - investAmount;
			var asset_growth_year_1 = asset_value_array[1] - investAmount;
			var asset_growth_year_2 = asset_value_array[2] - investAmount;
			var asset_growth_year_3 = asset_value_array[3] - investAmount;
			var asset_growth_year_4 = asset_value_array[4] - investAmount;
			var asset_growth_year_5 = asset_value_array[5] - investAmount;
			
			
			
			
			$("#calculator-value-asset-growth-0").text("$"+number_format( asset_growth_year_0.toFixed(2), 0, '.', ',' ));
			$("#calculator-value-asset-growth-1").text("$"+number_format( asset_growth_year_1.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-asset-growth-2").text("$"+number_format( asset_growth_year_2.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-asset-growth-3").text("$"+number_format( asset_growth_year_3.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-asset-growth-4").text("$"+number_format( asset_growth_year_4.toFixed(2), 2, '.', ',' ));
			$("#calculator-value-asset-growth-5").text("$"+number_format( asset_growth_year_5.toFixed(2), 2, '.', ',' ));
            
            //Kyle - Total ROI
            var total_roi_year_0 = ((asset_growth_year_0 + cash_earnings_cash_yield_0)/investAmount)*100;
			var total_roi_year_1 = ((asset_growth_year_1 + cash_earnings_cash_yield_1)/investAmount)*100;
			var total_roi_year_2 = ((asset_growth_year_2 + cash_earnings_cash_yield_2)/investAmount)*100;
			var total_roi_year_3 = ((asset_growth_year_3 + cash_earnings_cash_yield_3)/investAmount)*100;
			var total_roi_year_4 = ((asset_growth_year_4 + cash_earnings_cash_yield_4)/investAmount)*100;
			var total_roi_year_5 = ((asset_growth_year_5 + cash_earnings_cash_yield_5)/investAmount)*100;
			
			$("#calculator-value-total-roi-0").text("-"+number_format( total_roi_year_0.toFixed(2), 0, '.', ',' )+"%");
			$("#calculator-value-total-roi-1").text(number_format( total_roi_year_1.toFixed(2), 2, '.', ',' )+"%");
			$("#calculator-value-total-roi-2").text(number_format( total_roi_year_2.toFixed(2), 2, '.', ',' )+"%");
			$("#calculator-value-total-roi-3").text(number_format( total_roi_year_3.toFixed(2), 2, '.', ',' )+"%");
			$("#calculator-value-total-roi-4").text(number_format( total_roi_year_4.toFixed(2), 2, '.', ',' )+"%");
			$("#calculator-value-total-roi-5").text(number_format( total_roi_year_5.toFixed(2), 2, '.', ',' )+"%");
		
        
            
            
			var total_gain_year_0 = (cash_earnings_year_0 + asset_value_array[0]) - investAmount;
			var total_gain_year_1 = (cash_earnings_year_1 + asset_value_array[1]) - investAmount;
			var total_gain_year_2 = (cash_earnings_year_2 + asset_value_array[2]) - investAmount;
			var total_gain_year_3 = (cash_earnings_year_3 + asset_value_array[3]) - investAmount;
			var total_gain_year_4 = (cash_earnings_year_4 + asset_value_array[4]) - investAmount;
			var total_gain_year_5 = (cash_earnings_year_5 + asset_value_array[5]) - investAmount;
			
			
			
			// function total_gain
			total_gain_array = [];
			for(var i=0;i<=30;i++){
				
				total_gain_array[i] = (cash_earnings_array[i] + asset_value_array[i]) - investAmount;
				
			}

			console.log("total_gain_array");
			console.log(total_gain_array);
			
			
			
			
			// -------------------- chart 1
			
			var yearLabelArray = [];
			for(var i=1;i<=30;i++){
				
				yearLabelArray[i-1] = "Year "+i;
				
			}
			
			var totalGainChartArray = [];
			for(var i=0;i<total_gain_array.length;i++){totalGainChartArray[i] = total_gain_array[i].toFixed(2);}
			totalGainChartArray.splice(0, 1);// index, count
			
			var assetValuesChartArray = [];
			for(var i=0;i<asset_value_array.length;i++){assetValuesChartArray[i] = asset_value_array[i].toFixed(2);}
			assetValuesChartArray.splice(0, 1);// index, count
			
			var cashValuesChartArray = [];
			for(var i=0;i<cash_earnings_array.length;i++){cashValuesChartArray[i] = cash_earnings_array[i].toFixed(2);}
			cashValuesChartArray.splice(0, 1);// index, count
			
			// chart 1 data		
			barChartData = {
				labels: yearLabelArray,
				datasets: [{
					label: 'Equity Build Up',
					backgroundColor: window.chartColors.blue,
					data: assetValuesChartArray
				},{
					label: 'Total Gain',
					backgroundColor: window.chartColors.red,
					data: totalGainChartArray
				},{
					label: 'Estimated Cash Earnings',
					backgroundColor: window.chartColors.green,
					data: cashValuesChartArray
				}]

			};		
					
			var equityGrowthChartArray = [];
			for(var i=0;i<asset_value_array.length;i++){
				var equity_growth = asset_value_array[i] - investAmount;
				equityGrowthChartArray[i] = equity_growth.toFixed(2);
			}
			equityGrowthChartArray.splice(0, 1);// index, count
			
			var assetValueChartArray = [];
			for(var i=0;i<asset_value_array.length;i++){
				assetValueChartArray[i] = asset_value_array[i].toFixed(2);
			}
			assetValueChartArray.splice(0, 1);// index, count
			
			var investAmountChartArray = [];
			for(var i=0;i<asset_value_array.length;i++){
				investAmountChartArray[i] = investAmount.toFixed(2);
			}
			investAmountChartArray.splice(0, 1);// index, count
			
			// chart 2 data		
			barChartData2 = {
				labels: yearLabelArray,
				datasets: [{
					type: 'line',
					borderColor: "rgba(63, 81, 181, 0.7)",
					borderWidth: 2,
					//fill: false,
					label: 'Amount Invested',
					backgroundColor: "rgba(63, 81, 181, 0.3)",
					data: investAmountChartArray
				},{
					type: 'line',
					borderColor: "rgba(0, 150, 136, 0.7)",
					borderWidth: 2,
					//fill: false,
					label: 'Investment Equity',
					backgroundColor: "rgba(0, 150, 136, 0.3)",
					data: assetValueChartArray
				},{
					type: 'line',
					borderColor: "rgba(0, 150, 136, 0.0)",
					borderWidth: 0,
					fill: false,
					label: 'Equity Growth',
					backgroundColor: "rgba(0, 150, 136, 0.0)",
					data: equityGrowthChartArray
				}]

			};		

			// -------------------- chart 3
			var total_cash_flow_chart3 = [
				//total_cash_flow_year_0.toFixed(2),
				total_cash_flow_year_1.toFixed(2),
				total_cash_flow_year_2.toFixed(2),
				total_cash_flow_year_3.toFixed(2),
				total_cash_flow_year_4.toFixed(2),
				total_cash_flow_year_5.toFixed(2)
			];
					
			var total_expenses_chart3 = [
				//total_expenses_year_0.toFixed(2),
				total_expenses_year_1.toFixed(2),
				total_expenses_year_2.toFixed(2),
				total_expenses_year_3.toFixed(2),
				total_expenses_year_4.toFixed(2),
				total_expenses_year_5.toFixed(2),
			];
						
			var expected_rent_chart3 = [
				//expected_rent_year_0.toFixed(2),
				expected_rent_year_1.toFixed(2),
				expected_rent_year_2.toFixed(2),
				expected_rent_year_3.toFixed(2),
				expected_rent_year_4.toFixed(2),
				expected_rent_year_5.toFixed(2),
			];
			
			// chart 3 data		
			barChartData3 = {
				labels: ["Year 1", "Year 2", "Year 3", "Year 4", "Year 5"],
				datasets: [{
					type: 'line',
					borderColor: "rgba(63, 81, 181, 0.7)",
					borderWidth: 2,
					fill: false,
					label: 'Expected Rent',
					//backgroundColor: "rgba(63, 81, 181, 0.7)",
					data: expected_rent_chart3
				},{
					type: 'bar',
					label: 'Cash Flow',
					backgroundColor: "#80cbc4",
					data: total_cash_flow_chart3
				},{
					type: 'bar',
					label: 'Expenses',
					backgroundColor: "#ff7043",
					data: total_expenses_chart3
				}]

			};	
				
			
			lastTimeUpdateCalculatorValue = Date.now()/1000;
			// set timeout check time 3 sec
			setTimeout(function(){checktime();},2000);

		
		}
		
	}
	
	var lastTimeUpdateCalculatorValue;


	function checktime(){
		
		if( lastTimeUpdateCalculatorValue+1 < (Date.now()/1000) ){
			
			lastTimeUpdateCalculatorValue = Date.now()/1000;
			
			$("#chart").show();
			window.myBar.data = barChartData;
			//window.myBar.options = chartBarOptions;
			window.myBar.update();
			
			$("#chart2").show();
			window.myBar2.data = barChartData2;
			//window.myBar2.options = chartBarOptions;
			window.myBar2.update();
			
			$("#chart3").show();
			window.myBar3.data = barChartData3;
			//window.myBar3.options = chartBarOptions;
			window.myBar3.update();
			
			console.log( "show time: " + Date.now()/1000 );
			
		}
		
	}


	var propertyCurrentRentValue = <?= $property_data['property_item']->current_rent ?>;
	var propertyMarketRentValue = <?= $property_data['property_item']->estimated_market_rent ?>;
	
	
  $(function(){
	  
	  
	$("#calculator-slider-current-rent").ionRangeSlider({
		//type: "double",
		grid: true,
		min: <?= $property_data['property_item']->current_rent*0.8 ?>,
		max: <?= $property_data['property_item']->current_rent*1.5 ?>,
		from: <?= $property_data['property_item']->current_rent ?>,
		step: 20,
		onFinish: function (data) { changeCalculatorValues(); },
		onUpdate: function (data) { changeCalculatorValues(); }
	});
	
	var calculatorSliderCurrentRent = $("#calculator-slider-current-rent").data("ionRangeSlider");
	
	$(".calculator-rent-value-type").change(function(){
		
		var type = $(this).val();
		var newValue;
		
		if(type == 1){
			newValue = propertyCurrentRentValue
		}
		
		if(type == 2){
			newValue = propertyMarketRentValue;
		}
		
		minVal = newValue*0.8;
		maxVal = newValue*1.5;
		
		calculatorSliderCurrentRent.update({
			from: newValue.toFixed(2),
			min: minVal.toFixed(2),
			max: maxVal.toFixed(2)
		});
		
		//changeCalculatorValues();  .toFixed(2)
		
	});
	  
	 //Bits to invest slider
	 $("#calculator-slider-bits-to-invest").ionRangeSlider({
		type: "single",
		grid: true,
		grid_num: 7,
		min: 1,
		max: 8,
		from: 1,
		step: 1,
		//postfix: "",
		onFinish: function (data) { 
		
			console.log(data.from);
			var percents = (data.from * 10)/100;
			var propertyPrice = <?= $property_data['property_item']->property_price ?>;
			var amount = propertyPrice * percents;
			//#invest_amount_process_2
			
			//$("#invest_amount_process_2").attr("value",amount);
			
			changeCalculatorValues(amount); 
		
		}
	}); 
	 
	var calculatorSliderBits = $("#calculator-slider-bits-to-invest").data("ionRangeSlider");
	
	$("#invest_amount_process").change(function(){
		
		var amountValue = $(this).val();
		
		var bits = (amountValue / propertyPrice) * 10;
		
		calculatorSliderBits.update({
			from: bits.toFixed(2),
			//min: minVal.toFixed(2),
			//max: maxVal.toFixed(2)
		});
		
	});
	  
	  
	  
	$("#calculator-slider-rent-change").ionRangeSlider({
		//type: "double",
		grid: true,
		min: -20,
		max: 50,
		from: 3,
		step: 0.25,
		postfix: "%",
		onFinish: function (data) { changeCalculatorValues(); }
	}); 
	  
	$("#calculator-slider-catex").ionRangeSlider({
		//type: "double",
		grid: true,
		min: 0,
		max: 30,
		from: 0,
		step: 0.25,
		postfix: "%",
		onFinish: function (data) { changeCalculatorValues(); }
	}); 
	  
	$("#calculator-slider-vacancy-rate").ionRangeSlider({
		//type: "double",
		grid: true,
		min: 0,
		max: 100,
		from: 5,
		step: 0.25,
		postfix: "%",
		onFinish: function (data) { changeCalculatorValues(); }
	}); 
	  
	$("#calculator-slider-appreciation-first").ionRangeSlider({
		//type: "double",
		grid: true,
		min: -5,
		max: 20,
		from: <? if(isset($property_data['property_item']->_forecast_growth_rate_1year) && !is_null($property_data['property_item']->_forecast_growth_rate_1year)){echo $property_data['property_item']->_forecast_growth_rate_1year;}else{echo 0;} ?>,
		step: 0.25,
		postfix: "%",
		onFinish: function (data) { changeCalculatorValues(); }
	}); 
	  
	$("#calculator-slider-appreciation").ionRangeSlider({
		//type: "double",
		grid: true,
		min: -5,
		max: 15,
		from: 3,
		step: 0.25,
		postfix: "%",
		onFinish: function (data) { changeCalculatorValues(); }
	}); 
	  
	$("#calculator-slider-taxes").ionRangeSlider({
		//type: "double",
		grid: true,
		min: 0,
		max: 5,
		from: 2,
		step: 0.1,
		postfix: "%",
		onFinish: function (data) { changeCalculatorValues(); }
	}); 
	  
	$("#calculator-slider-insurance").ionRangeSlider({
		//type: "double",
		grid: true,
		min: 0.1,
		max: 10,
		from: 0.5,
		step: 0.1,
		postfix: "%",
		onFinish: function (data) { changeCalculatorValues(); }
	}); 
	  
	$("#calculator-slider-maintenance").ionRangeSlider({
		//type: "double",
		grid: true,
		min: 0,
		max: 60,
		from: 10,
		step: 0.25,
		postfix: "%",
		onFinish: function (data) { changeCalculatorValues(); }
	}); 
	  
	 changeCalculatorValues();
	
  });
  
</script>

<? $sharerPageTitle = "Invest in this property"; ?>
<script>
$("#facebookShareLink").on("click",function(){
    var fbpopup = window.open("https://www.facebook.com/sharer/sharer.php?u=<?= $actual_link ?>", "pop", "width=600, height=400, scrollbars=no");
    return false;
});
</script>

<script>
$("#twShareLink").on("click",function(){
    var fbpopup = window.open("https://twitter.com/share?text=<?= $sharerPageTitle ?>&url=<?= $actual_link ?>", "pop", "width=600, height=400, scrollbars=no");
    return false;
});
</script>


<script>
$("#liShareLink").on("click",function(){
    var fbpopup = window.open("https://www.linkedin.com/shareArticle?mini=true&url=<?= $actual_link ?>&title=<?= $sharerPageTitle ?>&summary=&source=", "pop", "width=600, height=400, scrollbars=no");
    return false;
});
</script>


<script>

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

$(document).ready(function(){
	
	$("#klaviyo-form-submit").click(function(){
		
		var propertyId = <? if(isset($property_data['property_item'])){echo $property_data['property_item']->id;}else{echo 0;} ?>;
		var email = $("#klaviyo-user-email").val();
		
		if (validateEmail(email)) {
		
		$.ajax({
			type: "GET",
			url: "/property/send-klaviyo", // change to /web/klaviyo
			data: {
				"property_id": propertyId,
				"user_email": email
			},
			cache: false,
			success: function(response){
				
				if(response == 1){
					
					alert("Thank you! Please check your email later to review property financial details.");
					
				}
				
			}
		});
		
		}else{
			
			alert("Please enter correct email");
			
		}

	})
	
})


</script>



<div id="close-modal"></div>
<div id="alert-modal" class="modal-target"></div>
<div class="wrap-modal-window">
      <a href="#close-modal"></a>
      <div class="modal-window">
        <a class="close-modal" href="#close-modal">×</a>
        <p>Whoops! This is reserved for members only. Please create an account to perform that action.</p>
    </div>

@endsection