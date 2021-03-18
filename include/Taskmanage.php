<html>
<head>
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"
rel="Stylesheet"type="text/css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"
type="text/javascript"></script> -->

<link href="<?php echo  plugin_dir_url( __FILE__ ).'css/datepicker.min.css'; ?>"
rel="Stylesheet"type="text/css"/>
<script src="<?php echo  plugin_dir_url( __FILE__ ).'js/bootstrap.min.js'; ?>"
type="text/javascript"></script>
<script src="<?php echo  plugin_dir_url( __FILE__ ).'js/bootstrap-datepicker.min.js'; ?>"
type="text/javascript"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
    type="text/javascript"></script>
<style type="text/css">
.manage_filter input[type="checkbox"]:checked::before, #task_manager input[type="checkbox"]:checked::before {height: 33px !important;margin-top: -2px;text-align: center;width: 20px;margin-left: -4px;}
#chk_all {height: 15px;width: 15px;	border: none !important;border-radius: 0px !important;margin-right: 8px;}
.chkbox {border-radius: 0px !important;margin-right: 10px !important;margin-top: -2px !important;width: 15px !important;height: 15px !important;}
.custum_table td {text-align: left !important;}
.manage_filter .custum_table th { background: #568491;  }
.page-id-12794318 .manage_filter .custum_table th { background: rgba(0, 0, 0, 0.18);  }
.manage_filter .custum_table .Filters { background: #272727 !important; border-color: #272727 !important;}
.manage_filter .custum_table .btn-btn-primary {background: #568491 !important;border-color: #568491 !important;}
#records_mange .modal-dialog {left: auto !important;}
#records_mange .modal{z-index: 99999 !important;}
.input-group.date.form_date input {border: 1px solid #ccc !important;}
.wp-list-table.widefat.fixed.striped.posts.table-bordered.custum_table td, .wp-list-table.widefat.fixed.striped.posts.table-bordered.custum_table th {
padding: 7px;}
.wp-list-table.widefat.fixed.striped.posts.table-bordered.custum_table tr:nth-child(odd) { background-color: #f9f9f9;}
span#footer-thankyou {display: none;}
p#footer-upgrade {display: none;}
td.day {color: #000;font-weight: 700;}
.wp-list-table.widefat .btn {font-size: 12px !important;}
.wp-list-table.widefat .input-group .form-control {float: none;}
.front-submit-btn { background-color: #d00 !important;}
.manage_filter form { overflow-x: auto;}
#task_manager{ overflow-x: auto;}
.wp-heading-inline {color: #d10600;}
/***********11-1-2021 backend*****************/
.post-type-photographer .multiselect-native-select .btn-group button {color: #fff;font-size: 15px;}
.post-type-photographer .multiselect-native-select .btn-group button {background: #d00;border: none;color: #fff;padding: 6px 8px;border-radius: 3px;font-size: 15px;}
.post-type-photographer .multiselect-container.dropdown-menu .dropdown-item {background: transparent;color: #000;display: flex;width: 100%;	margin-bottom: 8px;padding:0px;}
.post-type-photographer .multiselect-container.dropdown-menu .form-check-input {margin-right: 9px !important; position: relative; height: 16px; width: 15px;
    border-radius: 0px;}
.post-type-photographer .multiselect-container.dropdown-menu {background: #ddd;	min-width: 238px;}
.post-type-photographer  .multiselect-container.dropdown-menu .form-check {display: flex;align-items:center;}
.post-type-photographer  .multiselect-container.dropdown-menu .form-check label.form-check-label.font-weight-bold {margin-bottom: 0;}
.post-type-photographer #task_manager input[type="checkbox"]:checked::before { width: 20px; top: 0px; position: relative;  left: 0; display: block;    align-items: center;}
.post-type-photographer #task_manager input[type=checkbox]:focus,.post-type-photographer #task_manager  input[type=file]:focus, input[type=radio]:focus {outline: unset; outline-offset: 0px;}
.post-type-photographer #task_manager .multiselect-container input[type="checkbox"]:checked::before {
	content: "";
	fill: #fff !important;
	background-image: url(https://workshops.xposure.ae/wp-content/uploads/2021/01/tick.png);
	background-size: 13px;
	background-repeat: no-repeat;
    top: 3px;
	background-position: top center;
}
.post-type-photographer #task_manager .multiselect-container input[type="checkbox"]:checked{
border: 1px solid #f00 !important;
border-radius: 4px;
background: #f00;
}

/***********11-1-2021 Frontend*****************/
.page-id-12794318 .multiselect-native-select .btn-group button {font-size: 15px;}
.page-id-12794318 .multiselect-native-select .btn-group button {background: #d00;border: none;color: #fff;padding: 6px 8px;border-radius: 3px;font-size: 15px;}
.page-id-12794318 .multiselect-container.dropdown-menu .dropdown-item {background: transparent;color: #000;display: flex;width: 100%;	margin-bottom: 8px;padding:0px;}
.page-id-12794318 .multiselect-container.dropdown-menu .form-check-input {margin-right: 9px !important; position: relative; height: 16px; width: 15px;
    border-radius: 0px;}
.page-id-12794318 .multiselect-container.dropdown-menu {background: #fff;min-width: 150px;}
.page-id-12794318  .multiselect-container.dropdown-menu .form-check {display: flex;align-items:center;}
.page-id-12794318  .multiselect-container.dropdown-menu .form-check label.form-check-label.font-weight-bold {margin-bottom: 0;color:#000;}
.page-id-12794318  .multiselect-container.dropdown-menu .form-check label.form-check-label {margin-bottom: 0;color:#000;}
.page-id-12794318  .multiselect-container.dropdown-menu button.dropdown-item:hover {background: transparent !important;}
.page-id-12794318 #task_manager input[type="checkbox"]:checked::before { width: 20px; top: 0px; position: absolute;  left: 2px; display: block;    align-items: center;}
.page-id-12794318 #task_manager input[type=checkbox]:focus,.page-id-12794318 #task_manager  input[type=file]:focus, input[type=radio]:focus {outline: unset; outline-offset: 0px;}

.page-id-12794318 #task_manager .multiselect-container input[type=checkbox]:checked::before {
	content: "";
	fill: #fff !important;
	background-image: url(https://workshops.xposure.ae/wp-content/uploads/2021/01/tick.png);
	background-size: 13px;
	background-repeat: no-repeat;
	background-position: top center;
    top: 3px;
}
.page-id-12794318 #task_manager .multiselect-container input[type="checkbox"]:checked {
    background: #f00;
    background-color: #f00;
    -webkit-appearance: none;
    padding: 8px;
    border-radius: 4px !important;
    display: inline-block;
    position: relative;
}
/*** 26-01-2021 ****/
.change_start_time{width: 67%;}
.change_end_time{width: 67%;}
.select-box-set .multiselect-container.dropdown-menu {
    height: 200px;
    overflow-y: scroll;
    min-height: 200px;
    position: relative;
}
.select-box-set button.multiselect.dropdown-toggle.custom-select {
    display: block;
    width: fit-content;
}

.border-left-0 tbody tr td,.border-left-0 thead tr th  {
    border-left: 0px !important;
}
table.border-left-0 {
    border-left: 1px solid #ddd !important;
}
.border-left-0 tbody tr td.select-box-set {
    border-left: 1px solid #ddd !important;
}

#task_manager div#example_paginate {
    padding-right: 100px;
}
.page-id-12794318 #example_wrapper div#example_paginate {
    padding-right: 0px;
}
#task_manager {
    overflow-x: unset;
}
.post-type-photographer h1.wp-heading-inline.my-0 {
    font-size: 23px;
}
.post-type-photographer .table-reponsive-sec tr {
    display: revert;
}

.table-reponsive-sec td {
    vertical-align: top;
}
table.dataTable.border-left-0 thead .sorting_asc {
    background-image: url('https://workshops.xposure.ae/wp-content/uploads/2021/01/sort_asc2.png') !important;
}
table.dataTable.border-left-0 thead .sorting_desc {
    background-image: url('https://workshops.xposure.ae/wp-content/uploads/2021/01/sort_desc1.png') !important;
}

/************End*************/
@media (min-width:1200px){
	td.display-set {
    display: flex;
}
}
@media (min-width:992px) and (max-width:1200px)
{
.wp-heading-inline {font-size: 30px;}
.Filters {margin-bottom: 6px !important;}
.update_data {margin-bottom: 6px !important;}
 }

 @media (min-width:768px) and (max-width:992px)
 {
.wp-heading-inline {font-size: 30px;}
.Filters {margin-bottom: 6px !important;}
.update_data {margin-bottom: 6px !important;}
.manage_filter form { position: relative;z-index: 1 !important;}
#task_manager{ position: relative;z-index: 1 !important;}
}

@media (min-width:576px) and (max-width:767px)
{
.wp-heading-inline{font-size: 20px;}
.Filters {margin-bottom: 6px !important;}
 .update_data {margin-bottom: 6px !important;}
.manage_filter form { position: relative;z-index: 1;}
#task_manager{ position: relative;z-index: 1 !important;}
 }

@media(max-width:575px)
{
 #profile-page .wp-heading-inline { text-align: center; width: 100%;float: none !important;}
 #profile-page .tm-main-buttons {text-align: center;width: 197px; display: table; margin: 10px auto 0px;}
.Filters {margin-bottom: 6px !important;}
.update_data {margin-bottom: 6px !important;}
.manage_filter form { position: relative;z-index: 1;}
#task_manager{ position: relative;z-index: 1 !important;}
 }

 </style>
</head>
<body>
	<?php  
	if(isset($_POST['submit_photographer'])):
			$time= time();
			global $wpdb;
			$table = $wpdb->prefix.'schedule_task';
			$newDate = date("Y-m-d", strtotime($_POST['date_picker']));
			 foreach ($_POST['select_photographer'] as $photographers_selection){
		$wpdb->insert($table, array('photo_gra_ID' => $photographers_selection,
									    'date' => $_POST['date_picker'],
									    'start_time' => $_POST['start_time'], 
									    'end_time'=>$_POST['end_time'],
									    'task_ID'=>$_POST['tasks'],
									    'location_ID'=>$_POST['locations'],
									    'task_notes'=>$_POST['front_notes'],
									    'time'=>date("Y-m-d H:i:s"),
									    'task_date'=>$newDate,

												));

	} 
      endif;

 ?>
	<?php if(isset($_POST['submit_photographer'])): ?>
	<div id="message" class="updated notice is-dismissible">
				<p><strong>Profile update  Sucessfully</strong></p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>
			<?php endif;?>
			<div class="wrap" id="profile-page">
			<div class="row align-items-center">

	<div class="col-sm-3 col-md-4 col-lg-3 pl-0"><h1 class="wp-heading-inline my-0" style="float: left;width: auto;padding:0px 12px;">Task Manager</h1></div>
	<div class="col-sm-3 col-md-3 col-lg-2"><p ><a href="<?php  echo home_url().'/control/';?>" class="btn btn-primary tm-main-buttons" style="background-color: #d00;border:none;color:#fff;">View Assigned Tasks</a> </p></div>
	<div class="col-sm-3 col-md-2 col-lg-2"><a href="javascript:void(0);" onclick="return confirm('Are you sure?')" class="btn btn-danger schedule_delete_multiple tm-main-buttons"> Multiple Delete</a></div>
	<div class="col-sm-3 col-md-3 col-lg-5"><a href="javascript:void(0);" onclick="return confirm('Are you sure?')" class="btn btn-danger schedule_updat_start_multiple tm-main-buttons"> Multiple Update</a></div>	
	</div>		



&nbsp;</td>

<?php 
global $wpdb;
$table_start=$wpdb->prefix.'schedule_task_starttime';
$results=$wpdb->get_results("SELECT * FROM $table_start");
if (count($results)<= 0){
   inserttime();

}?>
<?php 
if ( is_user_logged_in() ):
     $user = wp_get_current_user();
?>
<div class="manage_filter">
	<?php if(isset($_POST['submit_clear_filter'])):
		$_POST['select_photographer_filter']="";
		$_POST['date_picker_filter']="";
		$_POST['start_time_filter']="";
		$_POST['end_time_filter']="";
		$_POST['tasks_filter']="";
		$_POST['locations_filter']="";
	endif;?>
	<form action="" method="post">
	<table class="wp-list-table widefat fixed striped posts table-bordered custum_table" style="width:100%;text-align: center;">
	<thead>
	<tr>
	<th class="manage-column column-title column-primary sortable desc"><input id="chk_all" name="chk_all" type="checkbox"  /><span>Select Photographer:</span></th>
	<th colspan="2"  class="date_width manage-column column-title column-primary sortable desc"><span>Date:</span></th>
	<th class="small_width manage-column column-title column-primary sortable desc"><span> Start Time:</span></th>	
	<th class="small_width manage-column column-title column-primary sortable desc"><span>End Time:</span></th>
	<th class="small_width manage-column column-title column-primary sortable desc"><span>Task:</span></th>	
	<th class="small_width manage-column column-title column-primary sortable desc"><span>Location:</span></th>
	<th class="manage-column column-title column-primary sortable desc"><span>Action:</span></th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td><select class="form-control" name="select_photographer_filter"  id="photographer_filter">
		<?php echo show_post_dropdown_option_filter('photographer',$_POST['select_photographer_filter']);?>
						  </select></td>	
	<td colspan="2"><div class="input-group date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" autocomplete="off" size="16" name="date_picker_filter" type="text" value="<?php echo $_POST['date_picker_filter'];  ?>"  id="currentdate_filter">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div></td>
        	<td>
           <select class="form-control"  name="start_time_filter"  class="start_totime" id="starttime_filter" >
            	<option value= ""> </option>
				<?php echo selectTimesOfDay_filter($_POST['start_time_filter']);?>
				</select></td>
				<td><select class="form-control"  name="end_time_filter" class="end_totime"  id="endtime_filter" >
				<option value= ""> </option>
				<?php echo selectTimesOfDay_end_filter($_POST['end_time_filter']);?>
				</select></td>
				<td><select class="form-control" name="tasks_filter" id="task_filter" >
					<?php echo show_post_dropdown_option_filter('task',$_POST['tasks_filter']);?>
					</select>
				</td>
				<td><select class="form-control"  name="locations_filter" id="location_filter" >
				    <?php echo show_post_dropdown_option_filter('location',$_POST['locations_filter']);?>
				    </select>
				</td>
				<td class="display-set">&nbsp;<input type="submit" name="submit_photographer_filter"  value="Filters" class="btn btn-primary Filters">
				&nbsp;<input type="submit" name="submit_clear_filter"  value="Clear filters" class="btn btn-primary" style="background-color: #d00 !important;border:none;"></td>
			   </tr>
			   
			   	</tbody>
    </table> 
    </form>
    </div>
    </div>
	
	
	<div class="col-sm-12 col-md-12 col-lg-12 pl-0"><h1 class="wp-heading-inline my-0" style="float: left;width: auto;padding: 20px 0px;">Add New Task</h1></div>
	<form action="" method="post" id="task_manager">
		<table class="border-left-0 table-reponsive-sec wp-list-table widefat fixed striped posts table-bordered custum_table" style="width:100%;text-align: center;">
			<tbody>
				<tr>
	<td class="select-box-set"><select class="form-control" name="select_photographer[]"  id="sel1_photographer" multiple="multiple">
		<?php echo show_post_dropdown_option('photographer','adminrole');?>
						  </select> 				  
						</td>	
	<td colspan="2"><div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" autocomplete="off" size="16" name="date_picker" type="text" value=""  id="currentdate" required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div></td>
        <td>
            <select class="form-control"  name="start_time"  class="start_totime" id="sell_starttime" required>
				<?php echo selectTimesOfDay();?>
				</select></td>
				<td><select class="form-control"  name="end_time" class="end_totime"  id="sell_endtime" required>
				    <?php echo selectTimesOfDay_end();?>
				</select></td>
				<td><select class="form-control" name="tasks" id="sel1" required>
					<?php echo show_post_dropdown_option('task',$user->roles[0]);?>
					</select>
				</td>
				<td><select class="form-control"  name="locations" id="sel1" required>
				    <?php echo show_post_dropdown_option('location','adminrole');?>
						  </select>
				</td>
				<?php
				 if ( ! is_admin() ) { ?>
				<td>
					<input class="form-control" autocomplete="off" size="16" name="front_notes" type="text" value="">
				</td>
				<?php } ?>
				<td> <input type="submit"  name="submit_photographer"  class="btn btn-primary front-submit-btn"></td>
			   </tr>
			</tbody>
		</table>
	</form>
<!-- <?php //inserttime();?> -->
<form action="" method="post" id="task_manager">
	<?php if(isset($_POST['submit_photographer_filter'])){ ?>
    <table id="example" class="border-left-0 display wp-list-table widefat fixed striped posts table-bordered custum_table" style="width:100%;text-align: center;">
    <?php } else{ ?>
    <table id="list_example" class="border-left-0 display wp-list-table widefat fixed striped posts table-bordered custum_table" style="width:100%;text-align: center;">
    <?php } ?>
	<thead>
	<tr>
	<th class="manage-column column-title column-primary sortable desc"><span>Select Photographer:</span></th>
	<th class="date_width manage-column column-title column-primary sortable desc"><span>Date:</span></th>
	<th class="small_width manage-column column-title column-primary sortable desc"><span> Start Time:</span></th>	
	<th class="small_width manage-column column-title column-primary sortable desc"><span>End Time:</span></th>
	<th class="small_width manage-column column-title column-primary sortable desc"><span>Task:</span></th>	
	<th class="small_width manage-column column-title column-primary sortable desc"><span>Location:</span></th>
	<?php
		 if ( ! is_admin() ) { ?>
	<th class="small_width manage-column column-title column-primary sortable desc"><span>Notes:</span></th><?php } ?>
	<th class="manage-column column-title column-primary sortable desc"><span>Action:</span></th>
	</tr>
	</thead>
	<tbody>
 
			   <?php include(plugin_dir_path( __FILE__ ).'show_data.php');?>

	</tbody>
    </table> 
</form>
<?php include(plugin_dir_path( __FILE__ ).'show_popup.php');?>
<?php endif; /*****If the user is logged in **********/?>
</div>
</body>
 
<script type="text/javascript">
    $(function () {
        jQuery('#sel1_photographer').multiselect({
            includeSelectAllOption: true,
            nonSelectedText:'Photographer'
        });
    });
    jQuery('#sel1_photographer option')
    .filter(function() {
        return !this.value || $.trim(this.value).length == 0 || $.trim(this.text).length == 0;
    })
   .remove();
  
</script>
<script type="text/javascript">

		$("#task_manager").submit(function(){
   				 
   				 var starttime=jQuery("#sell_starttime").val();
   				 var sell_endtime=jQuery("#sell_endtime").val();

   				 if(starttime == 'choose')
   				 {
   				 	jQuery("#sell_starttime").css('border','1px solid red');
   				 	return false;
   				 }

   				 if(sell_endtime == 'choose')
   				 {
   				 	jQuery("#sell_endtime").css('border','1px solid red');
   				 	return false;
   				 }
   				  if(sell_endtime == 'not allowed')
   				 {
   				 	jQuery("#sell_endtime").css('border','1px solid red');
   				 	return false;
   				 }

   				 
   				 
  			});
		 $(function() {

		$(".glyphicon-calendar").click(function(){
		$("#currentdate").focus();
		});

		$(".glyphicon-remove").click(function(){
		$("#currentdate_filter").val('');
		$("#currentdate").val('');
		});
       var dateObj = new Date();
      function GetDates(startDate, daysToAdd) {
       var aryDates = [];
       for (var i = 0; i <= daysToAdd; i++) {
           var currentDate = new Date();
           currentDate.setDate(startDate.getDate() + i);
           var month=currentDate.getMonth() +1;
           aryDates.push(currentDate.getDate() + "-" + month+ "-" + currentDate.getFullYear());
       }

    return aryDates;
}

   var enableDays = GetDates(dateObj, 7);
    function unavailable(date) {
        dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
        if ($.inArray(dmy, unavailableDates) == -1) {
            return [true, ""];
        } else {
            return [false, "", "Unavailable"];
        }
    }


    function enableAllTheseDays(date) {
        var sdate = $.datepicker.formatDate( 'd-m-yy', date)
        if($.inArray(sdate, enableDays) != -1) {
            return [true];
        }
        return [false];
    }


	function formatDate(d) {
	  var day = String(d.getDate())
	  //add leading zero if day is is single digit
	  if (day.length == 1)
	    day = '0' + day
	  var month = String((d.getMonth()+1))
	  //add leading zero if month is is single digit
	  if (month.length == 1)
	    month = '0' + month
	  return day + "-" + month + "-" + d.getFullYear()
	}

	var enableDays = '<?php echo getalldate(); ?>';
	var getalldate1s = '<?php echo getalldate1(); ?>';
	
    $("#currentdate_filter").datepicker({
	             format: "dd-mm-yyyy",
	             autoclose: true,
	              beforeShowDay: function(date){
	              if (enableDays.indexOf(formatDate(date)) < 0)
	                return {
	                  enabled: true
	                }
	              else
	                return {
	                  enabled: true
	                }
	            },
	            startDate: getalldate1s
            });
$("#currentdate").datepicker({
             format: "dd-mm-yyyy",
	             autoclose: true,
	              beforeShowDay: function(date){
	              if (enableDays.indexOf(formatDate(date)) < 0)
	                return {
	                  enabled: true
	                }
	              else
	                return {
	                  enabled: true
	                }
	            },
	            startDate: getalldate1s
            });
         });

        var date = new Date();
       date.setDate(date.getDate());

$('.form_date').on('change dp.change', function(e){
	
var ajaxurl=	'<?php echo admin_url( 'admin-ajax.php' ); ?>';
var currentdate= $(this).find("#currentdate").val();
var photographer =$("#sel1_photographer").val();
var jsonString = JSON.stringify(photographer);

if(photographer == "")
{
	alert("First select photographer");
	
	$("#sel1_photographer").css({'border': '1px solid red'});
	$("#currentdate").val('');
}

if(photographer != "")
{
$("#sel1_photographer").css({'border': '1px solid #ccc'});
$("#currentdate").parent().css({'border': '1px solid #ccc'});	
				/***********Time manage *****************/

			$.ajax({
   						 url: ajaxurl, // this is the object instantiated in wp_localize_script function
    					 type: 'POST',
					     data:{ 
					      action: 'Timemange', // this is the function in your functions.php that will be triggered
					      photographer_id: jsonString,
					      currentdate:currentdate
					    },
					    dataType:'html',
					    success: function( data ){
					    	
					    	if(data !="")
					    	{
				     $("#sell_starttime").html(data);
				 			}
				    	}
  				});
/**************************Time manage_End *******************/
			$.ajax({
   						 url: ajaxurl, // this is the object instantiated in wp_localize_script function
    					 type: 'POST',
					     data:{ 
					      action: 'Timemang_end', // this is the function in your functions.php that will be triggered
					      photographer_id: photographer,
					      currentdate:currentdate
					    },
					    dataType:'html',
					    success: function( data ){
					    		
					    	if(data != "")
					    	{
				     		$("#sell_endtime").html(data);
				 			}
				    	}
  				});
		}

});

$('.cst_update_remove').click(function(){

	$("#date_popup").val('');

});
$('#sell_starttime').on('change', function() {
	var ajaxurl   =	'<?php echo admin_url( 'admin-ajax.php' ); ?>';
	var currentdate = $("#currentdate").val();
	var photographer =$("#sel1_photographer").val();

	if(currentdate == "")
	{
		alert('please select the Date first');
		$("#currentdate").parent().css({'border': '1px solid red'});
	}

		if(currentdate != "")
		{
			$("#currentdate").parent().css({'border': '1px solid #ccc'});
					var starttime=this.value;
		 			 $.ajax({
		   						 url: ajaxurl, // this is the object instantiated in wp_localize_script function
		    					 type: 'POST',
							     data:{ 
							      action: 'Starttime_manage', // this is the function in your functions.php that will be triggered
							      starttime: starttime,
							      currentdate:currentdate,
							      photographer_id: photographer
							    },
							    dataType:'html',
							    success: function( data ){
							    		
							    	if(data != "")
							    	{
						     		$("#sell_endtime").html(data);
						 			}
						    	}
		  				});
	 		}
	
});

$("#sel1_photographer").on('change', function() {

	$(this).css({'border': '1px solid #ccc'});
    $("#currentdate").parent().css({'border': '1px solid #ccc'});
    $("#currentdate").val("");
});


/*************edit update functionality*********/

$(".update_data").click(function(){

var id= $(this).data('id');
//console.log(id);
var photographerid=$(this).data('photographerid');
var name=$(this).data('name');
var date=$(this).data('date');
var starttime=$(this).data('starttime');
var endtime=$(this).data('endtime');
var tasktitle=$(this).data('tasktitle');
var location=$(this).data('location');
var taskid=$(this).data('taskid');
var notes=$(this).data('notes');
$('#basicExampleModal').modal('show');
$('#sell_starttime_popup').html('<?php echo selectTimesOfDay(); ?>');
$('#sell_endtime_popup').html('<?php echo selectTimesOfDay_end(); ?>');
$('#sel1_photographer_popup').html(photographerid);
$('#task_popup').html(taskid);
$('#location_popup').html(location);
$('#date_popup').val(date);
$("#row_id").val(id);
$("#notes_front").val(notes);
$("#sel1_photographer_popup").trigger('change');

	$("#sell_starttime_popup > option").each(function() {
		if(starttime == this.text){
			$(this).attr('selected', 'selected');
		}
	});

	$("#sell_endtime_popup > option").each(function() {
		if(endtime == this.text){
			$(this).attr("selected","selected");
		}
	});
});


$(document).on('click', '#update_record', function() {
      var v=1;
		var ajaxurl='<?php echo admin_url( 'admin-ajax.php' ); ?>';
		var id=$("#row_id").val();
		var photographer=$('#sel1_photographer_popup').val();
		var starttime=$('#sell_starttime_popup').val();
		var endtime=$("#sell_endtime_popup").val();
		var task_popup=$("#task_popup").val();
		var location_popup=$("#location_popup").val();
		var notes_front_popup=$("#notes_front").val();
		var date=$("#date_popup").val();
		if(date == "")
		{
			$("#date_popup").css('border','1px solid red');
			v=2;
		}

		if(photographer == "choose")
		{
			$("#sel1_photographer_popup").css('border','1px solid red');
			v=2;
		}


		if(starttime == "choose")
		{

			$("#sell_starttime_popup").css('border','1px solid red');
			v=2;
		}
		if(endtime == "choose")
		{
			$("#sell_endtime_popup").css('border','1px solid red');
			v=2;
		}
		if(task_popup == "choose")
		{
			$("#task_popup").css('border','1px solid red');
			v=2;
		}

		if(location_popup == "choose")
		{
			$("#location_popup").css('border','1px solid red');
			v=2;
		}
		if(endtime == "not allowed")
		{
			$("#sell_endtime_popup").css('border','1px solid red');
			v=2;
		}

if(v==2)
{
	return false
}else{	$("#location_popup").css('border','1px solid #ccc');
		$("#task_popup").css('border','1px solid #ccc');
		$("#sell_endtime_popup").css('border','1px solid #ccc');
		$("#sell_starttime_popup").css('border','1px solid #ccc');
		$("#sel1_photographer_popup").css('border','1px solid #ccc');
		$("#date_popup").css('border','1px solid #ccc');
		$.ajax({       
		 				url: ajaxurl, // this is the object instantiated in wp_localize_script function
		    			type: 'POST',
					     data:{ 
							      action: 'update_record',
							      id:id, // this is the function in your functions.php that will be triggered
							      photographer: photographer,
							      starttime: starttime,
							      endtime: endtime,
							      taskpopup: task_popup,
							      location_popup: location_popup,
							      notes_popup: notes_front_popup,
							      date:date
							    },
							    dataType:'html',
							    beforeSend: function () {
          						 $(".loader").show();
        								},
							    success: function( data ){
							    		
							    		$(".loader").hide();
							    	if(data == "sucess")
							    	{
							    		$("#sucessmessage").text('update data Sucessfully');
						     		location.reload();
						 			}
						    	}
  				});
	}

});


$(document).on('click', '.schedule_delete', function() {
	var ajaxurl=	'<?php echo admin_url( 'admin-ajax.php' ); ?>';
    var id= $(this).data('id');
	$.ajax({       
		 				url: ajaxurl, // this is the object instantiated in wp_localize_script function
		    			type: 'POST',
					     data:{ 
							      action: 'delete_record',
							      id:id // this is the function in your functions.php that will be triggered
							    },
							    dataType:'html',
							    beforeSend: function () {
           								$(".loader").show();
        								},
							    success: function( data ){
							    	$(".loader").hide();
							    		
							    	if(data == "sucess")
							    	{
							    		alert('delete data Sucessfully');
						     		location.reload();
						 			}
						    	}
  				});

});


$(document).on('click', '.schedule_delete_multiple', function() {
	var ajaxurl= '<?php echo admin_url( 'admin-ajax.php' ); ?>';
   	var val = [];
    $(':checkbox:checked').each(function(i){
        val[i] = $(this).val();
    });
    if (val.length === 0) {
	   alert("Please checked records for delete");
	}else{
		//console.log('hello');
		$.ajax({       
		 		url: ajaxurl, // this is the object instantiated in wp_localize_script function
		    	type: 'POST',
				data:{ 
						action: 'delete_multiple_record',
						id:val 
					},
					dataType:'html',
					beforeSend: function () {
           				$(".loader").show();
        			},
					success: function( data ){
						$(".loader").hide();	    		
						if(data == "sucess")
						{
							alert('delete data Sucessfully');
							$(".chkbox").prop("checked", false);
							location.reload();

						}
					}
  				});
	}
    //console.log(val);

});

$(document).on('click', '.schedule_updat_start_multiple', function() {
	var ajaxurl= '<?php echo admin_url( 'admin-ajax.php' ); ?>';
   	var val = [];
    $(':checkbox:checked').each(function(i){
        val[i] = $(this).val();
    });
    
    if (val.length === 0) {
	   alert("Please checked records for update");
	}else{
		//console.log('hello');
		$.ajax({       
		 		url: ajaxurl, // this is the object instantiated in wp_localize_script function
		    	type: 'POST',
				data:{ 
						action: 'update_start_end_multiple',
						id:val 
					},
					dataType:'html',
					beforeSend: function () {
           				$(".loader").show();
        			},
					success: function( data ){
						$(".loader").hide();	    		
						if(data == "sucess")
						{
							alert('Update data Sucessfully');
							$(".chkbox").prop("checked", false);
							location.reload();

						}
					}
  				});
	}
    //console.log(val);

});

$(document).ready(function(){
    $('#chk_all').click(function(){
        if(this.checked)
            $(".chkbox").prop("checked", true);
        else
            $(".chkbox").prop("checked", false);
    });


		// var tid = "#usersTable";
		// var headers = document.querySelectorAll(tid + " th");

		// // Sort the table element when clicking on the table headers
		// headers.forEach(function(element, i) {
		//   element.addEventListener("click", function() {
		//     w3.sortHTML(tid, ".item", "td:nth-child(" + (i + 1) + ")");
		//   });
		// });

});

</script>
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"
    rel="stylesheet" type="text/css" />
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {

    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
     
 
    // DataTable
    var confil =  jQuery.noConflict();
    var table = confil('#example').DataTable({
        
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
       "columnDefs": [ { "orderable": false, "targets": [ 6 ] } ] ,
       "lengthMenu": [50],
       "aaSorting": [ [1,'asc'], [2,'asc'] ],
       "bLengthChange": false,
       "orderCellsTop": true,
       'bFilter' : false,  'bInfo' : false
       
    });

    confil('#list_example').DataTable({
       "lengthMenu": [50],
       "bLengthChange": false,
       "orderCellsTop": true,
       'bFilter' : false,  'bInfo' : false,
       "bSort": false
    });

} );



</script>
</html>