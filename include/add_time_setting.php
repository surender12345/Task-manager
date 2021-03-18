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

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"
rel="Stylesheet"type="text/css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"
type="text/javascript"></script>



<form action="" method="post">
  <div class="form-group row-cutom">
   <label for="setting_start_session">Select Session</label>
     <input type="text" name="setting_start_session" class="form-control" id="setting_start_session" aria-describedby="emailHelp" placeholder="Enter Start Time" required>
  </div>
  <div class="form-group row-cutom">
   <label for="start_date">Start Date</label>
     <input type="text" name="setting_start_date" class="form-control" id="start_date" aria-describedby="emailHelp" placeholder="Enter Start Time" required disabled>
  </div>
  <div class="form-group row-cutom">
     <label for="end_date">End Date</label>
     <div class="col-sm-10"><input type="text" name="setting_end_date" class="form-control" id="end_date" placeholder="Enter End Time" required disabled> 
  </div></div>
  <div class="row-btn">
  <button type="submit" class="button">Add Date</button>
  <a id="" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=datesetting">Back</a>
  </div>
  
</form>
<script type="text/javascript">

	jQuery("#setting_start_session").datepicker({
   	 format: "yyyy",
     viewMode: "years", 
     minViewMode: "years"
	}).on('changeDate', function(e){
    	jQuery(this).datepicker('hide');
    	var years = jQuery(this).val();
    	var currentYear = (new Date).getFullYear();

    	if(years >= currentYear){
    		jQuery('#start_date').datepicker('update', new Date(years, 0, 1)).focus();
    		jQuery('#start_date').removeAttr("disabled");
    	}else{
    		var d = new Date();
    		var n = d.getMonth();
    		//console.log(n);
    		jQuery('#start_date').datepicker('update', new Date(currentYear, 0, 1)).focus();
    		jQuery('#start_date').removeAttr("disabled");


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
	  });

	jQuery("#end_date").datepicker({
	  format: "dd-mm-yyyy",
	  todayBtn: true,
	  autoclose: true
	});

</script>
