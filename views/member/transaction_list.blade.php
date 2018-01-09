@extends('member.dash')

@section('content')

      <div class="section">
        <div class="row">
          <div class="column">
            <div class="section box-shadow box-padding">
              <div class="section-header">
                <div class="row">
                  <div class="column xlarge-3 large-4">
                    <h3 class="section-title filters-title">Transaction History</h3>
                  </div>
                  <div class="column xlarge-9 large-8">
                    <!-- filters-date mixin begin-->
                    <form action="/member/transaction-list<? if(isset($_GET['page'])){ echo "?page=".$_GET['page']; } ?>" method="get" class="filters-form">
                      <label class="filters-form-item filters-label">filter by date</label>
						<input id="date_1" name="date_1" type="text" class="filters-form-item input-rounded" value="" placeholder="choose date">
                      <label class="filters-form-item filters-label">TO</label>
                      <input id="date_2" name="date_2" class="filters-form-item input-rounded" type="text" placeholder="choose date"/>
					  <input type="submit" class="button" style="background-color:#15ae39;width:60px;min-width:60px;text-align:center;padding:13px 10px;" value="GO">
                    </form>
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
                            <th>Date</th>
							<th>Status</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Actions</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody>
						<?
						
						foreach($data as $transaction_item){
						
							$property_data_array_json = $transaction_item->property_data_array;
							
							if(!is_null($property_data_array_json)){
								
								$property_data_array = json_decode($property_data_array_json, true);
								
								$textDescription = "Payment for: ";
								
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
										
										$textDescription .= $current_property_invest_ownership_percentage . "% of " . $property_address_text . "; ";
										
									}
									
								}
											
								$transaction_date_started = date("m/d/Y", strtotime($transaction_item->date_started));
								
								$signed_docs_link = "";
								
								if($transaction_item->docusign_status == 2){
									
									$signed_docs_link = "<div><a href='/member/signed-docs?transaction_id=".$transaction_item->id."'>Download Offering Statement</a></div>";
								
								}
								
						?>
                          <tr>
                            <td>
                              <time datetime="<?= $transaction_date_started ?>"><?= $transaction_date_started ?></time>
                            </td>
							<td>
							<?

							if($transaction_item->status == 2){

								echo "Successfully completed";

							}elseif($transaction_item->status == 4){
								
								echo "Pending Funding";
								
							}elseif($transaction_item->status == 9){
								
								echo "Cancelled";
								
							}else{
								
								if($transaction_item->docusign_status == 2){
									
									echo "In Process. Signed Offering Statement";
									
								}else{
									
									echo "In Process";
									
								}
								
							}

							?>
                            </td>
                            <td>
							<? if($transaction_item->status != 9){ ?>
								<a href="/member/download-bank-wiring?id=<?= $transaction_item->id ?>">Bank Transfer</a>
							<? } ?>
							</td>
                            <td><?= $textDescription ?></td>
                            <td><?
							
							if($transaction_item->status == 2){
								
								echo $signed_docs_link;
								
							}
							
							?><?
							
							if($transaction_item->status == 2){
								
								//echo "<div>Completed</div>";
								
							}else{
								
								if($transaction_item->status != 9 && $transaction_item->status != 4){
									
									echo "<a href='/transaction/transaction-step-one?transaction_id=".$transaction_item->id."'>Resume Investment</a>";
								
								}
							}
							
							?></td>
                            <td>$<?= number_format((float)$transaction_item->invest_amount, 2, '.', ',') ?></td>
                          </tr>
							<? }} ?>
                        </tbody>
                      </table>
                    </div>
                    
					<div class="table-controls"><? if(count($data)>0){ echo $data->render(); } ?></div>
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
	  
	  
	  
	   

@endsection

@section('footer')



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

	</script>
 
@endsection