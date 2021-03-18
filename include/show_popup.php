<form action=""  id="records_mange" method="post" >
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;">Update the record</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <div class="form-group">
        <input type="hidden" name="" id="row_id">
        <label for="exampleInputEmail1">Photographer name</label>
        <select class="form-control" name="select_photographer"  id="sel1_photographer_popup">
        </select>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Date:</label>
      <div class="input-group date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
      <input class="form-control" autocomplete="off" size="16" name="date_picker"  id="date_popup" type="text" value=""  required>
      <span class="input-group-addon"><span class="glyphicon glyphicon-remove cst_update_remove"></span></span>
      <span class="input-group-addon"></span>
      </div>
      </div>
      <form>
      <div class="form-group">
      <label for="exampleInputEmail1">Start time:</label>
      <select class="form-control" name="select_photographer"  id="sell_starttime_popup">
              </select>
  </div>
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">End Time:</label>
      <select class="form-control" name="select_photographer"  id="sell_endtime_popup">
   
              </select>
  </div>
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Task:</label>
    <select class="form-control" name="tasks" id="task_popup" required>
              
        <?php echo show_post_dropdown_option_action_popup('task');?>
          </select>
  </div>
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Location:</label>
    <select class="form-control"  name="locations" id="location_popup" required>

             <?php echo show_post_dropdown_option_action_popup('location');?>
              </select>
  </div>
  <?php if ( ! is_admin() ) { ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Notes:</label>
    <input type="text" class="form-control" id="notes_front" name="front_popup_notes" value="" >
  </div> <?php } ?>
  <button type="button" id="update_record"  class="btn btn-primary">Update Record</button>

  <div class="loader" style="display: none;float:right;">
<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'image/loader.gif'; ?>" height='20' width='20'>
  </div>
    <p style="color: green; float: right;font-size: 16px;padding-right: 10px;" id="sucessmessage"></p>
</form>
      </div>
  </form>
  
      
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
 jQuery("#date_popup").datepicker({
             dateFormat: 'dd-mm-yy',
              minDate: 0,
            });

jQuery('#sel1_photographer_popup').on('change',function(e){

var ajaxurl=  '<?php echo admin_url( 'admin-ajax.php' ); ?>';
var currentdate= $("#date_popup").val();
var photographer = $(this).val();
var start_time= $("#sell_starttime_popup").val();
var end_time = $("#sell_endtime_popup").val();
//console.log(start_time);
  $.ajax({
               url: ajaxurl, // this is the object instantiated in wp_localize_script function
               type: 'POST',
               data:{ 
                action: 'Timemange_popup', // this is the function in your functions.php that will be triggered
                photographer_id: photographer,
                currentdate:currentdate,
                start_time:start_time
              },
              dataType:'html',
              success: function( data ){
                
                if(data !="")
                {
             $("#sell_starttime_popup").html(data);
              }
              }
              });
              /**************************Time manage_End *******************/
             $.ajax({
               url: ajaxurl, // this is the object instantiated in wp_localize_script function
               type: 'POST',
               data:{ 
                action: 'Timemang_end_popup', // this is the function in your functions.php that will be triggered
                photographer_id: photographer,
                currentdate:currentdate,
                starttime:start_time,
                end_time:end_time
              },
              dataType:'html',
              success: function( data ){
                  
                if(data != "")
                {
                $("#sell_endtime_popup").html(data);
              }
              }
          });

});

jQuery('#date_popup').on('change', function(e){

var ajaxurl=  '<?php echo admin_url( 'admin-ajax.php' ); ?>';
var currentdate= $(this).val();
var photographer =$("#sel1_photographer_popup").val();
              $.ajax({
               url: ajaxurl, // this is the object instantiated in wp_localize_script function
               type: 'POST',
               data:{ 
                action: 'Timemange_popup', // this is the function in your functions.php that will be triggered
                photographer_id: photographer,
                currentdate:currentdate
              },
              dataType:'html',
              success: function( data ){
                
                if(data !="")
                {
             $("#sell_starttime_popup").html(data);
              }
              }
              });
              /**************************Time manage_End *******************/
             $.ajax({
               url: ajaxurl, // this is the object instantiated in wp_localize_script function
               type: 'POST',
               data:{ 
                action: 'Timemang_end_popup', // this is the function in your functions.php that will be triggered
                photographer_id: photographer,
                currentdate:currentdate
              },
              dataType:'html',
              success: function( data ){
                  
                if(data != "")
                {
                $("#sell_endtime_popup").html(data);
              }
              }
          });
});


  $('#sell_starttime_popup').on('change', function() {
  var ajaxurl   = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
  var currentdate = $("#date_popup").val();
  var photographer =$("#sel1_photographer_popup").val();

  if(currentdate == "")
  {
    alert('please select the Date first');
    $("#currentdate").parent().css({'border': '1px solid red'});
  }

    if(currentdate != "")
    {
      $("#currentdate").parent().css({'border': '1px solid #ccc'});
          var starttime=this.value;
           $.ajax({
                   url: ajaxurl, // this is the object instantiated in wp_localize_script function
                   type: 'POST',
                   data:{ 
                    action: 'Starttime_manage', // this is the function in your functions.php that will be triggered
                    starttime: starttime,
                    currentdate:currentdate,
                    photographer_id: photographer
                  },
                  dataType:'html',
                  success: function( data ){
                      
                    if(data != "")
                    {
                    $("#sell_endtime_popup").html(data);
                  }
                  }
              });
      }
  
});




</script>