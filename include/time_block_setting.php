
<div class="buttonAriea" style="margin-bottom: 10px;">
	<a id="general" class="button" href="edit.php?post_type=photographer&page=Setting&pageTab=Addtimeblock">Add Time Block</a> 
	<a href="javascript:void(0);" class="button btn-danger timeblock_delete_multiple"> Multiple Delete</a>
</div>
<table class="wp-list-table widefat fixed striped posts">
	<thead>
	  <tr>
	  	<td>
		<a href="javascript:void(0);"> <input id="chk_all" name="chk_all" type="checkbox"  /> <span>Id</span></a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>Start Time</span></a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>End Time</span></a>
		</td>
		<td>
		<a href="javascript:void(0);"><span>Time Block</span></a>
		</td>
		<td>
		<a href="javascript:void(0);" ><span>Action</span></a>
		</td>
	</tr>
	</thead>
	    <tbody id="the-list">
	    	<?php 
				//$eventdatA  = get_option( 'task_manager_event_start_time' );
				global $wpdb;
				$table_start=$wpdb->prefix.'schedule_task_time_block';
				$results=$wpdb->get_results("SELECT * FROM $table_start");
				$i = 1;
				if(isset($results) && !empty($results)){ 
					foreach ($results as $key => $value) {
						# code...
				?>
					<tr>
						<td class="manage-column column-title column-primary sortable"><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $value->id;?>"/><?php echo $i; ?></td>
						<td class="manage-column column-title column-primary sortable"><?php echo $value->event_start_time; ?></td>
						<td class="manage-column column-title column-primary sortable"><?php echo $value->event_end_time; ?></td>
						<td class="manage-column column-title column-primary sortable"><?php echo $value->event_time_block; ?></td>
						<td class="manage-column column-title column-primary sortable" ><a href="edit.php?post_type=photographer&page=Setting&pageTab=Edittimeblock&id=<?php echo $value->id; ?>" class="button button-primary">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" data-id="<?php echo $value->id;?>" class="button button-danger time_block_delete"> Delete</a>&nbsp;</td>
				    </tr> 
				<?php $i++; } }else{ ?>
					<tr>
						<td class="manage-column column-title column-primary sortable"><?php echo "No Data Found"; ?></td>
						<td class="manage-column column-title column-primary sortable"></td>
						<td class="manage-column column-title column-primary sortable"></td>
						<td class="manage-column column-title column-primary sortable" ></td>
				    </tr>
				<?php } ?>
					
			
	   </tbody>
</table>