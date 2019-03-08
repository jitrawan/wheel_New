<?php
$getmember_detail = $getdata->my_sql_query(NULL,"dealer","dealer_id='".addslashes($_GET['key'])."'");
?>
<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-list fa-fw"></i> <?php echo @LA_LB_DETAIL_PRODUCT;?></h1>
     </div>
</div>
<ol class="breadcrumb">
  <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li><a href="?p=member"><?php echo @LA_LB_SUPPLIER;?></a></li>
  <li class="active"><?php echo @LA_LB_DETAIL_PRODUCT;?></li>
</ol>
<div class="panel panel-primary">
                        <div class="panel-heading">
                           <?php echo @LA_LB_SUPPLIER_DETAIL;?>
                        </div>
                        <div class="table-responsive">
                        <table width="100%" border="0" class="table">
  <tr>
    <td width="38%"><strong><?php echo @LA_LB_NAME_CHECKIN;?></strong></td>
    <td width="41%">&nbsp;<?php echo @$getmember_detail->dealer_name;?></td>

  </tr>
  <tr>
    <td><strong><?php echo @LA_LB_NO;?></strong></td>
    <td>&nbsp;<?php echo @$getmember_detail->dealer_code;?></td>
    </tr>
  <tr>
    <td><strong><?php echo @LA_LB_ADDRESS;?></strong></td>
    <td>&nbsp;<?php echo @$getmember_detail->address;?></td>
    </tr>
  <tr>
    <td><strong><?php echo @LA_LB_PHONE;?></strong></td>
    <td colspan="2">&nbsp;<?php echo @$getmember_detail->mobile;?></td>
  </tr>
  <tr>
    <td><strong><?php echo @LA_LB_EMAIL;?></strong></td>
    <td colspan="2">&nbsp;<?php echo @$getmember_detail->email;?></td>
  </tr>

</table>

                        </div>

</div>
 <div class="panel panel-green">
                        <div class="panel-heading">
                            <?php echo @LA_LB_HISTORY_CHECKIN_OF;?> <?php echo @$getmember_detail->member_name.'&nbsp;&nbsp;&nbsp;'.$getmember_detail->member_lastname;?>
                        </div>
                        <div class="table-responsive">
                            <table width="100%" border="0" class="table table-hover table-bordered">
                      <thead>
  <tr>
    <td width="3%" align="center" bgcolor="#CCCCCC"><strong>#</strong></td>
    <td width="32%" align="center" bgcolor="#CCCCCC"><strong>รายละเอียดสินค้า</strong></td>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=0;
  $getneed_checkin_today=$getdata->my_sql_selectJoin(" p.*, r.*, w.* ,w.diameter as diameterWheel,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter
  ,case
  when p.TypeID = '2'
  then (select b.Description from brandRubble b where r.brand = b.id)
  when p.TypeID = '1'
  then (select b.Description from BrandWhee b where b.id = w.brand)
  end BrandName"
  ,"product_N "
  ,"productDetailWheel w on p.ProductID = w.ProductID
  left join productdetailrubber r on p.ProductID = r.ProductID "
  ,"Where p.dealer_code='".@$getmember_detail->dealer_code."' ");
  while($showneed_checkin_today = mysql_fetch_object($getneed_checkin_today)){
    $i++;
    if($showneed_checkin_today->TypeID == '1'){
      $gettype = "ล้อแม๊ก ".$showneed_checkin_today->BrandName." ขนาด:".$showneed_checkin_today->diameterWheel." ขอบ:".$showneed_checkin_today->whediameter." รู:".$showneed_checkin_today->holeSize." ประเภท:".$showneed_checkin_today->typeFormat;
    }else if($showneed_checkin_today->TypeID == '2'){
      $gettype = "ยาง ".$showneed_checkin_today->BrandName." ขนาด:".$showneed_checkin_today->diameterRubber." ซี่รี่:".$showneed_checkin_today->series." ความกว้าง:".$showneed_checkin_today->width;
    }else{
      $gettype = "";
    }
  ?>
  <tr>
    <td align="center"><?php echo @$i;?></td>
    <td align=""><strong><?php echo @$gettype;?></strong></td>
    </tr>

  <?php
  }
  ?>
  </tbody>
</table>
                        </div>
                        <!--div class="panel-footer">
                            <a href="members/print_member_history.php?key=<?php echo @$getmember_detail->member_key;?>&lang=en" class="btn btn-sm btn-warning" target="_blank" style="color:#FFF;"><i class="fa fa-print"></i> <?php echo @LA_BTN_PRINT_EN;?></a><a href="members/print_member_history.php?key=<?php echo @$getmember_detail->member_key;?>&lang=th" class="btn btn-sm btn-warning" target="_blank" style="color:#FFF;"><i class="fa fa-print"></i> <?php echo @LA_BTN_PRINT_TH;?></a>
                        </div-->
</div>
