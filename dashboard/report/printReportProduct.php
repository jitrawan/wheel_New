<?php session_start();
error_reporting(0);?>
<?php
require("../../../vendor/autoload.php");
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();
date_default_timezone_set('Asia/Bangkok');
$getmember_info = $getdata->my_sql_query(NULL,"user","user_key='".$_SESSION['ukey']."'");
?>

<table width="667" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td align="center"><img src="piclogo.png" width="100" height="118"></td>
  </tr>
  <tr>
    <td align="center">
      <p>รายงานสรุปยอดจำนวนนักเรียนที่ขาด แบ่งตามระดับชั้น </p>      </td>
  </tr>
  <tr>
    <td align="center">ประจำวันที่ <? echo "$w $d $n พ.ศ. $y"; ?></td>
  </tr>
  </table>


<?php
$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html 
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();         // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด */
?>

/*
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("PDF_File/Std-Study$datechk.pdf");  
*/