<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
    type="text/javascript"></script>

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if(!in_array($user->roles[0], $roles_main))
        {
$args = array( 'post_type' => 'task','posts_per_page' => -1,'post_status' => 'publish', 'paged' => $paged );
}else{
$args = array( 'post_type' => 'task', 'posts_per_page' => -1,'post_status' => 'publish', 'paged' => $paged );
}

global $wpdb;
$table = $wpdb->prefix.'schedule_task';

?>
<div class="row align-items-center">
<div class="col-sm-12 send_mail_btn"><a href="javascript:void(0);" onclick="return confirm('Are you sure?')" class="btn btn-danger send_mail_multiple tm-main-buttons"> Send Mail</a></div>
</div>
<table class="table table-bordered text-center cst_mail_table" id="view_task_table">
            <thead>
                <tr class="photo_text">
                    <th>Photographer Name</th>
                    <th>Task List</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
            <?php 
				$photographer = array( 'post_type' => 'photographer', 'posts_per_page' => -1,'post_status' => 'publish', 'paged' => $paged,'orderby'=> 'title', 'order' => 'ASC' );
				  $photo = new WP_Query($photographer);
				  if($photo->have_posts()) : 
				 while($photo->have_posts()) : $photo->the_post();
				 global $post;
				$id = $post->ID;
				//echo $id; 
			?>


<?php 
$tasklist =$wpdb->get_results("select * from $table where photo_gra_ID ='".$id."'");
//print_r($tasklist);
?>
<tr>
<td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $id; ?>"/><?php   the_title(); ?></td>
<td>
<?php if(!empty($tasklist)): 
          foreach ($tasklist as $key => $mainvalue) {
                      //print_r($mainvalue);
          	?>
             <?php echo get_the_title($mainvalue->task_ID).',';?>
<?php }endif; ?>
</td>
</tr>
<?php 
 //the_title(); 
 endwhile;
?>
</tbody>
</table>

<?php 
endif; ?>

<script>
	$(document).on('click', '.send_mail_multiple', function() {
	var ajaxurl= '<?php echo admin_url( 'admin-ajax.php' ); ?>';
   	var val = [];
    $(':checkbox:checked').each(function(i){
        val[i] = $(this).val();
    });
    //alert(val);
    if (val.length === 0) {
	   alert("Please checked photographer send schedule");
	}else{
		//console.log('hello');
		$.ajax({       
		 		url: ajaxurl, // this is the object instantiated in wp_localize_script function
		    	type: 'POST',
				data:{ 
						action: 'send_mail_multiple',
						id:val 
					},
					dataType:'html',
					beforeSend: function () {
           				$(".loader").show();
        			},
					success: function( data ){
						$(".loader").hide();	    		
						if(data == "sucess")
						{
							alert('Schedule Send Sucessfully');
							$(".chkbox").prop("checked", false);
							location.reload();

						}
					}
  				});
	}
    //console.log(val);

});
</script>