<link href="<?php echo  plugin_dir_url( __FILE__ ).'css/datepicker.min.css'; ?>"
rel="Stylesheet"type="text/css"/>
<script src="<?php echo  plugin_dir_url( __FILE__ ).'js/bootstrap.min.js'; ?>"
type="text/javascript"></script>
<script src="<?php echo  plugin_dir_url( __FILE__ ).'js/bootstrap-datepicker.min.js'; ?>"
type="text/javascript"></script>
<style type="text/css">
	
#year_setting thead th {
	background: #d00;
	padding: 10px 7px !important;
	color: #fff !important;
	border-bottom: 1px solid #111;
	font-size: 13px;
	font-weight: 700;
	border-right: 1px solid #fff;
}
table#year_setting tbody td input,table#year_setting tbody td select,table#year_setting tbody td textarea {
    width: 100%;
}
/* table#year_setting tbody tr td .row-btn button.button {
    background: #e1e1e1;
    border-color: #e1e1e1;
    color: #000;
} */
table#year_setting tbody tr td .row-btn a.button {
    background: #0071a1;
    border-color: #0071a1;
    color: #fff;
    margin-left: 10px;
}
table#year_setting tbody tr td textarea {
    height: 30px;
    resize: none;
}
@media(max-width:992px){
table#year_setting {
    display: block;
    width: 100%;
    overflow: scroll;
}
#year_setting tr{
    white-space: nowrap;
}
}
@media (max-width: 1600px){
table#year_setting tbody tr td .row-btn button.button {
    margin-bottom: 9px;
}
}
</style>
<?php 
  
    global $wpdb;
    $table_start=$wpdb->prefix.'schedule_task_year_setting';
    $id = $_REQUEST['id'];
    $results=$wpdb->get_results("SELECT * FROM $table_start WHERE id= $id ");
    foreach ($results as $key => $value) {
						$setting_year_id = $value->id;
				        $setting_task_year = $value->setting_task_year;
				        $festival_start_date = $value->festival_start_date;
				        $festival_end_date = $value->festival_end_date;
				        $festival_start_time = $value->festival_start_time;
				        $festival_end_time = $value->festival_end_time;
				        $select_task_id = $value->select_task_id;
				        $schedule_area = $value->schedule_area;

     }

if ( is_user_logged_in() ){
     $user = wp_get_current_user();
 }
?>
<form action="" method="post">
	<table id="year_setting" class="border-left-0 display widefat fixed striped posts table-bordered custum_table" style="width:100%;text-align: center;">
		<thead>
			<tr>
				<th class="manage-column column-title column-primary sortable desc"><span>Select Year</span></th>
				<th class="date_width manage-column column-title column-primary sortable desc"><span>Festival Start Date</span></th>
				<th class="small_width manage-column column-title column-primary sortable desc"><span>Festival End Date</span></th>	
				<th class="small_width manage-column column-title column-primary sortable desc"><span>Daily Start Time</span></th>
				<th class="small_width manage-column column-title column-primary sortable desc"><span>Daily End Time</span></th>	
				<th class="small_width manage-column column-title column-primary sortable desc"><span>Select Task</span></th>
				<th class="small_width manage-column column-title column-primary sortable desc"><span>Schedule Area</span></th>
				<th class="manage-column column-title column-primary sortable desc"><span>Action:</span></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
				<input type="text" name="setting_start_year" class="form-control" id="setting_start_year" value="<?php if(isset($setting_task_year) && !empty($setting_task_year)){ echo $setting_task_year; }  ?>" placeholder="Select Year" required>
				</td>
				<td>
					<input type="text" name="setting_festival_start_date" class="form-control" id="festival_start_date" value="<?php if(isset($festival_start_date) && !empty($festival_start_date)){ echo $festival_start_date; }  ?>" placeholder="Select Year" placeholder="Enter Festival Start Date" required>
				</td>
				<td>
					<input type="text" name="setting_festival_end_date" class="form-control" id="festival_end_date" value="<?php if(isset($festival_end_date) && !empty($festival_end_date)){ echo $festival_end_date; }  ?>" placeholder="Enter Festival End Date" required>
				</td>
				<td>
					<input type="time" name="setting_festival_start_time" class="form-control" id="festival_start_time" value="<?php if(isset($festival_start_time) && !empty($festival_start_time)){ echo $festival_start_time; }  ?>" placeholder="Enter Daily Start Time" required> 
				</td>
				<td>
					<input type="time" name="setting_festival_end_time" class="form-control" id="festival_end_time" value="<?php if(isset($festival_end_time) && !empty($festival_end_time)){ echo $festival_end_time; }  ?>" placeholder="Enter Daily End Time" required>
				</td>
				<td><select class="form-control" name="schdule_task_id" id="sel2" required>
				  <?php echo show_post_dropdown_option_action_match_id('task',$select_task_id);?>
				</select>
				</td>
				<td>
					<textarea name="schdule_export_area" id="schdule_export_area"><?php if(isset($schedule_area) && !empty($schedule_area)){ echo $schedule_area; }  ?></textarea>
				</td>
				<td><div class="row-btn">
				  <button type="submit" class="button">Update year</button>
				  <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=yearsetting">Back</a>
				  </div>
				</td>
			</tr>	   
		</tbody>
	</table>
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