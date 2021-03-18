<!-- Default form contact -->
<?php 
if(is_user_logged_in())
        {
        $user = wp_get_current_user();
        $args = array(
                        'role'    => 'administrator',
                        'orderby' => 'user_nicename',
                        'order'   => 'ASC'
                            );
        $users_admin = get_users( $args);
        $roles_main = array('administrator');
         ?>
      <?php  global $wp; ?>
  <style>
 /********9-9-2019***********/
 #photographer_tasks td {border: 1px solid #e5e5e5;}
#all_photographers_tasks .btn-info {width:100%;}
 #post-12794382 {
 box-shadow: none !important;}
 .tab #fisrt_maintab {
background: #d00 !important;
}
td.day {color: #000;font-weight: 700;}
.description {width: 100%;border: 1px solid #ccc;}
.tab {overflow: hidden;}
.tab button { background-color:#000!important;float: left; cursor: pointer;padding: 4px 16px; transition: 0.3s; font-size: 17px !important;  border: 1px solid #ccc !important;
    margin: 0px 4px;margin-bottom:20px;}
.tab button:hover {background-color: #d00;}
.tab button.active { background-color: #d00 !important;}
.tabcontent { display: none;padding: 6px 12px;  border-top: none;}
.tablinks.filterrr {padding: 4px 40px !important;}           
.btn_text .clear_filter { background: #d00 !important; padding: 9px 9px !important; float: left !important; margin: 13px 0px 11px 7px !important; color: #fff !important; font-size: 14px !important; border-radius: 4px !important; text-decoration: none !important;}
.filter .btn_text input {width: auto;}
.btn_text .filter_btn {padding: 9px 9px !important;background: #000 !important; float: left !important; color: #fff !important; font-size: 14px !important; border-radius: 4px !important; text-decoration: none !important;margin: 14px 0px 11px 7px !important;}
.task-btn .btn.btn-info.cst_front_filter{padding: 14px 30px;background: #d00;color: #fff;border: none;border-radius:0px; }
  .tsm_table {float: left;width: 100%;}
.filter {width: 100%;float: left;padding-top: 50px;}
.filter span { font-size: 14px; width: 100%;float: left;background:#646464;color:#fff;text-align: center;font-weight: 600;}
.filter ul{margin:0px;padding: 0px 0px 0px 2px;}
.filter li {width: 158px;float: left;list-style: none;border: 1px solid #ddd;}
.btn_text .filter_btn { padding: 0px 9px;background: #000;float:left; color: #fff !important;font-size: 14px; border-radius: 4px;text-decoration:none;margin: 16px 0px 15px 7px;}
.btn_text .clear-filter {background: #d00; padding: 0px 9px;float:left;margin: 16px 0px 15px 7px;color: #fff !important;font-size: 14px;border-radius: 4px;text-decoration: none;}
.filter select{width:90%;padding: 0px !important;margin: 14px 10px 10px 10px;float:left;}
.filter input{width:90%;padding: 6px !important;margin: 13px 10px;float: left;}
#all_photographers_tasks th { padding: 3px 0px;}
.export_select h4{font-size:16px;margin: 0px;}
.tsm_table .sticky-wrap{overflow: unset !important;}
.task-btn ul{margin:0px auto;text-align:center;padding: 0px;} 
.task-btn li {display: inline-block;}
.task-btn .task-pt-1 {padding: 13px 25px !important;background:#d00;color:#fff !important;border-radius: 0px;}
.task-btn #front_date_picker:hover{background:#cccc;;}
.task-btn #front_date_picker{padding: 15px 13px 18px 13px;!important;background:transparent;
border: 1px solid #ddd;margin-bottom:10px !important;}
.task-btn .task-pt{padding:16px 30px;}
.task-btn input {border-radius: 0px;padding:16px 7px;margin: 0px 5px !important;}
.task-btn .btn-info:hover {border-radius: 0px; background:#cccccc !important;color:#000!important;}
.task-btn .btn-info{font-weight: bold !important;
text-transform: uppercase !important;}
.task-btn .active{border-radius: 0px; background:#cccccc !important;color:#000!important;}
.task-btn a:hover{border: 1px solid transparent;border-radius: 0px;padding:13px 35px;}
#export_photographer {background: transparent;border: 1px solid #ccc;padding: 6px 12px;}
@media(min-width:320px) and (max-width:767px){
.task-btn .task-pt {width: 217px;}
.task-btn #front_date_picker{padding: 15px 30px;}
#photographer_ids tr{width:100%;}
.export_select a.btn.btn-info {float: left !important;width: 100%!important;margin: 10px 0px 13px 0px;}
.task-btn input {padding: 16px 11px;}
#photographer_tasks tr{width:100%;}
.export_select{text-align:center;}
#export_photographer {width: 100%;}
#all_photographers_tasks th {width: 100%; float: left;margin-bottom: 10px;}
#all_photographers_tasks td {width: 100%;float: left;}
.task-btn .btn.btn-info.cst_front_filter{width:217px;}
}
.task-btn .task-pt {padding: 16px 24px;}
/********9-9-2019***********/
@media(min-width:992px) and (max-width:1500px){
.task-btn .task-pt {padding: 10px 14px;}
.task-btn input {padding: 10px 7px;margin:0px 0px !important;}
.task-btn #front_date_picker { padding: 9px 3px 11px 3px;}
.task-btn a:hover { padding: 8px 18px;}
.task-btn .task-pt-1 {padding: 8px 15px !important;}
.task-btn .btn.btn-info.cst_front_filter {padding: 9px 17px;}
}
@media(min-width:992px) and (max-width:1190px){
.filter li {width: 154px;}
.task-btn .task-pt {padding: 10px 14px;}
.task-btn input {padding: 10px 7px;margin:0px 0px !important;}
.task-btn #front_date_picker { padding: 9px 3px 11px 3px;}
.task-btn a:hover { padding: 8px 18px;}
.task-btn .task-pt-1 {padding: 8px 15px !important;}
.task-btn .btn.btn-info.cst_front_filter {padding: 9px 17px;}
}
@media(min-width:767px) and (max-width:992px){
.filter ul {padding: 0px 37px !important;}
.filter li {width: 152px;}
}
@media(min-width:540px) and (max-width:767px){
.filter ul {padding: 0px 18px;}
}
@media(min-width:320px) and (max-width:540px){
.filter li {width: 100%;}
.filter select {width: 96%;}
.filter ul {padding: 0px 10px;}
.filter input { width: 96%;}
.btn_text .clear-filter {width: 50%;margin: 8px 0px;}
.btn_text .filter_btn { margin: 8px 4px;width: 47%;}
}
</style>



<link href="<?php echo  plugin_dir_url( __FILE__ ).'css/datepicker.min.css'; ?>"
rel="Stylesheet"type="text/css"/>
<script src="<?php echo  plugin_dir_url( __FILE__ ).'js/bootstrap.min.js'; ?>"
type="text/javascript"></script>
<script src="<?php echo  plugin_dir_url( __FILE__ ).'js/bootstrap-datepicker.min.js'; ?>"
type="text/javascript"></script>

<?php if(isset($_POST['view_alltask_schedule'])):
$mydate=$_POST['current_date_get'];
update_option('selected_date',$mydate);?>
<?php endif;?>
<div class="task-btn">
<ul>
<li>
<form action="<?php echo home_url( $wp->request ).'/'; ?>" method="post">
<input type="submit" class="btn btn-info active task-pt" name="back_to_schedule" value=" View Task List" style="background-color: #d00;" >
</form>
</li>
<li>
<form action="<?php echo home_url( $wp->request ).'/'; ?>" method="post" class="view-port">
<input type="text" name="current_date_get" placeholder="Select Date" autocomplete="off" id="front_date_picker">
<input type="submit" class="btn btn-info" id='view_all_task' name="view_alltask_schedule" value="View Task Schedules" style="background-color: #d00;" disabled>
</form>
<!-- <button type="button" class="btn btn-info Cst_all_task">View all Tasks Schedule</button> -->
</li>
<li>
  <a href="javascript:void(0)" class="btn btn-info  cst_front_filter">Filters</a>
  </li>
<?php if(in_array($user->roles[0], $roles_main)): ?>
<li>
<input type="button" class="btn btn-info task-pt" id='task_manager_delete_task' name="view_all_photographers" value="Delete tasks" style="background-color: #d00;">
</li>

<li>
<a class="btn btn-info task-pt task-pt-1" href="https://workshops.xposure.ae/wp-admin/edit.php?post_type=photographer&page=saskmange">Schedule Task</a>
</li>
<?php endif;?>
</ul>
</div>
<?php  /********************FILTERS LIST***************/ 
if(isset($_POST['front_filter'])):

  if(!empty($_POST['date_front_filter'])):
    update_option('select_all_date','false');
 update_option('selected_date',$_POST['date_front_filter']);
  else:

    update_option('selected_date','notexist');

    endif;
endif;
?>
<?php $main_date = get_option('selected_date');
      $all_date =get_option('select_all_date');
 ?>
 <div class="filter pst_front_filter" style="display: none;">
 <form action="<?php echo home_url( $wp->request ).'/'; ?>" method="post"  id="post_filter">
 <ul>
<li><span>Select Date:</span>
<select name="date_front_filter" class="form-control" id="date_filter_front">
<option value="" <?php echo !empty($all_date)? 'selected':"";   ?>>select all dates</option>
<option value="specific_date">select specific date</option>
<?php if($main_date != "notexist" ): ?>
<option value="<?php echo get_option('selected_date'); ?>"  selected><?php echo get_option('selected_date');  ?></option>
<?php 
endif;?>

 </select>
 <div id="datepicker_front" style="display: none;">
<input type="text"   class="pst_date_filter" id="front_date_select" value=""> 
</div>
 </li>
 <li><span>Photographer:</span>
 <select class="form-control pst_photo_filter" name="photo_front_filter">
  <option value="">select all</option>
 <?php echo show_post_dropdown_option_filter_frontend('photographer',$_POST['photo_front_filter']);?>
 </select>
 
 <li><span>Start time</span>
 <select class="form-control pst_starttime_filter"  name="start_time_front_filter">
  <option value="">select all</option>
 <?php echo selectTimesOfDay_filter_frontend($_POST['start_time_front_filter']);?>
 </select>
 </li>
 <li><span>End time</span>
 <select class="form-control pst_end_time_filter" name="end_time_front_filter">
    <option value="">select all</option>

<?php echo selectTimesOfDay_end_filter_frontend($_POST['end_time_front_filter']);?>
 </select></li>
<li><span>Task</span>
<select class="form-control pst_task_filter" name="task_front_filter">
  <option value="">select all</option>
<?php echo show_post_dropdown_option_filter_frontend('task',$_POST['task_front_filter']);?>
</select></li>
<li><span>Location</span>
<select class="form-control pst_location_filter" name="location_front_filter">
  <option value="">select all</option>
<?php echo show_post_dropdown_option_filter_frontend('location',$_POST['location_front_filter']);?>
</select></li>
<li class="btn_text"><span>Action</span>
<input type="submit" name="front_filter" class="filter_btn" value="Filter">
<input type="button" name="front_clear_filter" class="clear_filter" value="Clear Filter">
</li>
</ul>
</form>
</div>
<?php /*****************DISCRIPTION TAB**********/?>
<?php
$description_flag="false";
  if(!isset($_POST['view_alltask_schedule']) && isset($_POST['front_filter'])): 
        $description_flag="true";
endif;
if(!isset($_POST['front_filter']) && isset($_POST['view_alltask_schedule'])): 
        $description_flag="true";
endif;
 
  /******************END FILTERS***************/?>
<?php
      /*********All Photographers********************/?>
             <div class="tsm_table">
            <table id="all_photographers_tasks" style="display: none;"> 
                  <thead id="photographer_ids" >
                    <th style="color: #fff; background: #dd0605;">All photographers</th>
                    <th style="color: #fff; background: #dd0605;">Tasks</th>
                    <th style="color: #fff; background: #dd0605;">Actions</th>
                  </thead>
                  <tbody id="photographer_tasks">
                    <tr>
                      <td><select class="form-control" name="select_photographer"  id="action_photographer_main">
                      
                      <?php echo show_post_dropdown_option_action('photographer');?>
                  </select></td>
                      <td><select class="form-control" name="select_photographer"  id="task_photographer_main">
              <?php //echo show_post_dropdown_option('photographer','adminrole');?>
              </select>
              </td>
             <td>
              <a href="javascript:void(0);" class="btn btn-info delete_task" style="background-color: #d00">Delete</a></td>
              </tr>
              </tbody>
              </table> 
            </div>
              <script type="text/javascript">
                jQuery('#task_manager_delete_task').click(function(){
                       jQuery('#all_photographers_tasks').toggle();
                       jQuery(".pst_front_filter").hide();
                       });
              </script>
            <?php  if(isset($_POST['task_submit'])):
                        $my_post = array(
                                  'post_type'=>'task',
                                  'post_title'    => wp_strip_all_tags( $_POST['task_name'] ),
                                  'post_content'  => $_POST['task_discription'],
                                  'post_status'   => 'publish',
                                  'post_author'   => $_POST['author_id']
                                );
                                // Insert the post into the database
                                $post_id= wp_insert_post( $my_post );
                                if($post_id)
                                {
                                        update_post_meta($post_id, 'post_role_custom',$_POST['author_role']);
                                        echo "<h2 style='color:green;text-align: center;' class='task_created'>Task Created sucessfully</h2>";      
                                }
                            endif;
                            ?>
            <?php  if(isset($_POST['add_task_schedule'])):?>
                                <div class="cst_manage">
                                    <form class="text-center border border-light p-5" action=" " method="post">
                                        <h2>Add Task</h2>
                                        <!-- Name -->
                                        <input type="text" id="defaultContactFormName" name="task_name" class="form-control mb-4" placeholder="name of task">
                                        <input type="hidden" name="author_id"  name="author_id" value="<?php echo $user->ID;?>">
                                        <input type="hidden" name="author_role" value ="<?php echo $user->roles[0];?>">
                                        <div class="form-group">
                                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" name= "task_discription" rows="3" placeholder="task discription"></textarea>
                                        </div>
                                        <!-- Send button -->
                                        <button class="btn btn-info btn-block"  name="task_submit" type="submit">ADD Task</button>
                                    </form>
                                </div>
                            <?php next_posts_link( '&larr; Older posts', $wp_query->max_num_pages); ?>
                            <?php previous_posts_link( 'Newer posts &rarr;' ); ?>
                            <?php endif; 
                             /*}*/ 
                            ?>
                            <?php if(!isset($_POST['add_task_schedule']) || isset($_POST['task_submit'])): ?>
                            <?php 
                            include(plugin_dir_path( __FILE__ ).'List.php');?>
                            <?php endif;?>
                            <?php   
                            } /***********user logged in*********/
                            /***********TRIGGER ON CLICK********/
                       if(isset($_POST['front_filter'])):?>
                          <script type="text/javascript">
                            jQuery(document).ready(function(){
                            jQuery(".cst_front_filter").trigger("click");
                            });
                          </script>
                        <?php endif;

                        /*************END ON CLICK********/
                        ?>
<script>
jQuery(".clear_filter").click(function(){
jQuery(".pst_photo_filter").val("");
jQuery(".pst_date_filter").val("");
jQuery(".pst_starttime_filter").val("");
jQuery(".pst_end_time_filter").val("");
jQuery(".pst_task_filter").val("");
jQuery(".pst_location_filter").val("");
});
jQuery("#fisrt_maintab").trigger('click'); 
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  console.log(tablinks);
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

</script>
<?php  /************DISCRIPTION TAB END*******/?>
    <!-- Default form contact -->
    <script type="text/javascript">
/**********FILTER HIDE SHOW************/
jQuery(".cst_front_filter").click(function(){
         jQuery(".pst_front_filter").toggle();
          jQuery('#all_photographers_tasks').hide();
        });
/***********END FILTER***********/

/*************FILTER ON CHANGE*******/

jQuery("#date_filter_front").on('change',function(){
jQuery("#datepicker_front").hide();
var v= jQuery(this).val();
if(v== "specific_date")
{
  jQuery("#datepicker_front").show();
  jQuery("#front_date_select").focus(); 
}
});

jQuery("#front_date_select").on('change',function(){
jQuery("#datepicker_front").hide();
jQuery("#date_filter_front").prepend('<option value="'+this.value+'" selected>'+this.value+'</option>');
});

function formatDate(d) {
  var day = String(d.getDate())
  //add leading zero if day is is single digit
  if (day.length == 1)
    day = '0' + day
  var month = String((d.getMonth()+1))
  //add leading zero if month is is single digit
  if (month.length == 1)
    month = '0' + month
  return day + "-" + month + "-" + d.getFullYear()
}


/*************ENDSELECT CHANGE**********/

        jQuery(function() {



        var enableDays = '<?php echo getalldate(); ?>';
        var getalldate1s = '<?php echo getalldate1(); ?>';

        //var enableDays = "03-02-2020, 20-03-2020, 22-04-2020, 13-01-2021".split(', ');
        //console.log(data);
        //console.log(getalldate1s);



        jQuery("#front_date_picker").datepicker({
             format: "dd-mm-yyyy",
             autoclose: true,
             beforeShowDay: function(date){
              if (enableDays.indexOf(formatDate(date)) < 0)
                return {
                  enabled: true
                }
              else
                return {
                  enabled: true
                }
            },
            startDate: getalldate1s

            });
        jQuery("#front_date_select").datepicker({
             format: "dd-mm-yyyy",
             autoclose: true,
             beforeShowDay: function(date){
              if (enableDays.indexOf(formatDate(date)) < 0)
                return {
                  enabled: true
                }
              else
                return {
                  enabled: true
                }
            },
            startDate: getalldate1s
            });
        



         });
      jQuery("#front_date_picker").on('change',function(){

          var rBtnVal = jQuery(this).val();
     if(rBtnVal){
         jQuery("#view_all_task").attr("disabled", false); 
     }
     else{ 
         jQuery("#view_all_task").attr("disabled", true); 
     }
      });
    jQuery('.Cst_add_task').click(function(e){
        e.preventDefault();
    jQuery('.cst_manage').show();
    jQuery('.task_created').hide();
    });
    jQuery(".Cst_all_task").click(function (e){
    jQuery(".cst_allschedule").show();
    });
    jQuery('.cst_popup').click(function(e){
       var photographer=jQuery(this).data('photographer');
       console.log(photographer);
       var date=jQuery(this).data('date');
       var start_time=jQuery(this).data('start_time');
       var end_time=jQuery(this).data('end_time');
       var taskname=jQuery(this).data('taskname');
       var location=jQuery(this).data('location');
       jQuery("#pst_photographer").text(photographer);
       jQuery("#pst_task").text(taskname);
       jQuery("#pst_date").text(date);
       jQuery("#pst_start").text(start_time);
       jQuery("#pst_end").text(end_time);
       jQuery("#pst_loc").text(location);
       jQuery("#add_shedule_data").hide();
       var modal = document.getElementById("myModal");
       modal.style.display = "block";
       
    });
   var span = document.getElementsByClassName("close")[0];
   var modal = document.getElementById("myModal");
   span.onclick = function() {
    modal.style.display = "none";
}
jQuery(document).on('change','#action_photographer_main',function(){
    var photographer =$(this).val();
    var ajaxurl=  '<?php echo admin_url( 'admin-ajax.php' ); ?>';

    $.ajax({
               url: ajaxurl, // this is the object instantiated in wp_localize_script function
               type: 'POST',
               data:{ 
                action: 'photographer_tasks', // this is the function in your functions.php that will be triggered
                photographer_id: photographer,
                
              },
              dataType:'html',
              success: function( data ){
               
                if(data !='')
                {
                  $("#task_photographer_main").html(data);
                }
               
              }
          });
});
jQuery(".delete_task").click(function(){
var ajaxurl=  '<?php echo admin_url( 'admin-ajax.php' ); ?>';
var photographer=$("#action_photographer_main").val();
var task_id=$("#task_photographer_main").val();
if(photographer == 'choose' )
{
  $("#action_photographer_main").css('border','1px solid red');
  return false;
}
$("#action_photographer_main").css('border','1px solid #ccc');
     $.ajax({
               url: ajaxurl, // this is the object instantiated in wp_localize_script function
               type: 'POST',
               data:{ 
                action: 'delete_task_photographer', // this is the function in your functions.php that will be triggered
                photographer_id: photographer,
                task_id:task_id,
                
              },
              dataType:'html',
              success: function( data ){
              
                if(data == "sucess")
                {
                  alert("delete data sucessfully");
                  location.reload();
                }
                
              }
          });
});

jQuery(".add_shedule_php").click(function(){
var photographer_name=jQuery(this).data('photographer');
var photographer_id=jQuery(this).data('photoid');
var starttime=jQuery(this).data('starttime');
var currentdate=jQuery(this).data('date');
$("#shedule_photographer_tsm").html('<option value='+photographer_id+' selected="selected">'+photographer_name+'</option>');
$("#shedule_date").html('<option value='+currentdate+' selected="selected">'+currentdate+'</option>');
$('#shedule_starttime').html('<option value='+starttime+' selected="selected">'+starttime+'</option>');
    jQuery("#add_shedule_data").show();

jQuery("#shedule_photographer_tsm").trigger('change');
jQuery("#myModal").hide();
});
  jQuery(".close_shedule").click(function(){
jQuery("#add_shedule_data").hide();


});
jQuery('.modal').click(function(e) {


    var container = jQuery(".modal-content");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
       
        jQuery('.modal').hide();
    }
/**************on change**********/
  //if you click on anything except the modal itself or the "open modal" link, close the modal
 /* if (!jQuery(event.target).closest(".modal,.js-open-modal").length) {
    
     alert("hi");
     
    
  }*/
// jQuery(".modal").click(function(e){
//   //console.log(e);
//  // console.log(e.currentTarget.children[0].className);
// if(e.currentTarget.children[0].className == "modal-content")
// {
// console.log('right');
// }else{
//   jQuery("#add_shedule_data").hide();
//    jQuery("#myModal").hide();
// }
// });


// jQuery("body").click(function() {
//    if (jQuery(".modal").is(":visible")) {
//        jQuery(".modal").hide();
//    }
// });
/*jQuery(".modal-content").click(function(e){
  e.preventDefault();
console.log(e.currentTarget.className);

if (e.target.id == "shedule_endtime" || e.target.id == "shedule_starttime"||e.target.id == "shedule_task"||e.target.id == "shedule_location"||e.target.id == "shedule_date"|| e.target.id == "shedule_photographer_tsm") {
      console.log('inside');
    } else {
      console.log('outside');
    }

});*/
  /*jQuery(".modal").click(function(){
   jQuery("#add_shedule_data").hide();
   jQuery("#myModal").hide();

  });*/


});
    </script>
