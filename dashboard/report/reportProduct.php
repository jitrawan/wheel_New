<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-pie-chart fa-fw"></i> รายงานสินค้า</h1>
     </div>
</div>
<ol class="breadcrumb">
<li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
<li><a href="?p=report">รายงาน</a></li>
 <li class="active">รายงานสินค้า</li>
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
 
  <div id="searchOther" name="searchOther">
 <form method="post" enctype="multipart/form-data" name="frmSearch" id="frmSearch">
   <div style="margin: 10px;">
        <div class="form-group row">
              <div class="col-md-3">
                <label ><b>Group By :    </b></label>
                <input type="radio" id="" name="" value="" checked>
                <label for="wheel">ประเภทประสินค้า</label>
              </div>
          </div>

        <div class="form-group row">
            <div class="col-md-2">
              <label ><b>ประเภทสินค้า :    </b></label>
              <input type="radio" id="search_all" name="search_type" value="0" checked>
              <label for="search_all">ทั้งหมด</label>
            </div>
            <div class="col-md-2">
              <input type="radio" id="search_wheel" name="search_type" value="1">
              <label for="wheel">ล้อแม๊ก</label>
            </div>
            <div class="col-md-2">
              <input type="radio" id="search_rubber" name="search_type" value="2">
              <label for="rubber">ยาง</label>
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

$str_sql = "";
if(isset($_POST['search_product'])){
 if(addslashes($_POST['search_type']) != 0){
    $str_sql  .= " And TypeID = '".$_POST['search_type']."' ";
  }
?>
<table width="100%" border="0" class="table table-bordered">
  <thead>
      <tr style="font-weight:bold; color:#FFF; text-align:center; background:#ff7709;">
                      <td width="12%">รหัสสินค้า</td>
                      <td width="40%">รายละเอียด</td>
                      <td width="10%">ราคาซื้อ</td>
                      <td width="10%">ราคาขาย</td>
                      <td width="10%">คงเหลือ</td>
                </tr>
  </thead>
      <?
        $GroupType = $getdata->my_sql_select(" TypeID,hand "," product_N "," ProductStatus = '1' $str_sql Group by TypeID,hand Order by TypeID,hand ");
        while($showGroupType = mysql_fetch_object($GroupType)){
       ?>
        
          <tr style="font-weight:bold; color:#FFF; background:#A9A9A9;">
                <td colspan="5">&nbsp;&nbsp;Group By : <? if(@$showGroupType->TypeID == '1'){echo 'ล้อแม๊ก';}else{echo 'ยาง';} ?>&nbsp;&nbsp;, มือ <? echo @$showGroupType->hand ?></td>
          </tr>
                
        
         <tbody>
                <?
                
                $DetailProduct = $getdata->my_sql_select(" p.*, r.*, w.* ,w.diameter as diameterWheel,r.diameter as diameterRubber,p.ProductID as ProductID,r.diameter as rubdiameter ,w.diameter as whediameter 
                ,(select b.BrandName from brand b where r.brand = b.BrandID) as BrandName "
                ," product_N p
                left join productDetailWheel w on p.ProductID = w.ProductID
                left join productdetailrubber r on p.ProductID = r.ProductID "
                ," p.ProductStatus = '1' and p.TypeID = '".$showGroupType->TypeID."' and p.hand = '".$showGroupType->hand."' ");
               
                if(mysql_num_rows($DetailProduct) > 0){
                      while($showDetailProduct = mysql_fetch_object($DetailProduct)){
                        if($showDetailProduct->TypeID == '1'){
                          $gettype = " ขนาด:".$showDetailProduct->diameterWheel." ขอบ:".$showDetailProduct->whediameter." รู:".$showDetailProduct->holeSize." ประเภท:".$showDetailProduct->typeFormat;
                        }else if($showDetailProduct->TypeID == '2'){
                          $gettype = $showDetailProduct->BrandName." ขนาด:".$showDetailProduct->diameterRubber." ขอบ:".$showDetailProduct->rubdiameter." ซี่รี่:".$showDetailProduct->series." ความกว้าง:".$showDetailProduct->width;
                        }else{
                          $gettype = "";
                        }
                        ?>
                        <tr>
                          <td align="center"><strong><?php echo @$showDetailProduct->ProductID;?></strong></td>
                          <td ><strong><?php echo @$gettype ;?></strong></td>
                          <td valign="middle" style=" text-align: right;"><strong><?php echo @convertPoint2($showDetailProduct->PriceBuy,'2')?>&nbsp;-.</strong></td>
                          <td valign="middle" style=" text-align: right;"><strong><?php echo @convertPoint2($showDetailProduct->PriceSale,'2');?>&nbsp;-.</strong></td>
                          <td align="center" valign="middle"><strong><?php echo @convertPoint2($showDetailProduct->Quantity,'0');?>&nbsp; ชิ้น</strong></td>
                        </tr>

                    <?
                  }
                  ?>
                <tr style="font-weight:bold; color:#FFF; background:#A9A9A9;">
                <td colspan="5"></td>
                </tr>
                  <?
                }else{?>
                    <tr style="font-weight:bold; color:#FFF; text-align:center; background:#919191;">
                        <td colspan="5">ไม่พบข้อมูล !</td>
                    </tr>
              <? } ?>
     </tbody>
    
     <? } ?>
     </table>
     <? 
    } ?>
</div>
<script language="javascript">

$(document).ready(function(){
  var getradio = '<?echo $_POST['search_type'] ?>'
   var $radios = $('input:radio[name=search_type]');
    $radios.filter('[value='+getradio+']').prop('checked', true);

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
