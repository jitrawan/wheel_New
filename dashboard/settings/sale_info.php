<style>
.warantryTrue {
  font-size: 20px;
  font-weight:bold;
  color: green;
}
.warantryFalse {
  font-size: 20px;
  font-weight:bold;
  color: red;
}
.autocomplete {
  position: relative;

}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  top: 100%;
  left: 0;
  right: 0;
  width: 50%;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9;
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important;
  color: #ffffff;
}
table {
  border-collapse: collapse;
  width: 100%;
}

td, th {

  padding: 8px;
}

.g-input{
    width: 100%;
}
.right{
  text-align: right;
}
.total{
  background-color: #fffacd;
    color: #255a32;
    font-size: 2.5em;
}
.total1{
  font-size: 1.5em;
}
#itable_product th{
  background-color : #C3C0C0;
  color: #FFF;
}


</style>


<link href="../css/jquery-ui.min1.10.1.css" rel="stylesheet">
<script src="../js/jquery-ui.min.1.10.1.js"></script>

</head>
<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-shopping-cart fa-fw"></i> การขายสินค้า</h1>
     </div>
</div>
<ol class="breadcrumb">
<li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li class="active">รายละเอียดการทำธุรกรรม</li>
</ol>
<?

if(isset($_POST['tSave'])){
  $getdata->my_sql_update("reserve_info"," reserve_status='S' ,reserve_tax='".$_POST['reserve_tax']."' ,reserve_total='".$_POST['reserve_total']."' ,remark='".$_POST['comment']."' "," reserve_key='".$_POST['savereserve_key']."' ");
  $productInfo = $getdata->my_sql_select("  sum(item_amt) sumatm ,ProductID ","reserve_item "," reserve_key='".$_POST['savereserve_key']."' GROUP BY ProductID ");
  while($objpro = mysql_fetch_object($productInfo)){
      $getdata->my_sql_update(" product_n "," Quantity=Quantity - '".$objpro->sumatm."' "," ProductID='".$objpro->ProductID."' ");

  }
  echo "<script>window.open(\"../dashboard/card/print_reseve.php?key=\"+'".$_POST['savereserve_key']."', '_blank');</script>";
  echo "<script>window.location=\"../dashboard/?p=saleProduct\"</script>";

}else if(isset($_POST['save_item'])){

  $reserve_key=md5($_POST['reserve_key'].addslashes($_POST['setProductID']));

  $getdata->my_sql_update("reserve_info"," reserve_status='P' "," reserve_key='".$_POST['reserve_key']."' ");

  $getproduct_info = $getdata->my_sql_query(" p.*,r.*,w.*,p.ProductID as setProductID "
  ," product_N p left join productDetailWheel w on p.ProductID = w.ProductID
     left join productDetailRubber r on p.ProductID = r.ProductID "
  ," p.ProductID='".addslashes($_POST['setProductID'])."' ");

  $getdicountTotal = ($getproduct_info->PriceSale * $getproduct_info->discount) / 100;
  $getprice = $getproduct_info->PriceSale - $getdicountTotal;
  $gettotal = $getprice * $_POST['product_quantity'];

  if($_POST['product_quantity'] <= $getproduct_info->Quantity){

    $getdata->my_sql_insert("reserve_item"," item_key='".$reserve_key."'
    ,reserve_key='".$_POST['reserve_key']."'
    ,ProductID='".addslashes($_POST['setProductID'])."'
    ,item_amt='".$_POST['product_quantity']."'
    ,item_discount='".$getdicountTotal."'
    ,item_price='".$getproduct_info->PriceSale."'
    ,item_total='".$gettotal."'
    ,create_Date=NOW() ");

    $getreserve_info = $getdata->my_sql_query(NULL,"reserve_info"," reserve_key='".$_POST['reserve_key']."' ");
    $getreserveCode = $getreserve_info->reserve_code;

  }else{
    $alert = '<div class="alert alert-danger alert-dismissable" id="alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>จำนวนสินค้าไม่พอจำหน่าย กรุณาระบุใหม่อีกครั้ง !</div>';
  }

}else{

  $getdata->my_sql_delete("reserve_info","reserve_status = 'N'");

  $getreserveCode = @RandomString(4,'C',7);
  $reserve_key=md5($_SESSION['uname'].@RandomString(4,'C',7));
  $getdata->my_sql_insert("reserve_info","reserve_key='".$reserve_key."',reserve_code='".$getreserveCode."',reserve_status='N',empolyee='".$_SESSION['ukey']."',create_date=NOW()");

}

$getproduct_info = $getdata->my_sql_select(NULL,"product_N",NULL);
while($objShow = mysql_fetch_object($getproduct_info)){
            $return_arr[] =  $objShow->ProductID;
             $data[] = $objShow;
        }

        $getjoson = json_encode($return_arr);

        $results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
        $testdata = json_encode($results);


 if(htmlentities($_GET['q']) != ""){

  $getcard = $getdata->my_sql_selectJoin(" p.*, d.*, w.*, s.* ,r.*,p.ProductID as setProductID ,DATEDIFF(CURDATE(),r.reserveDate) as warantryDay
                                          ,CASE
                                              WHEN DATEDIFF(CURDATE(),r.reserveDate) <= p.Warranty THEN 'T'
                                              ELSE 'F'
                                              END as resultwarantry
                                          ,CASE
                                              WHEN DATEDIFF(CURDATE(),r.reserveDate) <= p.Warranty THEN 'warantryTrue'
                                              ELSE 'warantryFalse'
                                              END as csswarantry "
                                          ," product_N "
                                          ," productDetailWheel w on p.ProductID = w.ProductID
                                          left join productDetailRubber d on p.ProductID = d.ProductID
                                          left join shelf s ON p.shelf_id = s.shelf_id
                                          left join reserve r ON p.ProductID = r.ProductID "
                                          ,"WHERE r.reserveId = ".htmlentities($_GET['q']));
                                        }
  $getreserve_info = $getdata->my_sql_query(NULL,"reserve_info"," reserve_code='".$getreserveCode."' ");
  $showcard = mysql_fetch_object($getcard);
  ?>

<div class="tab-pane fade in active" id="info_data">

<div class="panel panel-primary">
<div class="panel-heading"><i class="fa fa-shopping-cart fa-fw"></i> การขายสินค้า[<?= $getreserve_info->reserve_code?>]</div>
<div class="panel-body">
  <form method="post" enctype="multipart/form-data" name="form2" id="additem">
<div class="form-group row">
  <div class="col-xs-6">
    <?
            $objQuery=$getdata->my_sql_select("max(reserveId) as maxcode ","reserve","");
            $objShow=mysql_fetch_object($objQuery);
            @$getMaxid = (int)$objShow->maxcode + 1;

            $checkPro = $getdata->my_sql_select(NULL," product_N "," ProductID = '".$getMaxid."' ");



    ?>
    <label>เลขที่ใบเสร็จ : </label>
    <div class="input-group">
      <span class="input-group-addon">123</span>
     <input class="form-control" type="text" placeholder="เว้นว่างไว้เพื่อสร้างโดยอัตโนมัติ" name="" id="" readonly>
    </div>
    <input class="form-control" type="hidden" name="reserve_no" id="reserve_no" value="<?php echo @$getMaxid;?>">
    <input class="form-control" type="hidden" name="checkpro" id="checkpro" value="<?php echo @mysql_num_rows($checkPro);?>">
    <input class="form-control" type="hidden" name="result" id="result" value="">
    <input class="form-control" type="hidden" name="reserve_key" id="reserve_key" value="<?= $getreserve_info->reserve_key?>">

  </div>
  <div class="col-xs-6">
    <label>วันที่ใบเสร็จ : </label>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      <input class="form-control form_datetime" type="text" name="reserve_date" id="reserve_date" title="วันที่ใบเสร็จ" value="<?= date("Y-m-d")?>">
    </div>

  </div>
</div>
<div class="form-group row">
  <div class="col-xs-3">
    <label>จำนวน : </label>
    <div class="input-group">
      <span class="input-group-addon">123</span>
     <input class="form-control right number" type="number"  name="product_quantity" id="product_quantity" value="1">
    </div>
    </div>
  <div class="col-xs-9">
    <label>รหัสสินค้า/บาร์โค้ด : </label>

<div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
  <input class="form-control" placeholder="กรอกรหัสสินค้า เพื่อค้นหา" type="text" name="ProductID" id="ProductID" autocomplete="off">
  <input class="form-control" type="hidden" name="setProductID" id="setProductID">
  <div class="autocomplete" style="width:50%;"></div>
</div>
<button type="submit" name="save_item" id="save_item" style="display:none;"></button>
  </div>
</div>
</form>
<?php echo @$alert;?>
<form id="form1" name="form1" method="post">
<div class="table-responsive">
<!--itable_product-->
<table id="" class="" cellspacing="0" style="width:100%">
  <tr style="font-weight:bold; color:#FFF; text-align:center;">
    <td width="5%" bgcolor="#888888">จำนวน</td>
    <td width="25%" bgcolor="#888888">รายละเอียด</td>
    <td width="10%" bgcolor="#888888">หน่วยละ</td>
    <td width="15%" bgcolor="#888888" colspan="2">ส่วนลด</td>
    <td width="10%" bgcolor="#888888">จำนวนเงิน (บาท)</td>
    <td width="10%" bgcolor="#888888"></td>
    </tr>
    <tbody>
      <?
      $gettotal = 0;
      $getproduct_info = $getdata->my_sql_select("i.* ,p.*, r.*, w.* ,w.diameter as diameterWheel,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter
      ,case
        when p.TypeID = '2'
        then (select b.Description from brandRubble b where r.brand = b.id)
        when p.TypeID = '1'
        then (select b.Description from BrandWhee b where b.id = w.brand)
        end BrandName
      ","reserve_item i left join product_n p on i.ProductID = p.ProductID
      left join productDetailWheel w on p.ProductID = w.ProductID
      left join productDetailRubber r on p.ProductID = r.ProductID
      "," reserve_key='".$getreserve_info->reserve_key."' ");
      while($objShow = mysql_fetch_object($getproduct_info)){
        if($objShow->TypeID == '1'){
          $gettype = "ล้อแม๊ก ".$objShow->BrandName." ขนาด:".$objShow->diameterWheel." ขอบ:".$objShow->whediameter." รู:".$objShow->holeSize." ประเภท:".$objShow->typeFormat;
        }else if($objShow->TypeID == '2'){
          $gettype = "ยาง ".$objShow->BrandName." ขนาด:".$objShow->diameterRubber." ขอบ:".$objShow->rubdiameter." ซี่รี่:".$objShow->series." ความกว้าง:".$objShow->width;
        }else{
          $gettype = "";
        }

        
      ?>
      <tr id="<?php echo @$objShow->item_key;?>">
        <td class="right"><label class="g-input"><div><input type="text" class="form-control right" size="5" value="<?= @$objShow->item_amt?>" class="price"></div></label></td>
        <td class=""><label class="g-input"><div><input type="text" class="form-control" size="5" value="<?= @$objShow->ProductID?> <?= $gettype?>" class="price"></div></label></td>
        <td class="right"><label class="g-input"><div><input type="text" class="form-control right" size="5" value="<?= convertPoint2($objShow->item_price,2)?>" class="price"></div></label></td>
        <td class="right"><label class="g-input"><span class="g-input"><div class="input-group"><input type="text" class="form-control right" value="<?= $objShow->discount?>"  size="5" class="price" ><span class="input-group-addon">%</span></div></span></label></td>
        <td class="right"><label class="g-input"><div><input type="text" class="form-control right" size="5" value="<?= convertPoint2($objShow->item_discount,2)?>" class="price"></div></label></td>
        <td class="right"><label class="g-input"><div><input type="text" class="form-control right" size="5" value="<?= convertPoint2($objShow->item_total,2)?>" class="price"></div></label></td>
        <td style="text-align: center;"><a onClick="javascript:deleteItem('<?php echo @$objShow->item_key;?>');" class="btn btn-xs btn-danger" style="color:#FFF;" title="ลบ"><i class="fa fa-times"></i> <?php echo @LA_BTN_DELETE;?></a></td>
      </tr>
    <?
    $gettotal = $gettotal + $objShow->item_total;

   }
   $gettotaltax = 0;
   $sumtotal = 0;
   if(mysql_num_rows($getproduct_info) > 0){
     $gettotaltax =  ($gettotal * 7) / 100;
     $sumtotal = $gettotal;
   }
    ?>
    </tbody>
</table>
<table id="">
  <tfoot>
      <tr>
         <td colspan="3" rowspan="8" class="top"><label for="comment">หมายเหตุ</label>
           <label class="g-input">
           <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
             <textarea rows="6" name="comment" id="comment" class="form-control"></textarea>
            </div>
           </div>

          </td>
         <td class="right">รวม</td>
         <td colspan="2" class="right" id="sub_total">
           <input style="border:none; height: auto; " class="form-control total1 right" type="text" size="7" value="<?= convertPoint2($gettotal,2)?>">
           <input class="form-control" type="hidden" name="clock" id="clock" value="<?= $gettotal?>">
         </td>
         <td class="right">บาท</td>
      </tr>
     <!--tr>
         <td class="right"><label for="tax_status">ภาษีหัก ณ. ที่จ่าย</label></td>
         <td><label class="g-input"><span class="g-input"><div class="input-group"--><input type="hidden" class="form-control right number" value="7" name="tax" id="tax" size="5" class="price" readonly><!--span class="input-group-addon">%</span></div></span></label></td-->
         <!--td>
           <label class="g-input"--><input class="form-control right number" type="hidden" size="5"  value="<?= convertPoint2($gettotaltax,2)?>" readonly="">
         <!--/label-->
           <input class="form-control" type="hidden" id="reserve_tax" name="reserve_tax" value="<?= $gettotaltax?>">
         <!--/td>
         <td class="right">บาท</td>
      </tr-->
      <tr class="due">
         <td class="right">รวมทั้งสิ้น</td>
         <td colspan="2" >
           <input style="border:none; height: auto; " class="form-control total right"  type="text"  value="<?= convertPoint2($sumtotal,2)?>"  size="7" >
           <input class="form-control" type="hidden" id="reserve_total" name="reserve_total" value="<?= $sumtotal?>">
         </td>
         <td class="right">บาท</td>
      </tr>
      <tr class="due">
         <td class="right"></td>
         <td class="right" colspan="2" id="payment_amount"><button type="submit" style="background-color: #4caf50; border-color: #4caf50; font-size:22px;" name="tSave" id="tSave" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> <?php echo @LA_BTN_SAVE;?></button></td>
         <input class="form-control" type="hidden" name="savereserve_key" id="savereserve_key" value="<?= $getreserve_info->reserve_key?>">
         <td class="right"></td>
      </tr>

   </tfoot>
</table>
</form>
</div>
</div>

<!--/form-->


</div>
  </div>

<script language="javascript">

$(document).ready(function(){
  $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
    $("#alert-danger").slideUp(500);
});

  $(".number").bind('keyup mouseup', function () {
								if($(this).val() < 0) {
									alert("กรุณากรอกตัวเลขให้ถูกต้อง ! ");
									$(this).val(0);
								}
						});

  var getjson = <?= $getjoson?>;
  $("#ProductID").autocomplete({
             source: getjson,
             minLength: 1,
             select: function (event, ui) {
               var str = ui.item.value;
               $('#setProductID').val(str);
               $('#save_item').click();
              }
    });

});
function deleteItem(item_key){
if(confirm("คุณต้องการจะลบรายการนี้ใช่หรือไม่ ?")){
if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
}else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200){
  document.getElementById(item_key).innerHTML = '';
    }
}
xmlhttp.open("GET","function.php?type=delete_item&key="+item_key,true);
xmlhttp.send();
         }
}

$(".form_datetime").datepicker({
  format: 'yyyy-mm-dd',
  todayHighlight: true
}).on('changeDate', function(e){
$(this).datepicker('hide');
});


</script>
