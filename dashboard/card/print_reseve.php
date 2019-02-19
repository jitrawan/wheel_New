<?php session_start();error_reporting(0);?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();
date_default_timezone_set('Asia/Bangkok');
$getmember_info = $getdata->my_sql_query(NULL,"user","user_key='".$_SESSION['ukey']."'");
$card_detail = $getdata->my_sql_query(NULL,"reserve_info","reserve_key='".addslashes($_GET['key'])."'");
			if(isset($_GET['type'])){
					$str = 'Reprint';
					$reprintReserveKey=md5($card_detail->reserve_key.time("now"));
					$getdata->my_sql_insert("reprint_reserve"," reprintReserveKey='".$reprintReserveKey."'
					,reserve_key='".$card_detail->reserve_key."'
					,createDate=NOW()
					,createBy='".$_SESSION['ukey']."' ");
			}

  //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = '../../plugins/phpqrcode/temp/';
    $PNG_WEB_DIR = '../../plugins/phpqrcode/temp/';
    require("../../plugins/phpqrcode/qrlib.php");


?>
<title><? echo $str ?>  <?php echo @$card_detail->reserve_code;?></title>
<link href="../../css/bootstrap.min.css" rel="stylesheet">
 <link href="../../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/iconset/ios7-set-filled-1/flaticon.css" rel="stylesheet" type="text/css">
     <link href="../../css/sb-admin-2.css" rel="stylesheet">

</head>
<style type="text/css" media="print">
#paper
{
	width: 21cm;
	min-height: 25cm;
	padding: 2.5cm;
	position: relative;

}
</style>

<style type="text/css" media="screen">
#paper
{
	background: #FFF;
	border: 1px solid #666;
	margin: 20px auto;
	width: 21cm;
	min-height: 25cm;
	padding: 50px;
	position: relative;


	/* CSS3 */

	box-shadow: 0px 0px 5px #000;
	-moz-box-shadow: 0px 0px 5px #000;
	-webkit-box-shadow: 0px 0px 5px #000;
}
</style>
<style type="text/css" >
body{
	font-family:'thaisansliter1',sans-serif;
	font-size:14px;
}

@media print {
    .footerx{page-break-after: always;}
	body {-webkit-print-color-adjust: exact;}

}

#paper textarea
{
	margin-bottom:25px;
	width: 50%;
}
#paper table, #paper th, #paper td { border: none; }
#paper table.border, #paper table.border th, #paper table.border td { border: 1px solid #666; }
#paper th
{
	background: none;
	color: #000
}
#paper hr { border-style: solid; }
#signature
{
	bottom: 181px;
	margin: 50px;
	padding: 50px;
	position: absolute;
	right: 3px;
	text-align: center;
}
</style>

</head>

<body onLoad="javascript:window.print();">
<div id="paper">
  <div>
	<table width="100%">
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2"><h1 align="center">ใบเสร็จรับเงิน</h1></td>
		</tr>
		<tr>
			<td colspan="2" align="center">ร้านล้อยาง ไว้ใจผม</td>
		</tr>
		<tr>
			<td colspan="2" align="center">188/3 ถ.สายลวด ต.ปากน้ำ อ.เมือง จ.สมุทรปราการ 10270</td>
		</tr>
		<tr>
			<td colspan="2" align="center">โทร 080-986-8795</td>
		</tr>
    <tr>
			<td>วันที่ใบเสร็จ <?php echo $card_detail->create_date?></td>
			<td align="right"></td>
		</tr>
    <tr>
			<td>เลขที่ใบเสร็จรับเงิน : <?php echo $card_detail->reserve_code?></td>
			<td align="right"></td>
		</tr>
    <tr>
			<td>พนักงาน : <?php echo @$getmember_info->name;?> <?php echo @$getmember_info->lastname;?></td>
			<td align="right"></td>
		</tr>
    <tr>
			<td></td>
			<td align="right"></td>
		</tr>

	</table>
  <table width="100%">
  <tr>
			<td width="30%" align="center">รายการ </td>
      <td width="15%" align="center">จำนวน </td>
      <td width="15%" align="center">ราคา </td>
      <td width="15%" align="center">discount </td>
			<td width="15%" align="center">รวม</td>
		</tr>
  <tr>
    <td colspan="5">==================================================================================================================================</td></tr>
  </tr>
  <?
	$productInfo = $getdata->my_sql_select("i.*,p.*, r.*, w.* ,w.diameter as diameterWheel,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter
	,case
		when p.TypeID = '2'
		then (select b.BrandName from brand b where r.brand = b.BrandID)
		end BrandName "
	," reserve_item i
		 left join product_N p on p.ProductID = i.ProductID
		 left join productDetailWheel w on p.ProductID = w.ProductID
		 left join productDetailRubber r on p.ProductID = r.ProductID "
	," i.reserve_key='".addslashes($_GET['key'])."' ");
  //$productInfo = $getdata->my_sql_select("i.* , p.* ","reserve_item i left join product_n p on i.ProductID = p.ProductID "," i.reserve_key='".addslashes($_GET['key'])."' ");
  while($objpro = mysql_fetch_object($productInfo)){
		if($objpro->TypeID == '1'){
			$gettype = "ล้อแม๊ก"." ขนาด:".$objpro->diameterWheel." ขอบ:".$objpro->whediameter." รู:".$objpro->holeSize." ประเภท:".$objpro->typeFormat;
		}else if($objpro->TypeID == '2'){
			$gettype = "ยาง ".$objpro->BrandName." ขนาด:".$objpro->diameterRubber." ขอบ:".$objpro->rubdiameter." ซี่รี่:".$objpro->series." ความกว้าง:".$objpro->width;
		}else{
			$gettype = "";
		}
?>
		<tr>
			<td><?php echo $objpro->ProductID?> <?   echo $gettype ?></td>
      <td align="center"><?php echo $objpro->item_amt?></td>
      <td align="right"><?php echo convertPoint2($objpro->item_price,2)?> </td>
      <td align="right"><?php echo convertPoint2($objpro->item_discount,2)?></td>
			<td align="right"><?php echo convertPoint2($objpro->item_total,2)?></td>
		</tr>
    <? } ?>
  </tr><td colspan="5">-----------------------------------------------------------------------------------------------------------------------------------------------------------------</td></tr>
		<tr>
			<td colspan="4" align="right">จำนวนเงิน</td>
			<td align="right"><?php echo convertPoint2($card_detail->reserve_total,2)?></td>
		</tr>
		<tr>
			<td colspan="4" align="right">รวมราคาทั้งสิน</td>
			<td align="right"><?php echo convertPoint2($card_detail->reserve_total,2)?></td>
		</tr>
  </tr><td colspan="5">==================================================================================================================================</td></tr>
    <tr>
			<td colspan="4" align="right">VATAble</td>
      <td align="right"><?php echo convertPoint2($card_detail->reserve_total,2)?></td>
		</tr>
    <tr>
      <?
      $gettax = ($card_detail->reserve_total * 7)/100;
      ?>
			<td colspan="4" align="right">VAT 7.00%</td>
      <td align="right"><?php echo convertPoint2($gettax,2)?></td>
		</tr>
  </tr><td colspan="5">-----------------------------------------------------------------------------------------------------------------------------------------------------------------</td></tr>
	</table>
  <h4 align="left">*รับประกันสินค้า 15 วัน หลังการซื้อ</h4>
  <table width="100%">

    <tr>
			<td>เริ่มประกัน : <?php echo $card_detail->create_date?></td>
			<td></td>
		</tr>
    <tr>
			<td>สิ้นสุดประกัน : <?php echo Date("Y-m-d", strtotime($card_detail->create_date." +15 Day"));?></td>
			<td></td>
		</tr>


	</table>
  <br><br>

</div>
</div>
</body>
</html>
