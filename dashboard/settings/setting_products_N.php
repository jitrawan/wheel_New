
<style>
.fontawesome-select {
    font-family: 'FontAwesome', 'Helvetica';
}
</style>
<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa flaticon-bullet1 fa-fw"></i> <?php echo @LA_MN_PRODUCT;?></h1>
     </div>
</div>
<ol class="breadcrumb">
  <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
   <!--li><a href="?p=setting"><--?php echo @LA_LB_SETTING;?></a></li-->
  <li class="active"><?php echo @LA_MN_PRODUCT;?></li>
</ol>
<?php
if(isset($_POST['save_product'])){

	if(addslashes($_POST['ProductID']) != NULL){

$getfont = $getdata->my_sql_select(NULL,"product_N","ProductID='".addslashes($_POST['ProductID'])."' ");

if(mysql_num_rows($getfont) < 1){
    $getdata->my_sql_insert_New("product_N","ProductID, dealer_code
    , Quantity, PriceSale, PriceBuy, TypeID, ProductStatus, shelf_id, hand, discount "
    ," '".addslashes($_POST['ProductID'])."'
    ,'".addslashes($_POST['dealer_code'])."'
    ,'".addslashes($_POST['Quantity'])."'
    ,'".addslashes($_POST['PriceSale'])."'
    ,'".addslashes($_POST['PriceBuy'])."'
    ,'".addslashes($_POST['type'])."'
    ,'".addslashes($_POST['pro_status'])."'
    ,'".addslashes($_POST['shelf_id'])."'
    , '".addslashes($_POST['hand'])."'
    , '".addslashes($_POST['discount'])."' ");

    if($_POST['type'] == '1'){
    $getdata->my_sql_insert_New("productDetailWheel","ProductID, diameter, rim, holeSize, typeFormat"
    ," '".addslashes($_POST['ProductID'])."'
    , '".addslashes($_POST['diameterWheel'])."'
    , '".addslashes($_POST['rim'])."'
    , '".addslashes($_POST['holeSize'])."'
    , '".addslashes($_POST['typeFormat'])."' ");
  }else if ($_POST['type'] == '2'){
      $getdata->my_sql_insert_New("productDetailRubber","ProductID, width, series, diameter, brand"
      ,"  '".addslashes($_POST['ProductID'])."'
      , '".addslashes($_POST['width'])."'
      , '".addslashes($_POST['series'])."'
      , '".addslashes($_POST['diameterRubber'])."'
      , '".addslashes($_POST['brand'])."'");
    }
    $alert = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_ADD_NEW_TYPE_OF_IS_DONE.'</div>';
  }
  }else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_DATA_MISMATCH.'</div>';
	}
}

if(isset($_POST['save_edit_item'])){
  if(addslashes($_POST['edit_ProductID']) != NULL){
    $table = "product_N p ";
    $Strsql = " p.shelf_id = ".addslashes($_POST['edit_shelf_id']).", p.dealer_code = '".addslashes($_POST['edit_dealer_code'])."' ";
    $Strsql .= " ,p.Quantity=".addslashes($_POST['edit_Quantity'])." , p.PriceSale= ".addslashes($_POST['edit_PriceSale'])." ";
    $Strsql .= " ,p.PriceBuy=".addslashes($_POST['edit_PriceBuy'])." ";
    $Strsql .= " ,p.hand = '".addslashes($_POST['edit_hand'])."',p.discount = '".addslashes($_POST['discount'])."' ";
    if($_POST['gettype'] == '1'){
      $table .= " left join productDetailWheel w on p.ProductID = w.ProductID ";
      $Strsql .= " ,w.diameter = '".addslashes($_POST['edit_diameterWheel'])."' ,w.rim = '".addslashes($_POST['edit_rim'])."' ";
      $Strsql .= " ,w.holeSize = ".addslashes($_POST['edit_holeSize'])." ,w.typeFormat = '".addslashes($_POST['edit_typeFormat'])."' ";
    }else if($_POST['gettype'] == '2'){
      $table .= " left join productDetailRubber r on p.ProductID = r.ProductID ";
      $Strsql .= " ,r.width = '".addslashes($_POST['edit_width'])."' ,r.series = '".addslashes($_POST['edit_series'])."' ";
      $Strsql .= " ,r.diameter = '".addslashes($_POST['edit_diameterRubber'])."' ,r.brand = '".addslashes($_POST['edit_brand'])."' ";
    }


	  $getdata->my_sql_updateJoin($table , $Strsql ," p.ProductID = '".addslashes($_POST['edit_ProductID'])."' ");

	$alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_UPDATE_DATA_DONE.'</div>';
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_DATA_MISMATCH.'</div>';
	}
}
?>
<!-- Modal Edit -->
<div class="modal fade" id="edit_item" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form method="post" enctype="multipart/form-data" name="form2" id="form2">

     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo @LA_BTN_CLOSE;?></span></button>
                    <h4 class="modal-title" id="memberModalLabel">แก้ไขข้อมูลสินค้า</h4>
                </div>
                <div class="ct">

                </div>
            </div>
        </div>
  </form>
</div>

<div class="modal fade" id="model_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><form method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">เพิ่มรายการสินค้า</h4>
                                        </div>
                                        <?
                                                @$getMaxid = $getdata->getMaxID("ProductID","product_N","P");
                                                $getshelf = $getdata->my_sql_select(NULL,"shelf",NULL);
                                                $getdealer = $getdata->my_sql_select(NULL,"dealer",NULL);

                                        ?>
                                         <div class="modal-body">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                              <label for="ProductID">รหัสสินค้า</label>
                                              <input type="text" name="ProductID" id="ProductID" value="<?php echo @$getMaxid;?>" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-6">
                                            <label for="hand">สืินค้ามือ</label>
                                           <select name="hand" id="hand" class="form-control">
                                                <option value="1" selected="selected">1</option>
                                                <option value="2">2</option>

                                              </select>
                                             </div>
                                         </div>

                                        <div class="form-group row">
                                          <div class="col-md-4">
                                          <label >ประเภทสินค้า :    </label>
                                          <input type="radio" id="wheel" name="type" value="1" checked>
                                          <label for="wheel">ล้อแม๊ก</label>
                                          </div>
                                          <div class="col-md-6">
                                          <input type="radio" id="rubber" name="type" value="2">
                                          <label for="rubber">ยาง</label>
                                          </div>
                                        </div>

                                        <!--ล้อ-->
                                        <div id="detailwheel" name="detailwheel" style="padding: 5px; border: 0px solid #4CAF50;">
                                        <div class="form-group row">
                                              <div class="col-md-3">
                                              <label for="diameterWheel">ขนาด</label>
                                                <select name="diameterWheel" id="diameterWheel" class="form-control">
                                                  <option value="" selected="selected">--เลือก--</option>
                                                </select>
                                              </div>
                                              <div class="col-md-3">
                                              <label for="rim">ขอบ</label>
                                              <select name="rim" id="rim" class="form-control">
                                                  <option value="" selected="selected">--เลือก--</option>
                                                </select>
                                              </div>
                                              <div class="col-md-2">
                                              <label for="holeSize">รู</label>
                                               <select name="holeSize" id="holeSize" class="form-control">
                                                  <option value="" selected="selected">--เลือก--</option>
                                                </select>
                                              </div>
                                              <div class="col-md-4">
                                              <label for="typeFormat">ประเภท</label>
                                               <select name="typeFormat" id="typeFormat" class="form-control">
                                                  <option value="" selected="selected">--เลือก--</option>
                                                </select>
                                              </div>
                                            </div>
                                         </div>
                                         <!--ยาง-->
                                         <div id="detailrubber" name="detailrubber" style="padding: 5px; border: 0px solid #4CAF50;">
                                         <div class="form-group row">
                                              <div class="col-md-3">
                                              <label for="diameterRubber">ขนาด</label>
                                               <select name="diameterRubber" id="diameterRubber" class="form-control">
                                                  <option value="" selected="selected">--เลือก--</option>
                                                </select>
                                               </div>
                                              <div class="col-md-3">
                                              <label for="series">ซี่รี่</label>
                                              <select name="series" id="series" class="form-control">
                                                  <option value="" selected="selected">--เลือก--</option>
                                                </select>
                                              </div>
                                              <div class="col-md-2">
                                              <label for="width">ความกว้าง</label>
                                                <select name="width" id="width" class="form-control">
                                                  <option value="" selected="selected">--เลือก--</option>
                                                </select>
                                              </div>
                                              <div class="col-md-4">
                                              <label for="brand">ยี่ห้อ</label>
                                               <select name="brand" id="brand" class="form-control">
                                                  <option value="" selected="selected">--เลือก--</option>
                                                </select>
                                              </div>
                                            </div>
                                         </div>


                                           <div class="form-group row">
                                            <div class="col-md-6">
                                            <label for="shelf_id">shelf</label>
                                              <select name="shelf_id" id="shelf_id" class="form-control">
                                                <option value="" selected="selected">--เลือกชั้นวางสินค้า--</option>
                                                <?
                                              while($showshelf = mysql_fetch_object($getshelf)){?>
                                              <option value="<?php echo @$showshelf->shelf_id;?>"><?php echo @$showshelf->shelf_detail;?></option>
                                              <?
                                               }
                                             ?>
                                              </select>
                                            </div>
                                            <div class="col-md-6">
                                             <!--label for="Warranty">การรับประกัน</label>
                                            <input type="text" name="Warranty" id="Warranty" class="form-control" -->
                                             </div>
                                          </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                              <label for="PriceSale">ราคาขาย</label>
                                              <input type="number" name="PriceSale" id="PriceSale" class="form-control" value="0" style="text-align: right;">
                                            </div>
                                             <div class="col-md-6">
                                             <label for="PriceBuy">ราคาซื้อ</label>
                                            <input type="number" name="PriceBuy" id="PriceBuy" class="form-control" value="0" style="text-align: right;">
                                             </div>
                                          </div>

                                          <div class="form-group row">
                                            <div class="col-md-6">
                                              <label for="Quantity">คงเหลือ</label>
                                              <input type="number" name="Quantity" id="Quantity" class="form-control" value="0" style="text-align: right;">
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                           </div>

                                           <div class="form-group row">
                                            <div class="col-md-6">
                                              <label for="dealer_code">ผู้จำหน่าย</label>
                                              <select name="dealer_code" id="dealer_code" class="form-control">
                                                <option value="" selected="selected">--เลือกผู้จำหน่าย--</option>
                                                <?
                                                while($showdealer = mysql_fetch_object($getdealer)){?>
                                                <option value="<?php echo @$showdealer->dealer_code;?>" ><?php echo @$showdealer->dealer_name;?></option>
                                                <?
                                                }
                                              ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                            <label for="pro_status"><?php echo @LA_LB_STATUS;?></label>
                                           <select name="pro_status" id="pro_status" class="form-control">
                                                <option value="1" selected="selected">เปิดใช้งาน</option>
                                                <option value="0">ปิดใช้งาน</option>

                                              </select>
                                            </div>
                                           </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> <?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="save_product" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i> <?php echo @LA_BTN_SAVE;?></button>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                </form>
                                <!-- /.modal-dialog -->
</div>
                            <!-- /.modal -->
  <?php
  echo @$alert;
  ?>

 <!--button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-fw"></i><?php echo @LA_LB_ADD_NEW_CATEGORIES;?></button--><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#model_product"><i class="fa flaticon-bullet1 fa-fw"></i>เพิ่มรายการสินค้า</button>
 <br/><br/>

 <nav class="navbar navbar-default" role="navigation">
  <form method="post" enctype="multipart/form-data" name="frmSearch" id="frmSearch">
    <div style="margin: 10px;">
      <div class="form-group row">
          <div class="col-md-3">
            <label ><b>ค้นหาจาก ประเภทสินค้า :    </b></label>
            <input type="radio" id="search_wheel" name="search_type" value="1" checked>
            <label for="wheel">ล้อแม๊ก</label>
          </div>
          <div class="col-md-6">
            <input type="radio" id="search_rubber" name="search_type" value="2">
            <label for="rubber">ยาง</label>
          </div>
      </div>

          <!--ล้อ-->
    <div id="search_detailwheel" name="search_detailwheel" style="padding: 5px; border: 0px solid #4CAF50;">
        <div class="form-group row">
            <div class="col-md-3">
            <label for="search_diameterWheel">ขนาด</label>
              <select name="search_diameterWheel" id="search_diameterWheel" class="form-control">
                <option value="" selected="selected">--เลือก--</option>
              </select>
            </div>
            <div class="col-md-3">
            <label for="search_rim">ขอบ</label>
            <select name="search_rim" id="search_rim" class="form-control">
                <option value="" selected="selected">--เลือก--</option>
              </select>
            </div>
            <div class="col-md-2">
            <label for="search_holeSize">รู</label>
              <select name="search_holeSize" id="search_holeSize" class="form-control">
                <option value="" selected="selected">--เลือก--</option>
              </select>
            </div>
            <div class="col-md-4">
            <label for="search_typeFormat">ประเภท</label>
              <select name="search_typeFormat" id="search_typeFormat" class="form-control">
                <option value="" selected="selected">--เลือก--</option>
              </select>
            </div>
          </div>
    </div>
           <!--ยาง-->
    <div id="search_detailrubber" name="search_detailrubber" style="padding: 5px; border: 0px solid #4CAF50;">
        <div class="form-group row">
          <div class="col-md-3">
                  <label for="search_diameterRubber">ขนาด</label>
                    <select name="search_diameterRubber" id="search_diameterRubber" class="form-control">
                      <option value="" selected="selected">--เลือก--</option>
                    </select>
                    </div>
                  <div class="col-md-3">
                  <label for="search_series">ซี่รี่</label>
                  <select name="search_series" id="search_series" class="form-control">
                      <option value="" selected="selected">--เลือก--</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                  <label for="wisearch_widthdth">ความกว้าง</label>
                    <select name="search_width" id="search_width" class="form-control">
                      <option value="" selected="selected">--เลือก--</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                  <label for="search_brand">ยี่ห้อ</label>
                    <select name="search_brand" id="search_brand" class="form-control">
                      <option value="" selected="selected">--เลือก--</option>
                    </select>
                  </div>
          </div>
     </div>

      </div>
      <div style="text-align: center;margin-bottom: 10px;">

          <button type="submit" name="search_product" id="search_product" class="btn btn-default"><i class="fa fa-search"></i> ค้นหา</button>
      </div>

    </div>

    </form>
</nav>
 <div class="panel panel-default">
   <div class="table-responsive tooltipx">
  <!-- Table -->
  <?php
  $x=0;
  $str_sql = "";
  if(isset($_POST['search_product'])){
   if(addslashes($_POST['search_type']) == 1){
    if($_POST['search_diameterWheel'] != ""){
        $str_sql  .= " And w.diameter = '".$_POST['search_diameterWheel']."' ";
      }
      if($_POST['search_rim'] != ""){
        $str_sql  .= " And w.rim = '".$_POST['search_rim']."' ";
      }
      if($_POST['search_holeSize'] != ""){
        $str_sql  .= " And w.holeSize = ".$_POST['search_holeSize'];
      }
      if(addslashes($_POST['search_typeFormat']) != ""){
        $str_sql  .= " And w.typeFormat = '".addslashes($_POST['search_typeFormat'])."' ";
      }
      $getproduct = $getdata->my_sql_selectJoin("p.*, r.*, w.* ,w.diameter as diameterWheel,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter
      ,(select b.BrandName from brand b where r.brand = b.BrandID) as BrandName "
        ,"product_N"
        ,"productDetailWheel w on p.ProductID = w.ProductID
        left join productdetailrubber r on p.ProductID = r.ProductID "
        ,"Where p.TypeID = '1' ".$str_sql);
    }else{
      if($_POST['search_diameterRubber'] != ""){
          $str_sql  .= " And r.diameter = '".$_POST['search_diameterRubber']."' ";
        }
        if($_POST['search_series'] != ""){
          $str_sql  .= " And r.series = '".$_POST['search_series']."' ";
        }
        if($_POST['search_width'] != ""){
          $str_sql  .= " And r.width = ".$_POST['search_width'];
        }
        if(addslashes($_POST['search_brand']) != ""){
          $str_sql  .= " And r.brand = '".addslashes($_POST['search_brand'])."' ";
        }
      $getproduct = $getdata->my_sql_selectJoin("p.*, r.*, w.*,w.diameter as diameterWheel ,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter
      ,(select b.BrandName from brand b where r.brand = b.BrandID) as BrandName "
        ,"product_N"
        ,"productDetailWheel w on p.ProductID = w.ProductID
        left join productdetailrubber r on p.ProductID = r.ProductID "
        ,"Where p.TypeID = '2' ".$str_sql);
    }
  }else{
     $getproduct = $getdata->my_sql_selectJoin("p.*, r.*, w.* ,w.diameter as diameterWheel,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter
     ,case
       when p.TypeID = '2'
       then (select b.BrandName from brand b where r.brand = b.BrandID)
       end BrandName "
     ," product_N "
     ," productDetailWheel w on p.ProductID = w.ProductID
        left join productDetailRubber r on p.ProductID = r.ProductID "
    ," where p.ProductStatus in ('1','2')  ORDER BY  p.ProductID ");
  }



  if(mysql_num_rows($getproduct) > 0){
    ?>
    <table width="100%" class="table table-bordered ">
    <thead>
    <tr style="color:#FFF;">
      <th width="4%" bgcolor="#5fb760">#</th>
      <th width="7%" bgcolor="#5fb760">รหัส</th>
      <th width="25%" bgcolor="#5fb760">สินค้า</th>
      <th width="5%" bgcolor="#5fb760">Hand</th>
      <th width="5%" bgcolor="#5fb760">คงเหลือ</th>
      <th width="10%" bgcolor="#5fb760">ราคา</th>
      <th width="13%" bgcolor="#5fb760"><?php echo @LA_LB_MANAGE;?></th>
    </tr>
    </thead>
    <tbody>
    <?
    while($showproduct = mysql_fetch_object($getproduct)){
      $x++;
      if($showproduct->TypeID == '1'){
        $gettype = "ล้อแม๊ก"." ขนาด:".$showproduct->diameterWheel." ขอบ:".$showproduct->whediameter." รู:".$showproduct->holeSize." ประเภท:".$showproduct->typeFormat;
      }else if($showproduct->TypeID == '2'){
        $gettype = "ยาง ".$showproduct->BrandName." ขนาด:".$showproduct->diameterRubber." ขอบ:".$showproduct->rubdiameter." ซี่รี่:".$showproduct->series." ความกว้าง:".$showproduct->width;
      }else{
        $gettype = "";
      }

    ?>
    <tr id="<?php echo @$showproduct->ProductID;?>">
      <td align="center" ><?php echo @$x;?></td>
      <td align="center"><?php echo @$showproduct->ProductID;?></td>
      <td>&nbsp;<?php echo @$gettype;?></td>
      <td align="left">&nbsp;มือ : <?php echo @$showproduct->hand;?></td>
      <td align="right" valign="middle"><strong><?php echo @convertPoint2($showproduct->Quantity,'0');?></strong>&nbsp;</td>
      <td align="right" valign="middle"><strong><?php echo @convertPoint2($showproduct->PriceSale,'2');?></strong>&nbsp;</td>
      <td align="center" valign="middle">
        <?php
  	  if($showproduct->ProductStatus == '1'){
  		  echo '<button type="button" class="btn btn-success btn-xs" id="btn-'.@$showproduct->ProductID.'" onClick="javascript:changeproductsStatus(\''.@$showproduct->ProductID.'\',\''.$_SESSION['lang'].'\');"><i class="fa fa-unlock-alt" id="icon-'.@$showproduct->ProductID.'"></i> <span id="text-'.@$showproduct->ProductID.'">'.LA_BTN_ON.'</span></button>';
  	  }else{
  		  echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.@$showproduct->ProductID.'" onClick="javascript:changeproductsStatus(\''.@$showproduct->ProductID.'\',\''.$_SESSION['lang'].'\');"><i class="fa fa-lock" id="icon-'.@$showproduct->ProductID.'"></i> <span id="text-'.@$showproduct->ProductID.'">'.LA_BTN_OFF.'</span></button>';
  	  }
  	  ?><a data-toggle="modal" data-target="#edit_item" data-whatever="<?php echo @$showproduct->ProductID;?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> <?php echo @LA_BTN_EDIT;?></a><a onClick="javascript:deleteProduct('<?php echo @$showproduct->ProductID;?>');" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> <?php echo @LA_BTN_DELETE;?></a></td>
    </tr>
  <? }?>
  </tbody>
</table>
    <?php
    }else{
    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ไม่พบข้อมูล !</div>';
  } ?>

</div>
</div>
<script language="javascript">
$( document ).ready(function() {


  $("#detailrubber").hide();
  $("#search_detailrubber").hide();

  $('input:radio[name="type"]').change(function() {
    if($(this).val() == 1){
      $("#detailwheel").show();
      $("#detailrubber").hide();
    }else{
      $("#detailwheel").hide();
      $("#detailrubber").show();
    }
  });

  $('input:radio[name="search_type"]').change(function() {
    if($(this).val() == 1){
      $("#search_detailwheel").show();
      $("#search_detailrubber").hide();
    }else{
      $("#search_detailwheel").hide();
      $("#search_detailrubber").show();
    }
  });

 $.getJSON( "jsondata/brand.json", function( data ) {
  var $brand = $("#brand");
  var $search_brand = $("#search_brand");
  $brand.empty();
  $search_brand.empty();
  $brand.append("<option value='' selected='selected'>--เลือก--</option>");
  $search_brand.append("<option value='' selected='selected'>--เลือก--</option>");
  for(var i = 0; i < data.length; i++){
    $brand.append("<option value=" +  data[i].id + ">" + data[i].name + "</option>");
    $search_brand.append("<option value=" +  data[i].id + ">" + data[i].name + "</option>");
  }
  });

  $.getJSON( "jsondata/diameter.json", function( data ) {
  var $diameterWheel = $("#diameterWheel");
  var $diameterRubber = $("#diameterRubber");
  var $search_diameterWheel = $("#search_diameterWheel");
  var $search_diameterRubber = $("#search_diameterRubber");
  $diameterWheel.empty();
  $diameterRubber.empty();
  $search_diameterWheel.empty();
  $search_diameterRubber.empty();
  $diameterWheel.append("<option value='' selected='selected'>--เลือก--</option>");
  $diameterRubber.append("<option value='' selected='selected'>--เลือก--</option>");
  $search_diameterWheel.append("<option value='' selected='selected'>--เลือก--</option>");
  $search_diameterRubber.append("<option value='' selected='selected'>--เลือก--</option>");
  for(var i = 0; i < data.length; i++){
    $diameterWheel.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
    $diameterRubber.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
    $search_diameterWheel.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
    $search_diameterRubber.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
  }
});

  $.getJSON( "jsondata/holeSize.json", function( data ) {
  var $holeSize = $("#holeSize");
  var $search_holeSize = $("#search_holeSize");
  $holeSize.empty();
  $search_holeSize.empty();
  $holeSize.append("<option value='' selected='selected'>--เลือก--</option>");
  $search_holeSize.append("<option value='' selected='selected'>--เลือก--</option>");
  for(var i = 0; i < data.length; i++){
    $holeSize.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
    $search_holeSize.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
  }
 });

 $.getJSON( "jsondata/rim.json", function( data ) {
  var $rim = $("#rim");
  var $search_rim = $("#search_rim");
  $rim.empty();
  $search_rim.empty();
  $rim.append("<option value='' selected='selected'>--เลือก--</option>");
  $search_rim.append("<option value='' selected='selected'>--เลือก--</option>");
  for(var i = 0; i < data.length; i++){
    $rim.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
    $search_rim.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
  }
 });

 $.getJSON( "jsondata/series.json", function( data ) {
  var $series = $("#series");
  var $search_series = $("#search_series");
  $series.empty();
  $search_series.empty();
  $series.append("<option value='' selected='selected'>--เลือก--</option>");
  $search_series.append("<option value='' selected='selected'>--เลือก--</option>");
  for(var i = 0; i < data.length; i++){
    $series.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
    $search_series.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
  }
 });

 $.getJSON( "jsondata/typeFormat.json", function( data ) {
  var $typeFormat = $("#typeFormat");
  var $search_typeFormat = $("#search_typeFormat");
  $typeFormat.empty();
  $search_typeFormat.empty();
  $typeFormat.append("<option value='' selected='selected'>--เลือก--</option>");
  $search_typeFormat.append("<option value='' selected='selected'>--เลือก--</option>");
  for(var i = 0; i < data.length; i++){
    $typeFormat.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
    $search_typeFormat.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
  }
 });

$.getJSON( "jsondata/width.json", function( data ) {
  var $width = $("#width");
  var $search_width = $("#search_width");
  $width.empty();
  $search_width.empty();
  $width.append("<option value='' selected='selected'>--เลือก--</option>");
  $search_width.append("<option value='' selected='selected'>--เลือก--</option>");
  for(var i = 0; i < data.length; i++){
    $width.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
    $search_width.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
  }
 });


  $("#TypeID").change(function() {
    console.log($(this).val());
    opctionBrand($(this).val(),"BrandID");
  });
  $("#BrandID").change(function() {
    opctionmodel($(this).val(),"ModelID");
  });

});

function changeproductsStatus(prokey,lang){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var es = document.getElementById('btn-'+prokey);
	if(es.className == 'btn btn-success btn-xs'){
		var sts= 1;
	}else{
		var sts= 0;
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){

			if(es.className == 'btn btn-success btn-xs'){
				document.getElementById('btn-'+prokey).className = 'btn btn-danger btn-xs';
				document.getElementById('icon-'+prokey).className = 'fa fa-lock';
				if(lang == 'en'){
					document.getElementById('text-'+prokey).innerHTML = 'Hide';
				}else{
					document.getElementById('text-'+prokey).innerHTML = 'ไม่ใช้งาน';
				}

			}else{
				document.getElementById('btn-'+prokey).className = 'btn btn-success btn-xs';
				document.getElementById('icon-'+prokey).className = 'fa fa-unlock-alt';
				if(lang == 'en'){
					document.getElementById('text-'+prokey).innerHTML = 'Show';
				}else{
					document.getElementById('text-'+prokey).innerHTML = 'เปิดใช้งาน';
				}

			}
  		}
	}

	xmlhttp.open("GET","function.php?type=change_products_status_N&key="+prokey+"&sts="+sts,true);
	xmlhttp.send();
}
	function deleteProduct(prokey){
    var txt;
  var r = confirm("คุณต้องการลบข้อมูลสินค้า !");
  if (r == true) {

    	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
    	 	xmlhttp=new XMLHttpRequest();
    	}else{// code for IE6, IE5
      		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    	}

      xmlhttp.onreadystatechange=function(){
        console.log(xmlhttp.readyState+" : "+xmlhttp.status);
      		if (xmlhttp.readyState==4 && xmlhttp.status==200){
    			document.getElementById(prokey).innerHTML = '';

      		}
    	}
      xmlhttp.open("GET","function.php?type=delete_products&key="+prokey,true);
    	xmlhttp.send();
  } else {
    return false;
  }

}

    $('#edit_item').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "settings/edit_itemN.php",
                data: dataString,
                cache: false,
                success: function (data) {
                   // console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    </script>
