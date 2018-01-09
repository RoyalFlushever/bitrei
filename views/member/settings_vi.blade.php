@extends('member.dash')

@section('content')
<div class="section">
        <div class="row">
          <div class="column">
            <div class="section box-shadow box-padding">
	<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Becoming an Accredited Investor</h2>
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
				
				$vi_data_notfound_text = "";
				if(!is_null($vi_link)){
			
					$vi_data_notfound_text = '<h3>Step 1 of 2: Create a Verify Investor Account</h3>
					<p>We need to verify your status being an Accredited Investor. To authorize your account for fractional real estate transactions, you will need to <a href="'.$vi_link.'" style="text-decoration:underline;font-weight:bold;">create an account at Verify Investor™</a>, and submit your financial documents proving your Accreditation.  Each member\'s financial documents are reviewed by a licensed attorney, and reviews are typically completed within 2 business days. <a href="'.$vi_link.'" style="text-decoration:underline;font-weight:bold;">Click to receive your free Authorization by Verify Investor™</a>. You will be redirected to BitREI.com after securely submitting your documentation to Verify Investor™.</p>
					
					<p><a id="invest-button" class="button expanded" href="'.$vi_link.'" style=" width: 50%;font-weight:bold; margin: 0px auto; display: block;">Visit Verify Investor™</a></p>
					
					<h3 style="margin-top: 50px;">Frequently Asked Questions</h3>
					<h4>What is an Accredited Investor?</h4>
					<p>An “accredited investor” is a type of investor. Generally, an Accredited Investor is an individual who can meet any of the following qualifiers:
					<ul>
					<li>Any natural person whose individual net worth, or joint net worth with that person\'s spouse, exceeds $1,000,000;</li>
					<li>Any natural person who had an individual income in excess of $200,000 in each of the two most recent years or joint income with that person\'s spouse in excess of $300,000 in each of those years and has a reasonable expectation of reaching the same income level in the current year;</li>
					<li>Any trust, with total assets in excess of $5,000,000, not formed for the specific purpose of acquiring the securities offered, whose purchase is directed by a sophisticated person as described in §230.506(b)(2)(ii); and</li>
					<li>Any entity in which all of the equity owners are accredited investors</li>
					</ul>
					To review the Federal Regulations of qualifications of being an Accredited Investor (Title 17 → Chapter II → Part 230 → §230.501), please <a href="https://www.ecfr.gov/cgi-bin/retrieveECFR?gp=&r=SECTION&n=17y3.0.1.1.12.0.46.176" target="_blank">Click Here to visit the Electronic Code of Federal Regulations</a>
					</p>
					
					<h4>Why does BitREI work exclusively with Accredited Investors?</h4>
					<p>Recent Federal Laws require companies raising money through private placement capital raises (or crowdfunding), to limit the capital raises to individuals with Accredited Investor status. We work with Verify Investor™ and their experienced attorney network to qualify investors. BitREI covers all costs involved with Accreditation review, and have partnered with Verify Investor™ to allow BitREI to comply with Federal Laws, leveraging Verify Investor\'s secure software to qualify Accreditation.</p>
					
					<h4>Will BitREI ever work with Non-Accredited Investors?</h4>
					<p>Yes, our goal is to have our processes &amp; procedures reviewed by the proper governing agency to allow us to work with non-accredited investors. When this occurs, we will notify all non-accredited investors via email and/or phone.</p>';
				
				}
				
				// if investor is verified - show click "Confirm transaction"
				if(isset($vi_member_data) && count($vi_member_data)>0){
					
					if($vi_member_data[0]->status == 2){
						
						echo "<img src='http://104.236.93.221/member/img/template/accredited-investor-green.png'/>
						<p>Great! You are an Accredited Investor. Remember, every 90 days, we are required by the Federal Government to verify your Accredited Investor status. To renew your Accredited Investor status (free of charge), please visit Verify Investor.</p>
						
						
						<p><a href='https://verifyinvestor.com/login' target='_blank' class='button large btn btn-primary'>Visit Verify Investor</a></p>
						
						<h3 style='margin-top: 50px;'>Frequently Asked Questions</h3>
					<h4>What is an Accredited Investor?</h4>
					<p>An “accredited investor” is a type of investor. Generally, an Accredited Investor is an individual who can meet any of the following qualifiers:
					<ul>
					<li>Any natural person whose individual net worth, or joint net worth with that person\'s spouse, exceeds $1,000,000;</li>
					<li>Any natural person who had an individual income in excess of $200,000 in each of the two most recent years or joint income with that person\'s spouse in excess of $300,000 in each of those years and has a reasonable expectation of reaching the same income level in the current year;</li>
					<li>Any trust, with total assets in excess of $5,000,000, not formed for the specific purpose of acquiring the securities offered, whose purchase is directed by a sophisticated person as described in §230.506(b)(2)(ii); and</li>
					<li>Any entity in which all of the equity owners are accredited investors</li>
					</ul>
					To review the Federal Regulations of qualifications of being an Accredited Investor (Title 17 → Chapter II → Part 230 → §230.501), please <a href='https://www.ecfr.gov/cgi-bin/retrieveECFR?gp=&r=SECTION&n=17y3.0.1.1.12.0.46.176' target='_blank'>Click Here to visit the Electronic Code of Federal Regulations</a>
					</p>
					
					<h4>Why does BitREI work exclusively with Accredited Investors?</h4>
					<p>Recent Federal Laws require companies raising money through private placement capital raises (or crowdfunding), to limit the capital raises to individuals with Accredited Investor status. We work with Verify Investor™ and their experienced attorney network to qualify investors. BitREI covers all costs involved with Accreditation review, and have partnered with Verify Investor™ to allow BitREI to comply with Federal Laws, leveraging Verify Investor\'s secure software to qualify Accreditation.</p>
					
					<h4>Will BitREI ever work with Non-Accredited Investors?</h4>
					<p>Yes, our goal is to have our processes &amp; procedures reviewed by the proper governing agency to allow us to work with non-accredited investors. When this occurs, we will notify all non-accredited investors via email and/or phone.</p>";
						
					}elseif(
						!is_null($vi_member_data[0]->vi_request_id) && 
						$vi_member_data[0]->vi_detailed_status == 2 && 
						isset($vi_investor_url) && 
						$vi_investor_url != null
					){
						
						echo '<h3>Step 2 of 2: Submit Your Financial Information to Verify Investor™</h3>
						<p>Great! You have created an account with Verify Investor™. The final step is to submit your financial information. Click the button below to be redirected to Verify Investor™ to finalize your status as an Accredited Investor.</p>
						
						<p><a id="invest-button" class="button expanded" href="'.$vi_investor_url.'" style="width: 50%;font-weight:bold; margin: 0px auto; display: block;">Complete Submission of Financials to Verify Investor™</a></p>';
						
					}elseif(
						(!is_null($vi_member_data[0]->vi_request_id) && 
						!is_null($vi_member_data[0]->vi_detailed_status) && 
						$vi_member_data[0]->vi_detailed_status != 2) OR (isset($_GET['vi_user_id']) && isset($_GET['verification_status']) && $_GET['verification_status'] == "unverified")
					){
						
						echo "Thank you for submitting your information to Verify Investor™. Verify Investor™ will email you directly regarding the status of your accreditation, typically within 48 hours. Until then, feel free to <a href='/property/list'>view properties</a>, and build a wish list.";
						
					}else{
						
						echo $vi_data_notfound_text;
						
					}
					
				}else{
					
					echo $vi_data_notfound_text;
						
				}
				
				?>
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