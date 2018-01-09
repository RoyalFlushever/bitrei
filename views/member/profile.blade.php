@extends('member.dash')

@section('content')

	<?
	
	
	
	
	?>
      
	 
	
      <div class="section">
        <div class="row">
          <div class="columns xlarge-2 large-3 medium-4">
            <!-- mixin profile-menu begin-->
            <ul class="menu vertical profile-menu box-shadow section">
              <li class="is-active"><a href="/member/profile">My Profile</a></li>
              <li><a href="/member/settings-password">Password Reset</a></li>
              <li><a href="/member/settings-permissions">Permissions</a></li>
            </ul>
            <!-- mixin profile-menu end-->
          </div>
          <div class="column xlarge-10 large-9 medium-8">
            <div class="profile-container">
			
			<script>
				window.onload = function(){
					document.getElementById("upload-file").onchange = function() {
						document.getElementById("profile-form").submit();
					};
				}
			</script>
			
			
              <form action="/member/profile-update" method="post" enctype="multipart/form-data" id="profile-form">
			
				{{ csrf_field() }}
            
                <div class="cover-photo-container"><img class="cover-photo" src="/member/img/media/profile/cover-photo.jpg" alt="">
                  <!-- mixin edit-photo begin-<img class="edit-photo-icon" src="/member/img/template/pencil-white.png" width="25" alt=""/>
                  <!-- mixin edit-photo end-->
                </div>
                <div class="profile-photo-name-btn">
                  <div class="row">
                    <div class="column xlarge-37 large-5 xmedium-5 medium-6">
					<?
					
					if(!is_null($userData[0]->thumbnail_image) && $userData[0]->thumbnail_image!=""){
						
						$thumbnail_image_src = "/upload_files/".$userData[0]->thumbnail_image;
						
					}else{
						
						$thumbnail_image_src = "/member/img/media/comments/avatar.png";
						
					}
					
					?>
                      <div class="profile-photo-container"><img class="profile-photo" src="<?= $thumbnail_image_src ?>" alt="" style="height:none;">
                        <!-- mixin edit-photo begin--><img class="edit-photo-icon" id="edit-photo-button" src="/member/img/template/pencil-blue.png" width="25" alt=""/>
                        <!-- mixin edit-photo end-->
                      </div>
                    </div>
                    <div class="column xlarge-63 large-7 xmedium-7 medium-6">
                      <div class="row">
                        <div class="column large-7">
                          <div class="profile-name-position">
                            <h3 class="profile-user-name">
							<? if(!is_null($userData[0]->first_name) && $userData[0]->first_name!=""){echo $userData[0]->first_name;}else{echo "FirstName";} ?> 
							
							<? if(!is_null($userData[0]->last_name) && $userData[0]->last_name!=""){echo $userData[0]->last_name;}else{echo "LastName";} ?></h3>
                            <h5 class="profile-user-position"><? if($verified_investor == 0){echo "Non Accredited Investor";}else{echo "<img src='/member/img/template/accredited-investor-green.png' style='height:30px;'>";} ?></h5>
                          </div>
                        </div>
                        <div class="column large-5">
                          <!-- button for large screens-->
						  <input type="file" name="upload" id="upload-file" style="visibility: hidden;" />
                          <button class="button profile-btn show-for-large" type="submit">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="column xlarge-12 large-12">
				  
				  
				  
					@if ($errors->has('error'))
						<div class="alert alert-danger alert-dismissible fade in" role="alert" style="padding-bottom:20px;color:red;">
						{{ $errors->first('error') }}
					  </div>
					@endif
			  
					@if ($errors->has('success'))
						<div class="alert alert-success alert-dismissible fade in" role="alert" style="padding-bottom:20px;color:green;">
						{{ $errors->first('success') }}
					  </div>
					@endif
				  
				  
                    <div class="profile-edit-form box-shadow box-padding-sm section clearfix">
                      <input type="text" name="first_name" placeholder="First name" value="<?= $userData[0]->first_name ?>">
					  <input type="text" name="last_name" placeholder="Last name" value="<?= $userData[0]->last_name ?>">
                      <input type="email" name="email" placeholder="Primary Email" value="<?= $userData[0]->email ?>">
                      <input type="text" name="phone" placeholder="Phone (optional)" value="<?= $userData[0]->phone ?>">
                      <input type="text" name="address" placeholder="Billing Address" value="<?= $userData[0]->address ?>">
					  <input type="text" name="username" placeholder="Screen Name" value="<?= $userData[0]->username ?>">
                      <input type="text" name="job_title" placeholder="Job Title" value="<?= $userData[0]->job_title ?>">
                      <textarea placeholder="Bio" name="bio"><?= $userData[0]->bio ?></textarea>
                    </div>
                    <!-- button for small and medium screens-->
                    <button class="button profile-btn" type="submit">Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
	  
	  
	   

@endsection

@section('footer')



	<script type="text/javascript">
	
	
	$(document).ready(function(){
		
		
		$('#edit-photo-button').click(function() {
			$('input[type=file]').click();
		});
		
		
	});
	
	
	
	
	
	
	
	
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