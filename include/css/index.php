<?php
/*
Plugin Name: Task Manager
description: This plugin is used or maintain the result
Version: 1.0.0
License: GPL-2.0+
*/


class TaskMangae {
  
    public function __construct()
    {
      add_action('admin_menu', array($this,'Taskmangemenu'));
      add_action( 'init', array($this,'custom_post_type'), 0 );
      add_action('init',array($this,'task_post'),2);
      add_action('init',array($this,'location_post'),1);
      add_action('init',array($this,'add_custom_roles'),1);
      add_action('add_meta_boxes', array($this,'wpse_add_custom_meta_box_2') );
      add_action('save_post',array($this,'save_task_role'));
      add_action('init',array($this,'include_file_sch'));
      add_action('init', array($this, 'schedule_data_table_install' ));
      add_action('init', array($this, 'schedule_task_starttime' ));
      add_action('wp_ajax_Timemange', array($this,'Timemange'));
      add_action('wp_ajax_nopriv_Timemange',array($this,'Timemange'));
      add_action('wp_ajax_Timemang_end', array($this,'Timemang_end'));
      add_action('wp_ajax_nopriv_Timemang_end',array($this,'Timemang_end'));
      add_action('wp_ajax_update_record', array($this,'update_record'));
      add_action('wp_ajax_nopriv_update_record',array($this,'update_record'));
      add_action('wp_ajax_delete_record', array($this,'delete_record'));
      add_action('wp_ajax_nopriv_delete_record',array($this,'delete_record'));
      add_action('wp_ajax_Starttime_manage', array($this,'Starttime_manage'));
      add_action('wp_ajax_nopriv_Starttime_manage',array($this,'Starttime_manage'));
      add_shortcode( 'taskmanager', array($this, 'TaskManagerdata' ));  
      add_action('wp_login', array($this,'Redirect_control_page'),10,2);
      add_shortcode( 'add_task', array($this, 'AddTask'));
      add_action('init', array($this, 'schedule_popup' ));
      add_action( 'admin_post_print.csv', array($this, 'print_csv' ));
      add_action('admin_enqueue_scripts', array($this, 'My_custom_script' ));
      add_action( 'wp_ajax_photographer_tasks', array($this,'photographer_tasks'));
      add_action( 'wp_ajax_nopriv_photographer_tasks',array($this,'photographer_tasks'));
      add_action( 'wp_ajax_delete_task_photographer', array($this,'delete_task_photographer'));
      add_action( 'wp_ajax_nopriv_delete_task_photographer',array($this,'delete_task_photographer'));
      add_action('wp_enqueue_scripts',array($this,'add_my_stylesheet'));
      add_action( 'wp_ajax_Timemange_popup', array($this,'Timemange_popup'));
      add_action( 'wp_ajax_nopriv_Timemange_popup',array($this,'Timemange_popup'));
      add_action( 'wp_ajax_Timemang_end_popup', array($this,'Timemang_end_popup'));
      add_action( 'wp_ajax_nopriv_Timemang_end_popup',array($this,'Timemang_end_popup'));
      add_action( 'wp_ajax_Export_by_photographer', array($this,'Export_by_photographer'));
      add_action( 'wp_ajax_nopriv_Export_by_photographer',array($this,'Export_by_photographer'));
      add_action( 'wp_ajax_front_page_navigation', array($this,'front_page_navigation'));
      add_action( 'wp_ajax_nopriv_front_page_navigation',array($this,'front_page_navigation'));
      add_action( 'wp_ajax_back_page_navigation', array($this,'back_page_navigation'));
      add_action( 'wp_ajax_nopriv_back_page_navigation',array($this,'back_page_navigation')); 
      add_action('init',array($this,'backend_redirect'));
      add_action( 'wp_ajax_save_new_schedule', array($this,'save_new_schedule'));
      add_action( 'wp_ajax_nopriv_save_new_schedule',array($this,'save_new_schedule'));
      add_action( 'wp_ajax_starttime_manage_fontend', array($this,'starttime_manage_fontend'));
      add_action( 'wp_ajax_nopriv_starttime_manage_fontend',array($this,'starttime_manage_fontend'));
    }


     function save_new_schedule()
    {
      
      if(isset($_POST['photographer_id'])):
      $time= time();
      global $wpdb;
      $table = $wpdb->prefix.'schedule_task';
      $wpdb->insert($table, array('photo_gra_ID' => $_POST['photographer_id'],
                      'date' => $_POST['currentdate'],
                      'start_time' => $_POST['starttime'], 
                      'end_time'=>$_POST['endtime'],
                      'task_ID'=>$_POST['task'],
                      'location_ID'=>$_POST['location'],
                      'time'=>date("Y-m-d H:i:s") 
                        ));
      $my_id = $wpdb->insert_id;
      if($my_id):
        echo "true";
      endif;
      endif;
      die();
    }
function starttime_manage_fontend()
{
  if(isset($_POST['starttime'])):

  $cst_strttime=filter_var($_POST['starttime'], FILTER_SANITIZE_STRING);
  $firsttime=trim($cst_strttime);
  if($firsttime === "choose")
  {

  $oup_put =" <option value='choose'>choose</option>";
  echo $oup_put;
    die();
  }
 $starttime_increase= date("H:i", strtotime('+10 minutes', strtotime($_POST['starttime'])));
global $wpdb;
 $start_time_p=array();
  $table = $wpdb->prefix.'schedule_task';
  $allresults = $wpdb->get_results("select * from $table where photo_gra_ID ='".$_POST['photographer_id']."' AND  date='".$_POST['currentdate']."'");
foreach ($allresults as $key => $value) {
 $start_time_p[]=$value->start_time;
 if($_POST['starttime'] < $value->start_time):
 $combine_time[]=$value->start_time;
 $combine_time[]=$value->end_time;
endif;
}
sort($start_time_p);
$endtime_manage_get= max($start_time_p);
$endtime_manage= date("H:i", strtotime('-10 minutes', strtotime($endtime_manage_get)));
if($_POST['starttime']>$endtime_manage)
{
 $endtime=get_the_time_start($starttime_increase, "22:00");

}elseif($_POST['starttime'] ==  $endtime_manage){

  $endtime=array("equal"=>"not allowed");
}else{
   $endtime=get_the_time_start($starttime_increase,$endtime_manage);
}
if (in_array($starttime_increase, $start_time_p))
{
$endtime=array("equal"=>"not allowed");  
}
$oup_put ="";
if(!empty($endtime)):
  foreach($endtime as $key =>$value_endtime)
{
  if(!empty($combine_time)):
 if(!in_array($value_endtime, $combine_time) && $value_endtime < min($combine_time)):
   $oup_put .=" <option value='".$value_endtime."'>  ".$value_endtime ."</option>";
    endif;
    else:
     $oup_put .=" <option value='".$value_endtime."'>  ".$value_endtime ."</option>";
    endif;
}
endif;
echo $oup_put;
endif;
die();
}
function backend_redirect(){

    if(is_user_logged_in()):
      $current_user = wp_get_current_user();
          if( is_admin() && !defined('DOING_AJAX') && ($current_user->roles[0] != 'administrator') ){ ?>
          <script>
          window.location.href="<?php echo  home_url( $wp->request ).'/control/';   ?>";
          </script> 
          <?php  exit; }
    endif;
}

       function back_page_navigation()
      {
      if(isset($_POST['current_index'])):
        $current_index =$_POST['current_index'];
        if($current_index <$_POST['array_count']-1):
          $current_index=$current_index-1;
          update_option('current_time',$current_index);
          echo "true";
        else:
          update_option('current_time','0');
          echo "true";
        endif;
      endif;  
      die();

    }

    function front_page_navigation()
    {

      if(isset($_POST['current_index'])):

        $current_index =$_POST['current_index'];

        if($current_index <$_POST['array_count']-1):
          $current_index=$current_index+1;
          update_option('current_time',$current_index);
          echo "true";

        else:

          update_option('current_time','0');
          echo "true";
        endif;



      endif;  
      die();
    }

      function Export_by_photographer()
      {

       $export_data_get=get_option('export_data_get');
       if(isset($_POST['photographer_name']) && ($_POST['export_date'] == 'false')):

            if($_POST['photographer'] == "select_photographer"):

                update_option('photographer_csv_name','Complete Export');          
            else:
            update_option('photographer_csv_name',$_POST['photographer_name']);
          endif;
       else:

          if($_POST['photographer'] == "select_photographer"):

              update_option('photographer_csv_name','Date Export');          
            else:
            update_option('photographer_csv_name',$_POST['photographer_name']);
          endif;


         
       endif;
          if(isset($_POST['photographer'])):
              if($_POST['photographer'] == "select_photographer"):
                foreach ($export_data_get as $key => $value) {

                    $csv_download[$value->photo_gra_ID][]=array('photographer'=>get_the_title($value->photo_gra_ID),'date'=>$value->date,'start_time'=>$value->start_time,'end_time'=>$value->end_time,'task'=>get_the_title($value->task_ID),'location'=>get_the_title($value->location_ID));
                          } 

                    foreach ($csv_download as $key => $value) {
                  $name=get_the_title($key);
                  $new_array_photographer_csv[$name][]=$value;
                }
                  ksort($new_array_photographer_csv);
                foreach($new_array_photographer_csv as $key =>$value)
                {
                  foreach ($value as $newkey => $value_array) {
                  $post = get_page_by_title( $key, OBJECT, 'photographer' );
                  $csv_download_new[$post->ID] =$value_array;
                  }
                }
                    /**************sorting end*********/
                    foreach ($csv_download_new as $key => $csvdata) {
                  
                      foreach ($csvdata as $key => $myvalue) {

                          $csv_maindata[]=$myvalue;
                      }
                    }

                    update_option('csv_download',$csv_maindata );
                    echo "allexport";

              else:
                foreach ($export_data_get as $key => $value) {

                  if($value->photo_gra_ID == $_POST['photographer']):
                  
                    $csv_download[$value->photo_gra_ID][]=array('photographer'=>get_the_title($value->photo_gra_ID),'date'=>$value->date,'start_time'=>$value->start_time,'end_time'=>$value->end_time,'task'=>get_the_title($value->task_ID),'location'=>get_the_title($value->location_ID));
                  endif;

                  }           
                    foreach ($csv_download as $key => $value) {
                  $name=get_the_title($key);
                  $new_array_photographer_csv[$name][]=$value;
                }
                  ksort($new_array_photographer_csv);
                foreach($new_array_photographer_csv as $key =>$value)
                {
                  foreach ($value as $newkey => $value_array) {
                  $post = get_page_by_title( $key, OBJECT, 'photographer' );
                  $csv_download_new[$post->ID] =$value_array;
                  }
                }
                    /**************sorting end*********/
                    foreach ($csv_download_new as $key => $csvdata) {
                  
                      foreach ($csvdata as $key => $myvalue) {

                          $csv_maindata[]=$myvalue;
                      }
                    }
                    update_option('csv_download',$csv_maindata );
                    echo "true";
              endif;
          endif;

       die();
      }




      function Timemange_popup()
  {
      if(isset($_POST['photographer_id']) && !empty($_POST['photographer_id'])):
        global $wpdb;
      $table = $wpdb->prefix.'schedule_task';
      $allresults = $wpdb->get_results("select * from $table where photo_gra_ID ='".$_POST['photographer_id']."' AND  date='".$_POST['currentdate']."'");
      $table_start=$wpdb->prefix.'schedule_task_starttime';
      
      $startdate = $wpdb->get_results("SELECT * FROM $table_start");
                  $date_option ="";
                  $star_array=array();
                  $end_array= array();
                  $final_arry = array();
                foreach ($allresults as $key => $value){
                 $mytime=$value->start_time;
                 $star_array[]= $mytime;
                 $end_array[]=$value->end_time;
                  $final_arry[]=get_the_time_start($mytime,$value->end_time);
             }
           foreach ($final_arry as $key => $value) {

                foreach($value as $valllll){
                  $myarry[] =$valllll;
                } }
               $oup_put="";
               $oup_put .= "<option value='choose' selected>choose.....</option>";
             foreach ($startdate as $key => $value1) {
                 $i=strtotime($value1->start_time);

                        $output = "";
                        if($_POST['start_time'] == date("H:i",$i)):

                          $oup_put .=" <option value='".date("H:i",$i)."' selected>  ".date("H:i",$i) ."</option>";
                        endif;

                       if( in_array(date("H:i",$i),$myarry) )
                      {
                        
                      }else{
                      
                      $oup_put .=" <option value='".date("H:i",$i)."'>  ".date("H:i",$i) ."</option>";
                      }
          }
               echo  $oup_put;       
  endif;
  die();
}


function Timemang_end_popup()
{
      if(isset($_POST['starttime'])):

  $cst_strttime=filter_var($_POST['starttime'], FILTER_SANITIZE_STRING);
  $firsttime=trim($cst_strttime);
  if($firsttime === "choose")
  {

  $oup_put =" <option value='choose'>choose</option>";
  echo $oup_put;
    die();
  }
 $starttime_increase= date("H:i", strtotime('+10 minutes', strtotime($_POST['starttime'])));
global $wpdb;
 $start_time_p=array();
  $table = $wpdb->prefix.'schedule_task';
  $allresults = $wpdb->get_results("select * from $table where photo_gra_ID ='".$_POST['photographer_id']."' AND  date='".$_POST['currentdate']."'");

foreach ($allresults as $key => $value) {
 $start_time_p[]=$value->start_time;
 $combine_time[]=$value->start_time;
 $combine_time[]=$value->end_time;
}
sort($start_time_p);
$endtime_manage_get= end($start_time_p);
$endtime_manage= date("H:i", strtotime('-10 minutes', strtotime($endtime_manage_get)));

if($_POST['starttime']>$endtime_manage)
{
 $endtime=get_the_time_start($starttime_increase, "22:00");

}elseif($_POST['starttime'] ==  $endtime_manage){


  $endtime=array("equal"=>"not allowed");


}else{
   $endtime=get_the_time_start($starttime_increase,$endtime_manage);
}


if (in_array($starttime_increase, $start_time_p))
{

$endtime=array("equal"=>"not allowed");  
}

$oup_put ="";

if(isset($_POST['end_time'])):
    $oup_put .=" <option value='".$_POST['end_time']."' selected>  ".$_POST['end_time'] ."</option>";
    endif;

if(!empty($endtime)):
  foreach($endtime as $key =>$value_endtime)
{
  
 if(!in_array($value_endtime, $combine_time)):
   $oup_put .=" <option value='".$value_endtime."'>  ".$value_endtime ."</option>";
  endif;
}
endif;
echo $oup_put;
endif;
die();

  }

    function add_my_stylesheet()
    {
        if (is_page( 'control' )) {
      wp_enqueue_style('Tsm_style',plugin_dir_url( __FILE__ ).'include/css/Tsm_style_mins.css');
      wp_enqueue_style('Tsm_sticky',plugin_dir_url( __FILE__ ).'include/css/Tsm_sticky_min_1.css');
      /*wp_enqueue_script( 'sticky_js', plugin_dir_url( __FILE__ ).'include/js/sticky_js.js' );
      wp_enqueue_script( 'sticky_js_main', plugin_dir_url( __FILE__ ).'include/js/sticky_js_main.js' );
      wp_enqueue_script( 'stickyheader', plugin_dir_url( __FILE__ ).'include/js/jquery.stickyheader.js' );*/
            }
    }

    function My_custom_script($hook) {   
     
       if ( 'photographer_page_saskmange' != $hook ) {
        return;
    }

    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ).'include/js/jquery.js' );
    wp_enqueue_script( 'jquery-ui.js', plugin_dir_url( __FILE__ ) . 'include/js/jquery-ui.js' );
    wp_enqueue_script( 'jbootstrap.min.js', plugin_dir_url( __FILE__ ) . 'include/bootstrap/js/bootstrap.min.js' );
    wp_enqueue_style('bootstrap.min.css',plugin_dir_url( __FILE__ ).'include/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-datetimepicker.min.css',plugin_dir_url( __FILE__ ).'include/css/bootstrap-datetimepicker.min.css');
    wp_enqueue_style('calender_13.css',plugin_dir_url( __FILE__ ).'include/css/calender_13.css');   
    wp_enqueue_style('Tsm_admin',plugin_dir_url( __FILE__ ).'include/css/Tsm_admin.css');  
  
}



function delete_task_photographer()
{
if(isset($_POST['photographer_id']) && isset($_POST['task_id'])):

if($_POST['task_id'] != 'empty' && $_POST['task_id'] != 'all_tasks'):

        global $wpdb;
              $table = $wpdb->prefix.'schedule_task';
              $delete =$wpdb->delete( $table, array( 'photo_gra_ID' => $_POST['photographer_id'],'task_ID'=>$_POST['task_id']));
          if ( false === $delete ) {
            echo  "error";
        } else {
            echo "sucess";
        }
    elseif($_POST['task_id'] == 'all_tasks'):
 global $wpdb;
              $table = $wpdb->prefix.'schedule_task';
              $delete =$wpdb->delete( $table, array( 'photo_gra_ID' => $_POST['photographer_id']));
          if ( false === $delete ) {
            echo  "error";
        } else {
            echo "sucess";
        }

    endif;


endif;
die();

}



function photographer_tasks()
{

  if(isset($_POST['photographer_id']) && !empty($_POST['photographer_id'])):
        global $wpdb;
      $table = $wpdb->prefix.'schedule_task';
      $allresults = $wpdb->get_results("select * from $table where photo_gra_ID ='".$_POST['photographer_id']."'");
      $oup_put="";
        if(!empty($allresults)):
        foreach ($allresults as $key => $value) {
          $task_ids[]=$value->task_ID;
        }
       endif;
   $task_ids=array_unique($task_ids);
    if(!empty($task_ids)):
      //$oup_put .=" <option value='all_tasks'> all tasks selected</option>";
    foreach ($task_ids as $key => $value) {
      $oup_put .=" <option value='".$value."'>  ".get_the_title($value)."</option>";
    }
    else:
$oup_put .=" <option value='empty'>No task avialable</option>";
    endif;
    echo  $oup_put; 
      endif;
      die();
}


function print_csv()
{
    if ( ! current_user_can( 'manage_options' ) )
        return;

    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename=example.csv');
    header('Pragma: no-cache');

    // output the CSV data
}



public function download_csv()
{
$root = dirname(dirname(dirname(dirname(__FILE__))));
if (file_exists($root.'/wp-load.php')) {
// WP 2.6
require_once($root.'/wp-load.php');
}else{
// Before 2.6
require_once($root.'/wp-config.php');
}
$results = array(
    array( 'item' => 'Server', 'cost' => 10000, 'approved by' => 'Joe'),
    array( 'item' => 'Mt Dew', 'cost' => 1.25, 'approved by' => 'John'),
    array( 'item' => 'IntelliJ IDEA', 'cost' => 500, 'approved by' => 'James')
);
$fileName = 'Billing-Summary.csv';

header("Content-type: application/csv");
   header('Content-Disposition: inline; filename="export.csv"'); // change this filename
   
foreach ( $results as $key=> $data ) {
    // Add a header row if it hasn't been added yet
    if ( !$headerDisplayed ) {
        // Use the keys from $data as the titles
        fputcsv($fh, array_keys($data));
        $headerDisplayed = true;
    }
    // Put the data into the stream
    fputcsv($fh, $data);
}
fclose($fh);
exit;
}

public function schedule_popup()
{
  if(!is_admin())
        {

}
}
      public function AddTask()
        {
        if(!is_admin())
        {
          ob_start(); 
       include(plugin_dir_path( __FILE__ ).'include/add_task.php');

        }
        }
    
    
    function Redirect_control_page($user_login, $user)
        {
    
    $roles_main = array('production','press_officer','workshop_manager');
    if(in_array($user->roles[0], $roles_main))
    {
      ?>
      <script type="text/javascript">
  window.location.href = "<?php   echo home_url( $wp->request ).'/control'; ?>";

</script>
    <?php     //echo $user->roles[0]; 
   die(); }else{
                 }
      }
function Starttime_manage()
{

if(isset($_POST['starttime'])):

  $cst_strttime=filter_var($_POST['starttime'], FILTER_SANITIZE_STRING);
  $firsttime=trim($cst_strttime);
  if($firsttime === "choose")
  {

  $oup_put =" <option value='choose'>choose</option>";
  echo $oup_put;
    die();
  }
 $starttime_increase= date("H:i", strtotime('+10 minutes', strtotime($_POST['starttime'])));
global $wpdb;
 $start_time_p=array();
  $table = $wpdb->prefix.'schedule_task';
  $allresults = $wpdb->get_results("select * from $table where photo_gra_ID ='".$_POST['photographer_id']."' AND  date='".$_POST['currentdate']."'");

foreach ($allresults as $key => $value) {
 $start_time_p[]=$value->start_time;
 $combine_time[]=$value->start_time;
 $combine_time[]=$value->end_time;
}
sort($start_time_p);
$endtime_manage_get= end($start_time_p);
$endtime_manage= date("H:i", strtotime('-10 minutes', strtotime($endtime_manage_get)));

if($_POST['starttime']>$endtime_manage)
{
 $endtime=get_the_time_start($starttime_increase, "22:00");

}elseif($_POST['starttime'] ==  $endtime_manage){


  $endtime=array("equal"=>"not allowed");


}else{
   $endtime=get_the_time_start($starttime_increase,$endtime_manage);
}


if (in_array($starttime_increase, $start_time_p))
{

$endtime=array("equal"=>"not allowed");  
}

$oup_put ="";



if(!empty($endtime)):

   
  foreach($endtime as $key =>$value_endtime)
  {
 if(!in_array($value_endtime, $combine_time)):
   $oup_put .=" <option value='".$value_endtime."'>  ".$value_endtime ."</option>";
  endif;
}
endif;
echo $oup_put;
endif;
die();
}

function delete_record()

{
global $wpdb;
  $table=$wpdb->prefix.'schedule_task';

  if(isset($_POST['id'])):

$delete =$wpdb->delete( $table, array( 'id' => $_POST['id'] ) );
  if ( false === $delete ) {
    echo  "error";
} else {
    echo "sucess";
}
  endif;
  die();
}





/***************Time Manage*************/

function Timemange()
{

    if(isset($_POST['photographer_id']) && !empty($_POST['photographer_id'])):
        global $wpdb;
      $table = $wpdb->prefix.'schedule_task';
      $allresults = $wpdb->get_results("select * from $table where photo_gra_ID ='".$_POST['photographer_id']."' AND  date='".$_POST['currentdate']."'");
      $table_start=$wpdb->prefix.'schedule_task_starttime';
      
      $startdate = $wpdb->get_results("SELECT * FROM $table_start");
                  $date_option ="";
                  $star_array=array();
                  $end_array= array();
                  $final_arry = array();
                foreach ($allresults as $key => $value){
                 $mytime=$value->start_time;
                 $star_array[]= $mytime;
                 $end_array[]=$value->end_time;
                  $final_arry[]=get_the_time_start($mytime,$value->end_time);
             }
           foreach ($final_arry as $key => $value) {

                foreach($value as $valllll){
                  $myarry[] =$valllll;
                } }
               $oup_put="";
               $oup_put .= "<option value='choose' selected>choose.....</option>";
             foreach ($startdate as $key => $value1) {
                 $i=strtotime($value1->start_time);

                        $output = "";     
                       if( in_array(date("H:i",$i),$myarry) )
                      {
                        
                      }else{
                      
                      $oup_put .=" <option value='".date("H:i",$i)."'>  ".date("H:i",$i) ."</option>";
                      }
          }
               echo  $oup_put;       
  endif;
  die();
}

/********************Time End*********************/

function Timemang_end()
{

if(isset($_POST['photographer_id']) && !empty($_POST['photographer_id'])):
        global $wpdb;
      $table = $wpdb->prefix.'schedule_task';
      $table_start=$wpdb->prefix.'schedule_task_starttime';
      $allresults = $wpdb->get_results("select * from $table where photo_gra_ID ='".$_POST['photographer_id']."' AND  date='".$_POST['currentdate']."'");
      $startdate = $wpdb->get_results("SELECT * FROM $table_start");
      if(!empty($allresults))
      {
              $date_option ="";
                  $star_array=array();
                  $end_array= array();
                  $final_arry = array();
                 foreach ($allresults as $key => $value){
            $endtime_increase= date("H:i", strtotime('+10 minutes', strtotime($value->end_time)));
           $mytime=$value->start_time;
           $star_array[]= $mytime;
                   $end_array[]=$endtime_increase;
                     $final_arry[]=get_the_time_end($mytime,$endtime_increase);
        
             }
              foreach ($final_arry as $key => $value) {

                foreach($value as $valllll){
                  $myarry[] =$valllll;
                } }

               $oup_put="";
            $oup_put .= "<option  value='choose' selected>choose.....</option>";
            
               echo  $oup_put; 
         }
          endif;
          die();

}

/***************Update Record****************/

function update_record()
{

    global $wpdb;
      $table = $wpdb->prefix.'schedule_task';

if(isset($_POST['photographer']))
{

      $time= time();
      global $wpdb;
      $table = $wpdb->prefix.'schedule_task';

  $updated=$wpdb->update($table, array('photo_gra_ID' => $_POST['photographer'],
                      'date' => $_POST['date'],
                      'start_time' => $_POST['starttime'], 
                      'end_time'=>$_POST['endtime'],
                      'task_ID'=>$_POST['taskpopup'],
                      'location_ID'=>$_POST['location_popup'],
                      'time'=>date("Y-m-d H:i:s") 
                        ), array('Id' => $_POST['id']));

                if ( false === $updated ) {
                    echo  "error";
                } else {
                    echo "sucess";
                }
                }
                die(); 
}




function schedule_data_table_install() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'schedule_task';
    
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE ". $table_name." (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        photo_gra_ID varchar(255),
        date varchar(255),
        start_time varchar(255),
        end_time varchar(255),
        task_ID varchar(255),
        location_ID varchar(255),
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,       
        PRIMARY KEY  (id)
    )$charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    if(dbDelta( $sql )){
       // die("created ");
    }else{
      
    }
}




function schedule_task_starttime()
{   
     global $wpdb;
    $table_name = $wpdb->prefix . 'schedule_task_starttime';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE ". $table_name." (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        start_time varchar(255),
        PRIMARY KEY  (id)
        )$charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    if(dbDelta( $sql )){
       // die("created ");
    }else{
      
    }


}
  
    public function Taskmangemenu()
    {

      add_submenu_page(
    'edit.php?post_type=photographer','Schedule','Schedule','manage_options','saskmange',array($this,'taskmanagelist'));


      add_submenu_page(
    'edit.php?post_type=photographer','Control','Control','manage_options','Control',array($this,'control_manage_page'));

      add_action( 'admin_print_scripts-' . $menu, 'admin_custom_js' );


    }


    public function control_manage_page()
    {
      global $wp;
      ?>
      <div class="wrap" id="profile-page">
        <h2>Control page</h2>
        <h2><a href="<?php echo home_url($wp->request).'/control/';   ?>" class="button-primary button-large" >Go to control</a></h2>
      </div>
      <?php 
    }

    public function taskmanagelist()
    {
      include(plugin_dir_path( __FILE__ ).'include/Taskmanage.php');
    }

    public function include_file_sch(){
         include(plugin_dir_path( __FILE__ ).'include/function.php');
    }


/*****************Shortcode data****************/

public function TaskManagerdata()
{

if(!is_admin()):
  include(plugin_dir_path( __FILE__ ).'include/Taskmanage.php');
endif;
}



    function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Photographer', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Photographer', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( ' Task Manager', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Photographer', 'twentythirteen' ),
        'all_items'           => __( 'All Photographer', 'twentythirteen' ),
        'view_item'           => __( 'View Photographer', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Photographer', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Photographer', 'twentythirteen' ),
        'update_item'         => __( 'Update Photographer', 'twentythirteen' ),
        'search_items'        => __( 'Search Photographer', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );

// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( ' Task Manager', 'twentythirteen' ),
        'description'         => __( 'Photographer news and reviews', 'twentythirteen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    // Registering your Custom Post Type
    register_post_type( 'Photographer', $args ); 
}

function task_post(){
/************************* Set the Task Post **************************/
   $task_labels = array(
        'name'                => _x( 'Task', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Task', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Task', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Task', 'twentythirteen' ),
        'all_items'           => __( 'All Task', 'twentythirteen' ),
        'view_item'           => __( 'View Task', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Task', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Task', 'twentythirteen' ),
        'update_item'         => __( 'Update Task', 'twentythirteen' ),
        'search_items'        => __( 'Search Task', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    ); 

 $task_args = array(
        'label'               => __( 'Task', 'twentythirteen' ),
        'description'         => __( 'Task news and reviews', 'twentythirteen' ),
        'labels'              => $task_labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => 'edit.php?post_type=photographer',
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

 register_post_type( 'Task', $task_args );

}

function location_post(){

  /************************ Location   Label ********************************/

  $Location_labels = array(
        'name'                => _x( 'Location', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Location', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Location', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Location', 'twentythirteen' ),
        'all_items'           => __( 'All Location', 'twentythirteen' ),
        'view_item'           => __( 'View Location', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Location', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Location', 'twentythirteen' ),
        'update_item'         => __( 'Update Location', 'twentythirteen' ),
        'search_items'        => __( 'Search Location', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    ); 

 $Location_args = array(
        'label'               => __( 'Location', 'twentythirteen' ),
        'description'         => __( 'Location news and reviews', 'twentythirteen' ),
        'labels'              => $Location_labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => 'edit.php?post_type=photographer',
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
 register_post_type('Location', $Location_args );

}

public function add_custom_roles(){
    add_role('press_officer','Press Officer' ,array('read' => true,   'edit_posts'   => true, ));
    add_role('workshop_manager', 'Workshop Manager' ,array('read' => true,   'edit_posts'   => true, ));
    add_role('production','Production' ,array('read' => true,  'edit_posts'   => true, ));
}
public function wpse_add_custom_meta_box_2() {
   add_meta_box(
       'task_role',       // $id
       'Roles',                  // $title
       array($this,'show_custom_meta_box_2'),  // $callback
       'task',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}

public function show_custom_meta_box_2() {
    global $post;
    
     $post_meta_role = get_post_meta( get_the_ID(), 'post_role_custom');

     
     if(!empty($post_meta_role) && $post_meta_role!=" "){
      /* $post_meta_role_new= json_decode($post_meta_role);*/
       
     ?>
    <input type="checkbox" name="post_role[]" value="press_officer" <?php if(in_array('press_officer', $post_meta_role)){ echo "checked"; } ?>>Press Officer
   <input type="checkbox" name="post_role[]" value="workshop_manager" <?php if(in_array('workshop_manager', $post_meta_role)){ echo "checked"; } ?>>Workshop Manager   
   <input type="checkbox" name="post_role[]" value="production" <?php if(in_array('production', $post_meta_role)){ echo "checked"; } ?>>Production   

    <?php }else{

        ?>
    <input type="checkbox" name="post_role[]" value="press_officer" >Press Officer
   <input type="checkbox" name="post_role[]" value="workshop_manager" >Workshop Manager   
   <input type="checkbox" name="post_role[]" value="production" >Production   

    <?php 
    }
}

public function save_task_role(){

    if(isset($_POST)){


   if(isset($_POST['post_role'])){



    if(!get_post_meta( $_POST['post_ID'], 'post_role_custom', true )){
       
  
       add_post_meta( $_POST['post_ID'], 'post_role_custom', $_POST['post_role'][0]);
       
     }else{
      
        update_post_meta( $_POST['post_ID'], 'post_role_custom', $_POST['post_role'][0]);
      }
        
    }else{
        if(!get_post_meta( $_POST['post_ID'], 'post_role', true )){
         add_post_meta( $_POST['post_ID'], 'post_role_custom',' ');
         
       }else{
         update_post_meta( $_POST['post_ID'], 'post_role_custom', ' ' );

       }

    }}
  }


}

 
$wpDribbble = new TaskMangae();