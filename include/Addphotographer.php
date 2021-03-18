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
<form action="" method="post" enctype='multipart/form-data'>
  <div class="form-group row-cutom">
    <label for="exampleInputEmail1">Photographer Name</label>
    <input type="text" name="p_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Photographer Name" required>
    
  </div>
  <div class="form-group row-cutom">
    <label for="exampleInputPassword1">Email address</label>
    <input type="email" name="email_address" class="form-control" id="exampleInputPassword1" placeholder="Email address" required> 
  </div>
  <div class="form-group row-cutom">
    <label for="exampleInputPassword1">Photographer image</label>
    <input type="file" name="file" class="form-control"> 
  </div>
  <div class="row-btn">
      <button type="submit" class="button">Add Photographer</button>
       <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=photographers">Back</a>
  </div>
</form>