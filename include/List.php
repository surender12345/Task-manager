
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if(!in_array($user->roles[0], $roles_main))
        {
$args = array( 'post_type' => 'task','posts_per_page' => -1,'post_status' => 'publish', 'paged' => $paged );
}else{
$args = array( 'post_type' => 'task', 'posts_per_page' => -1,'post_status' => 'publish', 'paged' => $paged );
}

global $wpdb;
$table = $wpdb->prefix.'schedule_task';
/**************Back to shedule*******/
if(isset($_POST['back_to_schedule'])):
?>
<style type="text/css">
  #view_task_table{
    margin-top: 60px !important;
  }
.photo_text{
  font-size: 15px;
}
</style>

<table class="table table-bordered text-center cst_border_table" id="view_task_table">
            <thead>
                <tr class="photo_text">
                    <th>Photographer Name</th>
                    <th>Task List</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php 
$photographer = array( 'post_type' => 'photographer', 'posts_per_page' => -1,'post_status' => 'publish', 'paged' => $paged,'orderby'=> 'title', 'order' => 'ASC' );
  $photo = new WP_Query($photographer);
  if($photo->have_posts()) : 
 while($photo->have_posts()) : $photo->the_post();
 global $post;
$id=$post->ID;
?>


<?php 
$tasklist = $wpdb->get_results("select * from $table where photo_gra_ID ='".$id."'");
foreach ($tasklist as $key => $mainvalue) {}
?>
<tr>
<td><?php   the_title(); ?></td>
<td>
<?php if(!empty($tasklist)): 
          foreach ($tasklist as $key => $mainvalue) {?>
             <?php echo get_the_title($mainvalue->task_ID).',';?>
<?php }endif; ?>
</td>
<form action="<?php echo home_url( $wp->request ).'/'; ?>" method="post">
  <input type="hidden" name="photographer_id" value="<?php echo $id;  ?>">
<td><input type="submit" name="tasks_as_photographer" value="view task" class="btn btn-info task-pt" style="background: #d00;"></td>
</form>
</tr>
<?php 
 //the_title(); 
 endwhile;
?>
</tbody>
</table>

<?php 
endif;/**have post**********/
      if($photo->have_posts()) : ?>
                  <?php else:?>
                                  <div class="cst_error" style="text-align: center; padding-top: 37px;">
                                  <h1 class="ff"> Currently have not exist any list</h1>
                                  </div>
                  <?php endif;?>
<?php 
endif;/*********Back to schedule**********/
$recipes = new WP_Query($args);
?>
<?php 
           if($recipes->have_posts()):?>
                <?php while($recipes->have_posts()) : $recipes->the_post();
                 global $post;
                 $id=$post->ID;
               $role=get_post_meta( $id, 'post_role_custom', true );
                  $task_ids[]=$id;
                 ?>
                <?php global $wp;?>
                    <?php endwhile; ?>
          <?php endif; wp_reset_query();?>
  
<?php /****************For  ALL Task Shedule**********************/  
if(!isset($_POST['back_to_schedule'])|| isset($_POST['view_alltask_schedule']) ):
if($recipes->have_posts()) : 
 while($recipes->have_posts()) : $recipes->the_post();
 global $post;
 $id=$post->ID;
 //$task_ids[]=$id;
 endwhile;
endif;

include(plugin_dir_path( __FILE__ ).'all_schedule.php');
endif;

?>

