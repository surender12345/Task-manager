 jQuery(function() {
        jQuery("#front_date_picker").datepicker({
             dateFormat: 'dd-mm-yy',
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
       
       var modal = document.getElementById("myModal");
       modal.style.display = "block";
       
    });
var span = document.getElementsByClassName("close")[0];
   var modal = document.getElementById("myModal");
   span.onclick = function() {
    modal.style.display = "none";
}

    
jQuery('#task_manager_delete_task').click(function(){
    
    jQuery('#all_photographers_tasks').toggle();
    
    
    });

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
})



jQuery(document).click(function(event) {
/**************on change**********/
  //if you click on anything except the modal itself or the "open modal" link, close the modal
  if (!jQuery(event.target).closest("#myModal,.js-open-modal").length) {
    if(jQuery(event.target).hasClass('span_main'))
    {
      
    }else{
     $("body").find("#myModal").hide();
    }
  }
});