<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"
rel="Stylesheet"type="text/css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"
type="text/javascript"></script>
 -->

 <link href="<?php echo  plugin_dir_url( __FILE__ ).'css/datepicker.min.css'; ?>"
rel="Stylesheet"type="text/css"/>
<script src="<?php echo  plugin_dir_url( __FILE__ ).'js/bootstrap.min.js'; ?>"
type="text/javascript"></script>
<script src="<?php echo  plugin_dir_url( __FILE__ ).'js/bootstrap-datepicker.min.js'; ?>"
type="text/javascript"></script>

<style type="text/css">
	
	.datepicker-switch{
		pointer-events: none;
	}
</style>


<div class="buttonAriea" style="margin-bottom: 10px;">
	<!-- <a id="general" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=AdddateSetting">Add Time Setting</a>  -->
	
	<span style="color: #17a2b8;">Set New Time Block First or use existing</span>
</div>


<table class="wp-list-table widefat fixed striped posts">
	<thead>
	  <tr>
	  	<td>
		<a href="javascript:void(0);">Select Season Year</a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>Start Date</span></a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>End Date</span></a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>Time Block</span></a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>Action</span></a>
		</td>
	
	</tr>
	</thead>
	    <tbody id="the-list">
	    	<form action="" method="post">
	    	<tr>
	    		<td>
	    			<div class="form-group row-cutom">
				   
				     <input type="text" name="setting_start_session" class="form-control" id="setting_start_session" aria-describedby="emailHelp" placeholder="Select Season Year" required>
				  </div>
	    		</td>
	    		<td>
	    			<div class="form-group row-cutom">
				  
				     <input type="text" name="setting_start_date" class="form-control" id="start_date" aria-describedby="emailHelp" placeholder="Enter Start Time" required disabled>
				  </div>
	    		</td>
	    		<td>
	    			<div class="form-group row-cutom">
				     
				     <div class="col-sm-10"><input type="text" name="setting_end_date" class="form-control" id="end_date" placeholder="Enter End Time" required disabled> 
				  </div></div>
	    		</td>

	    		<td>
	    			<div class="form-group row-cutom">
				     
				     <div class="col-sm-10"><select name="time_block_id" required>
			        <option value="">Select Time Block</option>
			        <?php 
			        //$eventdatA  = get_option( 'task_manager_event_start_time' );
			        global $wpdb;
			        $table_start=$wpdb->prefix.'schedule_task_time_block';
			        $results=$wpdb->get_results("SELECT * FROM $table_start");
			        $i = 1;
			        if(isset($results) && !empty($results)){ 
			          foreach ($results as $key => $value) {
			        ?>
			        <option <?php if($value->id == $btime){ echo "selected"; } ?> value="<?php echo $value->id; ?>"><?php echo $value->event_time_block; ?></option>
			      <?php  } } ?>
			    </select> 
				  </div></div>
	    		</td>
	    		<td>
	    			<div class="row-btn">
  						<button type="submit" class="button button-primary">Add Session</button>
  					</div>
	    		</td>
	    	</tr>
	  </form>
					
			
	   </tbody>
</table>

<div class="buttonAriea" style="margin-bottom: 10px;margin-top: 100px;">
<span>All Season</span>  &nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" class="button btn-danger timesetting_delete_multiple"> Multiple Delete</a><br>
</div>

<table class="wp-list-table widefat fixed striped posts">
	<thead>
	  <tr>
	  	<td>
		<a href="javascript:void(0);"> <input id="chk_all" name="chk_all" type="checkbox"  /> <span>Id</span></a>
		</td>
		
		<td>
		<a href="javascript:void(0);"> <span>Season Year</span></a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>Date</span></a>
		</td>
		<!-- <td>
		<a href="javascript:void(0);"><span>Start Time</span></a>
		</td> -->
		<!-- <td>
		<a href="javascript:void(0);"><span>End Time</span></a>
		</td> -->
		<td>
		<a href="javascript:void(0);"><span>Time Block</span></a>
		</td>
		<td>
		<a href="javascript:void(0);" ><span>Action</span></a>
		</td>
	</tr>
	</thead>
	    <tbody id="the-list">
	    	<?php 
				//$eventdatA  = get_option( 'task_manager_event_start_time' );
				global $wpdb;
				$table_start=$wpdb->prefix.'schedule_task_date_setting';
				$results=$wpdb->get_results("SELECT * FROM $table_start");
				$i = 1;
				if(isset($results) && !empty($results)){ 
					foreach ($results as $key => $value) {
						# code...
						//echo $value->time_block_id;
						$table_start1=$wpdb->prefix.'schedule_task_time_block';
				        $results1=$wpdb->get_results("SELECT * FROM $table_start1 where id = $value->time_block_id");
				        $stime = $results1[0]->event_start_time;
				        $etime = $results1[0]->event_end_time;
				        $btime = $results1[0]->event_time_block;
				  
				?>
					<tr>
						<td class="manage-column column-title column-primary sortable"><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $value->id;?>"/><?php echo $i; ?></td>

						<td class="manage-column column-title column-primary sortable"><?php echo $value->setting_date_session; ?></td>
						<td class="manage-column column-title column-primary sortable"><?php echo $value->setting_start_date; ?> To <?php echo $value->setting_end_date; ?></td>
						<!-- <td class="manage-column column-title column-primary sortable"><?= $stime; ?></td>
						<td class="manage-column column-title column-primary sortable"><?= $etime; ?></td>-->
						<td class="manage-column column-title column-primary sortable"><?= $btime; ?></td>
						<td class="manage-column column-title column-primary sortable" ><a href="edit.php?post_type=photographer&page=Setting&pageTab=EdittimeSetting&id=<?php echo $value->id; ?>" class="button button-primary">Edit</a>  &nbsp;&nbsp;&nbsp;&nbsp; <a href="edit.php?post_type=photographer&page=Setting&pageTab=ViewtimeSetting&id=<?php echo $value->id; ?>" class="button button-primary">View Season</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" data-id="<?php echo $value->id;?>" class="button button-danger timesetting_delete"> Delete</a>&nbsp;</td>
				    </tr> 
				<?php $i++; } }else{ ?>
					<tr>
						<td class="manage-column column-title column-primary sortable"><?php echo "No Data Found"; ?></td>
						<td class="manage-column column-title column-primary sortable"></td>
						<td class="manage-column column-title column-primary sortable"></td>
						<td class="manage-column column-title column-primary sortable" ></td>
				    </tr>
				<?php } ?>
					
			
	   </tbody>
</table>

<script type="text/javascript">
jQuery(".datepicker-switch").attr( "disabled", "disabled" );
	jQuery("#setting_start_session").datepicker({
   	 format: "yyyy",
     viewMode: "years", 
     minViewMode: "years"
	}).on('changeDate', function(e){
		//jQuery('#start_date').focus();
    	jQuery(this).datepicker('hide');
    	var years = jQuery(this).val();
    	var currentYear = (new Date).getFullYear();
    	var currentMonth = (new Date).getMonth();
    	var d = new Date();
    	jQuery('#start_date').addClass('newactive');
    	//console.log(d.getDate());
        //alert(currentMonth);

    	//console.log(currentMonth);

    	if(years == currentYear){
    		
    		jQuery('#start_date').datepicker('update', new Date(currentYear, currentMonth, d.getDate()));
    		jQuery('#start_date').removeAttr("disabled");
    		jQuery('#end_date').removeAttr("disabled");
    		jQuery(".datepicker-switch").attr( "disabled", "disabled" );
    	}else{
    		jQuery('#start_date').datepicker('update', new Date(years, 0, 1)).focus();
    		jQuery('#start_date').removeAttr("disabled");
    		jQuery('#end_date').removeAttr("disabled");
    		jQuery(".datepicker-switch").attr( "disabled", "disabled" );
    	}
	});
	jQuery("#start_date").datepicker({
	    format: "dd-mm-yyyy",
	    autoclose: true,
	    enableOnReadonly: false,
	   



	    //startDate: new Date()
	  })
	  .on("changeDate", function(e) {
	    var checkInDate = e.date, $checkOut = jQuery("#end_date");  
	    console.log(checkInDate);  
	    checkInDate.setDate(checkInDate.getDate() + 1);
	    $checkOut.datepicker("setStartDate", checkInDate);
	    $checkOut.datepicker("setDate", checkInDate).focus();
	    jQuery('#end_date').removeAttr("disabled");
	    jQuery(this).datepicker('hide');
	  });

	jQuery("#end_date").datepicker({
	  format: "dd-mm-yyyy",
	  autoclose: true,
	  changeYear:false,
	 
	});
	jQuery("#setting_start_session").change(function(){
	  jQuery('#start_date').focus();
	});
</script>
