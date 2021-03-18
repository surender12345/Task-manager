<?php
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

$csv_download=get_option('csv_download');
include_once(plugin_dir_path( __FILE__ ).'fpdf18/fpdf.php');
$pdf = new FPDF("P", "mm", array(260,350));
foreach ($csv_download as $key => $value) {
        $date[$key]  = $value['date'];
    $start_time[$key] = $row['start_time'];
}
array_multisort($date, SORT_ASC, $start_time, SORT_ASC, $csv_download);
foreach ($csv_download as $key => $value) {
      $photog_title = $value['photographer'];
}
$photographer_title = $photog_title.' - Xposure 2021 - Individual Schedule';

$my_post = get_page_by_title( $photog_title, OBJECT, 'photographer' );
$email_add = get_field('email_address',$my_post->ID);
$pdf->AddPage();
$linkbreak = 10.50;
$linkbreak2 = 6.50;
$linkbreak3 = 4.50;
$linkbreak4 = 2.50;
$pdf->SetFont('Arial','B',9);
$pdf->Ln($linkbreak2);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,0,$photographer_title,0,1,'C',false);
$pdf->Ln($linkbreak);
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(20);
$pdf->Cell(30,7,"Photographer");
$pdf->Cell(32,7,"Date");
$pdf->Cell(22,7,"Start");
$pdf->Cell(22,7,"End");
$pdf->Cell(35,7,"Task");
$pdf->Cell(33,7,"Location");
$pdf->Cell(25,7,"Notes");
$pdf->Ln();
foreach ($csv_download as $key => $value) {
        $photographer = $value['photographer'];
        $date = $value['date'];
        $start_time = $value['start_time'];
        $end_time = $value['end_time'];
        $task = $value['task'];
        $location = $value['location'];
        $notes = $value['notes'];
        $pdf->SetFont('Arial','',9);
        $pdf->SetFillColor(193, 229, 252);
        $pdf->Cell(20);
        $pdf->Cell(30,7,$photographer);
        $pdf->Cell(32,7,$date);
        $pdf->Cell(22,7,$start_time);
        $pdf->Cell(22,7,$end_time);
        $pdf->Cell(35,7,$task);
        $pdf->Cell(33,7,$location); 
        $pdf->Cell(25,7,$notes);
        $pdf->Ln();
}
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$content1 = 'Lunch is served in the VIP Dining Room between 12:00 and 14:00
Dinner on 10th & 13th February will is served in the VIP Dining Room from 18:00 to 20:00
';  
$pdf->MultiCell(0,5,$content1,'','C',false);
$pdf->Ln($linkbreak4);
$pdf->SetFont('Arial','',9);
$content2 = 'Tuesday 9th Meet & Greet from 18:30 - Details upon arrival at Hotel';
$pdf->MultiCell(0,7,$content2,'','C',false);
$pdf->SetMargins(45,0,45);
$pdf->Ln($linkbreak3);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(128,128,128);
$content3 = 'Private Events: for guest photographers & VIPs are held off site.Transport will depart at the scheduled time from the official hotel and all guests should be ready in lobby or outside the hotel.';
$pdf->MultiCell(0,5,$content3,'','C',false);
$pdf->Ln($linkbreak3);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(128,128,128);
$content4 = 'When moving around the festival or hotel and during transfers you must remember to wear your face mask. All individuals attending the Private Events, Opening Ceremony and awards ceremony must show proof of a negative PCR test taken the prescribed time frame.';
$pdf->MultiCell(0,5,$content4,'','C',false);
$pdf->Ln($linkbreak3);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(128,128,128);
$content5 = 'This individual schedule does not include media interviews. Additional scheduling will be booked between the assigned tasks and functions listed and conveyed to you by Alya Al Suwaidi - Media Liaison, & Manager of Marketing & Special Projects or Dalia Gutierrez - Photographer Liaison';

$pdf->MultiCell(0,5,$content5,'','C',false);
$pdf->Ln($linkbreak3);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(128,128,128);
$content6 = 'For Travel, & Accommodation contact
 Heba: heba.b@sgmb.ae';

$pdf->MultiCell(0,5,$content6,'','C',false);
$pdf->Ln($linkbreak3);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(128,128,128);
$content7 = '+971 56 219 9117';
$pdf->MultiCell(0,5,$content7,'','C',false);
$pdf->Ln($linkbreak3);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(128,128,128);
$content8 = 'For Media Enquiries: contact
Alya: alya.AlSuwaidi@SGMB.ae';
$pdf->MultiCell(0,5,$content8,'','C',false);
$pdf->Ln($linkbreak3);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(128,128,128);
$content9 = '+971 56 996 1411';
$pdf->MultiCell(0,5,$content9,'','C',false);
$pdf->Ln();
$pdf->Output();
if($email_add){
    $to = $email_add;
}
//$to = 'tester.webperfection@gmail.com';
 $blogusers = get_users('role=Administrator');
$from = "simon@xposure.ae"; 
$subject = "Export task schedule with pdf attachment"; 
$message = "<p>Please check task schedule attachment pdf.</p>";

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "scheduletask.pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
//$body .= "This is a MIME encoded message.".$eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";

// send message
//mail($to, $subject, $body, $headers);
?>