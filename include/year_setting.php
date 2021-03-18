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
	font-size: 14px;
	font-weight: 700;
	border-right: 1px solid #fff;
}
tbody#the-list td {
    border: 1px solid #ddd;
    border-left: none;
}
tbody#the-list tr td a:nth-child(1) {
    /* background-color: #e1e1e1;
    border: 1px solid #e1e1e1;
    color: #000; */
    font-size: 12px !important;
}
tbody#the-list tr td .yearsetting_delete {
  /*   background: #d9534f;
    border-color: #d9534f;
    color: #fff; */
}
/* table#year_setting tbody td button.button.button-primary {
    background: #d00;
    border-color: #d00;
} */
table#year_setting tbody td input,table#year_setting tbody td select,table#year_setting tbody td textarea {
    width: 100%;
}
table#year_setting tbody td textarea {
    height: 30px;
    resize: none;
}
table.listing-data-table thead tr td:last-child {
    border-right: 0;
}
table.listing-data-table thead tr td {
    border-bottom: 1px solid #111;
    border-right: 1px solid #fff;
}
table.listing-data-table{
	margin-top: 40px;
}
table.listing-data-table thead tr {
    background: #d00;
}
table.listing-data-table thead tr th, table.listing-data-table thead tr th a {
    color: #fff;
    font-size: 14px;
    font-weight: 700;
}
#year_setting thead tr th:last-child {
    border-right: none;
}
.year-setting-set th{
	    background: #d00;
    padding: 10px 7px !important;
    color: #fff !important;
    border-bottom: 1px solid #111;
    font-size: 13px;
    font-weight: 700;
    border-right: 1px solid #fff;
}
@media(max-width:992px){
table#year_setting1,#year_setting {
    display: block;
    width: 100%;
    overflow: scroll;
}
#year_setting1 tr, #year_setting tr {
    white-space: nowrap;
}
}
@media (max-width: 1600px){
tbody#the-list tr td a:nth-child(1) {
    margin-bottom: 7px;
}
.year-setting-set th, #year_setting th{
    font-size: 13px !important;
}
}
</style>

<div class="buttonAriea" style="margin-bottom: 10px;">
	<a id="general" class="button" href="#">Add Year Setting</a> 
</div>
<?php 
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
				<input type="text" name="setting_start_year" class="form-control" id="setting_start_year" placeholder="Select Year" required>
				</td>
				<td>
				<input type="text" name="setting_festival_start_date" class="form-control" id="festival_start_date" placeholder="Festival Start Date" required disabled>
				</td>
				<td>
				<input type="text" name="setting_festival_end_date" class="form-control" id="festival_end_date" placeholder="Festival End Date" required disabled>
				</td>
				<td>
				<!-- <input type="time" name="setting_festival_start_time" class="form-control" id="festival_start_time" placeholder="Enter Daily Start Time" required>  -->
				<select class="form-control" name="setting_festival_start_time" id="festival_start_time" required>
				<?php echo selectTimesOfDay();?>
				</select>
				</td>
				<td>
				<!-- <input type="time" name="setting_festival_end_time" class="form-control" id="festival_end_time" placeholder="Enter Daily End Time" required>  -->
				<select class="form-control" name="setting_festival_end_time" id="festival_end_time" required>
				    <?php echo selectTimesOfDay_end();?>
				</select>
				</td>
				<td>
				<select class="form-control" name="schdule_task_id" id="sel2" required><?php echo show_post_dropdown_option('task',$user->roles[0]);?>
		        </select> 
				</td>
				<td>
				<textarea name="schdule_export_area" id="schdule_export_area"></textarea>
				</td>
				<td>
				<button type="submit" class="button button-primary">Add year</button>
				</td>
			</tr>	   
		</tbody>
	</table>
</form>


<table  id="year_setting1" class=" widefat fixed striped posts listing-data-table year-setting-set">
	<thead>
	  <tr>
	  	<th class="manage-column column-title column-primary sortable desc"><span>Select Year</span></th>	
		<th class=""><span>Festival Start Date</span></th>
		<th class="small_width manage-column column-title column-primary sortable desc"><span>Festival End Date</span></th>
		<th class="small_width manage-column column-title column-primary sortable desc"><span>Daily Start Time</span></th>
		<th class="small_width manage-column column-title column-primary sortable desc"><span>Daily End Time</span></th>
		<th class="small_width manage-column column-title column-primary sortable desc"><span>Select Task</span></th>
		<th class="small_width manage-column column-title column-primary sortable desc"><span>Schdule Area</span></th>
		<th class="manage-column column-title column-primary sortable desc"><span>Action</span></th>
	
	</tr>
	</thead>
	    <tbody id="the-list">
	    	<?php 
				global $wpdb;
				$table_start=$wpdb->prefix.'schedule_task_year_setting';
				$results=$wpdb->get_results("SELECT * FROM $table_start");
					foreach ($results as $key => $value) {
						$setting_year_id = $value->id;
				        $setting_task_year = $value->setting_task_year;
				        $festival_start_date = $value->festival_start_date;
				        $festival_end_date = $value->festival_end_date;
				        $festival_start_time = $value->festival_start_time;
				        $festival_end_time = $value->festival_end_time;
				        $select_task_id = $value->select_task_id;
				        $schedule_area = $value->schedule_area;
				?>
	    	<tr> 
                <td class="manage-column column-title column-primary sortable">
                	<?php echo $setting_task_year; ?>
                </td>
                <td class="manage-column column-title column-primary sortable">
                	<?php echo $festival_start_date; ?>
                </td>
                <td class="manage-column column-title column-primary sortable">
                	<?php echo $festival_end_date; ?>
                </td>
                <td class="manage-column column-title column-primary sortable">
                	<?php echo $festival_start_time; ?>
                </td>
                <td class="manage-column column-title column-primary sortable">
                	<?php echo $festival_end_time; ?>
                </td>
                <td class="manage-column column-title column-primary sortable">
                	<?php echo get_the_title($select_task_id);?>
                </td>
                <td class="manage-column column-title column-primary sortable">
                	<?php echo $schedule_area; ?>
                </td>
                	<td class="manage-column column-title column-primary sortable" ><a href="edit.php?post_type=photographer&page=Setting&pageTab=Edityearsetting&id=<?php echo $setting_year_id; ?>" class="button button-primary">Edit year</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" data-id="<?php echo $setting_year_id;?>" class="button button-danger yearsetting_delete"> Delete</a>&nbsp;</td>
             </tr> 
				<?php  } ?>
	   </tbody>
</table>

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
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"
    rel="stylesheet" type="text/css" />
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
jQuery(document).ready(function() {
/*     jQuery('#year_setting').DataTable({
    	"bLengthChange": false,
    	'bFilter' : false,  'bInfo' : false,
        "bSort": false,
        "bPaginate": false
    });
	  jQuery('#year_setting1').DataTable({
    	"bLengthChange": false,
    	'bFilter' : false,  'bInfo' : false,
        "bSort": false,
        "bPaginate": false
    }); */
});
</script>