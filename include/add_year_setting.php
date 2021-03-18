<link href="<?php echo  plugin_dir_url( __FILE__ ).'css/datepicker.min.css'; ?>"
rel="Stylesheet"type="text/css"/>
<script src="<?php echo  plugin_dir_url( __FILE__ ).'js/bootstrap.min.js'; ?>"
type="text/javascript"></script>
<script src="<?php echo  plugin_dir_url( __FILE__ ).'js/bootstrap-datepicker.min.js'; ?>"
type="text/javascript"></script>

<style type="text/css">
.row-cutom label {
    float: left;
    min-width: 84px;
}
.row-cutom {
    margin: 7px 7px;
}
.row-btn {
    margin-left: 93px;
    margin-top: 13px;
}
.row-btn button.button {
    margin-right: 6px;
}
</style>

<?php 
if ( is_user_logged_in() ){
     $user = wp_get_current_user();
 }
?>

<form action="" method="post">
  <div class="form-group row-cutom">
   <label for="exampleInputEmail1">Select Year</label>
      <input type="text" name="setting_start_year" class="form-control" id="setting_start_year" aria-describedby="emailHelp" placeholder="Select Year" required>
  </div>

  <div class="form-group row-cutom">
     <label for="exampleInputPassword1">Festival Start Date</label>
     <input type="text" name="setting_festival_start_date" class="form-control" id="festival_start_date" aria-describedby="emailHelp" placeholder="Enter Festival Start Date" required disabled>
  </div>

  <div class="form-group row-cutom">
     <label for="exampleInputPassword1">Festival End Date</label>
     <input type="text" name="setting_festival_end_date" class="form-control" id="festival_end_date" placeholder="Enter Festival End Date" required disabled>
  </div>

  <div class="form-group row-cutom">
     <label for="exampleInputPassword1">Daily Start Time</label>
     <div class="col-sm-10"><input type="time" name="setting_festival_start_time" class="form-control" id="festival_start_time" placeholder="Enter Daily Start Time" required> 
  </div></div>

  <div class="form-group row-cutom">
     <label for="exampleInputPassword1">Daily End Time</label>
     <div class="col-sm-10"><input type="time" name="setting_festival_end_time" class="form-control" id="festival_end_time" placeholder="Enter Daily End Time" required> 
  </div></div>

  <div class="form-group row-cutom">
     <label for="exampleInputPassword1">Select Task</label>
     <div class="col-sm-10"><select class="form-control" name="schdule_task_year" id="sel2" required><?php echo show_post_dropdown_option('task',$user->roles[0]);?>
		</select> 
  </div></div>

   <div class="form-group row-cutom">
     <label for="exampleInputPassword1">Schdule Area</label>
     <div class="col-sm-10"><textarea name="schdule_export_area" id="schdule_export_area"></textarea> 
  </div></div>

  <div class="row-btn">
  <button type="submit" class="button">Add year</button>
  <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=yearsetting">Back</a>
  </div>
</form>

<script type="text/javascript">
jQuery(".datepicker-switch").attr( "disabled", "disabled" );
	jQuery("#setting_start_year").datepicker({
   	 format: "yyyy",
     viewMode: "years", 
     minViewMode: "years"
	}).on('changeDate', function(e){
    	jQuery(this).datepicker('hide');
    	var years = jQuery(this).val();
    	var currentYear = (new Date).getFullYear();
    	var currentMonth = (new Date).getMonth();
    	var d = new Date();
    	jQuery('#festival_start_date').addClass('newactive');

    	if(years == currentYear){
    		
    		jQuery('#festival_start_date').datepicker('update', new Date(currentYear, currentMonth, d.getDate()));
    		jQuery('#festival_start_date').removeAttr("disabled");
    		jQuery('#festival_end_date').removeAttr("disabled");
    		jQuery(".datepicker-switch").attr( "disabled", "disabled" );
    	}else{
    		jQuery('#festival_start_date').datepicker('update', new Date(years, 0, 1)).focus();
    		jQuery('#festival_start_date').removeAttr("disabled");
    		jQuery('#festival_end_date').removeAttr("disabled");
    		jQuery(".datepicker-switch").attr( "disabled", "disabled" );
    	}
	});
	jQuery("#festival_start_date").datepicker({
	    format: "dd-mm-yyyy",
	    autoclose: true,
	    enableOnReadonly: false,
	   
	  })
	  .on("changeDate", function(e) {
	    var checkInDate = e.date, $checkOut = jQuery("#festival_end_date");  
	    console.log(checkInDate);  
	    checkInDate.setDate(checkInDate.getDate() + 1);
	    $checkOut.datepicker("setStartDate", checkInDate);
	    $checkOut.datepicker("setDate", checkInDate).focus();
	    jQuery('#festival_end_date').removeAttr("disabled");
	    jQuery(this).datepicker('hide');
	  });

	jQuery("#festival_end_date").datepicker({
	  format: "dd-mm-yyyy",
	  autoclose: true,
	  changeYear:false,
	 
	});
	jQuery("#setting_start_year").change(function(){
	  jQuery('#festival_start_date').focus();
	});
</script>