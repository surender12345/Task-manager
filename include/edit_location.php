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
    <input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location" required value="<?php echo get_the_title($_GET['id']);?>">
    
  </div>
  <div class="form-group row-cutom">
    <label for="exampleInputPassword1">Color Code</label>
    <input type="color" name="color_code" class="form-control" id="exampleInputPassword1" placeholder="Color Code" value="<?php echo get_post_meta($_GET['id'], 'color_code_1', true ); ?>" required> 
  </div>
  <div class="row-btn">
      <button type="submit" class="button">Update Location</button>
      <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=location">Back</a>
  </div>
</form>