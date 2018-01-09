@extends('member.dash')

@section('content')


    <main class="box-blue">
      <div class="section">
        <div class="section-header">
          <div class="row">
            <div class="column large-6">
              <h2 class="section-title filters-title">Featured Property</h2>
            </div>
            <div class="column large-6">
              <!-- filters-location mixin begin-->
              
              <form class="filters-form filters-form-location">
                <div class="row">
                  <div class="column xlarge-5 large-5 medium-6">
                    <label class="filters-label">FILTER BY LOCATION</label>
                  </div>
                  <div class="column xlarge-7 large-7 medium-6">
                    <div class="input-search-group">
                      <input class="input-rounded" type="search" placeholder="Enter address or post code"/>
                      <button class="input-search-btn" type="submit"><img class="input-search-icon" src="/member/img/template/search.png" alt="" width="14"/></button>
                    </div>
                  </div>
                </div>
              </form>
             
              <!-- filters-location mixin end-->
            </div>
          </div>
        </div>
		<?
		
		
		$featured_property = DB::table('_property_details')
			->where("is_featured","=",1)
			->take(1)
			->get();
			
		if(count($featured_property)>0){
		
		$propertyController = new App\Http\Controllers\Property\PropertyController();
		$property_data = $propertyController->propertyFinancialData($featured_property[0]);
		
		
    ?>

        <!-- mixin most-feature begin -->
        <div class="row">
          <div class="column">
            <div class="section">
              <div class="property-item-expanded box-white">
                <div class="row">
                  <div class="column large-5 large-push-7 xmedium-9 medium-10 slider-column-translated">
                    <div class="row">
                      <div class="column xlarge-10 large-12 large-centered">
                        <div class="property-item-expanded-caption">
                          <!-- mixin property-item-header-big begin-->
                          <div class="property-item-header section">
                            <div class="property-item-price">
                              <h2 class="property-item-price-main bigger">$<? echo number_format($property_data['price'], 0, '.', ','); ?></h2>
                              <!-- property-item-price-rent mixin begin-->
                              <div class="property-item-price-rent">
                                <div class="property-item-price-rent-label">Current Rent</div>
                                <h3 class="property-item-price-rent-value smaller">$<? echo number_format($property_data['property_item']->current_rent, 0, '.', ','); ?></h3>
                              </div>
                              <!-- property-item-price-rent mixin end-->
                            </div>
                            <!-- property-item-address mixin begin-->
                            <address class="property-item-address"><img class="property-item-address-icon" src="/member/img/template/location.png" alt="" width="11"/><?= $property_data['address_text'] ?></address>
                            <!-- property-item-address mixin end-->
                            <!-- mixin property-item-info begin-->
                            <p class="property-item-info"><?= $property_data['property_item']->bedroom ?> Bedrooms, <?= $property_data['property_item']->bathroom ?> Baths | <? echo number_format($property_data['property_item']->sq_ft, 0, '.', ','); ?> sq ft | Built in <?= $property_data['property_item']->year_house_built ?></p>
                            <!-- mixin property-item-info end-->
                          </div>
                          <!-- mixin property-item-header-big end-->
                          <div class="property-item-body">
                            <!-- mixin property-item-characteristics begin-->
                            <div class="property-item-characteristics">
                              <!-- property-item-characteristics-row mixin begin-->
                              <div class="property-item-characteristics-row">
                                <div class="row">
                                  <div class="column small-7">
                                    <div class="property-item-characteristics-label">gross yield <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                                  </div>
                                  <div class="column small-5">
                                    <h3 class="smaller property-item-characteristics-value text-blue"><? echo number_format((float)$property_data['averageGrossYield'], 2, '.', ''); ?>%</h3>
                                  </div>
                                </div>
                              </div>
                              <!-- property-item-characteristics-row mixin end-->
                              <!-- property-item-characteristics-row mixin begin-->
                              <div class="property-item-characteristics-row">
                                <div class="row">
                                  <div class="column small-7">
                                    <div class="property-item-characteristics-label">net yield <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                                  </div>
                                  <div class="column small-5">
                                    <h3 class="smaller property-item-characteristics-value text-green"><? echo number_format((float)$property_data['averageNetYield'], 2, '.', ''); ?>%</h3>
                                  </div>
                                </div>
                              </div>
                              <!-- property-item-characteristics-row mixin end-->
                              <!-- property-item-characteristics-row mixin begin-->
                              <div class="property-item-characteristics-row">
                                <div class="row">
                                  <div class="column small-7">
                                    <div class="property-item-characteristics-label">cash flow <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                                  </div>
                                  <div class="column small-5">
                                    <h3 class="smaller property-item-characteristics-value text-blue">$<?= $property_data['cash_flow'] ?></h3>
                                  </div>
                                </div>
                              </div>
                              <!-- property-item-characteristics-row mixin end-->
                              <!-- property-item-characteristics-row mixin begin-->
                              <div class="property-item-characteristics-row">
                                <div class="row">
                              <div class="column small-7">
                                <div class="property-item-characteristics-label">Growth Forecast <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                              </div>
                              <div class="column small-5">
                                <h3 class="smaller property-item-characteristics-value text-blue"><? echo number_format((float)$property_data['property_item']->_forecast_growth_rate_1year, 2, '.', ''); ?>%</h3>
                              </div>
                              </div>
                              </div>
                              <!-- property-item-characteristics-row mixin end-->
                              
                            </div>
                            <!-- mixin property-item-characteristics end-->
                          </div>
                        </div>
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
                      <div class="favorite-heart" data-toggler-itself="is-active"><img class="favorite-heart-icon-normal" src="/member/img/template/heart-white-outline.png" alt=""/><img class="favorite-heart-icon-active" src="/member/img/template/heart-white.png" alt=""/></div>
                      <!-- mixin favorite-heart end-->
                    </div>
                    <!-- mixin property-slider end-->
                  </div>
                  <div class="column" style="margin-top: 20px;">
                    <div class="row">
                      <div class="column large-7 slider-column-translated">
                        <div class="slider-column-translated-content">
                          <div class="property-item-progress">
                            <!-- mixin progressbar begin-->
                            <div class="progressbar">
                              <!-- change filled area with width-->
                              <div class="progressbar-fill" style="width:<?= $property_data['invested_percents'] ?>%;"></div>
                            </div>
                            <!-- mixin progressbar end-->
                            <!-- mixin property-item-progress-values begin-->
                            <div class="progress-values">
                              <!-- progress-value mixin begin-->
                              <div class="progress-value-container">
                                <h4 class="progress-value text-blue"><?= $property_data['invested_percents'] ?>%</h4>
                                <p class="progress-value-caption">funded</p>
                              </div>
                              <!-- progress-value mixin end-->
                              <!-- progress-value mixin begin-->
                              <div class="progress-value-container">
                                <h4 class="progress-value text-blue">$<?= $property_data['invested_amount'] ?>k</h4>
                                <p class="progress-value-caption">Pledged</p>
                              </div>
                              <!-- progress-value mixin end-->
                              <!-- progress-value mixin begin-->
                              <div class="progress-value-container">
                                <h4 class="progress-value text-blue"><?= $property_data['investors_count'] ?></h4>
                                <p class="progress-value-caption">Investors</p>
                              </div>
                              <!-- progress-value mixin end-->
                              <!-- progress-value mixin begin-->
                              <div class="progress-value-container">
                                <h4 class="progress-value text-blue"><?= $property_data['date_left_str'] ?></h4>
                                <p class="progress-value-caption">Days left</p>
                              </div>
                              <!-- progress-value mixin end-->
                            </div>
                            <!-- mixin property-item-progress-values end-->
                          </div>
                        </div>
                      </div>
                      <div class="column large-5 slider-column-translated">
                        <div class="row">
                          <div class="column xlarge-10 large-12 medium-9 medium-centered">
                            <div class="property-item-footer"><a class="button expanded xregular" href="/property/item/<?= $property_data['property_item']->id ?>">View Details</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- mixin most-feature end -->
		<? } ?>
      </div>
      <!-- mixin property-items-previews begin-->
      <div class="property-items-previews section" data-equalizer="data-equalizer" data-equalize-on="medium">
        <div class="row">
          <div class="column xlarge-12 large-10 xmedium-12 medium-8 medium-centered">
            <div class="row">
			
			<?
			
			$data = \DB::table('_property_details')
				->where("is_homepage","=",1)
				->orderBy("sort", "ASC")
				->take(6)
				->get();
				
			?>
			<? foreach($data as $property_item){ ?>
			@include('web.property_preview_item', ['property_item' => $property_item])
			<? } ?>
			
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
      <!-- mixn property-items-previews end-->
    </main>
	
	
	<div class="choose">
      <div class="row">
        <div class="column xlarge-6 large-7 xmedium-8 medium-11 float-right">
          <div class="choose-caption box-white-no-shadow box-padding-big section">
            <div class="subsection">
              <div class="choose-header">
                <h6 class="choose-subtitle small">Always wanted invest in real estate?</h6>
                <h3 class="choose-title">Choose among our vetted properties, and diversify your investment portfolio with low-risk REIs!</h3>
              </div>
              <div class="choose-body">
                <p>Integer elementum est congue dapibus tincidunt. Phasellus ac est eget libero tempus vestibulum et et urna. In viverra odio ac felis vulputate, nec euismod lorem congue. </p>
                <p>Donec volutpat, risus rhoncus lobortis sagittis, arcu enim placerat risus, sed pretium felis quam nec lacus. Nam id tincidunt dui. Nullam ac purus a nisl posuere auctor elementum interdum nisi. Praesent tellus nisl, eleifend et neque quis, pretium imperdiet tellus.</p>
              </div>
              <div class="choose-footer"><a class="button hollow xregular" href="/pages/what-we-do">Learn More</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	
	<div class="featured-in">
      <div class="row">
        <div class="column">
          <h5 class="featured-in-title">As featured in</h5>
          <div class="featured-in-items"><img class="featured-in-item section" src="/member/img/media/featured-in/wall-street.png" alt="" width="140"><img class="featured-in-item section" src="/member/img/media/featured-in/forbes.png" alt="" width="150"><img class="featured-in-item section" src="/member/img/media/featured-in/huffington.png" alt="" width="187"></div>
        </div>
      </div>
    </div>
	
	
	<div class="create-account-contact-us box-white-no-shadow">
      <div class="row" data-equalizer="data-equalizer" data-equalize-on="medium" data-resize="data-equalizer" data-mutate="data-equalizer">
        <div class="column medium-6">
          <div class="row">
            <div class="column xlarge-6 large-7 medium-11 medium-centered" data-equalizer-watch="data-equalizer-watch" style="height: 410px;">
              <div class="vertical-parent">
                <div class="vertical-middle">
                  <!-- create-account-form mixin begin-->
                  <form class="section create-account-form" action="/auth/register" method="get">
                    <!-- form-header mixin begin-->
                    <div class="form-header">
                      <h3 class="light">Are You Interested?</h3>
                      <h3 class="semibold text-green">Open an Account!</h3>
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
                        <div class="secure-group"><img class="secure-group-img" src="/member/img/template/lock.png" alt="" width="12">
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
        <div class="column medium-6">
          <div class="form-container">
            <div class="row">
              <div class="column medium-11 medium-centered large-float-right" data-equalizer-watch="data-equalizer-watch" style="height: 410px;">
                <div class="vertical-parent">
                  <div class="vertical-middle">
                    <form class="contact-form section">
                      <!-- form-header mixin begin-->
                      <div class="form-header">
                        <h3 class="light">Do You Have Any Questions?</h3>
                        <h3 class="semibold text-blue">Contact Us!</h3>
                      </div>
                      <!-- form-header mixin begin-->
                      <div class="form-body">
                        <div class="row">
                          <div class="column large-6">
                            <input type="text" placeholder="Your Name">
                            <input type="email" placeholder="E-mail">
                          </div>
                          <div class="column large-6">
                            <textarea class="input-height-2" placeholder="Your message"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-footer">
                        <button class="button hollow expanded" type="submit">Send</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-divider"></div>
          </div>
        </div>
      </div>
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

@endsection
@section('footer')

<? if (Auth::check()) { ?>
<script>

$(document).ready(function(){
	
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
<? } ?>


@endsection