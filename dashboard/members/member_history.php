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
    <td width="32%" align="center" bgcolor="#CCCCCC"><strong>รหัสสินค้า</strong></td>
    <td width="21%" align="center" bgcolor="#CCCCCC"><strong>ชื่อสินค้า</td>
    <td width="19%" align="center" bgcolor="#CCCCCC"><strong>ประเภท</td>
    <td width="25%" align="center" bgcolor="#CCCCCC"><strong>ยี่ห้อ</td>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=0;
  $getneed_checkin_today=$getdata->my_sql_select(NULL,"product","dealer_code='".@$getmember_detail->dealer_code."' ");
  while($showneed_checkin_today = mysql_fetch_object($getneed_checkin_today)){
    $i++;
    $getbrand =$getdata->my_sql_query("BrandName","brand","BrandID='".$showneed_checkin_today->BrandID."'");
    $getType =$getdata->my_sql_query("TypeName","type","TypeID='".$showneed_checkin_today->TypeID."'");
  ?>
  <tr>
    <td align="center"><?php echo @$i;?></td>
    <td align="center"><strong><?php echo @$showneed_checkin_today->ProductID;?></strong></td>
    <td align="center"><?php echo @$showneed_checkin_today->ProductName;?></td>
    <td align="center"><?php echo @$getbrand->BrandName;?></td>
    <td align="center"><?php echo @$getType->TypeName;?></td>
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