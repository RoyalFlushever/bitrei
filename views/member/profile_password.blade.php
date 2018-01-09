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
              <li class="is-active"><a href="/member/settings-password">Password Reset</a></li>
              <li><a href="/member/settings-permissions">Permissions</a></li>
            </ul>
            <!-- mixin profile-menu end-->
          </div>
          <div class="column xlarge-4 large-5 medium-6 end">
            <div class="section">
              <h3 class="section-title">Password Reset</h3>
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
					
					
                <form action="/member/password-update" method="post">
				
				{{ csrf_field() }}
				
                  <div class="form-body">
                    <input type="password" name="current_password" placeholder="Current Password">
                    <input type="password" name="password" placeholder="New Password">
                    <input type="password" name="password_2" placeholder="Confirm Password">
                  </div>
                  <div class="form-footer">
                    <button class="button expanded" type="submit">Save</button>
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