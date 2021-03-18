</br>
</br>
<div class="row">
<div class="col-md-12">
	
		<div class="col-md-6">
		<button type="button" class="btn btn-danger add_photographer">ADD Photographer</button>
	</div>
	</div>
</div>
<form action="" method="post" id="photography_submit">
<table class="form-table">
<tbody>
	<tr>
	<th><label for="description">Photo Grapher Name</label></th>
	<td><input type="text" name="user_login" id="user_login" value=" "  class="regular-text"></td>
	</tr>
	<tr class="user-description-wrap">
	<th><label for="description">Biographical Info</label></th>
	<td><textarea name="description" id="description" rows="5" cols="30"></textarea>
	<p class="description">Share a little biographical information to fill out your profile. This may be shown publicly.</p></td>
	</tr>
	<tr class="user-profile-picture">
	<th>Profile Picture</th>
	<td>   <p class="description">
			<input type="text" name="image_url" id="image_url" class="regular-text">
    <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">		</p>
	</td>
    </tr>
    <tr><td><input type="submit" name="submit_photographer" class="btn btn-primary" value="submit"></td></tr>
</tbody>
</table>
</form>
<?php 
wp_enqueue_script('jquery');
// This will enqueue the Media Uploader script
wp_enqueue_media();
?>
<script type="text/javascript">
jQuery(document).ready(function($){
    $("#photography_submit").hide();
	$('.add_photographer').click(function(){
	$("#photography_submit").show();
	});
	$( "#photography_submit" ).submit(function( event ) {
    var v=1;
    var userlogin=$("#user_login").val();
    var text=$("#description").val();
    var image_url=$("#image_url").val();
    if($.trim(userlogin))
    {
    	$("#user_login").css('border','1px solid white');
    }else{
    	$("#user_login").css('border','1px solid red');
    	v=2;
    }
    if($.trim(text))
    {
    	$("#description").css('border','1px solid white');
    }else{
    	$("#description").css('border','1px solid red');
    	v=2;

    }
    if($.trim(image_url))
    {
    	$("#image_url").css('border','1px solid white');
    }else{
    	$("#image_url").css('border','1px solid red');
    	v=2;

    }
    if(v ==2)
    {
    	return false;
    }
   
});


    $('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_url').val(image_url);
        });
    });
});
</script>

<?php if(isset($_POST['submit_photographer']))
{
	$my_post = array(
    'post_type'	=>'photographer',
    'post_title'    => wp_strip_all_tags( $_POST['user_login'] ),
    'post_content'  => $_POST['description'],
    'post_status'   => 'publish',
    'post_author'   => 1,
    'post_category' => array( 8,39 )
     );
// Insert the post into the database
    $post_id= wp_insert_post( $my_post );
    $image_url=$_POST['image_url'];
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);
    $filename = basename($image_url);
    if(wp_mkdir_p($upload_dir['path']))
      $file = $upload_dir['path'] . '/' . $filename;
    else
      $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);
    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    $res2= set_post_thumbnail( $post_id, $attach_id );
}
		