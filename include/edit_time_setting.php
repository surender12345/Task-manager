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
.datepicker-switch{
    pointer-events: none;
  }
</style>
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




<?php 
  
    global $wpdb;
    $table_start=$wpdb->prefix.'schedule_task_date_setting';
    $id = $_REQUEST['id'];
    $results=$wpdb->get_results("SELECT * FROM $table_start WHERE id= $id ");
    $stime = $results[0]->setting_start_date;
    $etime = $results[0]->setting_end_date;
    $btime = $results[0]->time_block_id;
    $setting_date_session = $results[0]->setting_date_session;

    $table_start1 = $wpdb->prefix.'schedule_task_date_session_setting';
    $results2=$wpdb->get_results("SELECT * FROM $table_start1 WHERE time_setting_id = $id ");
    if(isset($results2) && !empty($results2)){
      $readonly = 'readonly';
    }else{
      $readonly = '';
    }
?>





<form action="" method="post">
  <table class="wp-list-table widefat fixed striped posts">
    <thead>
      <tr>
        <td>
          <a href="javascript:void(0);">Select Session Year</a>
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


    <?php 

      if(isset($results2) && !empty($results2)){ ?>

        <tr>
      <td><div class="form-group row-cutom">
 
     <input type="text" name="setting_start_session" class="form-control" id="" aria-describedby="emailHelp" placeholder="Select Season Year" value="<?php if(isset($setting_date_session) && !empty($setting_date_session)){ echo $setting_date_session; }  ?>" required readonly>
  </div></td>
  <td><div class="form-group row-cutom">

     <input type="text" name="setting_start_date" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Start Time" required value="<?php if(isset($stime) && !empty($stime)){ echo $stime; }  ?>" readonly>
  </div></td>
  <td><div class="form-group row-cutom">
     
     <div class="col-sm-10"><input type="text" name="setting_end_date" class="form-control" id="" placeholder="Enter End Time" value="<?php if(isset($etime) && !empty($etime)){ echo $etime; }  ?>" required readonly> 
  </div></div></td>

  <td><div class="form-group row-cutom">
     
     <div class="col-sm-10">

      <select name="time_block_id" required>
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
  </div></div></td>


  <td><div class="row-btn">
  <button type="submit" class="button">Update Date</button>
  <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=datesetting">Back</a>
  </div></td>
    </tr>

    <?php  }else{

    ?>
    <tr>
      <td><div class="form-group row-cutom">
 
     <input type="text" name="setting_start_session" class="form-control" id="setting_start_session" aria-describedby="emailHelp" placeholder="Select Season Year" value="<?php if(isset($setting_date_session) && !empty($setting_date_session)){ echo $setting_date_session; }  ?>" required>
  </div></td>
  <td>
    <div class="form-group row-cutom">
      <input type="text" name="setting_start_date" class="form-control" id="start_date" aria-describedby="emailHelp" placeholder="Enter Start Time" required value="<?php if(isset($stime) && !empty($stime)){ echo $stime; }  ?>">
    </div>
  </td>
  <td>
    <div class="form-group row-cutom">
        <div class="col-sm-10">
          <input type="text" name="setting_end_date" class="form-control" id="end_date" placeholder="Enter End Time" value="<?php if(isset($etime) && !empty($etime)){ echo $etime; }  ?>" required> 
        </div>
    </div>
  </td>

  <td><div class="form-group row-cutom">
     
     <div class="col-sm-10">

      <select name="time_block_id" required>
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
  </div></div></td>


  <td><div class="row-btn">
  <button type="submit" class="button">Update Date</button>
  <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=datesetting">Back</a>
  </div></td>
    </tr>

<?php } ?>


  </tbody>
</table>
  

  
  
<!--   <div class="form-group row-cutom">
     <label for="exampleInputPassword1">Select Time Block</label>
     <div class="col-sm-10">

      <select name="time_block_id" required>
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
        <option <?php if($value->id == $btime){ echo "selected"; } ?> value="<?php echo $value->id; ?>"><?php echo $value->event_start_time; ?> To <?php echo $value->event_end_time; ?></option>
      <?php  } } ?>
    </select>
  </div></div> -->
  
  
</form>

<script type="text/javascript">

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
      //console.log(d.getDate());
        //alert(currentMonth);

      //console.log(currentMonth);

      if(years == currentYear){
        
        jQuery('#start_date').datepicker('update', new Date(currentYear, currentMonth, 1));
        jQuery('#start_date').removeAttr("disabled");
        jQuery('#end_date').removeAttr("disabled");
      }else{
        jQuery('#start_date').datepicker('update', new Date(years, 0, 1)).focus();
        jQuery('#start_date').removeAttr("disabled");
        jQuery('#end_date').removeAttr("disabled");
      }
  });
  jQuery("#start_date").datepicker({
      format: "dd-mm-yyyy",
      //viewMode: "months",
      todayBtn: true,
      autoclose: true,
      //startDate: new Date()
    })
    .on("changeDate", function(e) {
      var checkInDate = e.date, $checkOut = jQuery("#end_date");    
      checkInDate.setDate(checkInDate.getDate() + 1);
      $checkOut.datepicker("setStartDate", checkInDate);
      $checkOut.datepicker("setDate", checkInDate).focus();
      jQuery('#end_date').removeAttr("disabled");
      jQuery(this).datepicker('hide');
    });

  jQuery("#end_date").datepicker({
    format: "dd-mm-yyyy",
    todayBtn: true,
    autoclose: true
  });
  jQuery("#setting_start_session").change(function(){
    jQuery('#start_date').focus();
  });
</script>