<style>
.color_list_table  td,th{
border:1px solid #A2A2A2; }
.top{background: #dd0605;}
.top th {padding: 10px;}
.top .name-list {padding: 0px 100px;}
.main-head { background: #d4d4d4;}
.color_list_table td { padding: .6em;}
.main-head th {color: #909090;padding:0px 5px;font-size: 14px;font-weight: 300;}
.main-head .time_head{color:#000 !important;text-align: center;font-size: 12px; font-weight: bold;}
.name-list-color {background: #dbdbdb;font-size: 12px;line-height: 2px;}
.top.name-header-top{color:#fff;font-weight: bold;}
.sticky-wrap{overflow-x: scroll !important;background-color: transparent !important;}
.sticky-wrap{scrollbar-color: #d00 white;}
.sticky-wrap::-webkit-scrollbar-track
{-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); background-color: #F5F5F5;}
.sticky-wrap::-webkit-scrollbar{width: 12px;background-color: #d00;}
.sticky-wrap::-webkit-scrollbar-thumb{  background-color: #d00;}
#export_pdf_btn { margin-right: 16px; }
  </style>
  <?php $data_array= selectTimes(); ?>
  <div class="tst_table">
  <table class=" color_list_table" data-table="col-84" >
  <thead>
    <!-------Top head start--------->
    <tr class="top">
  <th class="name-list"></th>
 <th colspan="84"></th>
    </tr>
    <!--------End--------->
    <!------Main head start----------->
    <tr class="main-head">
      <th class="top name-header-top">Photographer Name</th>
      <th class="time_head">9<br/>Am</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 11am----->
      <th class="time_head">10<br/>Am</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 12----->
      <th class="time_head">11<br/>Am</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 1pm----->
      <th class="time_head">12<br/>PM</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 2pm----->
      <th class="time_head">1<br/>Pm</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 3pm----->
      <th class="time_head">2<br/>Pm</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 3pm----->
       <th class="time_head">3<br/>Pm</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 5pm----->
       <th class="time_head">4<br/>Pm</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 6pm----->
        <th class="time_head">5<br/>Pm</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 6pm----->
        <th class="time_head">6<br/>Pm</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 6pm----->
        <th class="time_head">7<br/>Pm</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 6pm----->
        <th class="time_head">8<br/>Pm</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 6pm----->
        <th class="time_head">9<br/>Pm</th>
      <th>10</th>
      <th>20</th>
      <th>30</th>
      <th>40</th>
      <th>50</th>
      <!--------Time head 6pm----->
    </tr>
  </thead>
<!-----------------End-------------->
  <tbody>
<?php 
 if(isset($_POST['tasks_as_photographer'])):  
      unset($sql);
      
    if ($_POST['photographer_id']) {
        $sql[] = "photo_gra_ID = '".$_POST['photographer_id']."' ";
    }
    $query = "select * from $table";
    if (!empty($sql)) {
        $query .= ' where ' . implode(' AND ', $sql);
    }
    $allresults = $wpdb->get_results($query);
    $all_user_data_get=$wpdb->get_results($query);
       endif;
       $datess_array[] = "";
       foreach ($allresults as $key => $value) {
          $photographer_ids[$value->photo_gra_ID][]=array('id'=>$value->id,'date'=>$value->date,'start_time'=>$value->start_time,'end_time'=>$value->end_time,'task_ID'=>$value->task_ID,'location_ID'=>$value->location_ID);
          
            $datess_array[] = $value->date;
          $code=get_field('color_code',$value->location_ID);
          $email_add = get_field('email_address',$value->photo_gra_ID);
          $color_code= "#".$code;
       }
       foreach ($photographer_ids as $key => $value) {
              $name=get_the_title($key);
              $new_array_photographer[$name][]=$value;
       }
       ksort($new_array_photographer);
  foreach($new_array_photographer as $key =>$value)
  {
    foreach ($value as $newkey => $value_array) {
    $post = get_page_by_title( $key, OBJECT, 'photographer' );
    $photographer_ids_sort[$post->ID] =$value_array;
    }
  }
  //$count=0;
    
  foreach ($photographer_ids_sort as $key => $new_array)
      {   
         
       // $count++;
        ?>
      <!-------------First row Table data----------->
    <tr>
      <th class="name-list-color" data-heading="Name"><?php echo get_the_title($key);?></th>
       <!--  <?php  
         $main_array[]="";
               foreach($data_array as $k=>$i):

            if(array_search($i, array_column($new_array, 'start_time')) !== false) {
              $data=  array_search($i, array_column($new_array, 'start_time'));
              $code=get_field('color_code',$new_array[$data]['location_ID']);
              $color_code="#".$code;    
              $main_array['start_time']=$new_array[$data]['start_time'];
              $main_array['end_time']=$new_array[$data]['end_time'];
              $main_array['location_id']=$new_array[$data]['location_ID'];
              $main_array['date']=$new_array[$data]['date'];
                
              $main_array['task_ID']=$new_array[$data]['task_ID'];
              ?>
              <td id="<?php echo $i; ?>" class="span_t cst_popup first" data-photographer="<?php echo get_the_title($key);?>" data-date="<?php echo $new_array[$data]['date'];  ?>"  data-start_time="<?php echo $new_array[$data]['start_time']; ?>" data-end_time="<?php echo $new_array[$data]['end_time']; ?>"  data-taskname="<?php echo get_the_title($new_array[$data]['task_ID']); ?>" data-location="<?php echo get_the_title($new_array[$data]['location_ID']); ?>"       style="background-color: <?php echo $color_code; ?>"></td>
            <?php }elseif(array_search($i, array_column($new_array, 'end_time')) !== false){
                
              $data=  array_search($i, array_column($new_array, 'end_time'));
              $code=get_field('color_code',$new_array[$data]['location_ID']);
              $color_code="#".$code;
              $main_array['start_time']=$new_array[$data]['start_time'];
              $main_array['end_time']=$new_array[$data]['end_time'];
              $main_array['location_id']=$new_array[$data]['location_ID'];
              $main_array['task_ID']=$new_array[$data]['task_ID'];
              $main_array['date']=$new_array[$data]['date'];
?>
<td id="<?php echo $i; ?>" style="background-color: <?php echo $color_code; ?>" class="cst_popup span_t second" data-photographer="<?php echo get_the_title($key);?>" data-date="<?php echo $new_array[$data]['date'];  ?>"  data-start_time="<?php echo $new_array[$data]['start_time']; ?>" data-end_time="<?php echo $new_array[$data]['end_time']; ?>"  data-taskname="<?php echo get_the_title($new_array[$data]['task_ID']); ?>" data-location="<?php echo get_the_title($new_array[$data]['location_ID']); ?>" ></td>
  <?php           }else if($i>$main_array['start_time'] && $i<$main_array['end_time']){
$code=get_field('color_code',$main_array['location_id']);
              $color_code="#".$code;
?>
<td id="<?php echo $i; ?>"  class="cst_popup span_t third" style="background-color: <?php echo $color_code; ?>" 
data-photographer="<?php echo get_the_title($key);?>" data-date="<?php echo $main_array['date'];  ?>"  data-start_time="<?php echo $main_array['start_time']; ?>" data-end_time="<?php echo $main_array['end_time']; ?>"  data-taskname="<?php echo get_the_title($main_array['task_ID']); ?>" data-location="<?php echo get_the_title($main_array['location_id']); ?>"></td>
  <?php }else{?>
<td id="<?php echo $i; ?>" data-starttime="<?php echo $i; ?>" data-photographer="<?php echo get_the_title($key);?>" data-photoid="<?php echo $key;  ?>" data-date='<?php echo get_option('current_date_tsm');?>'
 class="span_t fourth add_shedule_php" ></td>
  <?php  } ?><?php endforeach; ?> -->
    </tr>
    <?php 
 unset($main_array); // $foo is gone
 $main_array = array();  
 $testdate = array_unique($datess_array);
 $dateresult = array_filter($testdate);
 asort($dateresult);
 ?>

    <?php foreach ($dateresult as $datevalue) { 
     $str = $datevalue; 
   
     ?>
     <tr>
     <th class="name-list-color" data-heading="Name"><?php echo $datevalue; ?></th>
   
      
 <?php   $mains_array[]="";
         $listImages=array();
               foreach($data_array as $k=>$i){
                
            if(array_search($i, array_column($new_array, 'start_time')) !== false) {
              $data =  array_search($i, array_column($new_array, 'start_time')); 
              $code = get_field('color_code',$new_array[$data]['location_ID']);
              $color_code="#".$code;    
              $mains_array['start_time']=$new_array[$data]['start_time'];
              $mains_array['end_time']=$new_array[$data]['end_time'];
              $mains_array['location_id']=$new_array[$data]['location_ID'];
              $mains_array['date']=$new_array[$data]['date'];
              $mains_array['task_ID']=$new_array[$data]['task_ID'];
             if($new_array[$data]['date'] == $str){
              ?>
            <td id="<?php echo $i; ?>" class="span_t cst_popup first" data-photographer="<?php echo get_the_title($key);?>" data-date="<?php echo $new_array[$data]['date'];  ?>"  data-start_time="<?php echo $new_array[$data]['start_time']; ?>" data-end_time="<?php echo $new_array[$data]['end_time']; ?>"  data-taskname="<?php echo get_the_title($new_array[$data]['task_ID']); ?>" data-location="<?php echo get_the_title($new_array[$data]['location_ID']); ?>"  <?php  if($new_array[$data]['date'] == $str){ ?> style="background-color: <?php echo $color_code; ?>"  <?php } ?>></td>
             <?php }else{ ?>
            <td id="<?php echo $i; ?>" data-starttime="<?php echo $i; ?>" data-photographer="<?php echo get_the_title($key);?>" data-photoid="<?php echo $key;  ?>" data-date='<?php echo get_option('current_date_tsm');?>'
             class="span_t fourth add_shedule_php" ></td>
              <?php } ?>

         <?php }elseif(array_search($i, array_column($new_array, 'end_time')) !== false){ 
              $data =  array_search($i, array_column($new_array, 'end_time'));
              $code=get_field('color_code',$new_array[$data]['location_ID']);
              $color_code="#".$code;
              $mains_array['start_time']=$new_array[$data]['start_time'];
              $mains_array['end_time']=$new_array[$data]['end_time'];
              $mains_array['location_id']=$new_array[$data]['location_ID'];
              $mains_array['task_ID']=$new_array[$data]['task_ID'];
              $mains_array['date']=$new_array[$data]['date'];
        if($new_array[$data]['date'] == $str){
      ?>
     
          <td id="<?php echo $i; ?>" <?php  if($new_array[$data]['date'] == $str){ ?> style="background-color: <?php echo $color_code; ?>" <?php } ?> class="cst_popup span_t second" data-photographer="<?php echo get_the_title($key);?>" data-date="<?php echo $new_array[$data]['date'];  ?>"  data-start_time="<?php echo $new_array[$data]['start_time']; ?>" data-end_time="<?php echo $new_array[$data]['end_time']; ?>" data-taskname="<?php echo get_the_title($new_array[$data]['task_ID']); ?>" data-location="<?php echo get_the_title($new_array[$data]['location_ID']); ?>" ></td>
       <?php }else{ ?>
        <td id="<?php echo $i; ?>" data-starttime="<?php echo $i; ?>" data-photographer="<?php echo get_the_title($key);?>" data-photoid="<?php echo $key;  ?>" data-date='<?php echo get_option('current_date_tsm');?>'
         class="span_t fourth add_shedule_php" ></td>
          <?php } ?>
          <?php  } 
        elseif($i>$mains_array['start_time'] && $i<$mains_array['end_time']){
      $code=get_field('color_code',$mains_array['location_id']);
                    $color_code="#".$code;
                     if($mains_array['date'] == $str){ ?>
      <td id="<?php echo $i; ?>"  class="cst_popup span_t third" <?php  if($mains_array['date'] == $str){ ?> style="background-color: <?php echo $color_code; ?>" <?php } ?> 
      data-photographer="<?php echo get_the_title($key);?>" data-date="<?php echo $mains_array['date'];  ?>"  data-start_time="<?php echo $mains_array['start_time']; ?>" data-end_time="<?php echo $mains_array['end_time']; ?>"  data-taskname="<?php echo get_the_title($mains_array['task_ID']); ?>" data-location="<?php echo get_the_title($main_array['location_id']); ?>"></td>
        <?php }else{?>

        <td id="<?php echo $i; ?>" data-starttime="<?php echo $i; ?>" data-photographer="<?php echo get_the_title($key);?>" data-photoid="<?php echo $key;  ?>" data-date='<?php echo get_option('current_date_tsm');?>'
     class="span_t fourth add_shedule_php" ></td>
      <?php } }else{?>
    <td id="<?php echo $i; ?>" data-starttime="<?php echo $i; ?>" data-photographer="<?php echo get_the_title($key);?>" data-photoid="<?php echo $key;  ?>" data-date='<?php echo get_option('current_date_tsm');?>'
     class="span_t fourth add_shedule_php" ></td>
      <?php  } ?>
    
    <?php } ?>
    </tr>
    <?php  } ?>
    
<?php 
 unset($mains_array); 
 $mains_array = array(); } ?>
 </tbody>
</table>
</div>