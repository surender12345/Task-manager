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
  
    global $wpdb;
    $table_start=$wpdb->prefix.'schedule_task_time_block';
    $id = $_REQUEST['id'];
    $results=$wpdb->get_results("SELECT * FROM $table_start WHERE id= $id ");
    $stime = $results[0]->event_start_time;
    $etime = $results[0]->event_end_time;
    $btime = $results[0]->event_time_block;
?>
<form action="" method="post">
  <div class="form-group row-cutom">
   <label for="exampleInputEmail1">Start Time</label>
     <input type="time" name="start_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Start Time" required value="<?php if(isset($stime) && !empty($stime)){ echo $stime; }  ?>">
  </div>
  <div class="form-group row-cutom">
     <label for="exampleInputPassword1">End Time</label>
     <div class="col-sm-10"><input type="time" name="end_time" class="form-control" id="exampleInputPassword1" placeholder="Enter End Time" required value="<?php if(isset($etime) && !empty($etime)){ echo $etime; }  ?>"> 
  </div></div>
  <div class="form-group row-cutom">
     <label for="exampleInputPassword1">Time Block</label>
     <div class="col-sm-10"><input type="number" name="time_block" class="form-control" id="exampleInputPassword1" placeholder="Enter Time Block" required value="<?php if(isset($btime) && !empty($btime)){ echo $btime; }  ?>"> 
  </div></div>
  <div class="row-btn">
  <button type="submit" class="button">Update Time Block</button>
  <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=timeblock">Back</a>
  </div>
  
</form>