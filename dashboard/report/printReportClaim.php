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

use mPDF;
$mpdf = new mPDF('th', 'A4-L', '0', 'THSaraban');
$head = '
<style>
	body{
		font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
	}
  table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #465246;
  color: white;
}
.footer {
  font-size: 14px;
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: black;
   text-align: right;
}
</style>';

$str_sql = "";
$getGroup = "";
$getdateclaim = "";
if(isset($_GET['Group'])){
	if(addslashes($_GET['Group']) == '1'){
		$getGroup = 'ประเภท';
	}else if(addslashes($_GET['Group']) == '2'){
			$getGroup = 'สถานะ';
	}else{
			$getGroup = 'รหัสสินค้า';
	}

  if(addslashes($_GET['key']) != 0){
    $str_sql  .= " And TypeID = '".$_GET['key']."' ";
  }

}

$head .= '<h2 style="text-align:center">รายงานการเคลม</h2>
<p style="text-align:center"><b>รายงาน ณ วันที่ '.date("d/m/Y").' </b></p>
<p style="text-align:center"><b>จัดกลุ่มตาม '.$getGroup.' </b></p>';

if(isset($_GET['datefrom'])){
	$head .= '<p style="text-align:center"><b>วันที่เคลม ระหว่าง '.$_GET['datefrom'].'  ถึง '.$_GET['dateto'].' </b></p>';
}

$head .= '<table>';

$head .= '<tr style="font-weight:bold; color:#FFF; background:#777777;">
										<td colspan="5">&nbsp;&nbsp;<b>เคลมสินค้า</b></td>
								</tr>

           <tr>
                <th width="12%">รหัสสินค้า</th>
                <th width="40%">รายละเอียด</th>
                <th width="10%" >สาเหตุ</th>
                <th width="10%">จำนวน</th>
                <th width="10%">ExperDate</th>
                <th width="10%">วันที่เคลม</th>
            </tr>
</thead>';

$
$content = "";
$getGroup = $getdata->my_sql_select("card_code","card_info"," card_status != '' Group by card_code");
while($row = mysql_fetch_object($getGroup)){
$content .= '<tr style="font-weight:bold; color:#FFF; background:#A9A9A9;">
<td colspan="5">&nbsp;&nbsp;<b>เลขที่ใบเคลม : '.$row->card_code.' </b></td>
</tr>';
}

    $content .='<tr style="font-weight:bold; color:#FFF; background:#A9A9A9;">
    <th colspan="5" style=" height: 15px;"></th>
    </tr>
		</table>
    <br>';
    

    $head2 = '<table>';
   
    $head2 .= '<tr style="font-weight:bold; color:#FFF; background:#777777;">
                <td colspan="5">&nbsp;&nbsp;<b>เปลี่ยนสินค้า</b></td>
            </tr>
            <tr>
			        <th width="12%">รหัสสินค้า</th>
			        <th width="40%">รายละเอียด</th>
			        <th width="10%" >สาเหตุ</th>
			        <th width="10%">จำนวน</th>
              <th width="10%">ExperDate</th>
              <th width="10%">วันที่เปลี่ยน</th>
			    </tr>
      </thead>';
      $getchangeData  = $getdata->my_sql_select("reserve_key","changeproduct"," reserve_key != '' ");
      while($rowchange = mysql_fetch_object($getchangeData)){
      $getreserve_key = $getdata->my_sql_query("reserve_code","reserve_info"," reserve_key = '".$rowchange->reserve_key."' ");
      
$content2 .= '<tr style="font-weight:bold; color:#FFF; background:#A9A9A9;">
<td colspan="5">&nbsp;&nbsp;<b>เลขที่ใบเสร็จ : '.$getreserve_key->reserve_code.'</b></td>
</tr>';
      }
		
			$content2 .='<tr style="font-weight:bold; color:#FFF; background:#A9A9A9;">
	    <th colspan="5" style=" height: 15px;"></th>
	    </tr>
			</table>';

$end = '
<div class="footer">
 <p style="margin-right: 10px; color: #bbb7b7;">@รายงานร้านยางไว้ใจผม</p>
</div>';



$mpdf->WriteHTML($head);
$mpdf->WriteHTML($content);
$mpdf->WriteHTML($head2);
$mpdf->WriteHTML($content2);

$mpdf->WriteHTML($end);

$mpdf->Output();
?>

