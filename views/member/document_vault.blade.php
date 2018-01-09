@extends('member.dash')

@section('content')


      <div class="row">
        <div class="column">
          <div class="section box-shadow box-padding">
            <h3 class="section-title">Document Vault</h3>
            <form action="/member/document-vault" method="get" id="filterDocsForm">
              <div class="row">
                <div class="column large-4 medium-6">
                  <div class="section">
                    <h5 class="text-blue">Select 1 or multiple properties</h5>
                    <ul class="select-multiple menu vertical property_select">
					<?
					
					//-----------------------
					if(count($propertyList)>0){
						
						foreach($propertyList as $property_item){
							
						$categoryLiClass = "";
						
						if(isset($_GET['property_array']) && strlen($_GET['property_array'])>0 && !empty($_GET['property_array'])){
							
							$docCategoriesGet = explode(",", $_GET['property_array']);
							
							if(count($docCategoriesGet)>0){
								
								if(in_array($property_item->id,$docCategoriesGet)){
									
									$categoryLiClass = 'class="is-active"';
									
								}
								
							}
							
						}
								$address_text = $property_item->address . ", " . $property_item->city . ", " . $property_item->state . " " . $property_item->zip;
								
					?>
                      <li data-toggler-itself="is-active" <?= $categoryLiClass; ?> data-id="<?= $property_item->id ?>"><?= $address_text ?></li>
					<? }} ?>
                    </ul>
					<input type="hidden" name="property_array" value="">
                  </div>
                </div>
                <div class="column large-4 medium-6">
                  <div class="section">
                    <h5 class="text-blue">Select 1 or multiple document types</h5>
                    <ul class="select-multiple menu vertical doc_category_select">
					<?
						
					$docCategory = DB::table('_member_documents_categories')
						//->where("id", "=", $documentItem->category_id)
						->get();
						
					foreach($docCategory as $categoryItem){
						
						$categoryLiClass = "";
						
						if(isset($_GET['doc_category_array']) && strlen($_GET['doc_category_array'])>0 && !empty($_GET['doc_category_array'])){
							
							$docCategoriesGet = explode(",", $_GET['doc_category_array']);
							
							if(count($docCategoriesGet)>0){
								
								if(in_array($categoryItem->id,$docCategoriesGet)){
									
									$categoryLiClass = 'class="is-active"';
									
								}
								
							}
							
						}
					
					?>
                      <li data-toggler-itself="is-active" <?= $categoryLiClass; ?> data-id="<?= $categoryItem->id ?>"><?= $categoryItem->name ?></li>
					<? } ?>
                    </ul>
					<input type="hidden" name="doc_category_array" value="">
                  </div>
                </div>
                <div class="column large-4 medium-12">
                  <div class="section">
                    <div class="text-center">
                      <h5 class="text-blue">Filter by date (if applicable)</h5>
                      <div class="filters-form vertical horizontal-medium-down filters-form-table">
                        <input class="filters-form-item input-rounded" type="search" id="date_1" name="date_1" placeholder="01/01/2017">
                        <label class="filters-form-item filters-label">TO</label>
                        <input class="filters-form-item input-rounded" type="search" id="date_2" name="date_2" placeholder="31/03/2017">
                      </div>
                      <input class="button xregular" type="submit" value="Search">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="section box-shadow box-padding">
            <h3 class="section-title">Search Results:</h3>
            <div class="table-column">
              <div class="table-scroll">
                <table class="unstriped hover">
                  <thead>
                    <tr>
                      <th>Date Issued</th>
                      <th>Property Address</th>
                      <th>Document Type</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?
				 
				  foreach($userDocs as $docItem){
					  
					  $property_item = $docItem->property;
					  
					  $address_text = $property_item->address . ", " . $property_item->city . ", " . $property_item->state . " " . $property_item->zip;
				  
				  ?>
                    <tr>
                      <td><?= $docItem->date_issued ?></td>
                      <td><?= $address_text ?></td>
                      <td><?= $docItem->category_name ?></td>
                      <td><?= $docItem->description ?></td>
                      <td><a href="/member/get-document?id=<?= $docItem->id ?>">Download</a></td>
                    </tr>
				  <? } ?>
                  </tbody>
                </table>
              </div>
              
			  
			  
            </div>
          </div>
        </div>
      </div>
	  
	  
	  
	   

@endsection

@section('footer')



	<script type="text/javascript">
	
	
	$(document).ready(function(){
		
		
		$("body").on("submit","#filterDocsForm",function(e){
			
			e.preventDefault();
			
			var propertyArrayString = "";
			$("ul.property_select li").each(function(){
				
				if($(this).hasClass('is-active')){
					
					var propertyId = $(this).attr("data-id");
					if(propertyArrayString.length == 0){
						
						propertyArrayString += propertyId;
						
					}else{
						
						propertyArrayString += ","+propertyId;
						
					}
					
				}
				
			});
			
			//alert(propertyArrayString);
			
			$("input[name='property_array']").val(propertyArrayString);
			
			var docCategoryArrayString = "";
			$("ul.doc_category_select li").each(function(){
				
				if($(this).hasClass('is-active')){
					
					var docCatId = $(this).attr("data-id");
					if(docCategoryArrayString.length == 0){
						
						docCategoryArrayString += docCatId;
						
					}else{
						
						docCategoryArrayString += ","+docCatId;
						
					}
					
				}
				
			});
			
			//alert(docCategoryArrayString);
			
			$("input[name='doc_category_array']").val(docCategoryArrayString);
			
			$("#filterDocsForm")[0].submit();
			
		})
		
		
		
		
		
		
	})
	
	
	
	
	
	
	
	
	
	
	
	
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