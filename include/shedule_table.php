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
  <?php $data_array= selectTimes();?>
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


//echo "<pre>";
//print_r($allresults);


if(!empty($allresults) && $front_filter_result == 'false'):
    foreach ($allresults as $key => $value) {
      $photographer_ids[$value->photo_gra_ID][]=array('id'=>$value->id,'date'=>$value->date,'start_time'=>$value->start_time,'end_time'=>$value->end_time,'task_ID'=>$value->task_ID,'location_ID'=>$value->location_ID);
    $code=get_field('color_code',$value->location_ID);
    $email_add = get_field('email_address',$value->photo_gra_ID);
    //echo $email_add; 
    $color_code= "#".$code;
    $csv_download[$value->photo_gra_ID][]=array('photographer'=>get_the_title($value->photo_gra_ID),'date'=>$value->date,'start_time'=>$value->start_time,'end_time'=>$value->end_time,'task'=>get_the_title($value->task_ID),'notes'=>$value->task_notes, 'location'=>get_the_title($value->location_ID));
      }
      /*********sorting for csv download********/
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
      ?>
      <?php   foreach ($photographer_ids as $key => $value) {
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
  $count=0;
  //print_r($photographer_ids_sort);
  foreach ($photographer_ids_sort as $key => $new_array)
      {   $count++;
        ?>
      <!-------------First row Table data----------->
    <tr>
      <th class="name-list-color" data-heading="Name"><?php echo get_the_title($key);?></th>
        <?php  
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
  <?php  }?><?php endforeach;?>
           </tr>
      <!------------End------------> 
           <!-----------second row start------------>
<?php
unset($main_array); // $foo is gone
$main_array = array();

 } else:?>
<tr ><td colspan="35" style="padding: 27px;text-align: center;">Not exist</td></tr>
<?php endif;?>
<?php foreach ($allresults as $key => $value) {

        $photoids[]=$value->photo_gra_ID;
  ?>
  <?php } ?>

<?php $photoids= array_unique($photoids); ?>
<style>
  .export_select { padding: 0px 10px;}
  .export_select a.btn.btn-info {float: right; padding: 9px; width: 18%;}
  .next-prev{float:right;margin-bottom: 10px;}
.next-prev a{background:#d00;padding: 2px 8px 5px 8px;margin: 0px 5px;}
</style>

<div class="export_select">
  <p style="color: #d00">Select Photographer</p>
<select  id="export_photographer">
  <option value="select_photographer" >Export all</option>
  <?php foreach ($photoids as $key => $value) {?>
    <option value="<?php echo $value; ?>" ><?php  echo get_the_title($value);   ?></option>
  <?php } ?>
</select>
<?php  global $wp; ?>
<a href="<?php echo plugin_dir_url(__FILE__).'csv_download.php';?>" id="export_btn" class="btn btn-info" style="background-color: #d00;color: #fff;border: none;" target="_blank">Export all data</a>
<a href="<?php echo plugin_dir_url(__FILE__).'pdf_download.php';?>" id="export_pdf_btn" class="btn btn-info" style="background-color: #d00;color: #fff;border: none;" target="_blank">Export Pdf</a>
</div>
<br/><br/>
<?php 
if($show_pagination == "true"):
if(!empty($array_date_count)):?>
<div class="next-prev"><a href="javascript:void(0);" data-datecount="<?php echo $array_date_count;?>" data-current_index="<?php echo $count_i; ?>" class="btn btn-primary tsm_next_paginatopn" style="float:right;" ><img src="<?php  echo plugin_dir_url(__FILE__).'/images/right-arrow.png';  ?>"></a>

  <?php  if($count_i >0 ):  ?>
  <a href="javascript:void(0);" data-datecount="<?php echo $array_date_count;?>" data-current_index="<?php echo $count_i; ?>" class="btn btn-primary tsm_priv_pagination"  ><img src="<?php  echo plugin_dir_url(__FILE__).'/images/left-arrow.png';  ?>"></a>
<?php endif;?>
</div>
<?php endif;?>
<?php endif;?>
  </tbody>
</table>
</div>
<?php  if($show_pagination == "true"):?>
<div class="bottom-navigation">
  <?php if(!empty($array_date_count)):?>
<div class="next-prev"><a href="javascript:void(0);" data-datecount="<?php echo $array_date_count;?>" data-current_index="<?php echo $count_i; ?>" class="btn btn-primary tsm_next_paginatopn" style="float:right;" ><img src="<?php  echo plugin_dir_url(__FILE__).'/images/right-arrow.png';  ?>"></a>

  <?php  if($count_i >0 ):  ?>
  <a href="javascript:void(0);" data-datecount="<?php echo $array_date_count;?>" data-current_index="<?php echo $count_i; ?>" class="btn btn-primary tsm_priv_pagination"  ><img src="<?php  echo plugin_dir_url(__FILE__).'/images/left-arrow.png';  ?>"></a>
<?php endif;?>
</div>
<?php endif;?>
  </div>
<?php endif;?>
<script type="text/javascript">
var ajaxurl='<?php echo admin_url( 'admin-ajax.php' ); ?>';
var export_date='<?php echo $csv_export_name;?>';
$(document).ready(function () {
  init();
});
function init() {
  photographerChange(); 
}
$('#export_photographer').on('change', photographerChange);
function photographerChange()
{
  var  photographer = $("#export_photographer").val();
  var selectedText = $("#export_photographer option:selected").html();
      $.ajax({       
                 url: ajaxurl, // this is the object instantiated in wp_localize_script function
                 type: 'POST',
                 data:{ 
                    action: 'Export_by_photographer',
                    photographer: photographer,
                    photographer_name:selectedText,
                    export_date:export_date
                  },
                  dataType:'html',
                  success: function( data ){
                      
                     if(data =='true')
                     {
                      $("#export_btn").text(selectedText +" task export",);
                     }
                     if(data == "allexport")
                     {
                      $("#export_btn").text("Export all data");
                      
                     }
                    
                  }
          });
}
$('.tsm_next_paginatopn').click(function(){
  $(this).css('pointer-events','none');
 var current_index= $(this).data('current_index');
 var array_count=$(this).data('datecount');
  $.ajax({       
            url: ajaxurl, // this is the object instantiated in wp_localize_script function
              type: 'POST',
               data:{ 
                    action: 'front_page_navigation',
                    current_index: current_index,
                    array_count:array_count
                  },
                  dataType:'text',
                 
                  success: function( data ){
                      if(data == 'true')
                      {
                         window.location.href="/control/?pagination_new=true";
                      }
                   
                  }
          });
});
$('.tsm_priv_pagination').click(function(){
 var current_index= $(this).data('current_index');
 var array_count=$(this).data('datecount');
 $.ajax({       
            url: ajaxurl, // this is the object instantiated in wp_localize_script function
              type: 'POST',
               data:{ 
                    action: 'back_page_navigation',
                    current_index: current_index,
                    array_count:array_count
                  },
                  dataType:'text',
                 
                  success: function( data ){
                      if(data == 'true')
                      {
                         window.location.href="/control/?pagination_new=true";
                      }
                   
                  }
          });
});
</script>