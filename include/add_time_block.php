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
<form action="" method="post">
  <div class="form-group row-cutom">
   <label for="exampleInputEmail1">Start Time</label>
     <input type="time" name="start_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Start Time" required>
  </div>
  <div class="form-group row-cutom">
     <label for="exampleInputPassword1">End Time</label>
     <div class="col-sm-10"><input type="time" name="end_time" class="form-control" id="exampleInputPassword1" placeholder="Enter End Time" required> 
  </div></div>
  <div class="form-group row-cutom">
     <label for="exampleInputPassword1">Time Block</label>
     <div class="col-sm-10"><input type="number" name="time_block" class="form-control" id="exampleInputPassword1" placeholder="Enter Time Block" required> 
  </div></div>
  <div class="row-btn">
  <button type="submit" class="button">Add Time Block</button>
  <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=timeblock">Back</a>
  </div>
  
</form>