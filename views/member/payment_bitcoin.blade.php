@extends('member.dash')

@section('content')

<?

$transaction_id = Illuminate\Support\Facades\Input::get('id');
$payment_status = 0;
$existedTransaction = DB::table("_member_transaction_steps")
			->where("id","=",$transaction_id)
			->where("user_id","=",Auth::user()->id)
			->get();
			
if(count($existedTransaction)>0){
			
$transactionBitcoinPayment = DB::table("_member_transaction_bitcoin_payment")
			->where("transaction_id","=",$transaction_id)
			->get();

if( count($transactionBitcoinPayment)>0 && $transactionBitcoinPayment[0]->status == 2){
	
	$payment_status = 2;
	
}

?>

		<div class="section">
				<div class="row">
				  <div class="column">
					<div class="section box-shadow box-padding">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-12">
								<div class="x_panel">
									<div class="x_title">
									
									<? if($payment_status == 2){ ?>
									
									<span id="success" style="color:green;">Payment for transaction #<?= $transaction_id ?> successfully made</span>
									
									<? }else{ ?>
									
									<div>Waiting funds. Transaction should be made in: <span id="waiting_funds" style="color:black;"></span> (for guaranteed exchange rate)</div>
									
									You should send: <span id="bitcoin_amount" style="color:green;"></span> to address: <span id="bitcoin_address" style="color:green;"></span> (copy)
										
										<div><a href="" id="bitcoin_uri">Link for bitcoin wallet</a></div>
										<div id="error_response"></div>

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

@section('footer')


<script src="/member/js/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">

 function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}




  // Create a Stripe client
var stripe = Stripe('pk_test_D1qDmk38Bv8pl7mx2LfMYQhy');

<?

$payment_exist_active = 0;


if( count($transactionBitcoinPayment)>0 ){
	
	if( $transactionBitcoinPayment[0]->status == 0 && !is_null( $transactionBitcoinPayment[0]->stripe_source_id ) ){
		
		$rest_time = time() - ($transactionBitcoinPayment[0]->time_start + 599);
		
		if($rest_time > 0){
		
			$payment_exist_active = 1;
		
		}
		
	}

}

if($payment_exist_active == 1){ ?>
	
	$(document).ready(function(){
	
		$("#bitcoin_address").html(<?= $transactionBitcoinPayment[0]->stripe_source_bitcoin_address ?>);
		$("#bitcoin_amount").html(<? echo $transactionBitcoinPayment[0]->stripe_source_amount_satoshi / 100000000; ?> + " BTC");
		$("#bitcoin_uri").attr("href",<?= $transactionBitcoinPayment[0]->stripe_source_link ?>);
		//$("#waiting_funds").html("waiting funds. Transaction should be made in " + );
		
		var tenMinutes = <? $rest_time = time() - $transactionBitcoinPayment[0]->time_start; ?>,
		display = document.querySelector('#waiting_funds');
		startTimer(tenMinutes, display);
	
	});
	
<? }elseif($payment_status == 0){ ?>

 /* <?= $existedTransaction[0]->email ?> */

 
stripe.createSource({
  type: 'bitcoin',
  amount: <?= $existedTransaction[0]->invest_amount * 100 ?>,
  currency: 'usd',
  owner: {
    email: 'dk+fill_now@tk.com',
  },
}).then(function(result) {
	
  // handle result.error or result.source
  
	if(result.error){
		
		console.log(result.error);
		
	}else{
		
		if(result.source){
			
			console.log(result.source);
			
			// save source to database
			
			// ajax
			$.ajax({
				type: "GET",
				url: "/stripe/payment-save-source",
				data: {
					"transaction_id": <?= $transaction_id ?>,
					"source_id": result.source.id,
					"bitcoin_address": result.source.receiver.address,
					"bitcoin_amount": result.source.bitcoin.amount,
					"bitcoin_uri": result.source.bitcoin.uri,
				},
				cache: false,
				success: function(response){
					
					if(response == 1){
						
						//alert("Thank you! Please send payment");
						
					}else{
						
						// errors
						
					}
					
				}
			});
			
			// on reloading this page get source from database
			
			
			console.log(result.source.receiver.address);
			console.log(result.source.bitcoin.amount);
			console.log(result.source.bitcoin.uri);
			
			$("#bitcoin_address").html(result.source.receiver.address);
			$("#bitcoin_amount").html(result.source.bitcoin.amount / 100000000 + " BTC");
			$("#bitcoin_uri").attr("href",result.source.bitcoin.uri);
			//$("#waiting_funds").html("waiting funds. Transaction should be made in " + );
			
			var tenMinutes = 60 * 10,
			display = document.querySelector('#waiting_funds');
			startTimer(tenMinutes, display);
			
			
/*
{
  "id": "src_18h4EOEniDLYboM3JphgS37m",
  "object": "source",
  "amount": 1000,
  "client_secret": "src_client_secret_OkNv1HJ3melzdk2bgd2o4es8",
  "created": 1470864440,
  "currency": "usd",
  "flow": "receiver",
  "livemode": true,
  "metadata": {},
  "owner": {
    "address": null,
    "email": "jenny.rosen@example.com",
    "name": "Jenny Rosen",
    "phone": null,
    "verified_address": null,
    "verified_email": null,
    "verified_name": null,
    "verified_phone": null
  },
  "receiver": {
    "address": "1Nar8gbhZqahaKdoxLAnxVhGjd5YoHs8T1",
    "amount_charged": 0,
    "amount_received": 0,
    "amount_returned": 0,
    "refund_attributes_method": "email",
    "refund_attributes_status": "missing"
  },
  "status": "pending",
  "type": "bitcoin",
  "usage": "single_use",
  "bitcoin": {
    "address": "1Nar8gbhZqahaKdoxLAnxVhGjd5YoHs8T1",
    "amount": 334400,
    "amount_charged": 0,
    "amount_received": 0,
    "amount_returned": 0,
    "uri": "bitcoin:1Nar8gbhZqahaKdoxLAnxVhGjd5YoHs8T1?amount=0.003344",
    "refund_address": null
  }
}
*/
			
			
			
			
		}
		
	}
  
  
  
  
});

<? } ?>










/*

// Create an instance of Elements
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission
var form = document.getElementById('payment-form');

form.addEventListener('submit', function(event) {
	
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server
      stripeTokenHandler(result.token);
    }
  });
  
});
  
  */
  
 
	  
	
  
  
</script>

<? } ?>

@endsection