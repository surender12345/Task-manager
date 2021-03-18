<?php 
/* Rest api function start */

function login($request){
                  $creds = array();
                  $creds['user_login'] = $request["username"];
                  $creds['user_password'] =  $request["password"];
                  $creds['remember'] = true;
                  $user = wp_signon( $creds, false );

                  if ( is_wp_error($user) )
                    echo $user->get_error_message();

                  return $user;
}

function allphotographer($request){
                 global $wpdb;
                 $table = $wpdb->prefix.'schedule_task';
                 $args = array(  'post_type' => 'photographer','post_status'=>'publish','orderby'  => 'ID', 'orderby'=> 'title','order'=>'asc','posts_per_page' => -1);
               
                $datas = get_posts( $args );
                $allresults = array();
                $taskvalue = array();
                foreach ($datas as $key => $data) {
                      $allresults[$key]['photographer']['id'] = $data->ID;
                      $allresults[$key]['photographer']['name'] = get_the_title($data->ID);
                      $allresults[$key]['photographer']['email'] =  get_post_meta($data->ID,'email_address',true);
                      $allresults[$key]['photographer']['phone'] =  get_post_meta($data->ID,'phone_number',true);
                      $task = $wpdb->get_results("SELECT * FROM $table WHERE photo_gra_ID = $data->ID ");
                      foreach ($task as $keys => $value) {
                        $taskvalue[$keys]['id'] = $value->id;
                        $taskvalue[$keys]['name'] = get_the_title($value->photo_gra_ID);
                        $taskvalue[$keys]['date'] = $value->date;
                        $taskvalue[$keys]['start_time'] = $value->start_time;
                        $taskvalue[$keys]['end_time'] = $value->end_time;
                        $taskvalue[$keys]['task'] = get_the_title($value->task_ID);
                        $taskvalue[$keys]['location'] = get_the_title($value->location_ID);
                        $taskvalue[$keys]['notes'] = $value->task_notes;
                      }

                      $allresults[$key]['photographer']['task'] = $taskvalue;
                  }
                  
                  
                  
                 return $allresults;
}

function singlephotographer($request){
                 global $wpdb;
                 $id = $request['id'];
                 $table = $wpdb->prefix.'schedule_task';
                 $allresults = array();
                 $taskvalue = array();
                 $allresult = $wpdb->get_results("SELECT * FROM $table WHERE photo_gra_ID = $id ");
               
                foreach ($allresult as $key => $value) {
                      $allresults['photographer']['id'] = $value->photo_gra_ID;
                      $allresults['photographer']['name'] = get_the_title($value->photo_gra_ID);
                      $allresults['photographer']['email'] =  get_post_meta($value->photo_gra_ID,'email_address',true);
                      $allresults['photographer']['phone'] =  get_post_meta($value->photo_gra_ID,'phone_number',true);
                
                        $taskvalue['id'] = $value->id;
                        $taskvalue['name'] = get_the_title($value->photo_gra_ID);
                        $taskvalue['date'] = $value->date;
                        $taskvalue['start_time'] = $value->start_time;
                        $taskvalue['end_time'] = $value->end_time;
                        $taskvalue['task'] = get_the_title($value->task_ID);
                        $taskvalue['location'] = get_the_title($value->location_ID);
                        $taskvalue['notes'] = $value->task_notes;
               
                $allresults['photographer']['task'][] =  $taskvalue;
                }
                 return $allresults;
}
/* Rest api function End */
function selectTimesOfDay() {
                  $open_time = strtotime("9:00");
                  $close_time = strtotime("22:00");
                  $now = time();
                  $output = "";
                   $output .= "<option>choose...</option>";
                  for( $i=$open_time; $i<$close_time; $i+=600) {
                      /*if( $i < $now) continue;*/
                      $output .= "<option>".date("H:i",$i)."</option>";
                  }
                  return $output;
              }


function selectTimes() {
                  $open_time = strtotime("9:00");
                  $close_time = strtotime("22:00");
                  $now = time();
                  for( $i=$open_time; $i<$close_time; $i+=600) {
                      /*if( $i < $now) continue;*/
                      $output[]= date("H:i",$i);
                  }
                  return $output;
              }



function selectTimesOfDay_end()
{
                  $open_time = strtotime("9:10");
                  $close_time = strtotime("22:00");
                  $now = time();
                  $output = "";
                  $output .= "<option>choose...</option>";
                  for( $i=$open_time; $i<$close_time; $i+=600) {
                     
                      $output .= "<option>".date("H:i",$i)."</option>";
                  }
                  return $output;
}
function get_the_time_start( $starttime, $endtime) {
                  $open_time = strtotime($starttime);
                  $close_time = strtotime($endtime);
                  $now = time();
                  $output = "";
                  for( $i=$open_time; $i<=$close_time; $i+=600) {
                     
                      $clear[]=date("H:i",$i);
                  }
                  return $clear;
              }
function get_the_time_end( $starttime, $endtime) {
                  $open_time = strtotime("9:00");
                  $close_time = strtotime($endtime);
                  $now = time();
                  $output = "";
                  for( $i=$open_time; $i<=$close_time; $i+=600) {
                      /*if( $i < $now) continue;*/
                     // $output .= "<option>".date("H:i",$i)."</option>";
                      $clear[]=date("H:i",$i);
                  }
                  return $clear;
              }
function inserttime()
{
                  global $wpdb;
                  $table = $wpdb->prefix.'schedule_task_starttime';
                  $open_time = strtotime("9:00");
                  $close_time = strtotime("22:00");
                  $now = time();
                  $output = "";
                  for( $i=$open_time; $i<$close_time; $i+=600) {
                      
                      $wpdb->insert($table, array(
                      'start_time' => date("H:i",$i),
                        ));
                  }
}
function insertendtime()
{
                  global $wpdb;
                  $table = $wpdb->prefix.'schedule_task_endtime';
                  $open_time = strtotime("9:00");
                  $close_time = strtotime("22:00");
                  $now = time();
                  $output = "";
                  for( $i=$open_time; $i<$close_time; $i+=600) {
                      
                      $wpdb->insert($table, array(
                      'end_time' => date("H:i",$i),
                        ));
                  }
}   

function show_post_dropdown_option($post_type,$userrole){
   
  $args = array(  'post_type' => $post_type,'post_status'=>'publish','orderby'    => 'ID', 'orderby'=> 'title','order'=>'asc','posts_per_page' => -1);
 
  $latest_posts = get_posts( $args );
  $option="<option value=''></option>";
  
  foreach($latest_posts as $latest){

   $role_custom=  get_post_meta($latest->ID,'post_role_custom',true);
   if($role_custom == $userrole):
     
  $option .="<option value='".$latest->ID."'>".$latest->post_title."</option>";
 
   elseif($userrole == "administrator" || $userrole == "adminrole"):
    
  $option .="<option value='".$latest->ID."' >".$latest->post_title."</option>";

endif;
  }
  return $option;
}

function show_post_dropdown_option_filter($post_type,$postid)
{

    $args = array('post_type' => $post_type,'post_status'=>'publish','orderby' => 'ID', 'orderby'=> 'title','order'=>'asc','posts_per_page' => -1);
 
  $latest_posts = get_posts($args);
  $option="<option></option>";
  
  foreach($latest_posts as $latest){

 
     if($latest->ID == $postid):
     
     $option .="<option value='".$latest->ID."' selected>".$latest->post_title."</option>";
     else:

     $option .="<option value='".$latest->ID."' >".$latest->post_title."</option>";
     endif;
  }
  return $option;
}
function show_post_dropdown_option_filter_frontend($post_type,$postid)
{

    $args = array('post_type' => $post_type,'post_status'=>'publish','orderby' => 'ID', 'orderby'=> 'title','order'=>'asc','posts_per_page' => -1);
 
  $latest_posts = get_posts($args);
  foreach($latest_posts as $latest){

 
     if($latest->ID == $postid):
     
     $option .="<option value='".$latest->ID."' selected>".$latest->post_title."</option>";
     else:

     $option .="<option value='".$latest->ID."' >".$latest->post_title."</option>";
     endif;
  }
  return $option;
}


function selectTimesOfDay_filter_frontend($start_time) {
                  $open_time = strtotime("9:00");
                  $close_time = strtotime("22:00");
                  $now = time();
                  $output = "";
                  for( $i=$open_time; $i<$close_time; $i+=600) {
                      /*if( $i < $now) continue;*/
                      if(date("H:i",$i) == $start_time):
                      $output .= "<option selected>".date("H:i",$i)."</option>";
                    else:
                      $output .= "<option>".date("H:i",$i)."</option>";
                    endif;
                  }
                  return $output;
              }




function selectTimesOfDay_filter($start_time) {
                  $open_time = strtotime("9:00");
                  $close_time = strtotime("22:00");
                  $now = time();
                  $output = "";

                  for( $i=$open_time; $i<$close_time; $i+=600) {
                      /*if( $i < $now) continue;*/
                      if(date("H:i",$i) == $start_time):
                      $output .= "<option selected>".date("H:i",$i)."</option>";
                    else:
                      $output .= "<option>".date("H:i",$i)."</option>";
                    endif;
                  }
                  return $output;
              }


function selectTimesOfDay_end_filter_frontend($enddate)
{
                  $open_time = strtotime("9:10");
                  $close_time = strtotime("22:00");
                  $now = time();
                  $output = "";
                  for( $i=$open_time; $i<$close_time; $i+=600) {
                     
                       if(date("H:i",$i) == $enddate):
                      $output .= "<option selected>".date("H:i",$i)."</option>";
                    else:
                      $output .= "<option>".date("H:i",$i)."</option>";
                    endif;
                  }
                  return $output;
}


function selectTimesOfDay_end_filter($enddate)
{
                  $open_time = strtotime("9:10");
                  $close_time = strtotime("22:00");
                  $now = time();
                  $output = "";
                  $output .= "<option>choose.....</option>";
                  for( $i=$open_time; $i<$close_time; $i+=600) {
                     
                       if(date("H:i",$i) == $enddate):
                      $output .= "<option selected>".date("H:i",$i)."</option>";
                    else:
                      $output .= "<option>".date("H:i",$i)."</option>";
                    endif;
                  }
                  return $output;
}


function show_post_dropdown_option_action($post_type){
   
  $args = array(  'post_type' => $post_type,'post_status'=>'publish','orderby'    => 'ID', 'orderby'=> 'title','order'=>'asc','posts_per_page' => -1);
   
  $option="<option value='choose'>Choose</option>";
  $latest_posts = get_posts( $args );
  foreach($latest_posts as $latest){
  $option .="<option value='".$latest->ID."'>".$latest->post_title."</option>";
  }
  return $option;
}



function show_post_dropdown_option_action_popup($post_type){
   
  $args = array(  'post_type' => $post_type,'post_status'=>'publish','orderby'    => 'ID', 'orderby'=> 'title','order'=>'asc','posts_per_page' => -1);
   $option='';
  $latest_posts = get_posts( $args );
  foreach($latest_posts as $latest){
  $option .="<option value='".$latest->ID."'>".$latest->post_title."</option>";
  }
  return $option;
}

function show_post_dropdown_option_action_match_id($post_type,$id){
   
  $args = array(  'post_type' => $post_type,'post_status'=>'publish','orderby'    => 'ID', 'orderby'=> 'title','order'=>'asc','posts_per_page' => -1);
   
  $option="<option value='choose'>Choose</option>";
  $latest_posts = get_posts( $args );
  foreach($latest_posts as $latest){
    if($latest->ID == $id)
    {
     $option .="<option value='".$latest->ID."' selected>".$latest->post_title."</option>"; 
    }else{
      $option .="<option value='".$latest->ID."'>".$latest->post_title."</option>";
      }
  }
  return $option;
}


function getalldate(){
  global $wpdb;
  $table_start=$wpdb->prefix.'schedule_task_date_session_setting';
  $results=$wpdb->get_results("SELECT * FROM $table_start");
  if(isset($results) && !empty($results)){
    foreach ($results as $key => $value) {
      # code...
      $date[] = $value->session_start_date;
    }
    $out = array_values($date);
    return json_encode($out);
    //return $date;
  }


}


function getalldate1(){
  global $wpdb;
  $table_start=$wpdb->prefix.'schedule_task_date_session_setting';
  $results=$wpdb->get_results("SELECT * FROM $table_start ORDER BY session_s_date ASC limit 1");
  if(isset($results) && !empty($results)){
    foreach ($results as $key => $value) {
      # code...
      $date = $value->session_start_date;
    }
    //$out = array_values($date);
    return json_encode($date);
    //return $date;
  }


}


?>