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
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




<?php 
  
    global $wpdb;
    $table_start=$wpdb->prefix.'schedule_task_date_setting';
    $id = $_REQUEST['id'];
    $results=$wpdb->get_results("SELECT * FROM $table_start WHERE id= $id ");
    $date = $results[0]->setting_start_date;
      // End date
    $end_date = $results[0]->setting_end_date; ?>

<form action="" method="post">
  <table class="wp-list-table widefat fixed striped posts">
      <thead>
        <tr>
        <td>
        <a href="javascript:void(0);"><span>Date</span></a>
        </td>
        <td>
        <a href="javascript:void(0);"><span>Start Time</span></a>
        </td>
        <td>
        <a href="javascript:void(0);"><span>End Time</span></a>
        </td>

        <td>
        <a href="javascript:void(0);"><span>Time Block</span></a>
        </td>
        
      </tr>
  </thead>
  <tbody id="the-list">

    <?php 
    global $wpdb;
    $table_start=$wpdb->prefix.'schedule_task_date_session_setting';
    $id = $_GET['id'];
    $results = $wpdb->get_results("SELECT * FROM $table_start where time_setting_id = $id");
    if(isset($results) && !empty($results)){
      foreach ($results as $key => $value) {
       ?>
        <tr>
            <td class="manage-column column-title column-primary sortable"><input type="text" name="session_start_date[]" class="form-control" id="start_date" aria-describedby="emailHelp" placeholder="Enter Start Time" required value="<?php echo $value->session_start_date; ?>" readonly></td>
            <td class="manage-column column-title column-primary sortable">
              <input type="time" name="session_start_time[]" class="form-control" id="start_date" aria-describedby="emailHelp" placeholder="Enter Start Time"  value="<?php echo $value->session_start_time; ?>" >
            </td>
            <td class="manage-column column-title column-primary sortable">
             <input type="time" name="session_end_time[]" class="form-control" id="start_date" aria-describedby="emailHelp" placeholder="Enter Start Time"  value="<?php echo $value->session_end_time; ?>">
             <input type="hidden" name="session_data_id[]" value="<?php echo $value->id;  ?>">    
            </td>

            <td>
                <select name="time_block_id[]">
                  <option value="">Select Time Block</option>
                  <?php 
                  //$eventdatA  = get_option( 'task_manager_event_start_time' );
                  global $wpdb;
                  $table_start12=$wpdb->prefix.'schedule_task_time_block';
                  $results12=$wpdb->get_results("SELECT * FROM $table_start12");
                  $i = 1;
                  if(isset($results12) && !empty($results12)){ 
                    foreach ($results12 as $key => $value1) {
                  ?>
                  <option <?php if($value->session_timeblock_id ==  $value1->id) { echo "selected"; } ?> value="<?php echo $value1->id; ?>"><?php echo $value1->event_time_block; ?></option>
                <?php  } } ?>
              </select>
            </td>
            </tr>
    <?php  }
    }else{

     while (strtotime($date) <= strtotime($end_date)) { 
                  global $wpdb;
                  $bid = $_GET['id'];
                  $schedule_task_date_setting =$wpdb->prefix.'schedule_task_date_setting';
                  $resultsdatesetting = $wpdb->get_results("SELECT * FROM $schedule_task_date_setting WHERE id = $bid");
                  $timebid = $resultsdatesetting[0]->time_block_id;
                  $table_starttimeb =$wpdb->prefix.'schedule_task_time_block';
                  $resultstime =$wpdb->get_results("SELECT * FROM $table_starttimeb where id = $timebid");




      ?> 
            <tr>
            <td class="manage-column column-title column-primary sortable"><input type="text" name="session_start_date[]" class="form-control" id="start_date" aria-describedby="emailHelp" placeholder="Enter Start Time" required value="<?php if(isset($date) && !empty($date)){ echo $date; }  ?>" readonly></td>
            <td class="manage-column column-title column-primary sortable">
              <input type="time" name="session_start_time[]" class="form-control" id="start_date" aria-describedby="emailHelp" placeholder="Enter Start Time"  value="<?php echo $resultstime[0]->event_start_time; ?>">
            </td>
            <td class="manage-column column-title column-primary sortable">
              <input type="time" name="session_end_time[]" class="form-control" id="start_date" aria-describedby="emailHelp" placeholder="Enter Start Time"  value="<?php echo $resultstime[0]->event_end_time; ?>">
            </td>
            <td>
                <select name="time_block_id[]">
                  <option value="">Select Time Block</option>
                  <?php 
                  //$eventdatA  = get_option( 'task_manager_event_start_time' );
                  global $wpdb;
                  $table_start=$wpdb->prefix.'schedule_task_time_block';
                  $results=$wpdb->get_results("SELECT * FROM $table_start");
                  $bid = $_GET['id'];
                  $schedule_task_date_setting =$wpdb->prefix.'schedule_task_date_setting';
                  $resultsdatesetting = $wpdb->get_results("SELECT * FROM $schedule_task_date_setting WHERE id = $bid");
                  $i = 1;
                  if(isset($results) && !empty($results)){ 
                    foreach ($results as $key => $value) {
                  ?>
                  <option <?php if($resultsdatesetting[0]->time_block_id ==  $value->id) { echo "selected"; } ?> value="<?php echo $value->id; ?>"><?php echo $value->event_time_block; ?></option>
                <?php  } } ?>
              </select>
            </td>
 
           
            </tr>
    <?php $date = date ("d-m-Y", strtotime("+1 day", strtotime($date))); ?>       
    <?php   } } ?>
    </tbody>
</table>

  <div class="row-btn">
  <button type="submit" class="button">Update Date</button>
  <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=datesetting">Back</a>
  </div>
  
</form>

