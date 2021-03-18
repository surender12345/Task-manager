<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 

global $wpdb;
$table = $wpdb->prefix.'schedule_task';
if(isset($_POST['submit_photographer_filter'])):
unset($sql);
if ($_POST['select_photographer_filter']) {
    $sql[] = "photo_gra_ID = '".$_POST['select_photographer_filter']."' ";
}
if ($_POST['date_picker_filter']) {
    $sql[] = "date = '".$_POST['date_picker_filter']."' ";
}
if($_POST['start_time_filter'])
{
	$sql[] = "start_time = '".$_POST['start_time_filter']."' ";
}
if($_POST['end_time_filter'])
{
	$sql[] = "end_time = '".$_POST['end_time_filter']."' ";
}
if($_POST['tasks_filter'])
{
	$sql[] = "task_ID = '".$_POST['tasks_filter']."' ";
}
if($_POST['locations_filter'])
{
	$sql[] = "location_ID = '".$_POST['locations_filter']."' ";
}
$query = "select * from $table";
if (!empty($sql)) {
    $query .= ' where ' . implode(' AND ', $sql);
}
$allresults = $wpdb->get_results($query);
else: ?>
<?php  $allresults = $wpdb->get_results("SELECT * FROM $table");?>
<?php endif;?>
<?php 
if(!empty($allresults)):
?>
   
<?php   

if(!empty($allresults)):
	rsort($allresults);
foreach ($allresults as $key => $value) {?>
<tr>
	<td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $value->id;?>"/><?php echo get_the_title($value->photo_gra_ID);?></td>
  <input type="hidden" name="curr_grab_id" value="<?php echo $value->photo_gra_ID; ?>" class="curr_grab_id">
  <input type="hidden" name="curr_change_start" value="<?php echo $value->date; ?>" class="curr_change_start">
	<td><?php echo $value->date; ?></td>
	<input type="hidden" name="photo_id" value="<?php echo $value->id; ?>" class="photo_id">
	<td data-order="<?php echo $value->start_time; ?>"><input type="text" class="change_start_time" name="change_start" value="<?php echo $value->start_time; ?>"></td>
	<input type="hidden" name="photo_end_id" value="<?php echo $value->id; ?>" class="photo_id">
	<td data-order="<?php echo $value->end_time; ?>"><input type="text" class="change_end_time" name="change_end" value="<?php echo $value->end_time; ?>"></td>
	<td><?php echo get_the_title($value->task_ID);?></td>
	<td><?php echo get_the_title($value->location_ID);?></td>
  <?php
     if ( ! is_admin() ) { ?>
       <td>
          <?php 
           if($value->task_notes){
             echo '<i class="fa fa-star" aria-hidden="true"></i>';
           } ?>
      </td>
 <?php } ?>
<?php $role_custom=  get_post_meta($value->task_ID,'post_role_custom',true); 

if(!empty($role_custom) && $role_custom == $user->roles[0] || $user->roles[0] == 'administrator'):

?>
	<td>&nbsp;<a href="javascript:void(0);"  data-id="<?php echo $value->id;?>"    data-photographerid="<?php   echo 	show_post_dropdown_option_action_match_id('photographer',$value->photo_gra_ID);  ?>" data-name="<?php  echo  get_the_title($value->photo_gra_ID);  ?>"  data-date="<?php echo $value->date; ?>"    data-starttime="<?php echo  $value->start_time;  ?>" data-endtime="<?php echo $value->end_time;  ?>"    data-tasktitle="<?php echo get_the_title($value->task_ID);   ?>" data-notes="<?php echo $value->task_notes; ?>" data-location="<?php   echo 	show_post_dropdown_option_action_match_id('location',$value->location_ID);  ?> "   data-taskid="<?php   echo 	show_post_dropdown_option_action_match_id('task',$value->task_ID);  ?>"     class="btn btn-info  update_data">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);"  data-id="<?php echo $value->id;?>" class="btn btn-danger schedule_delete"> delete</a>&nbsp;</td>
<?php else:?>
<td style="padding: 27px;"></td>

<?php endif;?>
</tr>
<?php  }
endif;
?>
<?php else:?>
<tr>
<td  colspan="7" style="padding: 27px;"><h2>No found the data</h2></td>
</tr>
<?php endif;?>
<script>
  //jQuery.noConflict();
	jQuery(document).ready(function(){
	jQuery('.change_start_time').on('change', function() {
    //jQuery(document).on("change",".change_start_time", function() {
    var ajaxurl= '<?php echo admin_url( 'admin-ajax.php' ); ?>';
      var start_value = jQuery(this).val();
      //alert(start_value);
      var photo_id = jQuery(this).parent().parent().find('input[name=\'photo_id\']').val(); 
      var curr_grab_id = jQuery(this).parent().parent().find('input[name=\'curr_grab_id\']').val();
      var change_start = jQuery(this).parent().parent().find('input[name=\'curr_change_start\']').val(); 
             jQuery.ajax({
               type: 'POST',
               url: ajaxurl,
               dataType: 'json',
               data: {
                action: 'update_start_value',
                 start_value :start_value,
                 photo_id :photo_id,
                 curr_grab_id :curr_grab_id,
                 change_start :change_start
              },
              success: function(data) {
                console.log(data);
                if(data == '1'){
                   alert('Start time already exist');
                   location.reload();
                 }
               }
           })
    });
    

    jQuery('.change_end_time').on('change', function() {
    var ajaxurl= '<?php echo admin_url( 'admin-ajax.php' ); ?>';
      var end_value = jQuery(this).val();
      var photo_end_id = jQuery(this).parent().parent().find('input[name=\'photo_end_id\']').val(); 
      var curr_grab_id = jQuery(this).parent().parent().find('input[name=\'curr_grab_id\']').val();
      var change_start = jQuery(this).parent().parent().find('input[name=\'curr_change_start\']').val(); 
             jQuery.ajax({
               type: 'POST',
               url: ajaxurl,
               dataType: 'json',
               data: {
                action: 'update_end_value',
                 end_value :end_value,
                 photo_end_id :photo_end_id,
                 curr_grab_id :curr_grab_id,
                 change_start :change_start
              },
              success: function(data) {
                console.log(data);
                if(data == '1'){
                   alert('End time already exist');
                   location.reload();
                 }
               }
           })
    });

 });
  //jQuery.noConflict();
</script>

