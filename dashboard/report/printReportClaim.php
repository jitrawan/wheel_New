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

$head .= '<table>
    <tr>
        <th width="12%">รหัสสินค้า</th>
        <th width="40%">รายละเอียด</th>
        <th width="10%" >ราคาซื้อ</th>
        <th width="10%">ราคาขาย</th>
        <th width="10%">คงเหลือ</th>
    </tr>
</thead>';
$head .= '<tr style="font-weight:bold; color:#FFF; background:#777777;">
							<td colspan="5">&nbsp;&nbsp;<b>เคลมสินค้า</b></td>
					</tr>';
if(addslashes($_GET['Group']) == '2'){
$getGroup = $getdata->my_sql_select(" ctype_key,ctype_name ","card_type","ctype_status='1' Group by ctype_key,ctype_name ORDER BY ctype_name ");
}else{
$getGroup = $getdata->my_sql_select(" ProductID "," product_n "," ProductStatus = '1' Group by ProductID ");
}
$content = "";
if (mysql_num_rows($getGroup) > 0) {
			$getStrGroup = '';
        while($row = mysql_fetch_object($getGroup)) {
          $gettype = "";
					if(addslashes($_GET['Group']) == '2'){
						$getStrGroup = $row->ctype_name;
					}else{
						$getStrGroup = $row->ProductID;
					}
            $content .= '<tr style="font-weight:bold; color:#FFF; background:#A9A9A9;">
                          <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;'.@$getStrGroup.'</td>
                      </tr>';
            $DetailProduct = $getdata->my_sql_select(" p.*, r.*, w.* ,w.diameter as diameterWheel,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter
            ,(select b.BrandName from brand b where r.brand = b.BrandID) as BrandName "
            ," product_N p
            left join productDetailWheel w on p.ProductID = w.ProductID
            left join productdetailrubber r on p.ProductID = r.ProductID "
            ," p.ProductStatus = '1' and p.TypeID = '".$row->TypeID."' and p.hand = '".$row->hand."' ");
            if(mysql_num_rows($DetailProduct) > 0){
                while($showDetailProduct = mysql_fetch_object($DetailProduct)){
                    if($showDetailProduct->TypeID == '1'){
                      $gettype = " ขนาด:".$showDetailProduct->diameterWheel." ขอบ:".$showDetailProduct->whediameter." รู:".$showDetailProduct->holeSize." ประเภท:".$showDetailProduct->typeFormat;
                    }else if($showDetailProduct->TypeID == '2'){
                      $gettype = $showDetailProduct->BrandName." ขนาด:".$showDetailProduct->diameterRubber." ขอบ:".$showDetailProduct->rubdiameter." ซี่รี่:".$showDetailProduct->series." ความกว้าง:".$showDetailProduct->width;
                    }else{
                      $gettype = "";
                    }
                $content .='<tr>
                  <td align="center"><strong>'.@$showDetailProduct->ProductID.'</strong></td>
                  <td><strong>'.@$gettype.'</strong></td>
                  <td valign="middle" style=" text-align: right;"><strong>'.@convertPoint2($showDetailProduct->PriceBuy,'2').'&nbsp;-.</strong></td>
                  <td valign="middle" style=" text-align: right;"><strong>'.@convertPoint2($showDetailProduct->PriceSale,'2').'&nbsp;-.</strong></td>
                  <td align="center" valign="middle"><strong>'.@convertPoint2($showDetailProduct->Quantity,'0').'&nbsp; ชิ้น</strong></td>
                </tr>';
              }
            }
        }
    }
    $content .='<tr style="font-weight:bold; color:#FFF; background:#A9A9A9;">
    <th colspan="5" style=" height: 15px;"></th>
    </tr>
		</table>
		<br>';

		$head2 = '<table>
			    <tr>
			        <th width="12%">รหัสสินค้า</th>
			        <th width="40%">รายละเอียด</th>
			        <th width="10%" >ราคาซื้อ</th>
			        <th width="10%">ราคาขาย</th>
			        <th width="10%">คงเหลือ</th>
			    </tr>
			</thead>';
			$head2 .= '<tr style="font-weight:bold; color:#FFF; background:#777777;">
										<td colspan="5">&nbsp;&nbsp;<b>เปลี่ยนสินค้า</b></td>
								</tr>';
		 if(addslashes($_GET['Group']) == '3'){
			 if (mysql_num_rows($getGroup) > 0) {
						 $getStrGroup = '';
							 while($row = mysql_fetch_object($getGroup)) {
								 $content2 = '<tr style="font-weight:bold; color:#FFF; background:#A9A9A9;">
															 <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;'.@$row->ProductID.'</td>
													 </tr>';
							 }
		 			 }
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

/*
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("PDF_File/Std-Study$datechk.pdf");
*/
