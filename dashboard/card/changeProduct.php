<?php
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();

if(@addslashes($_GET['lang'])){
	$_SESSION['lang'] = addslashes($_GET['lang']);
}else{
	$_SESSION['lang'] = $_SESSION['lang'];
}
if(@$_SESSION['lang']!=NULL){
	require("../../language/".@$_SESSION['lang']."/site.lang");
	require("../../language/".@$_SESSION['lang']."/menu.lang");
}else{
	require("../../language/th/site.lang");
	require("../../language/th/menu.lang");
	$_SESSION['lang'] = 'th';

}


$getitem_detail = $getdata->my_sql_query(" ri.*,p.*, d.*, w.*, s.*,ri.ProductID as ProductID
,case
	when p.TypeID = '2'
	then (select b.BrandName from brand b where d.brand = b.BrandID)
	end BrandName
	"
																			 ," reserve_item ri
																			 left join product_N p on ri.ProductID = p.ProductID
																			 left join productDetailWheel w on p.ProductID = w.ProductID
																			 left join productDetailRubber d on p.ProductID = d.ProductID
																			 left join shelf s ON p.shelf_id = s.shelf_id "
																			 ," ri.reserve_key = '".htmlentities($_GET['reserveKey'])."' and ri.ProductID = '".htmlentities($_GET['key'])."' ");

 if($getitem_detail->TypeID == '1'){
 	$gettype = "ล้อแม๊ก"." มือ".$getitem_detail->hand." ขอบ".$getitem_detail->whediameter;
 }else if($getitem_detail->TypeID == '2'){
 	$gettype = "ยาง ".$getitem_detail->BrandName." มือ".$getitem_detail->hand." ขอบ".$getitem_detail->rubdiameter;
 }else{
 	$gettype = "";
 }
?>

<div class="modal-body">
 <div class="form-group">
    <label for="edit_ProductID">หมายเลขสินค้า</label>
    <input type="text" name="edit_ProductID" id="edit_ProductID" readonly class="form-control" value="<?php echo @$getitem_detail->ProductID;?>">
 </div>
 <div class="form-group">
    <label>ชื่อรายการ</label>
    <input type="text" name="" id="" class="form-control" value="<?php echo @$gettype;?>" readonly>
 </div>
 <div class="form-group">
    <label for="edit_remark">สาเหตุที่เปลี่ยน</label>
    <textarea name="edit_remark" id="edit_remark" class="form-control" autofocus required></textarea>
 </div>
 <div class="form-group">
    <label for="edit_change_Amt">จำนวน</label>
		<div class="input-group col-xs-5">
		<span class="input-group-addon">123</span>
		 <input class="form-control right number" type="number"  name="edit_change_Amt" id="edit_change_Amt" style="text-align: right;" value="<?php echo @$getitem_detail->item_amt;?>">
		</div>
 </div>

 <div class="form-group">
  <input type="hidden" name="edit_reserve_key" id="edit_reserve_key" value="<?php echo @$getitem_detail->reserve_key;?>">

 </div>
 </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i><?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="save_edit_item" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
<script language="javascript">
$( document ).ready(function() {

$(".number").bind('keyup mouseup', function () {
								if($(this).val() < 0) {
									alert("กรุณากรอกตัวเลขให้ถูกต้อง ! "); 
									$(this).val(0);
								}       
						});
</script>						