<style>
  #myModal{z-index: 9999;}
</style>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 class="text-danger">Schedule</h2>
 <div class="table_box table-responsive">
        <table class="custom-table ">
            <thead class="bg-danger text-white">
                <tr>
                   <th>Photographer name</th>
                   <th>Date</th>
                   <th>start time</th>                            
                   <th>end time</th> 
                   <th>task</th>                          
                   <th>Location </th>                            
                </tr>
            </thead>
            <tbody>
                <tr class="toggler toggler1">
                    <td id="pst_photographer"></td>
                    <td id="pst_date"></td>
                    <td id="pst_start"></td>
                    <td id="pst_end"></td>
                    <td id="pst_task"></td>
                    <td id="pst_loc"></td>   
                </tr>
              </tbody>            
        </table>
   </div>
  </div>
</div>
 <style type="text/css">
.color_list_table td, th { border: 1px solid #A2A2A2; cursor: pointer;}
#add_shedule_data .modal-content .sticky-wrap {margin: 0 !important; overflow-x: hidden !important;}
#add_shedule_data { width: 100% !important;z-index: 9999;}
.modal-content { padding: 6px;position: absolute;top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
}
thead.bg-danger.text-white th { padding: 0px !important;}
#add_shedule_data .modal-content .sticky-wrap {margin: 0 !important;overflow-x: hidden !important;}
#add_shedule_data td { width: 15%; text-align: center;}
#add_shedule_data .form-control{font-size:12px;font-weight: 600;}
@media (min-width:767px) and (max-width:1024px)
{
#add_shedule_data {width: 100% !important;top: 0px !important;}
#add_shedule_data td {width: 14%; text-align: center;}
#add_shedule_data .form-control{padding:.375rem .1rem;}
#add_shedule_data .btn.btn-primary.new_task_save { width: 100%;}
}
@media (min-width:320px) and (max-width:767px)
{
#add_shedule_data { width: 100% !important; top: 0px !important;}
#add_shedule_data td:last-child {padding: 0px !important;}
#add_shedule_data .btn.btn-primary.new_task_save { width: 100%; font-size: 12px; padding: 4px 0px !important;}
#add_shedule_data .form-control { width: auto;}
#add_shedule_data td {width:auto; text-align: center;}
}
</style>
<div class="modal_backdrop">
<div id="add_shedule_data" class="modal">
  <!-- Modal content -->
  <?php if(is_user_logged_in())
        {
        $user = wp_get_current_user();
      

      }?>
  <div class="modal-content">
    <span class="close close_shedule">&times;</span>
    <h2 class="text-danger">Add Schedule</h2>
    <div class="table_box table-responsive">
        <table class="custom-table ">
            <thead class="bg-danger text-white">
                <tr>
                    <th>Photographer name</th>
                    <th>Date</th>
                    <th>Start time</th>                            
                    <th>End time</th>
                    <th>Task</th>                            
                    <th>Location </th> 
                    <th>Notes</th>
                    <th>Action</th>                          
                </tr>
            </thead>
            <tbody>
                <tr class="toggler toggler1">
                    <td id="pst_photographer"><select class="form-control" name="select_photographer"  id="shedule_photographer_tsm"></select></td>
                    <td><select class="form-control newclass" name="select_photographer"  id="shedule_date"></select></td>
                    <td><select class="form-control" name="select_photographer"  id="shedule_starttime"></select></td>
                    <td><select class="form-control" name="select_photographer"  id="shedule_endtime"></select></td>
                    <td><select class="form-control" name="tasks" id="shedule_task" required>
                    <?php echo show_post_dropdown_option('task',$user->roles[0]);?>
                    </select></td>
                    <td><select class="form-control"  name="locations" id="shedule_location" required>
                     <?php echo show_post_dropdown_option_action_popup('location');?>
                    </select>
                    </td>
                    <td><input type="text" class="form-control" name="task_notes_text" id="task_notes_text"></td>
                    <td>
                    <a href="javascript:void(0);" class="btn btn-primary new_task_save" style="background-color: #d00;color:#fff;border: none;">Save</a> 
                  </td>
                </tr>
              </tbody>            
        </table>
   </div>
  </div>
</div>
</div>
<script>
  var ajaxurl=  '<?php echo admin_url( 'admin-ajax.php' ); ?>';
  jQuery('#shedule_photographer_tsm').on('change',function(e){
  var currentdate= jQuery("#shedule_date").val();
  var starttime=jQuery("#shedule_starttime").val();
  var photographer =jQuery(this).val();
            $.ajax({
                   url: ajaxurl, // this is the object instantiated in wp_localize_script function
                   type: 'POST',
                   data:{ 
                    action: 'starttime_manage_fontend', // this is the function in your functions.php that will be triggered
                    starttime: starttime,
                    currentdate:currentdate,
                    photographer_id: photographer
                  },
                  dataType:'html',
                  success: function( data ){  
                      if(data != "")
                      {
                      $("#shedule_endtime").html(data);
                      }
                  }
              });
});
jQuery('.new_task_save').on('click',function(e){
var photographer_id=jQuery("#shedule_photographer_tsm").val();
var currentdate=jQuery("#shedule_date").val();
var starttime=jQuery("#shedule_starttime").val();
var endtime=jQuery("#shedule_endtime").val();
var shedule_location=jQuery("#shedule_location").val(); 
var shedule_notes=jQuery("#task_notes_text").val();
var shedule_task=jQuery("#shedule_task").val();
if(shedule_task == "")
{

  jQuery("#shedule_task").css('border','1px solid red');
  return false;
}
if(shedule_location == "")
{
  jQuery("#shedule_location").css('border','1px solid red');
  return false;
}
          $.ajax({
                   url: ajaxurl, // this is the object instantiated in wp_localize_script function
                   type: 'POST',
                   data:{ 
                    action: 'save_new_schedule', // this is the function in your functions.php that will be triggered
                    starttime: starttime,
                    currentdate:currentdate,
                    photographer_id: photographer_id,
                    endtime:endtime,
                    location:shedule_location,
                    notes:shedule_notes,
                    task:shedule_task
                  },
                  dataType:'text',
                  success: function( data ){
                      if(data == "true"){
                        location.reload();
                      }  
                  }
              });
});
  
</script>