
<style>
#tabs{border-bottom: 1px solid #ccc;
margin: 0;
padding-top: 9px;
padding-bottom: 0;
line-height: inherit;
float: left;width:100%;margin-bottom: 10px;}
#tabs .nav-tab{border:1px solid #ccc;background-color: #ccc;}
#tabs .nav-tab-active{border-bottom: 1px solid #fff;background-color: #fff;margin-bottom: -1px;}
.nav-tab:hover{background-color: #fff !important;}


</style>
<?php $args = array('post_type' => 'location','posts_per_page' => -1,'post_status' => 'publish');
	$locations = new WP_Query($args);?>
<!-- <div class="wrap">
<h1 class="wp-heading-inline">Settings</h1>
<h2 id="tabs" class="nav">
<a id="general" class="nav-tab nav-tab-active" href="#">All Locations</a>
<a id="general" class="nav-tab nav-tab" href="#">Tasks Reset</a>
</h2>
<table class="wp-list-table widefat fixed striped posts">
	<thead>
	  <tr>
		<td>
		<a href="javascript:void(0);"><span>All Locations</span></a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>color code</span></a>
		</td>
		<td>
		<a href="javascript:void(0);" ><span>Action</span></a>
		</td>
	</tr>
	</thead>
	<tbody id="the-list">
	<tr><td class="manage-column column-title column-primary sortable"><select id="location_change">
<?php 	if($locations->have_posts()) : 
 		while($locations->have_posts()) :$locations->the_post();
 			global $post;?>
<option value="<?php echo $post->ID;?>"><?php echo get_the_title($post->ID);?></option>
<?php 
		endwhile;
		endif;?>
	</select></td>
	<td class="manage-column column-title column-primary sortable"><input type="text" name="color_code"></td>
	<td class="manage-column column-title column-primary sortable" ><a href="javascript:void(0);" class="button button-primary">Change color code</a></td></tr>
	</tbody>
</table>
</div> -->



<div class="wrap">
<h1 class="wp-heading-inline">Settings</h1>

<h2 id="tabs" class="nav">
<a id="" class="nav-tab <?php if($_GET['pageTab'] == 'location' || $_GET['pageTab'] == 'Addlocation' || $_GET['pageTab'] == 'Editlocation'){ echo "nav-tab-active"; }else{
	if($_GET['pageTab'] =='' && $_GET['page']=='Setting'){
		echo "nav-tab-active";
	}
} ?>" href="edit.php?post_type=photographer&page=Setting&pageTab=location">All Locations</a>
<a id="" class="nav-tab <?php if($_GET['pageTab'] == 'datesetting' || $_GET['pageTab'] == 'AdddateSetting' || $_GET['pageTab'] == 'EdittimeSetting' || $_GET['pageTab'] == 'ViewtimeSetting'){ echo "nav-tab-active"; } ?>" href="edit.php?post_type=photographer&page=Setting&pageTab=datesetting">Date Setting</a>
<a id="" class="nav-tab <?php if($_GET['pageTab'] == 'photographers' || $_GET['pageTab'] == 'Addphotographer' || $_GET['pageTab'] == 'Editphotographer'){ echo "nav-tab-active"; } ?>" href="edit.php?post_type=photographer&page=Setting&pageTab=photographers">Photographers</a>
<a id="" class="nav-tab <?php if($_GET['pageTab'] == 'task' || $_GET['pageTab'] == 'AddTask' || $_GET['pageTab'] == 'EditTask'){ echo "nav-tab-active"; } ?>" href="edit.php?post_type=photographer&page=Setting&pageTab=task">Task</a>
<a id="" class="nav-tab nav-tab <?php if($_GET['pageTab'] == 'timeblock' || $_GET['pageTab'] == 'Addtimeblock' || $_GET['pageTab'] == 'Edittimeblock'){ echo "nav-tab-active"; } ?>" href="edit.php?post_type=photographer&page=Setting&pageTab=timeblock">Time Block</a>
<a id="" class="nav-tab <?php if($_GET['pageTab'] == 'yearsetting' || $_GET['pageTab'] == 'Addyearsetting' || $_GET['pageTab'] == 'Edityearsetting'){ echo "nav-tab-active"; } ?>" href="edit.php?post_type=photographer&page=Setting&pageTab=yearsetting">Year Setting</a>
</h2>
<?php 
$getdata = $_REQUEST['pageTab'];
$getdatapage = $_REQUEST['page'];
if($getdata == 'location'){
	include('location_setting.php');
}elseif ($getdata == 'Addlocation') {
	# code...
	if(isset($_POST) && !empty($_POST)){
		// Gather post data.
		$color = explode("#",$_POST['color_code']);
		$my_post = array(
		    'post_title'    => $_POST['location'],
		    'post_status'   => 'publish',
		    'post_type'=> 'Location'
		   
		);
		// Insert the post into the database.
		$id = wp_insert_post( $my_post );
		add_post_meta($id, 'color_code', $color[1], true );
		add_post_meta($id, 'color_code_1', $_POST['color_code'], true );
		if($id != ''){
			wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=location' );
		}
	}else{
		include('add_locations.php');
	}	
}elseif ($getdata == 'Editlocation') {
	# code...
	if(isset($_POST) && !empty($_POST)){
	  $my_post = array(
	      'ID'           => $_GET['id'],
	      'post_title'   => $_POST['location'],
	  );
		// Update the post into the database
 		$post_id = wp_update_post( $my_post );
 		$color = explode("#",$_POST['color_code']);
 		update_post_meta( $_GET['id'], 'color_code', $color[1]);
 		update_post_meta( $_GET['id'], 'color_code_1', $_POST['color_code']);
 		if ( is_wp_error( $post_id ) ) {
		     echo $post_id->get_error_message();
		}
		else {
		   wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=location' );
		}
	}else{
		include('edit_location.php');
	}
	
}elseif ($getdata == 'photographers') {
	# code...
	include('setting_photographers.php');
}elseif ($getdata == 'Addphotographer') {
	# code...
	if(isset($_POST) && !empty($_POST)){

		if($_FILES['file']['name'] != ''){
		    $uploadedfile = $_FILES['file'];
		    $upload_overrides = array( 'test_form' => false );
		    $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		}

		$my_post = array(
		    'post_title'    => $_POST['p_name'],
		    'post_status'   => 'publish',
		    'post_type'=> 'Photographer'
		);
		// Insert the post into the database.
		$id = wp_insert_post( $my_post );
		add_post_meta($id, 'email_address', $_POST['email_address'], true );
		$attachment = array(
	        'post_mime_type' => $movefile['type'],
	        'post_title'     => sanitize_file_name( $_FILES['file']['name'] ),
	        'post_content'   => '',
	        'post_status'    => 'inherit'
	    );
	    $attach_id = wp_insert_attachment( $attachment, $movefile['file'], $id );
	    require_once(ABSPATH . 'wp-admin/includes/image.php');
	    $attach_data = wp_generate_attachment_metadata( $attach_id, $movefile['file'] );
	    wp_update_attachment_metadata( $attach_id, $attach_data );
        set_post_thumbnail( $id, $attach_id );
		if($id != ''){
			wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=photographers' );
		}
	}else{
		include('Addphotographer.php');
	}
}elseif ($getdata == 'Editphotographer') {
	# code...
	if(isset($_POST) && !empty($_POST)){
		$my_post = array(
	      'ID'           => $_GET['id'],
	      'post_title'   => $_POST['p_name'],
	    );
		// Update the post into the database
 		$post_id = wp_update_post( $my_post );
 		update_post_meta( $_GET['id'], 'email_address', $_POST['email_address']);
 		if($_FILES['file']['name'] != ''){
		    $uploadedfile = $_FILES['file'];
		    $upload_overrides = array( 'test_form' => false );
		    $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		    $attachment = array(
		        'post_mime_type' => $movefile['type'],
		        'post_title'     => sanitize_file_name( $_FILES['file']['name'] ),
		        'post_content'   => '',
		        'post_status'    => 'inherit'
	    	);
	    	$attach_id = wp_insert_attachment( $attachment, $movefile['file'], $_GET['id'] );
	   		require_once(ABSPATH . 'wp-admin/includes/image.php');
	    	$attach_data = wp_generate_attachment_metadata( $attach_id, $movefile['file'] );
	    	wp_update_attachment_metadata( $attach_id, $attach_data );
        	set_post_thumbnail( $_GET['id'], $attach_id );
        }
        if ( is_wp_error( $post_id ) ) {
		    echo $post_id->get_error_message();
		}
		else {
			wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=photographers' );
		}
	}else{
		include('Editphotographer.php');
	}
	
}elseif ($getdata == 'task') {
	# code...
	include('setting_task.php');
}elseif ($getdata == 'AddTask') {
	# code...
	if(isset($_POST) && !empty($_POST)){

		// Gather post data.
		$my_post = array(
		    'post_title'    => $_POST['task'],
		    'post_status'   => 'publish',
		    'post_type'=> 'task'
		   
		);
		// Insert the post into the database.
		$id = wp_insert_post( $my_post );
		if($id != ''){
			wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=task' );
		}
	}else{
		include('setting_addtask.php');
	}	
}elseif ($getdata == 'EditTask') {
	# code...
	if(isset($_POST) && !empty($_POST)){
	  $my_post = array(
	      'ID'           => $_GET['id'],
	      'post_title'   => $_POST['task'],
	  );
		// Update the post into the database
 		$post_id = wp_update_post( $my_post );
 		if ( is_wp_error( $post_id ) ) {
		     echo $post_id->get_error_message();
		}
		else {
		   wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=task' );
		}
	}else{
		include('setting_edit_task.php');
	}
}elseif ($getdata == 'timeblock') {
	# code...
	include('time_block_setting.php');
}elseif ($getdata == 'Addtimeblock') {
	# code...
	if(isset($_POST) && !empty($_POST)){
		$starttime = $_POST['start_time'];
		$end_time = $_POST['end_time'];
		$time_block = $_POST['time_block'];
		global $wpdb;
		$table = $wpdb->prefix.'schedule_task_time_block';
		$wpdb->insert($table, array('event_start_time' => $_POST['start_time'],'event_end_time' => $_POST['end_time'],'event_time_block' =>$_POST['time_block']));
		$my_id = $wpdb->insert_id;
		if($my_id != ''){
			wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=timeblock' );
		}
		
	}else
	{
		include('add_time_block.php');
	}
	
}elseif ($getdata == 'Edittimeblock') {
	# code...
	if(isset($_POST) && !empty($_POST)){
		$starttime = $_POST['start_time'];
		$end_time = $_POST['end_time'];
		$time_block = $_POST['time_block'];
		global $wpdb;
		$table = $wpdb->prefix.'schedule_task_time_block';
		$where = [ 'id' => $_GET['id'] ]; // NULL value in WHERE clause.
		$updated = $wpdb->update( $table, array('event_start_time' => $_POST['start_time'],'event_end_time' => $_POST['end_time'],'event_time_block' =>$_POST['time_block']), $where );
		if ( false === $updated ) {
		    // There was an error.
		} else {
		    // No error. You can check updated to see how many rows were changed.
		    wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=timeblock' );
		}
	}else
	{
		include('edit_time_block.php');
	}
}
elseif ($getdata == "yearsetting") {
	
	if(isset($_POST) && !empty($_POST)){
		global $wpdb;
		$table = $wpdb->prefix.'schedule_task_year_setting';
		$wpdb->insert($table, array('setting_task_year' => $_POST['setting_start_year'],'festival_start_date' => $_POST['setting_festival_start_date'],'festival_end_date' =>$_POST['setting_festival_end_date'],'festival_start_time' =>$_POST['setting_festival_start_time'],'festival_end_time' =>$_POST['setting_festival_end_time'],'select_task_id' =>$_POST['schdule_task_id'],'schedule_area' =>$_POST['schdule_export_area']));
		$my_id = $wpdb->insert_id;
		if($my_id != ''){
		wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=yearsetting' );
		}
	}else{
		include('year_setting.php');
	}
	
}
elseif ($getdata == "Addyearsetting") {
	if(isset($_POST) && !empty($_POST)){
		global $wpdb;
		$table = $wpdb->prefix.'schedule_task_year_setting';
		$wpdb->insert($table, array('setting_task_year' => $_POST['setting_start_year'],'festival_start_date' => $_POST['setting_festival_start_date'],'festival_end_date' =>$_POST['setting_festival_end_date'],'festival_start_time' =>$_POST['setting_festival_start_time'],'festival_end_time' =>$_POST['setting_festival_end_time'],'select_task_id' =>$_POST['schdule_task_id'],'schedule_area' =>$_POST['schdule_export_area']));
		$my_id = $wpdb->insert_id;
		if($my_id != ''){
		wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=yearsetting' );
		}
	}else{
		include('add_year_setting.php');
	}
	
}elseif ($getdata == "Edityearsetting") {
	if(isset($_POST) && !empty($_POST)){
		global $wpdb;
		$table = $wpdb->prefix.'schedule_task_year_setting';
		$where = [ 'id' => $_GET['id'] ]; // NULL value in WHERE clause.
		$wpdb->update($table, array('setting_task_year' => $_POST['setting_start_year'],'festival_start_date' => $_POST['setting_festival_start_date'],'festival_end_date' =>$_POST['setting_festival_end_date'],'festival_start_time' =>$_POST['setting_festival_start_time'],'festival_end_time' =>$_POST['setting_festival_end_time'],'select_task_id' =>$_POST['schdule_task_id'],'schedule_area' =>$_POST['schdule_export_area']), $where);
		if ( false === $updated ) {
		} else {
		   wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=yearsetting' );
		}
	}else{
		include('edit_year_setting.php');
	}
	
}elseif ($getdata == 'datesetting') {
	# code...

	if(isset($_POST) && !empty($_POST)){
		global $wpdb;
		$table = $wpdb->prefix.'schedule_task_date_setting';
		$wpdb->insert($table, array('setting_start_date' => $_POST['setting_start_date'],'setting_end_date' => $_POST['setting_end_date'],'setting_date_session' =>$_POST['setting_start_session'],'time_block_id' =>$_POST['time_block_id']));
		$my_id = $wpdb->insert_id;
		if($my_id != ''){
			wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=datesetting' );
		}
	}else{
		include('date_setting.php');
	}
	
}elseif ($getdata == 'AdddateSetting') {
	# code...
	if(isset($_POST) && !empty($_POST)){
		global $wpdb;
		$table = $wpdb->prefix.'schedule_task_date_setting';
		$wpdb->insert($table, array('setting_start_date' => $_POST['setting_start_date'],'setting_end_date' => $_POST['setting_end_date'],'time_block_id' =>$_POST['time_block_id']));
		$my_id = $wpdb->insert_id;
		if($my_id != ''){
			wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=datesetting' );
		}
	}else{
		include('add_time_setting.php');
	}
	
}elseif ($getdata == 'EdittimeSetting') {
	# code...
	if(isset($_POST) && !empty($_POST)){
		global $wpdb;
		$table = $wpdb->prefix.'schedule_task_date_setting';
		$where = [ 'id' => $_GET['id'] ]; // NULL value in WHERE clause.
		$wpdb->update($table, array('setting_start_date' => $_POST['setting_start_date'],'setting_end_date' => $_POST['setting_end_date'],'setting_date_session' =>$_POST['setting_start_session'],'time_block_id' =>$_POST['time_block_id']), $where);
		if ( false === $updated ) {
		    // There was an error.
		} else {
		    // No error. You can check updated to see how many rows were changed.
		    wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=datesetting' );
		}
	}else{
		include('edit_time_setting.php');
	}
	
}elseif ($getdata == "ViewtimeSetting") {
	# code...

	if(isset($_POST) && !empty($_POST)){
		global $wpdb;
        $table_start=$wpdb->prefix.'schedule_task_date_session_setting';
        $id = $_GET['id'];
        $results=$wpdb->get_results("SELECT * FROM $table_start where time_setting_id = $id");
        if(isset($results) && !empty($results)){
        	foreach ($_POST['session_data_id'] as $key => $value) {
        		# code...
        		$sdate = $_POST['session_start_date'][$key];
        		$sstime = $_POST['session_start_time'][$key];
        		$setime = $_POST['session_end_time'][$key];
        		$sbtime = $_POST['time_block_id'][$key];
        		$newDate = date("Y-m-d", strtotime($_POST['session_start_date'][$key]));
        		
        		global $wpdb;
        		$where = [ 'id' => $value ]; // NULL value in WHERE clause.
        		$table = $wpdb->prefix.'schedule_task_date_session_setting';
        		$data = array('time_setting_id' => $id,'session_start_date' => $sdate,'session_start_time' => $sstime,'session_end_time' => $setime ,'session_timeblock_id' => $sbtime,'session_s_date' => $newDate);
        		$wpdb->update($table, $data, $where);
        		if ( false === $updated ) {
				    // There was an error.
				    $erro = 0;
				} else {
				    // No error. You can check updated to see how many rows were changed.
				    $erro = 1; 
				}	
        	}
        	if($erro == 1){
        		wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=ViewtimeSetting&id='.$id.'');
        	}
        }else{
        	
        	foreach ($_POST['session_start_date'] as $key => $value) {
        		# code...
        		$sdate = $_POST['session_start_date'][$key];
        		$sstime = $_POST['session_start_time'][$key];
        		$setime = $_POST['session_end_time'][$key];
        		$sbtime = $_POST['time_block_id'][$key];
        		$newDate = date("Y-m-d", strtotime($_POST['session_start_date'][$key]));
        		
        		global $wpdb;
        		$table = $wpdb->prefix.'schedule_task_date_session_setting';
        		$data = array('time_setting_id' => $id,'session_start_date' => $sdate,'session_start_time' => $sstime,'session_end_time' => $setime,'session_timeblock_id' => $sbtime,'session_s_date' => $newDate);
				$wpdb->insert($table,$data );
				$my_id = $wpdb->insert_id;
        	}
        	if($my_id != ''){
				wp_redirect( 'edit.php?post_type=photographer&page=Setting&pageTab=ViewtimeSetting&id='.$id.'');
			}
        }
	}else{
		include('view_date_setting.php');
	}
}elseif ($getdatapage == "Setting") {
	# code...
	include('location_setting.php');
}

?>
</div>
<script type="text/javascript">
	
	jQuery(document).ready(function(){
		jQuery(document).on('click', '.location_delete', function() {
		    // escape here if the confirm is false;
		    if (!confirm('Are you sure?')) return false;

			var ajaxurl=	'<?php echo admin_url( 'admin-ajax.php' ); ?>';
		    var id= jQuery(this).data('id');
			jQuery.ajax({       
				 	url: ajaxurl, // this is the object instantiated in wp_localize_script function
				    type: 'POST',
					data:{ 
					action: 'location_delete',
					id:id // this is the function in your functions.php that will be triggered
					},
					dataType:'html',
					beforeSend: function () {
		           		jQuery(".loader").show();
		        	},
					success: function( data ){
						jQuery(".loader").hide();
						if(data == "sucess")
						{
							alert('delete data Sucessfully');
							location.reload();
						}
					}
		  	});

		});
		jQuery('#chk_all').click(function(){
	        if(this.checked)
	            jQuery(".chkbox").prop("checked", true);
	        else
	            jQuery(".chkbox").prop("checked", false);
	    });

	    jQuery(document).on('click', '.schedule_delete_multiple', function() {
			var ajaxurl=	'<?php echo admin_url( 'admin-ajax.php' ); ?>';
   			var val = [];
		    jQuery(':checkbox:checked').each(function(i){
		        val[i] = jQuery(this).val();
		    });
		    if (val.length === 0) {
			   alert("Please checked records for delete");
			}else{
				if (!confirm('Are you sure?')) return false;
			//console.log('hello');
				jQuery.ajax({       
				 		url: ajaxurl, // this is the object instantiated in wp_localize_script function
				    	type: 'POST',
						data:{ 
								action: 'delete_multiple_location',
								id:val 
							},
							dataType:'html',
							beforeSend: function () {
		           				jQuery(".loader").show();
		        			},
							success: function( data ){
								jQuery(".loader").hide();	    		
								if(data == "sucess")
								{
									alert('delete data Sucessfully');
									jQuery(".chkbox").prop("checked", false);
									location.reload();

								}
							}
		  				});
			}
    	//console.log(val);
		});

	jQuery(document).on('click', '.time_block_delete', function() {
		    // escape here if the confirm is false;
		    if (!confirm('Are you sure?')) return false;

			var ajaxurl=	'<?php echo admin_url( 'admin-ajax.php' ); ?>';
		    var id= jQuery(this).data('id');
			jQuery.ajax({       
				 	url: ajaxurl, // this is the object instantiated in wp_localize_script function
				    type: 'POST',
					data:{ 
					action: 'delete_time_block',
					id:id // this is the function in your functions.php that will be triggered
					},
					dataType:'html',
					beforeSend: function () {
		           		jQuery(".loader").show();
		        	},
					success: function( data ){
						jQuery(".loader").hide();
						if(data == "sucess")
						{
							alert('delete data Sucessfully');
							location.reload();
						}
					}
		  	});

		});


	jQuery(document).on('click', '.timesetting_delete', function() {
		    // escape here if the confirm is false;
		    if (!confirm('Are you sure?')) return false;

			var ajaxurl=	'<?php echo admin_url( 'admin-ajax.php' ); ?>';
		    var id= jQuery(this).data('id');
			jQuery.ajax({       
				 	url: ajaxurl, // this is the object instantiated in wp_localize_script function
				    type: 'POST',
					data:{ 
					action: 'delete_time_setting',
					id:id // this is the function in your functions.php that will be triggered
					},
					dataType:'html',
					beforeSend: function () {
		           		jQuery(".loader").show();
		        	},
					success: function( data ){
						jQuery(".loader").hide();
						if(data == "sucess")
						{
							alert('delete data Sucessfully');
							location.reload();
						}
					}
		  	});

		});
////////////////////////////////////////////////////////////////

                jQuery(document).on('click', '.yearsetting_delete', function() {
		    // escape here if the confirm is false;
		    if (!confirm('Are you sure?')) return false;

			var ajaxurl ='<?php echo admin_url( 'admin-ajax.php' ); ?>';
		    var id = jQuery(this).data('id');
			jQuery.ajax({       
				 	url: ajaxurl, 
				    type: 'POST',
					data:{ 
					action: 'delete_year_setting',
					id:id 
					},
					dataType:'html',
					beforeSend: function () {
		           		jQuery(".loader").show();
		        	},
					success: function( data ){
						jQuery(".loader").hide();
						if(data == "sucess")
						{
							alert('delete data Sucessfully');
							location.reload();
						}
					}
		  	});

		});
             
//////////////////////////////////


	    jQuery(document).on('click', '.timeblock_delete_multiple', function() {
			var ajaxurl=	'<?php echo admin_url( 'admin-ajax.php' ); ?>';
   			var val = [];
		    jQuery(':checkbox:checked').each(function(i){
		        val[i] = jQuery(this).val();
		    });
		    if (val.length === 0) {
			   alert("Please checked records for delete");
			}else{
				if (!confirm('Are you sure?')) return false;
			//console.log('hello');
				jQuery.ajax({       
				 		url: ajaxurl, // this is the object instantiated in wp_localize_script function
				    	type: 'POST',
						data:{ 
								action: 'delete_multiple_time_block',
								id:val 
							},
							dataType:'html',
							beforeSend: function () {
		           				jQuery(".loader").show();
		        			},
							success: function( data ){
								jQuery(".loader").hide();	    		
								if(data == "sucess")
								{
									alert('delete data Sucessfully');
									jQuery(".chkbox").prop("checked", false);
									location.reload();

								}
							}
		  				});
			}
    	//console.log(val);
		});

/////////////////////////////////////////////////////


	    jQuery(document).on('click', '.timesetting_delete_multiple', function() {
			var ajaxurl=	'<?php echo admin_url( 'admin-ajax.php' ); ?>';
   			var val = [];
		    jQuery(':checkbox:checked').each(function(i){
		        val[i] = jQuery(this).val();
		    });
		    if (val.length === 0) {
			   alert("Please checked records for delete");
			}else{
				if (!confirm('Are you sure?')) return false;
			//console.log('hello');
				jQuery.ajax({       
				 		url: ajaxurl, // this is the object instantiated in wp_localize_script function
				    	type: 'POST',
						data:{ 
								action: 'delete_time_setting_multiple',
								id:val 
							},
							dataType:'html',
							beforeSend: function () {
		           				jQuery(".loader").show();
		        			},
							success: function( data ){
								jQuery(".loader").hide();	    		
								if(data == "sucess")
								{
									alert('delete data Sucessfully');
									jQuery(".chkbox").prop("checked", false);
									location.reload();

								}
							}
		  				});
			}
    	//console.log(val);
		});


	});

</script>
