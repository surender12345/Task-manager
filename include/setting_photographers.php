<?php 
	$args = array('post_type' => 'Photographer','posts_per_page' => -1,'post_status' => 'publish','orderby'=> 'title', 'order' => 'ASC' );
	$locations = new WP_Query($args);
?>
<div class="buttonAriea" style="margin-bottom: 10px;">
	<a id="general" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=Addphotographer">Add Photographer</a> 
	<a href="javascript:void(0);" class="button btn-danger schedule_delete_multiple"> Multiple Delete</a>
</div>
<table class="wp-list-table widefat fixed striped posts">
	<thead>
	  <tr>
		<td>
		<a href="javascript:void(0);"> <input id="chk_all" name="chk_all" type="checkbox"  /> <span>Name</span></a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>No Tasks Set</span></a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>Total Time On Task</span></a>
		</td>
		<td>
		<a href="javascript:void(0);" ><span>Action</span></a>
		</td>
	</tr>
	</thead>
	    <tbody id="the-list">
	    <?php 	
	    	if($locations->have_posts()) : 
		 		while($locations->have_posts()) :$locations->the_post();
		 			global $post;
		 			global $wpdb;
					$table = $wpdb->prefix.'schedule_task';
					$query = "select COUNT(photo_gra_ID) as taskcount from $table where photo_gra_ID = $post->ID";
					$allresults = $wpdb->get_results($query);
		?>
					<tr>
						<td class="manage-column column-title column-primary sortable"><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $post->ID;?>"/><?php echo get_the_title($post->ID);?></td>
						<td class="manage-column column-title column-primary sortable"><?php echo $allresults[0]->taskcount; ?></td>
						<td class="manage-column column-title column-primary sortable">
							<?php $query1 = "select * from $table where photo_gra_ID = $post->ID";
								  $allresults1 = $wpdb->get_results($query1);
								  $sumdata = array();
								  foreach ($allresults1 as $key => $value) {
								  	# code...
									$var1 = $value->start_time;
									$var2 = $value->end_time;
									$to_time = strtotime($var1);
									$from_time = strtotime($var2);
									$sumdata[] =  round(abs($to_time - $from_time) / 60,2);
								  }
								  if(isset($sumdata) && !empty($sumdata)){
								  	echo array_sum($sumdata)." minute";
								  }
								  
							?>
						</td>
						<td class="manage-column column-title column-primary sortable" ><a href="edit.php?post_type=photographer&page=Setting&pageTab=Editphotographer&id=<?php echo $post->ID; ?>" class="button button-primary">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" data-id="<?php echo $post->ID;?>" class="button btn-danger location_delete"> Delete</a>&nbsp;</td>
				    </tr>
		<?php 
				endwhile;
			endif;
		?>
	   </tbody>
</table>