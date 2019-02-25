<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-search fa-fw"></i> ค้นหาสินค้า</h1>
     </div>
</div>
<ol class="breadcrumb">
<li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li class="active">ค้นหาสินค้า</li>
</ol>
<?php

if(isset($_POST['save_new_status'])){
	$getdata->my_sql_update("card_info","card_status='".htmlentities($_POST['card_status'])."'","card_key='".htmlentities($_POST['card_key'])."'");
	$cstatus_key=md5(htmlentities($_POST['card_status']).time("now"));
	$getdata->my_sql_insert("card_status","cstatus_key='".$cstatus_key."',card_key='".htmlentities($_POST['card_key'])."',card_status='".htmlentities($_POST['card_status'])."',card_status_note='".htmlentities($_POST['card_status_note'])."',user_key='".$userdata->user_key."'");
	$alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>บันทึกข้อมูลสถานะ สำเร็จ</div>';
}
?>


   <?php
   echo @$alert;?>

 <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-search"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <form class="navbar-form navbar-left" role="search" method="get">
        <div class="form-group">
        <input type="hidden" name="p" id="p" value="productInshelf" >
        <input type="text" class="form-control" name="q" placeholder="รหัสสินค้า เพื่อค้นหา" value="<?php echo @htmlentities($_GET['q']);?>" size="100">
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> <?php echo @LA_BTN_SEARCH;?></button>
      </form>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<nav class="navbar navbar-default" role="navigation">
  <div class="row">
      <div class="col-xs-2" style="padding-top: 15px; padding-left: 20px;">
        <a id="addsearch" name="addsearch" style="cursor: pointer">  <i class="fa fa-search fa-fw"></i> ค้นหาเพิ่มเติม</a>
     </div>
  </div>

  <div id="searchOther" name="searchOther" style="display: none">
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
   </div>
</nav>
 <div class="table-responsive">

  <?php

   if(htmlentities($_GET['q']) != ""){
     $getproduct = $getdata->my_sql_selectJoin(" p.*, r.*, w.*, s.*,p.ProductID as productMain, d.dealer_name as dealer_name, d.mobile as mobile ","product_N"," productDetailWheel w on p.ProductID = w.ProductID left join productDetailRubber r on p.ProductID = r.ProductID left join shelf s ON p.shelf_id = s.shelf_id left join dealer d ON p.dealer_code = d.dealer_code ","Where (p.ProductID LIKE '%".htmlentities($_GET['q'])."%') ");
?>
<script>
console.log('<?= htmlentities($_GET['q'])?>');
</script>
<?
  }else{
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
       $getproduct = $getdata->my_sql_selectJoin("p.*, r.*, w.*, s.*,p.ProductID as productMain, d.dealer_name as dealer_name, d.mobile as mobile ","product_N","productDetailWheel w on p.ProductID = w.ProductID left join productDetailRubber r on p.ProductID = r.ProductID left join shelf s ON p.shelf_id = s.shelf_id left join dealer d ON p.dealer_code = d.dealer_code "," Where p.TypeID = '1' ".$str_sql);
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
       $getproduct = $getdata->my_sql_selectJoin("p.*, r.*, w.*, s.*,p.ProductID as productMain, d.dealer_name as dealer_name, d.mobile as mobile ,w.diameter as diameterWheel,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter ","product_N","productDetailWheel w on p.ProductID = w.ProductID left join productDetailRubber r on p.ProductID = r.ProductID left join shelf s ON p.shelf_id = s.shelf_id left join dealer d ON p.dealer_code = d.dealer_code ","Where p.TypeID = '2' ".$str_sql." ORDER BY p.ProductID ");
     }
   }else{
    $getproduct = $getdata->my_sql_selectJoin("p.*, r.*, w.*, s.*,p.ProductID as productMain, d.dealer_name as dealer_name, d.mobile as mobile ,w.diameter as diameterWheel,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter ","product_N","productDetailWheel w on p.ProductID = w.ProductID left join productDetailRubber r on p.ProductID = r.ProductID left join shelf s ON p.shelf_id = s.shelf_id left join dealer d ON p.dealer_code = d.dealer_code ","Where ProductStatus in ('1',2)  ORDER BY p.ProductID ");
    ?>
    <script>
    console.log('<?= mysql_num_rows($getproduct)?>');
    </script>
    <?
   }
 }


     if(mysql_num_rows($getproduct) > 0){
       ?>
       <table width="100%" border="0" class="table table-bordered">
       <thead>
     <tr style="font-weight:bold; color:#FFF; text-align:center; background:#ff7709;">
       <td width="12%">รหัสสินค้า</td>
       <td width="10%">shelf</td>
       <td width="26%">ผู้จำหน่าย</td>
       <td width="26%">รายละเอียด</td>
       <td width="10%">คงเหลือ</td>
       <td width="10%">ราคา</td>
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
       <tr>
         <td align="center"><?php echo @$showproduct->productMain;?></td>
         <td >&nbsp;<i class="fa fa-circle" style="color:<?php echo @$showproduct->shelf_color;?>"></i>&nbsp;<?php echo @$showproduct->shelf_detail;?></td>
         <td valign="middle"><strong><?php echo @$showproduct->dealer_code;?> | <?php echo @$showproduct->dealer_name;?> | <?php echo @$showproduct->mobile;?></strong></td>
         <td valign="middle"><strong><? echo $gettype?></strong></td>
         <td align="right" valign="middle"><strong><?php echo @convertPoint2(@$showproduct->Quantity,'0');?></strong>&nbsp;</td>
         <td align="right" valign="middle"><strong><?php echo @convertPoint2(@$showproduct->PriceSale,'2');?></strong>&nbsp;</td>
      </tr>
    <? } ?>
     </tbody>
   </table>
       <?php
     }else{
       echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ไม่พบข้อมูล !</div>';
     } ?>


  </tbody>

</table>

</div>
<script language="javascript">

$(document).ready(function(){

    $("#addsearch").click(function(){
        $("#searchOther").toggle();
    });


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


});

$('#edit_status').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "card/edit_status.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })

function deleteCard(cardkey){
	if(confirm('คุณต้องการลบใบสั่งซ่อม/เคลมนี้ใช่หรือไม่ ?')){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById(cardkey).innerHTML = '';
  		}
	}
	xmlhttp.open("GET","function.php?type=delete_card&key="+cardkey,true);
	xmlhttp.send();
	}
}
function hideCard(cardkey){
	if(confirm('คุณต้องการซ่อนใบสั่งซ่อม/เคลมนี้ใช่หรือไม่ ?')){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById(cardkey).innerHTML = '';
  		}
	}
	xmlhttp.open("GET","function.php?type=hide_card&key="+cardkey,true);
	xmlhttp.send();
	}
}
</script>
