@extends('member.dash')

@section('content')

	<?
	
	
	
	
	?>
      
      <div class="section">
        <div class="row">
          <div class="columns xlarge-2 large-3 medium-4">
            <!-- mixin profile-menu begin-->
            <ul class="menu vertical profile-menu box-shadow section">
              <li><a href="/member/profile">My Profile</a></li>
              <li><a href="/member/settings-password">Password Reset</a></li>
              <li class="is-active"><a href="/member/settings-permissions">Permissions</a></li>
            </ul>
            <!-- mixin profile-menu end-->
          </div>
          <div class="columns xlarge-7 large-8 medium-8 end">
            <div class="section">
              <h3 class="section-title">Permissions & Notification Settings</h3>
              <div class="box-shadow box-padding-sm">
			  
			  
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
					
			  
			  
                <form action="/member/permissions-update" method="post">
				
				{{ csrf_field() }}
            
			<?
			
			$email_account_alerts = "";
			$email_hot_properties = "";
			$display_name = "";
			
			if(!is_null($user_permissions)){
				
				if($user_permissions->email_account_alerts == 1){
					
					$email_account_alerts = "checked";
					
				}
				
				if($user_permissions->email_hot_properties == 1){
					
					$email_hot_properties = "checked";
					
				}
				
				$display_name = $user_permissions->display_name;
				
			}
			
			?>
			
                  <div class="form-body">
                    <!--  mixin checkbox begin-->
                    <div class="checkbox">
                      <input type="checkbox" name="email_account_alerts" value="1" id="checkbox-1" <?= $email_account_alerts ?>>
                      <label for="checkbox-1">Allow email account alerts</label>
                    </div>
                    <!--  mixin checkbox end-->
                    <!--  mixin checkbox begin-->
                    <div class="checkbox">
                      <input type="checkbox" name="email_hot_properties" value="1" id="checkbox-2" <?= $email_hot_properties ?>>
                      <label for="checkbox-2">Subscribe to Hot Properties Email</label>
                    </div>
                    <!--  mixin checkbox end-->
                    
					
					<div>
						<select name="display_name" class="">
							<option value="full_name" <? if($display_name == "full_name"){ echo "selected"; }?>>Display my full name in the board of investors</option>
							<option value="initials" <? if($display_name == "initials"){ echo "selected"; }?>>Display my initials in the board of investors</option>
							<option value="screen_name" <? if($display_name == "screen_name"){ echo "selected"; }?>>Display my screen name in the board of investors</option>
						</select>
					</div>
					
					
                  </div>
                  <div class="form-footer">
                    <button class="button" type="submit">Save</button>
                  </div>
                </form>
              </div>
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