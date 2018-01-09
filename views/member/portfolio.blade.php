@extends('member.dash')

@section('content')

<?

	$portfolio = DB::table('_member_transaction_steps')
		->where("user_id", "=", Auth::user()->id)
		->where("status", "=", 2)
		->get();

	if(count($portfolio)<1){

?>



	<div class="section">
        <div class="row">
          <div class="column xmedium-11 xmedium-centered">
            
            <!-- mixin callouts begin-->
            <div class="callouts-container section">
			
              <!-- mixin callout begin-->
              <div class="callout box-white box-padding-sm section" data-closable="data-closable">
                <div class="row">
                  <div class="column">
                    <h4 class="callout-title">Portfolio</h4>
                    <div class="callout-body">
                      <p>You currently do not have any BitREI investments yet. Once you invest in a property or multiple properties, this section will display the performance of your investments.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- mixin callout end-->
              
            </div>
            <!-- mixin callouts end-->
          </div>
        </div>
      </div>



	<? }else{ ?>

	<?
	
	/*
	
	Table 1	
	Formula
1 Gross Yield	= Total Rent Collected / Original Purchase Price
2 Net Yield =	(Total Rent Collected - Expenses) / Original Purchase Price
3 Cash Flow = (Total Rent Collected - Expenses)







Total Invested	
Lifetime Gross Yield	
Lifetime Net Yield	
Avg Quarterly Earnings	
Lifetime Cash Earnings	
Total Market Value of REIs







Rent Collected	
Expenses	Total from "Expenses" Table
Timeframe	Either Daily, Weekly, Monthly, etc (taken from "Timeframe" table)
Property Value	Will either be null, or will be uploaded. If null, then use the previously uploaded property value
Occupancy Rate	This will be a static percentage uploaded by user

	
	
	*/

	$userPayments = \DB::table('_member_payments')
				->where("user_id", "=", Auth::user()->id)
				->get();
				
	$totalPayments = 0;
	$averageEarnings = 0;
	$j=0;
	
	if(count($userPayments)>0){
			
		foreach($userPayments as $paymentItem){
			
			$totalPayments = $totalPayments + $paymentItem->amount;
			$j++;
			
		}
		
		$averageEarnings = $totalPayments/$j;
		
	}
		
	$i=0;
	$totalMarketValue = 0;
	
	$allgrossYield = 0;
	$allnetYield = 0;
	$averageGrossYield = 0;
	$averageNetYield = 0;
	$occupancy_rate = 0;
	$average_occupancy_rate = 0;
	//var_dump($propertyObjects[0]->id);
	
	//exit();
	
	if(count($propertyObjects)>0){
						  
		foreach($propertyObjects as $propertyItem){
			
			if(isset($propertyItem->financial_data)){
			//exit();
			//$propertyItem->financial_data;
			//$propertyItem->invested_amount;
			
			
			
			//1. gross yield
			$grossYield = $propertyItem->financial_data->rent_collected / $propertyItem->property_price * 100;
			$allgrossYield = $allgrossYield + $grossYield;
			//2. net yield
			$netYield =	($propertyItem->financial_data->rent_collected - $propertyItem->financial_data->total_expenses) / $propertyItem->property_price  * 100;
			$allnetYield = $allnetYield + $netYield;
			
			$userInvestedPercents = $propertyItem->invested_amount / $propertyItem->property_price;
			
			//3. EarningsQuarter
			$userPropertyEarningsQuarter = $netYield * $userInvestedPercents;
			
			//4. totalMarketValue
			$totalMarketValue = $totalMarketValue + $userInvestedPercents * $propertyItem->last_property_price;
			
			//5. $occupancy_rate
			$occupancy_rate = $occupancy_rate + $propertyItem->financial_data->occupancy_rate;
			
			$i++;
			}
			
		}
		
		$averageGrossYield = $allgrossYield/$i;
		$averageNetYield = $allnetYield/$i;
		$average_occupancy_rate = $occupancy_rate/$i;
		
	}
	
	$lifetimeRoi = 0;
	if($totalMarketValue != 0){
		
		$lifetimeRoi = (($totalMarketValue-$totalInvestments)/$totalMarketValue)*100;
		
	}
	
	//var_dump($propertyItem);
			//exit();
	?>
      
	 
	
	
      <div class="section">
        <div class="row">
          <div class="column">
            <div class="section">
              <h3 class="section-title">Net Account Value</h3>
              <div class="table-scroll">
                <table class="unstriped hover">
                  <thead>
                    <tr>
                      <th>Total Invested</th>
                      <th>Lifetime Gross Yield</th>
                      <th>Lifetime Net Yield</th>
                      <th>Avg Quarterly Earnings</th>
                      <th>Lifetime Cash Earnings</th>
                      <th>Total Market Value of REIs</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>$<?= number_format((float)$totalInvestments, 2, '.', ',') ?></td>
                      <td><?= number_format((float)$averageGrossYield, 2, '.', ',') ?>%</td>
                      <td><?= number_format((float)$averageNetYield, 2, '.', ',') ?>%</td>
                      <td>$<?= number_format((float)$averageEarnings, 2, '.', ',') ?></td>
                      <td>$<?= number_format((float)$totalPayments, 2, '.', ',') ?></td>
                      <td>
                        <table>
                          <tbody>
                            <tr>
                              <td>$<?= number_format((float)$totalMarketValue, 2, '.', ',') ?></td>
                              <td>
                                <div class="text-green"><? if($lifetimeRoi>0){echo "+";} ?><?= number_format((float)$lifetimeRoi, 2, '.', ',') ?>%<br><small>LIFETIME ROI</small></div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- financial-overview begin-->
      <div class="section">
        <div class="section-header">
          <div class="row">
            <div class="column xlarge-6 large-5">
              <h3 class="section-title filters-title">Portfolio Financial Overview</h3>
            </div>
            <div class="column xlarge-6 large-7">
              <!-- filters-date mixin begin-->
             <!-- <form class="filters-form">
                <label class="filters-form-item filters-label">filter by date</label>
                <input class="filters-form-item input-rounded" type="text" placeholder="01/01/2017"/>
                <label class="filters-form-item filters-label">TO</label>
                <input class="filters-form-item input-rounded" type="text" placeholder="31/03/2017"/>
              </form>
			  -->
              <!-- filters-date mixin end-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="column large-6">
            <div class="table-scroll">
              <div class="financial-overview-chart box-white section">
                <canvas id="financial-overview-chart-x"></canvas>
              </div>
            </div>
          </div>
          <div class="column large-6">
            <div class="row row-compact">
              <div class="column medium-4 small-6">
                <!-- financial-overview-item mixin begin-->
                <div class="financial-overview-item box-white">
                  <h3 class="financial-overview-item-value smaller text-green"><? if($lifetimeRoi>0){echo "+";} ?><?= number_format((float)$lifetimeRoi, 2, '.', ',') ?>%</h3>
                  <p class="financial-overview-item-text">Property value change</p>
                </div>
                <!-- financial-overview-item mixin end-->
              </div>
              <div class="column medium-4 small-6">
                <!-- financial-overview-item mixin begin-->
                <div class="financial-overview-item box-white">
                  <h3 class="financial-overview-item-value smaller text-green"><?= $average_occupancy_rate ?>%</h3>
                  <p class="financial-overview-item-text">Average Occupancy Rate</p>
                </div>
                <!-- financial-overview-item mixin end-->
              </div>
              
              <div class="column medium-4 small-6">
                <!-- financial-overview-item mixin begin-->
                <div class="financial-overview-item box-white">
                  <h3 class="financial-overview-item-value smaller text-black">$<? if(isset($propertyItem->invested_amount)){echo number_format((float)$propertyItem->invested_amount, 2, '.', ',');} ?></h3>
                  <p class="financial-overview-item-text">Total funds invested</p>
                </div>
                <!-- financial-overview-item mixin end-->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- financial-overview end						-->
      <div class="section">
        <div class="row">
          <div class="column">
            <div class="section">
              <div class="box-shadow box-padding">
                <div class="section-header">
                  <div class="row">
                    <div class="column xlarge-6 large-5">
                      <h3 class="section-title filters-title">Itemized Portfolio Overview</h3>
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
					  -->
                      <!-- filters-date mixin end-->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="column">
                    <div class="table-column">
                      <div class="table-scroll">
                        <table class="unstriped hover">
                          <thead>
                            <tr>
                              <th>Property Name</th>
                              <th>Total Invested</th>
                              <th>Gross Yield</th>
                              <th>Net Yield</th>
                              <th>Avg Quarterly Earnings</th>
                              <th>Total Market Value of REIs</th>
                            </tr>
                          </thead>
                          <tbody>
						  
						<?
						  
						if(count($propertyObjects)>0){
						  
							foreach($propertyObjects as $propertyItem){
								
								if(isset($propertyItem->financial_data)){
									
								//1. gross yield
								$grossYield = $propertyItem->financial_data->rent_collected / $propertyItem->property_price * 100;
								
								//2. net yield
								$netYield =	($propertyItem->financial_data->rent_collected - $propertyItem->financial_data->total_expenses) / $propertyItem->property_price  * 100;
								
								}else{
									
									$property_item_obj_fin = DB::table('_property_details')
									->where("id","=",$propertyItem->id)
									->get();
									
									$grossYield = $property_item_obj_fin[0]->_default_gross_yield;
									$netYield = $property_item_obj_fin[0]->_default_net_yield;
									
								}
								
								$userInvestedPercents = $propertyItem->invested_amount / $propertyItem->property_price;
								
								//3. EarningsQuarter
								$userPropertyEarningsQuarter = $netYield * $userInvestedPercents;
								
								$totalMarketValue = $userInvestedPercents * $propertyItem->last_property_price;
								
								$userPayments = \DB::table('_member_payments')
											->where("user_id", "=", Auth::user()->id)
											->where("property_id", "=", $propertyItem->id)
											->get();
											
								$averageEarnings = 0;
								$totalPayments=0;
								$j=0;
								
								if(count($userPayments)>0){
										
									foreach($userPayments as $paymentItem){
										
										$totalPayments = $totalPayments + $paymentItem->amount;
										$j++;
										
									}
									
									$averageEarnings = $totalPayments/$j;
									
								}
								
								
								$lifetimeRoi = 0;
								if($totalMarketValue != 0){
									
									$lifetimeRoi = (($totalMarketValue - $propertyItem->invested_amount)/$totalMarketValue)*100;
									
								}
								
								$address_text = $propertyItem->address . ", " . $propertyItem->city . ", " . $propertyItem->state . " " . $propertyItem->zip;
								
						?>
                            <!-- mixin table-row-blue-green begin-->
                            <tr>
                              <td><a href="/property/item/<?= $propertyItem->id; ?>"><b class="text-blue-light"><?= $address_text ?></b></a></td>
                              <td>$<? if(isset($propertyItem->invested_amount)){echo number_format((float)$propertyItem->invested_amount, 2, '.', ',');} ?></td>
                              <td><?= number_format((float)$grossYield, 2, '.', ',') ?>%</td>
                              <td><?= number_format((float)$netYield, 2, '.', ',') ?>%</td>
                              <td>$<?= number_format((float)$averageEarnings, 2, '.', ',') ?></td>
                              <td>
                                <table>
                                  <tbody>
                                    <tr>
                                      <td>$<?= number_format((float)$totalMarketValue, 2, '.', ',') ?></td>
                                      <td><b class="text-green"><? if($lifetimeRoi>0){echo "+";} ?><?= number_format((float)$lifetimeRoi, 2, '.', ',') ?>%</b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <!-- mixin table-row-blue-green end-->
							<? } } ?>
							
                          </tbody>
                        </table>
                      </div>
                      
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
          <div class="column">
            <h3 class="section-title">Activity</h3>
            <!-- mixin callouts begin-->
            <div class="callouts-container section">
              <!-- mixin callout begin-->
              <div class="callout box-white box-padding-sm section" data-closable="data-closable">
                <div class="row">
                  <div class="column"><img class="callout-close" src="img/template/close.png" alt="" data-close="data-close"/>
                    <h4 class="callout-title">Sapien bibendum ultricies!</h4>
                    <div class="callout-body">
                      <p>Fusce id ligula et mi ultricies tristique. Suspendisse lacinia, diam ut posuere porttitor, velit urna congue nisl.</p>
                    </div>
                    <p class="callout-time"><i>Posted 1 hour ago</i></p>
                  </div>
                </div>
              </div>
              <!-- mixin callout end-->
              <!-- mixin callout begin-->
              <div class="callout box-white box-padding-sm section" data-closable="data-closable">
                <div class="row">
                  <div class="column"><img class="callout-close" src="img/template/close.png" alt="" data-close="data-close"/>
                    <h4 class="callout-title">Velit urna congue nisl, aliquet ullamcorper augue dui eget velit</h4>
                    <div class="callout-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea iusto, officia libero, hic qui cumque modi dolorem consequatur cum repellat, enim amet doloribus. Perspiciatis voluptatibus sit nam ex animi quod?</p>
                    </div>
                    <p class="callout-time"><i>Posted 17/03/2017; 5:25 PM</i></p>
                  </div>
                </div>
              </div>
              <!-- mixin callout end-->
            </div>
            <!-- mixin callouts end-->
          </div>
        </div>
      </div>
	  
	  */?>
	  
	<? } ?>
	   

@endsection

@section('footer')

<? if(count($portfolio)>0){ ?>

	<script type="text/javascript">
	
	$(function() {
		
		
		var dateNow = new Date();

		$('#date_1').daterangepicker({
			timePicker: false,
			timePicker24Hour: false,
			singleDatePicker: true,
			<? if(isset($_GET['date_1'])){
				
				echo "startDate:'".$_GET['date_1']."',";
				
			}else{ ?>
			
			startDate:moment(dateNow).hours(20).minutes(0).seconds(0).milliseconds(0),
			
			<? } ?>
			locale: {
				format: 'MM/DD/YYYY'
			}
		});
		
		$('#date_2').daterangepicker({
			timePicker: false,
			timePicker24Hour: false,
			singleDatePicker: true,
			<? if(isset($_GET['date_2'])){
				
				echo "startDate:'".$_GET['date_2']."',";
				
			}else{ ?>
			
			startDate:moment(dateNow).hours(20).minutes(0).seconds(0).milliseconds(0),
			
			<? } ?>
			locale: {
				format: 'MM/DD/YYYY'
			}
		});
		
		
	});

	
	jQuery(document).ready(function($) {
		
		
	/*
		Chart
		https://github.com/chartjs/Chart.js
	*/
	
	<?
	
	$userPayments = \DB::table('_member_payments')
				->where("user_id", "=", Auth::user()->id)
				->orderBy("period_start", "ASC")
				->get();
				
	$j=0;
	$payment_periods = array();
	
	if(count($userPayments)>0){
			
		foreach($userPayments as $paymentItem){
			
			$matches = 0;
			$i_count = 0;
			
			foreach($payment_periods as $period_item){
				
				if($period_item['period_start'] == $paymentItem->period_start){
					
					$matches++;
					//break;
					
				}
				
				$i_count++;
				
			}
				
			if($matches == 0){
				
				$period_payments_array = array(
					"period_start" => $paymentItem->period_start,
					"period_amount" => $paymentItem->amount
				);
				
				$payment_periods[] = $period_payments_array;
				
			}else{
					
				$k=0;
				foreach($payment_periods as $period_item){
					
					if($period_item['period_start'] == $paymentItem->period_start){
						
						$payment_periods[$k]['period_amount'] = $payment_periods[$k]['period_amount'] + $paymentItem->amount;
						
					}
					
					$k++;
					
				}
				
			}
			
			$j++;
	
		}
		
	}
	
	$js_period_labels = "";
	$js_period_amount = "";
	$i=0;
	if(count($payment_periods)>0){
		
		foreach($payment_periods as $period_item){
		
			$js_period_labels .= '"' . date("F-Y", strtotime($period_item['period_start'])) . '"';
			$js_period_amount .= '"' . $period_item['period_amount'] . '"';
			
			if($i<count($payment_periods)-1){
				
				$js_period_labels .= ",";
				$js_period_amount .= ",";
				
			}
		
			$i++;
	
		}
		
	}
	
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
				scaleSteps: 100,
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
							min: 0,
							beginAtZero: false,
							stepSize: 100,
							fontSize: 15
						},
                        scaleLabel: {
                            display: true,
                            labelString: 'Earnings, $'
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
	
<? } ?>
@endsection