<?


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

				$propertyController = new App\Http\Controllers\Property\PropertyController();
				$property_data = $propertyController->propertyFinancialData($property_item);

				$last_3_days = 0;
				if((float)$property_data['date_left_str'] < 4 && $property_data['left_seconds'] > 0){ $last_3_days = 1; }
				
			  ?><div class="columns xlarge-4 large-6 xmedium-6">
                  <!-- mixin property-item-preview begin-->
                  <div class="property-item box-white" data-equalizer-watch="data-equalizer-watch">
                    <!-- mixin property-item-header-small begin-->
                    <div class="property-item-header">
                      <div class="property-item-container">
                        <div class="property-item-price">
                          <h2 class="property-item-price-main">$<?= number_format((float)$property_data['price'], 0, '.', ',') ?></h2>
                          <!-- property-item-price-rent mixin begin-->
                          <div class="property-item-price-rent">
                            <div class="property-item-price-rent-label">Current Rent</div>
                            <h3 class="property-item-price-rent-value smaller">$<?= number_format((float)$property_data['property_item']->current_rent, 0, '.', ',') ?></h3>
                          </div>
                          <!-- property-item-price-rent mixin end-->
                        </div>
                        <!-- property-item-address mixin begin-->
                        <address class="property-item-address"><img class="property-item-address-icon" src="/member/img/template/location.png" alt="" width="11"/><?= $property_data['address_text'] ?></address>
                        <!-- property-item-address mixin end-->
                      </div>
                    </div>
                    <!-- mixin property-item-header-small end-->
                    <div class="property-item-img-container"><img class="property-item-img" src="<? if(count($property_data['property_images'])>0){
						
						$thumbnailCount = 0;
						$thumbnailSrc = "";
						
						foreach($property_data['property_images'] as $img_item){
							
							if($img_item->is_thumbnail == 1){$thumbnailCount = 1;$thumbnailSrc = $img_item->img;break;}
							
						}
						
						if($thumbnailCount == 0){
							
							$thumbnailSrc = $property_data['property_images'][0]->img;
							
						}
						
						echo $thumbnailSrc;
						
						
						} ?>" alt=""/>
                      <div class="property-item-img-content">
                        <!-- mixin favorite-heart begin-->
                        <!-- use class .favorite-heart.is-active for active state-->
                        <div class="favorite-heart favorite-item <? if($fav_val==1){echo "is-active";} ?>" data-toggler-itself="is-active" data-property-id="<?= $property_item->id ?>" data-fav="<?= $fav_val ?>"><img class="favorite-heart-icon-normal" src="/member/img/template/heart-white-outline.png" alt=""/><img class="favorite-heart-icon-active" src="/member/img/template/heart-white.png" alt=""/></div>
                        <!-- mixin favorite-heart end-->
                        <div class="property-item-img-footer">
                          <div class="property-item-img-footer-rooms column small-6">
                            <p><?= $property_data['property_item']->bedroom ?> Bedrooms</p>
                            <p><?= $property_data['property_item']->bathroom ?> Baths</p>
                          </div>
                          <div class="property-item-img-footer-foots column small-6">
                            <p><?= number_format((float)$property_data['property_item']->sq_ft, 0, '.', ',') ?> sq ft</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="property-item-body">
                      <div class="property-item-container">
                        <!-- mixin property-item-characteristics begin-->
                        <div class="property-item-characteristics">
                          <!-- property-item-characteristics-row mixin begin-->
                          <div class="property-item-characteristics-row">
                            <div class="row">
                              <div class="column small-6">
                                <div class="property-item-characteristics-label">gross yield <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                              </div>
                              <div class="column small-6">
                                <h3 class="smaller property-item-characteristics-value text-blue"><? echo number_format((float)$property_data['averageGrossYield'], 2, '.', ''); ?>%</h3>
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
                                <h3 class="smaller property-item-characteristics-value text-green"><? echo number_format((float)$property_data['averageNetYield'], 2, '.', ''); ?>%</h3>
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
                          <!-- <div class="property-item-characteristics-row">
                            <div class="row">
                              <div class="column small-6">
                                <div class="property-item-characteristics-label">Growth Forecast <a  href="javascript:void(0);" data-tooltips="Insert data here">?</a></div>
                              </div>
                              <div class="column small-6">
                                <h3 class="smaller property-item-characteristics-value text-blue"><? echo number_format((float)$property_data['property_item']->_forecast_growth_rate_1year, 2, '.', ''); ?>%</h3>
                              </div>
                            </div>
                          </div> -->
                          <!-- property-item-characteristics-row mixin end-->
                        </div>
                        <!-- mixin property-item-characteristics end-->
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
                              <h4 class="progress-value text-blue" <? if($last_3_days == 1){echo "style='color:red !important;'";} ?>><?= $property_data['date_left_str'] ?></h4>
                              <p class="progress-value-caption" <? if($last_3_days == 1){echo "style='color:red;'";} ?>>Days left</p>
                            </div>
                            <!-- progress-value mixin end-->
                          </div>
                          <!-- mixin property-item-progress-values end-->
                        </div>
                      </div>
                    </div>
                    <div class="property-item-footer">
                      <div class="property-item-container"><a class="button xregular hollow expanded" href="/property/item/<?= $property_data['property_item']->id ?>">View Details</a></div>
                    </div>
                  </div>
                  <!-- mixin property-item-preview end-->
                </div>
				