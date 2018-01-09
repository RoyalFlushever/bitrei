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
								<h2>Cart</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
							
							<table>
							<thead>
								<td>Property ID</td>
								<td>Property Address</td>
								<td>Amount, $</td>
								<td>Delete</td>
							</thead>
							<?
							
							if(isset($data) && count($data)>0){
								
								foreach($data as $cart_row){
									
									$property_data = DB::table('_property_details')
									->where("id","=",$cart_row->property_id)
									->get();
									$property_item = $property_data[0];
									$property_address_text = $property_item->address . ", " . $property_item->city . ", " . $property_item->state . " " . $property_item->zip;
									
									echo "<tr>
										<td>#".$cart_row->property_id."</td>
										<td><a href='/property/item/".$cart_row->property_id."'>".$property_address_text."</a></td>
										<td>$" . number_format((float)$cart_row->amount, 0, '.', ',') . "</td>
										<td><a href='/transaction/cart-item-delete?id=".$cart_row->id."'>Delete</a></td>
									</tr>";
									
								}
								
							}else{
								
								echo "Cart is empty";
								
							}
							
							
							?>
							</table>
							
							<a href="/transaction/transaction-step-one" class="button pull-right">Checkout</a>
							
							<div style="clear:both;"></div>
							
							</div>
						</div>
					</div>

				</div>

			</div>
          </div>
        </div>
      </div>	

@endsection