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
   <label for="exampleInputEmail1">Location</label>
     <input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location" required>
  </div>
  <div class="form-group row-cutom">
     <label for="exampleInputPassword1">Color Code</label>
     <div class="col-sm-10"><input type="color" name="color_code" class="form-control" id="exampleInputPassword1" placeholder="Color Code" required> 
  </div></div>
  <div class="row-btn">
  <button type="submit" class="button">Add Location</button>
  <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=location">Back</a>
  </div>
  
</form>