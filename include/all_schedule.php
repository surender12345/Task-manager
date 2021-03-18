    <?php 
	global $wpdb;
	global $csv_export_name;
	$table = $wpdb->prefix.'schedule_task';
	if(isset($_GET['id'])): ?>
	<?php  $id=$_GET['id']; ?>
 	<?php  $currentDateTime = date('d-m-Y');
	$allresults = $wpdb->get_results("SELECT * FROM $table WHERE task_ID ='".$id."'");
	elseif(isset($_POST['view_alltask_schedule'])):
		if(!empty($task_ids)):

			if(!empty($_POST['current_date_get_end'])){

				$currentDateTime = date("Y-m-d", strtotime($_POST['current_date_get']));
				$currentendDateTime = date("Y-m-d", strtotime($_POST['current_date_get_end']));


				$currentDateTime1 = $_POST['current_date_get'];
				//$currentendDateTime = $_POST['current_date_get_end'];

				update_option("current_date_tsm",$currentDateTime1);
				$query1 = "SELECT * FROM $table WHERE task_ID  IN(".implode(',',$task_ids).") AND (task_date >='". $currentDateTime."'AND task_date <='". $currentendDateTime."')";
				$allresults = $wpdb->get_results($query1);
				$all_user_data_get = $wpdb->get_results($query1);
			}else{

				$currentDateTime=$_POST['current_date_get'];
		   		update_option("current_date_tsm",$currentDateTime);
				$allresults = $wpdb->get_results("SELECT * FROM $table WHERE task_ID  IN(".implode(',',$task_ids).") AND date ='". $currentDateTime."'");
				$all_user_data_get = $wpdb->get_results("SELECT * FROM $table WHERE task_ID  IN(".implode(',',$task_ids).") AND date ='". $currentDateTime."'");
			}
		endif;
	else:
	if(!empty($task_ids)):	
		endif;?>
		<?php endif; ?> 	
<?php global $show_pagination;
$front_filter_result='false';
/****************FRONT FILTER START***************/
if(isset($_POST['front_filter'])):
    unset($sql);
if ($_POST['photo_front_filter']) {
    $sql[] = "photo_gra_ID = '".$_POST['photo_front_filter']."' ";
}
if ($_POST['date_front_filter']) {
    $sql[] = "date = '".$_POST['date_front_filter']."' ";
}
if($_POST['start_time_front_filter'])
{
	$sql[] = "start_time = '".$_POST['start_time_front_filter']."' ";
}
if($_POST['end_time_front_filter'])
{
	$sql[] = "end_time = '".$_POST['end_time_front_filter']."' ";
}
if($_POST['task_front_filter'])
{
	$sql[] = "task_ID = '".$_POST['task_front_filter']."' ";
}
if($_POST['location_front_filter'])
{
	$sql[] = "location_ID = '".$_POST['location_front_filter']."' ";
}
$query = "select * from $table";

if(empty($_POST['photo_front_filter']) && empty($_POST['date_front_filter']) && empty($_POST['start_time_front_filter']) && empty($_POST['end_time_front_filter']) && empty($_POST['task_front_filter']) && empty($_POST['location_front_filter']) ):
	 $show_pagination ="true";
else:
$show_pagination ="false";
endif;

if (!empty($sql)) {
    $query .= ' where ' . implode(' AND ', $sql);
}
$allresults = $wpdb->get_results($query);
$all_user_data_get=$wpdb->get_results($query);
if(!empty($_POST['date_front_filter'])):
 update_option("current_date_tsm",$_POST['date_front_filter']);
endif;

if( !empty($allresults) && empty($_POST['date_front_filter'])):

foreach ($allresults as $key => $value) {

			$data[]=$value->date;
		}

		$data=array_unique($data);

		

		sort($data);
		$array_date_count = count($data);
		$count_i=get_option('current_time');
		if(empty($count_i) || $count_i == "empty"):
			$count_i='0';
		endif;
		  $currentDateTime = $data[$count_i];
		update_option("current_date_tsm",$currentDateTime);
	//$allresults = $wpdb->get_results("SELECT * FROM $table WHERE date ='". $currentDateTime."'");
	endif;
	if(empty($allresults))
	{

		$front_filter_result="true";

	}else{

		$front_filter_result ="false";
	}
endif;
/****************FRONT FILTER END************/

if(empty($allresults) && isset($_GET['pagination_new']))
{
$query = "select * from $table";
$allresults = $wpdb->get_results($query);
foreach ($allresults as $key => $value) {

			$data[]=$value->date;
		}
		$data=array_unique($data);
		sort($data);
		$array_date_count=count($data);
		 $count_i=get_option('current_time');
		if(empty($count_i) || $count_i == "empty"):
			$count_i='0';
		endif;
		  $currentDateTime = $data[$count_i];
		update_option("current_date_tsm",$currentDateTime);
$allresults = $wpdb->get_results("SELECT * FROM $table WHERE date ='". $currentDateTime."'");
$all_user_data_get=$wpdb->get_results("SELECT * FROM $table WHERE date ='". $currentDateTime."'");
$show_pagination ="true";
}



/*************VIEW TASK LIST****************/
     if(isset($_POST['tasks_as_photographer'])):	
     	unset($sql);
     	
		if ($_POST['photographer_id']) {
		    $sql[] = "photo_gra_ID = '".$_POST['photographer_id']."' ";
		}
		$query = "select * from $table";
		if (!empty($sql)) {
		    $query .= ' where ' . implode(' AND ', $sql);
		}
		$allresults = $wpdb->get_results($query);
		$all_user_data_get=$wpdb->get_results($query);
    	 endif;
		/***********VIEW TASK LIST END*************/
		 update_option('export_data_get',$all_user_data_get); ?>
	<?php  
	if(empty($allresults))
	{
	 $w_date=$_POST['current_date_get'];
	 update_option("current_date_tsm",$w_date);
	 $args = array( 'post_type' => 'photographer','posts_per_page' => -1,'post_status' => 'publish');
	 $photo_grapher = new WP_Query($args);
  	 if($photo_grapher->have_posts()) :
  	 $i=0; 
 	 while($photo_grapher->have_posts()) : $photo_grapher->the_post();
 		global $post;
		$id=$post->ID;
		$allresults[]= (object) array('id'=>'9999'.$i,'photo_gra_ID'=>$id,'date'=>$w_date,'start_time'=>'9:00','task_ID'=>'8'.$i,'location_ID'=>'9'.$i,'time'=>'2019-08-30 09:42:55');
		$i++;
	endwhile;
	endif; 
	}
 if(empty($allresults) && !isset($_GET['id']) && !isset($_POST['task_submit'])):?>
		<div class="show_error" style="text-align: center;padding-top: 50px;">
			<h1>For current date there is no data available </h1>
		</div>
    	<?php endif;
	if(!empty($allresults)):
	   rsort($allresults);?>
		<?php if($_GET['id']): ?>
			<div class="table-responsive cst_allschedule">
			<?php else: ?>
			<div class="table-responsive cst_allschedule">
				<?php endif;?>
			<br/><br/>
			<?php 
			if(isset($_POST['view_alltask_schedule'])):
				$currentDateTime=$_POST['current_date_get'];
				$csv_export_name="true";?>		
<?php 
 if(isset($_POST['current_date_get_end']) && !empty($_POST['current_date_get_end'])){ ?>
	<h4 class="text-center">COMPLETE SCHEDULE-     <?php echo $currentDateTime;?> - <?php echo $_POST['current_date_get_end']; ?></h4>
<?php  }else{
?>

			<h4 class="text-center">DAILY SCHEDULE-<?php echo $currentDateTime;?></h4>
		<?php } ?> 
		   <?php else:
		   $csv_export_name = "false";?>
			<!-- <h4 class="text-center">All Data</h4>	 -->	
			<?php endif;?>

			<?php if(isset($_POST['front_filter'])):
				     $date_filter=$_POST['date_front_filter'];
				     if($show_pagination == "false"): ?>
					<h4 class="text-center">DAILY SCHEDULE-<?php echo $date_filter;?></h4>
					<?php else: ?>
						<h4 class="text-center">All Data</h4>
					<?php endif; endif;?>
<?php 

if(isset($_POST['view_alltask_schedule']) || isset($_POST['front_filter']) ||isset($_GET['pagination_new']) ):
include(plugin_dir_path( __FILE__ ).'shedule_table.php');?>
<?php include(plugin_dir_path( __FILE__ ).'task_modle.php');?>
<?php endif;?>
<?php 


elseif(isset($_GET['id'])):
?>
<div class="cst_error" style="text-align: center; padding-top: 37px;">
    <h1 class="tsm_error"> Currently this task not contain any data</h1>
</div>
<?php endif;
 if(isset($_POST['tasks_as_photographer'])){
 	include(plugin_dir_path( __FILE__ ).'single-tasklist.php'); 
 	include(plugin_dir_path( __FILE__ ).'task_modle.php');
 }
?>
<script type="text/javascript">
jQuery("input:checkbox").change(function() {
if(jQuery(this).prop("checked") == true){
                var c=jQuery(this).attr("class");
                jQuery('.'+c).attr('checked', true);
            }
            else if(jQuery(this).prop("checked") == false){
                var c=jQuery(this).attr("class");
                jQuery('.'+c).attr('checked', false);
            }
});
</script>
<?php  
if($count > 18):?>
	<style type="text/css">
.tst_table .sticky-wrap {
overflow-x: auto;
overflow-y: scroll;
position: relative;
margin: 3em 0;
width: 100%;
height: 635px;
}
</style>
	<?php endif;?>
</div>


