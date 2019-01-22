<style>
#custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
}
</style>
<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-plus-square fa-fw"></i> รายการรับสินค้า</h1>
     </div>
</div>
<ol class="breadcrumb">
    <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li class="active">รายการรับสินค้า</li>
</ol>

 <?php
 $getpo = $getdata->my_sql_query(NULL,"stock_tb_receive_master","po='".$_GET['d']."'");
 echo @$alert;
 ?>
 <style>
	body{
		<?php echo @$userdata->font_size_text;?>
	}
	</style>


                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="info_data">
                            <br/>

                      <div class="panel panel-primary">

                        <div class="panel-heading">
                            วันที่ทำรายการ : <?= @$getpo->datedo?>
                        </div>
                        <div class="panel-body">

                          <div class="form-group row">

                          <div class="col-xs-4">
                               <label>เลขที่อ้างอิง : </label> <label> &nbsp;<?php echo @$getpo->po;?> </label>
                          </div>
                          <div class="col-xs-4">
                           <label>วันที่รับวัสดุ : </label> <label> &nbsp;<?php echo @$getpo->datereceive;?> </label>
                         </div>
                          <div class="col-xs-4">
                           <label>ผู้รับวัสดุ : </label> <label> &nbsp;<?php echo @$getpo->iduser;?> </label>
                          </div>

                          </div>

                          <hr>

                          <table width="70%" border="0" class="table-bordered">
                          <thead>
                        <tr style="font-weight:bold; color:#FFF; text-align:center; background:#ff7709;">
                          <td width="12%">รหัสสินค้า</td>
                          <td width="12%">สินค้า</td>
                          <td width="15%">จำนวน</td>
                          <td width="30%">ผู้จำหน่าย</td>
                          <td width="10%">ปรับปรุง</td>
                        </tr>
                        </thead>
                          <tbody>
                          <?
                        //  $getproduct = $getdata->my_sql_selectJoin(" p.*, r.*, w.*, s.*,p.ProductID as productMain, d.dealer_name as dealer_name, d.mobile as mobile ","product_N"," productDetailWheel w on p.ProductID = w.ProductID left join productDetailRubber r on p.ProductID = r.ProductID left join shelf s ON p.shelf_id = s.shelf_id left join dealer d ON p.dealer_code = d.dealer_code ","Where po='".$_GET['d']."' ");
                           $getproduct = $getdata->my_sql_select(" s.*,p.*,d.* "," stock_tb_receive_master_sub s left join product_N p on s.ProductID = p.ProductID left join dealer d ON p.dealer_code = d.dealer_code "," po='".$_GET['d']."' ");
                           if(mysql_num_rows($getproduct) > 0){
                          while($showproduct = mysql_fetch_object($getproduct)){
                            ?>
                          <tr id="<?php echo @$showproduct->no;?>">
                            <td align="center"><?php echo @$showproduct->ProductID;?></td>
                            <td align="center"><?if(@$showproduct->TypeID == '1'){ echo 'ล้อแม็ก';}else{echo 'ยาง';}?></td>
                            <td align="right" valign="middle"><strong><?php echo @$showproduct->total;?></strong>&nbsp;&nbsp;</td>
                             <td valign="middle">&nbsp;&nbsp;<strong><?php echo @$showproduct->dealer_code;?> | <?php echo @$showproduct->dealer_name;?> | <?php echo @$showproduct->mobile;?></strong>&nbsp;</td>
                            <td align="center"><!--button type="submit" name="btn_delete" onClick="javascript:deleteProduct('<?php echo @$showproduct->no;?>','<?php echo @$showproduct->ProductID;?>');" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> <?php echo @LA_BTN_DELETE;?></button--></td>

                         </tr>
                       <? }
                     }else{ ?>
                       <tr>
                         <td colspan="5">
                           <?
                        echo '<div class="alert alert-danger alert-dismissable">ไม่พบข้อมูล !</div>';
                          ?>
                        </td>
                      </tr>
                    <?  }?>
                        </tbody>
                      </table>


                        </div>

                      </div>
                                </div>


                            </div>
<script type="text/javascript">
    $(".form_datetime").datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight: true
    }).on('changeDate', function(e){
    $(this).datepicker('hide');
});

function deleteProduct(cardkey,id){
  console.log(cardkey);
  if(!confirm('คุณต้องรายการนี้ใช่หรือไม่ ?')){
    return;
	}else{
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
  	xmlhttp.open("GET","function.php?type=delete_stock&key="+cardkey+"&id="+id,true);
  	xmlhttp.send();
  }
}

</script>
