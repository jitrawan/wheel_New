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

th {
  text-align: center;
  padding: 8px;
}

td {
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
</style>

<h2 style="text-align:center">รายงานการขาย</h2>
<p style="text-align:center"><b>รายงาน ณ วันที่ '.date("d-m-Y").' </b></p>';
$str_sql = "";
if(htmlentities($_GET['from'])){
		$str_sql  .= "and create_date BETWEEN '".htmlentities($_GET['from'])." 00:00:00' and  '".htmlentities($_GET['dateto'])." 23:59:59' ";
    $head .= '<p style="text-align:center"><b>วันที่ขาย ระหว่าง : '.$_GET['from'].'  ถึง '.$_GET['dateto'].' </b></p>';

}
$head .= '<table>
    <tr>
		<th width="5%">ลำดับ</th>
		<th width="10%">รหัสสินค้า </th>
		<th width="30%" style="text-align: center;">รายละเอียด </th>
		<th width="10%">ราคา</th>
		<th width="10%">จำนวน</th>
		<th width="10%">ลดราคา</th>
		<th width="10%">รวม</th>
    </tr>
</thead>';

$GroupType = $getdata->my_sql_select(" reserve_code,reserve_key ","reserve_info","reserve_status = 's' $str_sql Group by reserve_code,reserve_key order by create_date");
$content = "";
$sumAll = 0;
					if (mysql_num_rows($GroupType) > 0) {
						$sumAllitem_amt = 0;
						$sumAllitem_discount = 0;
						$sumAllitem_total = 0;
							while($row = mysql_fetch_object($GroupType)) {
					          $gettype = "";
												$content .= '<tr style="font-weight:bold; color:#FFF; background:#A9A9A9;">
																			<td colspan="5">&nbsp;&nbsp;<b>เลขที่ใบเสร็จ : '.@$row->reserve_code.'</b></td>
																	</tr>';
											$DetailProduct = $getdata->my_sql_select(" s.*, p.*, r.*, w.* ,w.diameter as diameterWheel,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter
											,case
												when p.TypeID = '2'
												then (select b.Description from brandRubble b where r.brand = b.id)
												when p.TypeID = '1'
												then (select b.Description from BrandWhee b where b.id = w.brand)
												end BrandName
												,case
								          when p.TypeID = '2'
								          then (select r.code from productdetailrubber r where r.ProductID = p.ProductID)
								          when p.TypeID = '1'
								          then (select w.code from productdetailwheel w where w.ProductID = p.ProductID)
								          end code "
										  ," reserve_item s
										  left join product_N p on p.ProductID = s.ProductID
										  left join productDetailWheel w on p.ProductID = w.ProductID
										  left join productdetailrubber r on p.ProductID = r.ProductID "
										  ," s.reserve_key = '".$row->reserve_key."' order by s.ProductID ");
											if(mysql_num_rows($DetailProduct) > 0){
												$sumbyproductID = 0;
												$sumbyproductIDitem_amt = 0;
												$sumbyproductIDitem_discount = 0;
												$sumbyproductIDitem_total = 0;
												$i = 1;
												while($showDetailProduct = mysql_fetch_object($DetailProduct)){
													if($showDetailProduct->TypeID == '1'){
												 	 $gettype = $showDetailProduct->BrandName." ขนาด:".$showDetailProduct->diameterWheel." ขอบ:".$showDetailProduct->whediameter." รู:".$showDetailProduct->holeSize." ประเภท:".$showDetailProduct->typeFormat;
												  }else if($showDetailProduct->TypeID == '2'){
												 	 $gettype = $showDetailProduct->BrandName." ขนาด:".$showDetailProduct->diameterRubber." ขอบ:".$showDetailProduct->rubdiameter." ซี่รี่:".$showDetailProduct->series." ความกว้าง:".$showDetailProduct->width;
												  }else{
												 	 $gettype = "";
												  }
												  $sumbyproductIDitem_amt = $sumbyproductIDitem_amt + $showDetailProduct->item_amt;
													$sumbyproductIDitem_discount = $sumbyproductIDitem_discount + $showDetailProduct->item_discount;
													$sumbyproductIDitem_total = $sumbyproductIDitem_total + $showDetailProduct->item_total;
												  $sumAllitem_amt = $sumAllitem_amt + $showDetailProduct->item_amt;
													$sumAllitem_discount = $sumAllitem_discount + $showDetailProduct->item_discount;
													$sumAllitem_total = $sumAllitem_total + $showDetailProduct->item_total;
												 $content .='<tr>
												 <td align="center"><strong>'.@$i.'</strong></td>
												 <td align="center"><strong>'.@$showDetailProduct->code.'</strong></td>
												 <td><strong>'.@$gettype.'</strong></td>
												 <td valign="middle" style=" text-align: right;"><strong>'.@convertPoint2($showDetailProduct->item_price,'2').'&nbsp;</strong></td>
												 <td valign="middle" style=" text-align: center;"><strong>'.@convertPoint2($showDetailProduct->item_amt,'0').'&nbsp;</strong></td>
												 <td valign="middle" style=" text-align: right;"><strong>'.@convertPoint2($showDetailProduct->item_discount,'2').'&nbsp;</strong></td>
												 <td valign="middle" style=" text-align: right;"><strong>'.@convertPoint2($showDetailProduct->item_total,'2').'&nbsp;</strong></td>
												 </tr>';
												 $i ++;


												}
											}
											$content .='<tr style="text-align: right; background:#525050;">
											<td style="color: white; text-align: right;" colspan="4">รวมจำนวนเงิน</td>
											<td valign="middle" style=" text-align: right; color: white;"><strong>'.@convertPoint2($sumbyproductIDitem_amt,'2').'</strong></td>
											<td valign="middle" style=" text-align: right; color: white;"><strong>'.@convertPoint2($sumbyproductIDitem_discount,'2').'</strong></td>
											<td valign="middle" style=" text-align: right; color: white;"><strong>'.@convertPoint2($sumbyproductIDitem_total,'2').'</strong></td>
											</tr>';

					        }
									$content .='<tr style="text-align: right; background:#525050;">
									<td style="color: white; text-align: right;" colspan="4">รวมจำนวนเงินทั้งหมด</td>
									<td valign="middle" style=" text-align: right; color: white;"><strong>'.@convertPoint2($sumAllitem_amt,'2').'</strong></td>
									<td valign="middle" style=" text-align: right; color: white;"><strong>'.@convertPoint2($sumAllitem_discount,'2').'</strong></td>
									<td valign="middle" style=" text-align: right; color: white;"><strong>'.@convertPoint2($sumAllitem_total,'2').'</strong></td>
									</tr>';

					    }

$content .= '<tbody>';

$end = '</tbody>
</table>
<div class="footer">
 <p style="margin-right: 10px; color: #bbb7b7;">@รายงานร้านยางไว้ใจผม</p>
</div>';



$mpdf->WriteHTML($head);
$mpdf->WriteHTML($content);
$mpdf->WriteHTML($end);

$mpdf->Output();
?>
