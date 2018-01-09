<?

$is_index = 0;

if($_SERVER['REQUEST_URI'] == '/' OR $_SERVER['REQUEST_URI'] == ''){
	
	$is_index = 1;
	
}

?><!DOCTYPE html>
<!-- transaction-history.pug begin-->
<html lang="zxx">
  <!-- mixin head begin-->
  <head>
    <!-- Meta-->
    <meta charset="utf-8"/>
    <!-- Title-->
    <title>BitREI</title>
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.3, maximum-scale=3.0, user-scalable=yes"/>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"/>
    <!-- Framework-->
    <link rel="stylesheet" href="/member/foundation/foundation.min.css"/>
    <!-- Slider-->
    <link rel="stylesheet" href="/member/lightslider/lightslider.css"/>
    <!-- CSS-->
    <link rel="stylesheet" href="/member/css/global/global.css"/>
    <link rel="stylesheet" href="/member/css/components/advantages.css"/>
    <link rel="stylesheet" href="/member/css/components/choose.css"/>
    <link rel="stylesheet" href="/member/css/components/comments.css"/>
    <link rel="stylesheet" href="/member/css/components/documents.css"/>
    <link rel="stylesheet" href="/member/css/components/featured-in.css"/>
    <link rel="stylesheet" href="/member/css/components/filters.css"/>
    <link rel="stylesheet" href="/member/css/components/financial-overview.css"/>
    <link rel="stylesheet" href="/member/css/components/footer.css"/>
    <link rel="stylesheet" href="/member/css/components/header.css"/>
    <link rel="stylesheet" href="/member/css/components/hero.css"/>
    <link rel="stylesheet" href="/member/css/components/page-nav.css"/>
    <link rel="stylesheet" href="/member/css/components/profile-menu.css"/>
    <link rel="stylesheet" href="/member/css/components/profile.css"/>
    <link rel="stylesheet" href="/member/css/components/property-item.css"/>
    <link rel="stylesheet" href="/member/css/components/slider.css"/>
	<!-- bootstrap-daterangepicker -->
    <link href="/member/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- Font Awesome -->
    <link href="/member/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/member/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="/member/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/member/favicon-16x16.png"/>
    <link rel="manifest" href="/member/manifest.json"/>
    <link rel="mask-icon" href="/member/safari-pinned-tab.svg" color="#5bbad5"/>
    <meta name="theme-color" content="#ffffff"/>
	<style>
	.columns:last-child:not(:first-child) {
    float: left;
}
	</style>
  </head>
  <!-- mixin head end-->
  <body>
    <!-- mixin header begin-->
	
    <header <? if ($is_index == 1){ ?> class="header header-absolute" id="header" data-toggler=".is-active"<? }else{ ?>class="header"<? } ?>>
      <div class="row">
        <div class="column large-2">
          <div class="row">
            <div class="column large-12 small-6">
              <!-- mixin header-logo begin--><a class="header-logo" href="/" style="padding-top:0px;"><img src="/member/img/template/bitREI_logo.svg" width="200" alt=""/></a>
              <!-- mixin header-logo end-->
            </div>
            <div class="column small-6">
              <!-- mixin header-menu-button begin-->
              <!-- Menu button-->
              <div class="menu-icon-container clearfix" data-responsive-toggle="header-menu" data-hide-for="large" data-toggle="header">
                <button class="menu-icon" type="button" data-toggle="header-menu"></button>
              </div>
              <!-- mixin header-menu-button end-->
            </div>
          </div>
        </div>
        <div class="column large-10">
          <!-- Collapsible Menu-->
          <div class="header-menu-collapsible" id="header-menu">
            <div class="row">
              <div class="column large-7">
                <!-- mixin header-menu-main begin-->
                <div class="menu-centered">
                  <ul class="header-menu menu dropdown" data-dropdown-menu="data-dropdown-menu" data-click-open="true">
                    <li><a href="/property/list">Buy Properties</a></li>
                    <li><a href="#">About Us</a>
                     <ul class="menu">
                        <li><a href="/pages/what-we-do">What We Do</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Press</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Knowledge</a>
                      <ul class="menu">
                      	<li><a href="#">Blog</a></li>
                        <li><a href="#">Neighborhoods</a></li>
                        <li><a href="#">Company News</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <!-- mixin header-menu-main end-->
              </div>
              <div class="column large-5">
			  <? if (Auth::check()) { ?>
				<?

					$existedViData_1 = DB::table("_member_vi_data")
								->where("user_id","=",Auth::user()->id)
								->get();
					
					$verified_investor = 0;
				
					if(count($existedViData_1)>0 && !empty($existedViData_1[0]->vi_user_id)){
						
						if($existedViData_1[0]->status == 2){
							
							$verified_investor = 1;
							
						}
						
					}
					





				?>
                <!-- mixin header-menu-logged begin-->
                <div class="header-menu-user-container" style="float:left;">
                  <ul class="menu header-menu-user-logged-container dropdown" data-dropdown-menu="data-dropdown-menu" data-click-open="true" role="menubar">
                    <li role="menuitem" class="is-dropdown-submenu-parent opens-right" aria-haspopup="true" aria-label="<? echo Auth::user()->email; ?>" data-is-click="false"><a class="header-menu-user-logged" href="#">
                        <div class="header-menu-user-photo-container">
                          <img class="header-menu-user-photo" src="<? if(!is_null(Auth::user()->thumbnail_image)){ echo "/upload_files/".Auth::user()->thumbnail_image; }else{ echo "/member/img/media/comments/avatar.png"; } ?>" alt="">
                        </div>
                        <div class="header-menu-user-name-position">
                          <h6 class="header-menu-user-name"><? echo Auth::user()->email; ?></h6>
                          <h6 class="header-menu-user-position small"><? if($verified_investor == 0){echo "Non Accredited Investor";}else{echo "<img src='/member/img/template/accredited-investor-green.png' style='height:17px;'/>";} ?></h6>
                        </div></a>
                      <ul class="menu submenu is-dropdown-submenu first-sub vertical" data-submenu="" role="menu" style="">
                        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="/member/profile">My Profile </a></li>
                        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="/member/settings-password">Password Reset</a></li>
                        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="/member/settings-permissions">Permissions</a></li>
						<li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="/member/settings-vi">Verify Investor</a></li>
                        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><? echo "<a href='/auth/logout'>Logout</a>"; ?></li>
                      </ul>
                    </li>
                  </ul>
				  
				  
				  
				  
				  
				  
                </div><div style="float:left;padding:20px;">
				  <?
				  
				  $userCartItems = DB::table("_member_cart")
					->where("user_id", "=", Auth::user()->id)
					->get();
				  
				  $cartItemCount = count($userCartItems);
				  
				  ?>
				  <a href="/transaction/cart">Cart (<?= $cartItemCount ?>)</a>
				  
				  </div>
                <!-- mixin header-menu-logged end-->
				<? }else{ ?>
                <!-- mixin header-menu-unlogged begin-->
                <div class="header-menu-unlogged-container">
				
					<a class="header-menu-user-item button hollow on-dark tiny" href="/auth/register">SIGN UP</a><span class="header-menu-user-item">or</span><a class="header-menu-user-item header-menu-user-link-login" href="/auth/login">login</a>
				
				</div>
                <!-- mixin header-menu-unlogged end-->
				<? } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
	
	<? if ($is_index == 1){ ?>
 
	
	<!-- mixin hero begin-->
    <div class="hero">
      <div class="hero-body">
        <div class="row">
          <div class="column xlarge-11 xlarge-centered">
            <div class="row" data-equalizer="data-equalizer" data-equalize-on="medium">
              <div class="columns xlarge-8 large-8 xmedium-7" data-equalizer-watch="data-equalizer-watch">
                <div class="vertical-parent">
                  <div class="vertical-middle">
                    <div class="hero-text section">
                      <div class="hero-text-body">
                        <h1 class="hero-title">Fractional  Residential Real Estate Investing</h1>
                        <h2 class="hero-subtitle">Investing in residential rental properties without buying the whole house! How?</h2>
                      </div>
                      <div class="hero-text-footer"><a class="hero-btn" href="#video-modal"><img class="hero-btn-item hero-btn-icon" src="/member/img/template/play.png" alt=""/>
                          <h3 class="hero-btn-item hero-btn-text">Watch Video</h3></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="columns xlarge-4 large-4 xmedium-5 medium-7 medium-centered xmedium-uncentered" data-equalizer-watch="data-equalizer-watch">
                <div class="vertical-parent">
                  <div class="vertical-middle">
                    <div class="box-white box-padding section">
                      <!-- create-account-form mixin begin-->
                      <form class="section create-account-form" action="/auth/register" method="get">
                        <!-- form-header mixin begin-->
                        <div class="form-header">
                          <h3 class="light">Create a</h3>
                          <h3 class="semibold text-green">Free Account!</h3>
                        </div>
                        <!-- form-header mixin begin-->
                        <div class="form-body">
                          <input type="text" name="first_name" placeholder="First Name"/>
                          <input type="text" name="last_name" placeholder="Last Name"/>
                          <input type="email" name="email" placeholder="E-mail"/>
                          <button class="button expanded" type="submit">Get Started</button>
                        </div>
                        <div class="form-footer">
                          <!-- mixin secure-group begin-->
                          <div class="secure-group-container">
                            <div class="secure-group"><img class="secure-group-img" src="/member/img/template/lock.png" alt="" width="12"/>
                              <h6 class="form-text-small">100% secure. Your e-mail stays only with us!</h6>
                            </div>
                          </div>
                          <!-- mixin secure-group end-->
                        </div>
                      </form>
                      <!-- create-account-form mixin end-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- mixin hero end-->
    <div class="advantages">
      <div class="row" data-equalizer data-equalize-on="medium">
        <div class="column xmedium-3 medium-6" data-equalizer-watch>
          <!-- mixin advantage begin-->
          <div class="advantage section">
            <div class="advantage-img-container"><img src="/member/img/template/percenthouse.svg" alt="" width="60"/></div>
            <h4 class="advantage-title">Become a Real Estate Investor via Fractional Ownership</h4>
            <div class="advantage-text">
              <p>You choose among our rental properties, decide which percentage of that property to own, and your name is added to the home title.</p>
            </div>
          </div>
          <!-- mixin advantage end-->
        </div>
        <div class="column xmedium-3 medium-6" data-equalizer-watch>
          <!-- mixin advantage begin-->
          <div class="advantage section">
            <div class="advantage-img-container"><img src="/member/img/template/handmoney.svg" alt="" width="60"/></div>
            <h4 class="advantage-title">Receive Quarterly Payouts &amp; Earnings Statements</h4>
            <div class="advantage-text">
              <p>Transparent accessibility to costs, total earnings, and net earnings, divided amongst the property's investors on a quarterly basis.</p>
            </div>
          </div>
          <!-- mixin advantage end-->
        </div>
        <div class="column xmedium-3 medium-6" data-equalizer-watch>
          <!-- mixin advantage begin-->
          <div class="advantage section">
            <div class="advantage-img-container"><img src="/member/img/template/newoldhouse.svg" alt="" width="60"/></div>
            <h4 class="advantage-title">Freedom to Create a Hassle-Free Real Estate Portfolio</h4>
            <div class="advantage-text">
              <p>Invest in 1 home, or diversify among multiple income properties - you have the freedom to build a unique Real Estate Investment Portfolio, without being a landlord</p>
            </div>
          </div>
          <!-- mixin advantage end-->
        </div>
        <div class="column xmedium-3 medium-6" data-equalizer-watch>
          <!-- mixin advantage begin-->
          <div class="advantage section">
            <div class="advantage-img-container"><img src="/member/img/template/handhouse.svg" alt="" width="60"/></div>
            <h4 class="advantage-title">BitREI Invests Alongside You - We All Invest Together</h4>
            <div class="advantage-text">
              <p>BitREI will purchase at least 20% of every home listed on BitREI. This means we all invest together, providing members a piece of mind.</p>
            </div>
          </div>
          <!-- mixin advantage end-->
        </div>
      </div>
    </div>
	
	<? } ?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    <!-- mixin header end-->
	<? if (Auth::check() && Route::getCurrentRoute()->uri() != '/'){ ?>
    <!-- mixin page-nav begin-->
    <!-- Collapsible Menu-->
    <div class="page-nav">
      <div class="row">
        <div class="column">
          <!-- Menu button-->
          <div class="menu-icon-container clearfix" data-responsive-toggle="page-nav-menu" data-hide-for="large">
            <button class="menu-icon inverse" type="button" data-toggle="page-nav-menu"></button>
          </div>
          <ul class="menu page-nav-menu dropdown" id="page-nav-menu" data-dropdown-menu="data-dropdown-menu" data-click-open="true">
            <li <? if (strpos($_SERVER['REQUEST_URI'], '/member/portfolio') !== false){ echo 'class="is-active"'; } ?>><a href="/member/portfolio">Portfolios</a></li>
            <li <? if (strpos($_SERVER['REQUEST_URI'], '/member/watchlist') !== false){ echo 'class="is-active"'; } ?>><a href="/member/watchlist">Watch List</a></li>
            <li <? if (strpos($_SERVER['REQUEST_URI'], '/member/transaction-list') !== false){ echo 'class="is-active"'; } ?>><a href="/member/transaction-list">Transaction History 	</a></li>
            <li <? if (strpos($_SERVER['REQUEST_URI'], '/member/document-vault') !== false){ echo 'class="is-active"'; } ?>><a href="/member/document-vault">Document Vault</a></li>
           
          </ul>
        </div>
      </div>
    </div>
    <!-- mixin page-nav end-->
	<? } ?>

	<main class="box-blue">
	<? if (Auth::check()) {
	
	
		$existedViData_1 = DB::table("_member_vi_data")
			->where("user_id","=",Auth::user()->id)
			->get();
		
		$vi_status = 0;
		
		if(count($existedViData_1)>0 && !empty($existedViData_1[0]->vi_user_id)){
				
			if($existedViData_1[0]->status == 2){$vi_status = 1;}
			
		}

		
		$page_vi_sett = 0;
		if (strpos($_SERVER['REQUEST_URI'], '/member/settings-vi') !== false) {
			$page_vi_sett = 1;
		}
	
		if($vi_status == 0 && $page_vi_sett == 0){
	
	?>
	<div class="section">
        <div class="row">
          <div class="column">
            
            <!-- mixin callouts begin-->
            <div class="callouts-container section">
			
              <!-- mixin callout begin-->
              <div class="callout box-padding-sm section" style="background: rgba(168,7,7,0.1);">
                <div class="row">
                  <div class="column">
                    <h4 class="callout-title" style="color: #a80707;">Important: Please Complete Your Profile to Unlock All BitREI Features!</h4>
                    <div class="callout-body">
                      <p>To invest in any property with BitREI, members are required to be an <strong>Accredited Investor</strong>. We work with Verify Investor, a reputable attorney network to verify Accredited Investor status. <a href="/member/settings-vi"><strong>Please Click Here</strong></a> to receive your <strong>free</strong> Accredited Investor designation, and begin expanding your portfolio with fractional residential REI's, today!</p>
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
	<? }} ?>
	
	
	
	@yield('content')

    </main>

    <!-- mixin footer begin-->
    <footer class="footer">
      <div class="footer-nav">
        <div class="row">
          <div class="column large-3 medium-4">
            <!-- footer-nav-item.pug begin-->
            <div class="footer-nav-item section">
              <h6 class="footer-nav-item-title">QUICK MENU</h6>
              <div class="footer-nav-item-body">
                <ul class="menu vertical footer-menu">
                  <li><a href="#">Buy Properties</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Knowledge</a></li>
                </ul>
              </div>
            </div>
            <!-- footer-nav-item.pug end-->
          </div>
          <div class="column large-3 medium-4">
            <!-- footer-nav-item.pug begin-->
            <div class="footer-nav-item section">
              <h6 class="footer-nav-item-title">HELP</h6>
              <div class="footer-nav-item-body">
                <ul class="menu vertical footer-menu">
                  <li><a href="#">Company News</a></li>
                  <li><a href="#">Neighborhoods</a></li>
                  <li><a href="#">Common REI Phrases</a></li>
                  <li><a href="#">FAQs</a></li>
                </ul>
              </div>
            </div>
            <!-- footer-nav-item.pug end-->
          </div>
          <div class="column large-3 medium-4">
            <!-- footer-nav-item.pug begin-->
            <div class="footer-nav-item section">
              <h6 class="footer-nav-item-title">LEGAL DISCLAIMERS</h6>
              <div class="footer-nav-item-body">
                <ul class="menu vertical footer-menu">
                  <li><a href="/pages/bitrei-terms-of-use">Terms of Use</a></li>
                  <li><a href="/pages/bitrei-privacy-policy">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
            <!-- footer-nav-item.pug end-->
          </div>
          <div class="column large-3">
            <div class="footer-nav-item section">
              <h6 class="footer-nav-item-title">about us</h6>
              <div class="footer-nav-item-body">
                <p>BitREI is a residential real estate investment company, that allows members to easily purchase percentages (or bits) of investment properties, and receive the maximum financial return with the minimum inconvenience. That's why BitREI is the ultimate real estate investment opportunity!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-main">
        <div class="row">
          <div class="column">
            <div class="footer-main-header">
              <div class="row">
                <div class="column small-6"><a class="footer-logo" href="/"><img src="/member/img/template/bitREI_logo_dark.svg" alt="" width="150"/></a></div>
                <div class="column small-6">
                  <div class="footer-social-login">
                    <!-- social-list mixin begin-->
                    <ul class="menu social-list">
                      <!-- social-list-item mixin begin-->
                      <li><a href="#"><img src="/member/img/template/facebook.png" width="9" alt=""/></a></li>
                      <!-- social-list-item mixin end-->
                      <!-- social-list-item mixin begin-->
                      <li><a href="#"><img src="/member/img/template/twitter.png" width="17" alt=""/></a></li>
                      <!-- social-list-item mixin end-->
                      <!-- social-list-item mixin begin-->
                      <li><a href="#"><img src="/member/img/template/linkedin.png" width="18" alt=""/></a></li>
                      <!-- social-list-item mixin end-->
                    </ul>
                    <!-- social-list mixin end-->
                    <!-- hidden for small - it is represented in header--><a class="button tiny footer-btn hide-for-small-only" href="login-create-account.html">Login</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="footer-main-text">
              <div class="row">
                <div class="column large-3">
                  <p>This website is operated and maintained by BitREI LLC, a residential real estate investment company. Unless otherwise specified, all return figures shown above are for illustrative purposes only and are not actual customer or model returns. Actual returns will vary greatly and depend on personal and market circumstances.</p>
                </div>
                <div class="column large-7">
                  <p>Brokerage services provided to BitREI members by SCR Properties, a licensed real estate broker.</p>

<p>Investments: Not FDIC Insured • No Bank Guarantee • May Lose Value. Investing in securities involves risks, and there is always the potential of losing money when you invest in securities. Before investing, consider your investment objectives and BitREI's charges and expenses. BitREI's internet-based services are designed to assist clients in achieving discrete financial goals. They are not intended to provide comprehensive tax advice or financial planning with respect to every aspect of a client's financial situation and do not incorporate specific investments that clients hold elsewhere. Past performance does not guarantee future results, and the likelihood of investment outcomes are hypothetical in nature. Not an offer, solicitation of an offer, or advice to buy or sell securities in jurisdictions where Betterment is not registered.</p>

<p>Contact: BitREI, 1410 Lake Baldwin Ln #A, Orlando, FL 32814. Tel: (444) 444‑4444</p>
                </div>
                <div class="column large-2">
                  <center><img src="/member/img/template/comodo-ssl.png" style="height:50px;"></center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- mixin footer end				-->
    <!-- mixins scripts begin-->
    <!-- jQuery-->
    <script src="/member/js/jquery-2.2.1.min.js"></script>
    <!-- Framework-->
    <script src="/member/foundation/foundation.min.js"></script>
    <!-- Slider-->
    <script src="/member/lightslider/lightslider.min.js"></script>
    <!-- Chart-->
    <script src="/member/chart/chart.min.js"></script>
    <!-- Custom script-->
    <script src="/member/js/main.js"></script>
    <!-- mixins scripts end-->
	<!-- bootstrap-daterangepicker -->
    <script src="/member/bootstrap-daterangepicker/moment/min/moment.min.js"></script>
    <script src="/member/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <div id="close-modal"></div>
    <div id="video-modal" class="modal-target" data-youtube="888FRPWvj-E"></div>
    <div class="wrap-modal-window">
      <a href="#close-modal"></a>
      <div class="modal-window">
        <a class="close-modal" href="#close-modal">×</a>
      </div>
    </div>

	@yield('footer')
	
	<script type="text/javascript"> var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode:"6b6fd8e76c1cccb85fccae2307d7a01cce548f72c94ba811ae1bb9563e4dded9", values:{},ready:function(){}}; var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true; s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>"); </script>
	
  </body>
  <!-- transaction-history.pug end		-->
</html>