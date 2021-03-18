<?php 

//include wp-config or wp-load.php
// $root = dirname(dirname(dirname(dirname(__FILE__))));

// WP 2.6
function FindWPConfig($dirrectory){
global $confroot;

foreach(glob($dirrectory."/*") as $f){

if (basename($f) == 'wp-config.php' ){
$confroot = str_replace("\\", "/", dirname($f));
return true;
}

if (is_dir($f)){
$newdir = dirname(dirname($f));
}
}

if (isset($newdir) && $newdir != $dirrectory){
if (FindWPConfig($newdir)){
return false;
} 
}
return false;
}
if (!isset($table_prefix)){
global $confroot;
FindWPConfig(dirname(dirname(__FILE__)));
include_once $confroot."/wp-config.php";
include_once $confroot."/wp-load.php";
}
$string= get_option('photographer_csv_name');
$s = ucfirst($string);
$bar = ucwords(strtolower($s));
$filename = preg_replace('/\s+/', '', $bar);
$csv_download=get_option('csv_download');
foreach ($csv_download as $key => $value) {
    	$date[$key]  = $value['date'];
    $start_time[$key] = $row['start_time'];
}
array_multisort($date, SORT_ASC, $start_time, SORT_ASC, $csv_download);

function outputCsv($fileName, $assocDataArray)
{
ob_clean();
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=' . $fileName); 
if(isset($assocDataArray['0'])){
$fp = fopen('php://output', 'w');
fputcsv($fp, array_keys($assocDataArray['0']));
foreach($assocDataArray AS $values){
fputcsv($fp, $values);
}
fclose($fp);
}
ob_flush();
}

outputCsv($filename.".csv", $csv_download);

?>