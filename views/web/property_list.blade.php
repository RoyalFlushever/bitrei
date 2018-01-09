@extends('member.dash')

@section('content')

	
	
	<? if( count($data)<1 && isset($message)){ ?>
      
	<div class="section">
        <div class="row">
          <div class="column xmedium-11 xmedium-centered">
            
            <!-- mixin callouts begin-->
            <div class="callouts-container section">
			
              <!-- mixin callout begin-->
              <div class="callout box-white box-padding-sm section" data-closable="data-closable">
                <div class="row">
                  <div class="column">
                    <h4 class="callout-title">Empty list</h4>
                    <div class="callout-body">
                      <p>{{ $message }}</p>
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
	<? } ?>
	
	<? if (Route::getCurrentRoute()->uri() == 'member/watchlist' && count($data)<1){}else{ ?>
	
      <div class="section">
        <div class="section-header">
          <div class="row">
            <div class="column large-3">
              <h2 class="section-title filters-title"><? if(isset($page_title) && $page_title!=""){echo $page_title;} ?></h2>
            </div>
            <div class="column large-9">
              <!-- filters-location mixin begin-->
              <form class="filters-form filters-form-location">
                <div class="row">
                  <div class="column xlarge-3 large-3 medium-3">
                    <label class="filters-label">FILTER BY LOCATION</label>
                  </div>
                  <div class="column xlarge-9 large-9 medium-9">
                    <div class="input-search-group">
						<select name="state" id="state" style="width:30%;
    background-color: transparent;
    box-sizing: border-box;
    border-radius: 25px;
    height: 50px;
    margin-bottom: 15px;
    border: 1px solid #dadde8;
    padding: 15px 20px;
    border-radius: 5px;
    font-size: 1rem;
    background-color: #fff;
    background-image: none;
    color: #526676;
    text-align: inherit;
    -webkit-transition: all 0.1s ease-out;
    transition: all 0.1s ease-out;display:inline-block;">
							  <!--<option value="0">Select a State</option>-->
							  <?
							  
								$propertyController = new App\Http\Controllers\Property\PropertyController();
								$locationRegionList = $propertyController->locationRegionList();
							
								foreach($locationRegionList as $cityItem){
									
									$selected = "";
									if(isset($_GET['state']) && $_GET['state'] == $cityItem){ $selected = "selected"; }
									
									$locationItemData = DB::table('_location_regions')->where("short_name","=",$cityItem)->get();
									
									if(count($locationItemData)>0){
										
										$locationName = $locationItemData[0]->name;
										
									}else{
										
										$locationName = $cityItem;
										
									}
									
									echo '<option value="'.$cityItem.'" '.$selected.'>'.$locationName.'</option>';
									
								}
							  
							  ?>
							</select>
							
							<select name="city" id="city" style="width:30%;
    background-color: transparent;
    box-sizing: border-box;
    border-radius: 25px;
    height: 50px;
    margin-bottom: 15px;
    border: 1px solid #dadde8;
    padding: 15px 20px;
    border-radius: 5px;
    font-size: 1rem;
    background-color: #fff;
    background-image: none;
    color: #526676;
    text-align: inherit;
    -webkit-transition: all 0.1s ease-out;
    transition: all 0.1s ease-out;display:inline-block;">
							<?
							
							$propertyController = new App\Http\Controllers\Property\PropertyController();
							$locationCityList = $propertyController->locationCityList();
						
							foreach($locationCityList as $cityItem){
								
								$selected = "";
								if(isset($_GET['city']) && $_GET['city'] == $cityItem){ $selected = "selected"; }
								
								echo '<option value="'.$cityItem.'" '.$selected.'>'.$cityItem.'</option>';
								
							}
						
							?>
							</select>
							
					  <input style="display:inline-block;border-radius:5px;background-color:#fff;width:30%;" class="input-rounded" type="search" placeholder="Enter postcode" name="zip" value="<? if(isset($_GET['zip'])){ echo $_GET['zip']; }?>">
                      <button class="input-search-btn" style="position:relative;" type="submit"><img class="input-search-icon" src="/member/img/template/search.png" alt="" width="14"/></button>
                    </div>
                  </div>
                </div>
              </form>
              <!-- filters-location mixin end-->
            </div>
          </div>
        </div>
        <!-- mixin property-items-previews begin-->
        <div class="property-items-previews section" data-equalizer="data-equalizer" data-equalize-on="medium">
          <div class="row">
            <div class="column xlarge-12 large-10 xmedium-12 medium-8 medium-centered">
              <div class="row">
			  <? if(count($data)>0){ ?>
				<? foreach($data as $property_item){ ?>
				@include('web.property_preview_item', ['property_item' => $property_item])
				<? } ?>
				<? }else{ ?>
				
				
				<div style="width:80%;margin:0 auto;padding:20px;background:#fff;text-align:center;">
				Not found any items by search query
				</div>
				
				
				<? } ?>
              </div>
            </div>
          </div>
          <!-- mixin load-more begin-->
          <!--<div class="row">
            <div class="column medium-4 medium-centered">
              <div class="load-more section"><a class="button hollow secondary xregular expanded" href="#">Load More</a></div>
            </div>
          </div>-->
          <!-- mixin load-more end-->
        </div>
        <!-- mixn property-items-previews end-->
      </div>
	  
	<? } ?>
	  
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