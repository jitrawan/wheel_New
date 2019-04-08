<?php
session_start();
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
$getedit = $getdata->my_sql_selectJoin(" p.*,r.*,w.code as wcode ,r.code as rcode ,w.*,p.ProductID as productMain,w.diameter as diameterWheel , r.diameter as diameterRubber
, r.width as WidthRubble , r.brand as brandRubble

","product_N","productDetailWheel w on p.ProductID = w.ProductID left join productDetailRubber r on p.ProductID = r.ProductID "," where p.ProductID = '".addslashes($_GET['key'])."' ");
$getitem = mysql_fetch_object($getedit);


                                                $getshelf = $getdata->my_sql_select(NULL,"shelf","shelf_status = '1'");
																								$getdealer = $getdata->my_sql_select(NULL,"dealer",NULL);


                                        ?>
																				<div class="modal-body">
																					 <div class="form-group row" style="display: none;">
	                                             <div class="col-md-6">
	                                               <label for="edit_ProductID">รหัสสินค้า</label>
	                                               <input type="text" name="edit_ProductID" id="edit_ProductID" value="<?php echo @$getitem->productMain;?>" class="form-control" readonly>
	                                             </div>
	                                             <div class="col-md-6">

	                                              </div>
	                                          </div>

	                                         <div class="form-group row">
	                                           <div class="col-md-4">
																							 <input type="hidden" name="gettype" id="gettype"/>
	                                           <label >ประเภทสินค้า :    </label>
	                                           <input type="radio" id="wheel" name="edit_type" value="1" checked>
	                                           <label for="wheel">ล้อแม๊ก</label>
	                                           </div>
	                                           <div class="col-md-6">
	                                           <input type="radio" id="rubber" name="edit_type" value="2">
	                                           <label for="rubber">ยาง</label>
	                                           </div>
	                                         </div>

	                                         <!--ล้อ-->
	                                         <div id="edit_detailwheel" name="edit_detailwheel" style="padding: 5px; border: 0px solid #4CAF50;">
																						 <div class="form-group row">

																					 		 <div class="col-md-6">
																					 			 <label for="code">รหัส</label>
																					 			 <input type="text" name="code" id="code" class="form-control" value="<?= $getitem->wcode?>" readonly>
																					 		</div>

																					 	</div>
																					 <div class="form-group row">
	                                               <div class="col-md-3">
	                                               <label for="edit_diameterWheel">ขนาด</label>
	                                                 <select name="edit_diameterWheel" id="edit_diameterWheel" class="form-control">
	                                                   <option value="" selected="selected">--เลือก--</option>
																										 <? $getDiameterWhee = $getdata->my_sql_select(NULL,"DiameterWhee","status = '1' ORDER BY id ");
	                                                     while($showDiameterWhee = mysql_fetch_object($getDiameterWhee)){?>
	                                                   <option value="<?= $showDiameterWhee->Description?>" ><?= $showDiameterWhee->Description?></option>
	                                                   <?}?>
	                                                 </select>
	                                               </div>
	                                               <div class="col-md-3">
	                                               <label for="edit_rim">ขอบ</label>
	                                               <select name="edit_rim" id="edit_rim" class="form-control">
	                                                   <option value="" selected="selected">--เลือก--</option>
																										 <? $getRimWheel = $getdata->my_sql_select(NULL,"RimWheel","status = '1' ORDER BY id ");
	                                                     while($showRimWheel = mysql_fetch_object($getRimWheel)){?>
	                                                   <option value="<?= $showRimWheel->Description?>" ><?= $showRimWheel->Description?></option>
	                                                   <?}?>
	                                                 </select>
	                                               </div>
	                                               <div class="col-md-2">
	                                               <label for="edit_holeSize">รู</label>
	                                                <select name="edit_holeSize" id="edit_holeSize" class="form-control">
	                                                   <option value="" selected="selected">--เลือก--</option>
																										 <? $getHoleSizeWhee = $getdata->my_sql_select(NULL,"HoleSizeWhee","status = '1' ORDER BY id ");
	                                                      while($showHoleSizeWhee = mysql_fetch_object($getHoleSizeWhee)){?>
	                                                    <option value="<?= $showHoleSizeWhee->Description?>" ><?= $showHoleSizeWhee->Description?></option>
	                                                    <?}?>
	                                                 </select>
	                                               </div>
	                                               <div class="col-md-4">
	                                               <label for="edit_typeFormat">ประเภท</label>
	                                                <select name="edit_typeFormat" id="edit_typeFormat" class="form-control">
	                                                   <option value="" selected="selected">--เลือก--</option>
																										 <? $getTypeFormatWheel = $getdata->my_sql_select(NULL,"TypeFormatWheel","status = '1' ORDER BY id ");
	                                                     while($showTypeFormatWheel = mysql_fetch_object($getTypeFormatWheel)){?>
	                                                   <option value="<?= $showTypeFormatWheel->Description?>" ><?= $showTypeFormatWheel->Description?></option>
	                                                   <?}?>
	                                                 </select>
	                                               </div>
	                                             </div>
																							 <div class="form-group row">
	                                               <div class="col-md-4">
	                                               <label for="edit_brandWheel">ยี่ห้อ</label>
	                                                 <select name="edit_brandWheel" id="edit_brandWheel" class="form-control">
	                                                   <option value="" selected="selected">--เลือก--</option>
	                                                   <? $getbranWheel = $getdata->my_sql_select(NULL,"BrandWhee","status = '1' ORDER BY id ");
	                                                      while($showbrandWheel = mysql_fetch_object($getbranWheel)){?>
	                                                    <option value="<?= $showbrandWheel->id?>" ><?= $showbrandWheel->Description?></option>
	                                                    <?}?>
	                                                 </select>
	                                               </div>
	                                             </div>
	                                          </div>
	                                          <!--ยาง-->
	                                          <div id="edit_detailrubber" name="edit_detailrubber" style="padding: 5px; border: 0px solid #4CAF50;">
																							<div class="form-group row">

																								 <div class="col-md-6">
																									 <label for="code">รหัส</label>
																									 <input type="text" name="code" id="code" class="form-control" value="<?= $getitem->rcode?>" readonly>
																								</div>

																							</div>
																						<div class="form-group row">
	                                               <div class="col-md-3">
	                                               <label for="edit_diameterRubber">ขนาด</label>
	                                                <select name="edit_diameterRubber" id="edit_diameterRubber" class="form-control">
	                                                   <option value="" selected="selected">--เลือก--</option>
																										 <? $getDiameterRubble = $getdata->my_sql_select(NULL,"DiameterRubble","status = '1' ORDER BY id ");
	                                                      while($showDiameterRubble = mysql_fetch_object($getDiameterRubble)){?>
	                                                    <option value="<?= $showDiameterRubble->Description?>" ><?= $showDiameterRubble->Description?></option>
	                                                    <?}?>
	                                                 </select>
	                                                </div>
	                                               <div class="col-md-3">
	                                               <label for="edit_series">ซี่รี่</label>
	                                               <select name="edit_series" id="edit_series" class="form-control">
	                                                   <option value="" selected="selected">--เลือก--</option>
																										 <? $getSeriesRubble = $getdata->my_sql_select(NULL,"SeriesRubble","status = '1' ORDER BY id ");
	                                                      while($showSeriesRubble = mysql_fetch_object($getSeriesRubble)){?>
	                                                    <option value="<?= $showSeriesRubble->Description?>" ><?= $showSeriesRubble->Description?></option>
	                                                    <?}?>
	                                                 </select>
	                                               </div>
	                                               <div class="col-md-2">
	                                               <label for="edit_width">ความกว้าง</label>
	                                                 <select name="edit_width" id="edit_width" class="form-control">
	                                                   <option value="" selected="selected">--เลือก--</option>
																										 <? $getWidthRubble = $getdata->my_sql_select(NULL,"WidthRubble","status = '1' ORDER BY id ");
	                                                      while($showWidthRubble = mysql_fetch_object($getWidthRubble)){?>
	                                                    <option value="<?= $showWidthRubble->Description?>" ><?= $showWidthRubble->Description?></option>
	                                                    <?}?>
	                                                 </select>
	                                               </div>
	                                               <div class="col-md-4">
	                                               <label for="edit_brand">ยี่ห้อ</label>
	                                                <select name="edit_brand" id="edit_brand" class="form-control">
	                                                   <option value="" selected="selected">--เลือก--</option>
																										 <? $getbrandRubble = $getdata->my_sql_select(NULL,"brandRubble","status = '1' ORDER BY id ");
	                                                      while($showbrandRubble = mysql_fetch_object($getbrandRubble)){?>
	                                                    <option value="<?= $showbrandRubble->id?>" ><?= $showbrandRubble->Description?></option>
	                                                    <?}?>
	                                                 </select>
	                                               </div>
	                                             </div>
	                                          </div>


	                                            <div class="form-group row">
	                                             <div class="col-md-6">
	                                             <label for="edit_shelf_id">shelf</label>
	                                               <select name="edit_shelf_id" id="edit_shelf_id" class="form-control">
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
	                                              <!--label for="edit_Warranty">การรับประกัน</label>
	                                             <input type="text" name="edit_Warranty" id="edit_Warranty" class="form-control" value="<?php echo @$getitem->Warranty;?>"-->
																							 <label for="edit_hand">สืินค้ามือ</label>
	                                            <select name="edit_hand" id="edit_hand" class="form-control">
	                                                 <option value="1" selected="selected">1</option>
	                                                 <option value="2">2</option>

	                                               </select>
																							  </div>
	                                           </div>

	                                         <div class="form-group row">
	                                             <div class="col-md-6">
	                                               <label for="edit_PriceSale">ราคาขาย (บาท)</label>
	                                               <input type="number" name="edit_PriceSale" id="edit_PriceSale" class="form-control number" value="<?php echo @$getitem->PriceSale;?>" style="text-align: right;">
	                                             </div>
	                                              <div class="col-md-6">
	                                              <label for="edit_PriceBuy">ราคาซื้อ (บาท)</label>
	                                             <input type="number" name="edit_PriceBuy" id="edit_PriceBuy" class="form-control number" value="<?php echo @$getitem->PriceBuy;?>" style="text-align: right;">
	                                              </div>
	                                           </div>

	                                           <div class="form-group row">
	                                             <div class="col-md-6">
	                                               <label for="edit_Quantity">คงเหลือ (ชิ้น)</label>
	                                               <input type="number" name="edit_Quantity" id="edit_Quantity" class="form-control number" value="<?php echo @$getitem->Quantity;?>" style="text-align: right;">
	                                             </div>
	                                             <div class="col-md-6">

	                                             </div>
	                                            </div>

	                                            <div class="form-group row">
	                                             <div class="col-md-6">
	                                               <label for="edit_dealer_code">ผู้จำหน่าย</label>
	                                               <select name="edit_dealer_code" id="edit_dealer_code" class="form-control">
	                                                 <option value="" selected="selected">--เลือกผู้จำหน่าย--</option>
	                                                 <?
	                                                 while($showdealer = mysql_fetch_object($getdealer)){?>
	                                                 <option value="<?php echo @$showdealer->dealer_code;?>" ><?php echo @$showdealer->dealer_name;?></option>
	                                                 <?
	                                                 }
	                                               ?>
	                                                 </select>
	                                             </div>

	                                            </div>
                                        </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i><?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="save_edit_item" id="save_edit_item" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>

          <script language="javascript">
          $( document ).ready(function() {

						$(".number").bind('keyup mouseup', function () {
								if($(this).val() < 0) {
									alert("กรุณากรอกตัวเลขให้ถูกต้อง ! ");
									$(this).val(0);
								}
						});

						$('#save_edit_item').click(function(){
		 					 var r = confirm("ต้องการแก้ไขข้อมูล ?");
		 					 if (r == true) {
		 						 return true;
		 					 }else{
		 						 return false;
		 					 }
		 				 });

						if('<?echo @$getitem->TypeID;?>' == '1'){
								$("#edit_detailwheel").show();
								$("#edit_detailrubber").hide();
								$('#edit_diameterWheel').val('<?php echo @$getitem->diameter;?>');
								$('#edit_rim').val('<?php echo @$getitem->rim;?>');
								$('#edit_holeSize').val('<?php echo @$getitem->holeSize;?>');
								$('#edit_typeFormat').val('<?php echo @$getitem->typeFormat;?>');
								$('#edit_brandWheel').val('<?php echo @$getitem->brand;?>');
							}else{
								$("#edit_detailwheel").hide();
								$("#edit_detailrubber").show();
								console.log('<?echo @$getitem->series;?>');
								$('#edit_diameterRubber').val('<?php echo @$getitem->diameterRubber;?>');
								$('#edit_series').val('<?php echo @$getitem->series;?>');
								$('#edit_width').val('<?php echo @$getitem->WidthRubble;?>');
								$('#edit_brand').val('<?php echo @$getitem->brandRubble;?>');
							}

							$("#gettype").val('<?echo @$getitem->TypeID;?>');


							var $edit_type = $('input:radio[name=edit_type]');
							$('input:radio[name="edit_type"]').attr('disabled', true);
					    $edit_type.filter('[value=<?echo @$getitem->TypeID;?>]').prop('checked', true);
           $('#edit_dealer_code').val('<?php echo @$getitem->dealer_code;?>');
					 $('#edit_shelf_id').val('<?php echo @$getitem->shelf_id;?>');
					 $('#edit_hand').val('<?php echo @$getitem->hand;?>');

				/*	 $.getJSON( "jsondata/brand.json", function( data ) {
					   var $brand = $("#edit_brand");
					   $brand.empty();
					   $brand.append("<option value='' selected='selected'>--เลือก--</option>");
					   for(var i = 0; i < data.length; i++){
							 if('<?php echo @$getitem->brand;?>' == data[i].id){
								 $brand.append("<option value=" +  data[i].id + " selected='selected'>" + data[i].name + "</option>");
							 }else{
								 $brand.append("<option value=" +  data[i].id + ">" + data[i].name + "</option>");
							 }

					   }
					   });

					   $.getJSON( "jsondata/diameter.json", function( data ) {
					   var $diameterWheel = $("#edit_diameterWheel");
					   var $diameterRubber = $("#edit_diameterRubber");
					   $diameterWheel.empty();
					   $diameterRubber.empty();
					   $diameterWheel.append("<option value='' selected='selected'>--เลือก--</option>");
					   $diameterRubber.append("<option value='' selected='selected'>--เลือก--</option>");
					   for(var i = 0; i < data.length; i++){
							 if(data[i] == '<?php echo @$getitem->diameterWheel;?>'){
								 $diameterWheel.append("<option value=" +  data[i] + " selected='selected'>" + data[i] + "</option>");
							 }else{
								 $diameterWheel.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
							 }
							  if(data[i] == '<?php echo @$getitem->diameterRubber;?>'){
					     		$diameterRubber.append("<option value=" +  data[i] + " selected='selected'>" + data[i] + "</option>");
							 }else{
								 $diameterRubber.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
							 }
					   }
					 });

					   $.getJSON( "jsondata/holeSize.json", function( data ) {
					   var $holeSize = $("#edit_holeSize");
					   $holeSize.empty();
					   $holeSize.append("<option value='' selected='selected'>--เลือก--</option>");
					   for(var i = 0; i < data.length; i++){
							 if(data[i] == '<?php echo @$getitem->holeSize;?>'){
								 $holeSize.append("<option value=" +  data[i] + " selected='selected'>" + data[i] + "</option>");
							 }else{
								 $holeSize.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
							 }

					   }
					  });

					  $.getJSON( "jsondata/rim.json", function( data ) {
					   var $rim = $("#edit_rim");
					   $rim.empty();
					   $rim.append("<option value='' selected='selected'>--เลือก--</option>");
					   for(var i = 0; i < data.length; i++){
							 if(data[i] == '<?php echo @$getitem->rim;?>'){
					     	$rim.append("<option value=" +  data[i] + " selected='selected'>" + data[i] + "</option>");
							}else{
								$rim.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
							}
					   }
					  });

					  $.getJSON( "jsondata/series.json", function( data ) {
					   var $series = $("#edit_series");
					   $series.empty();
					   $series.append("<option value='' selected='selected'>--เลือก--</option>");
					   for(var i = 0; i < data.length; i++){
							 if(data[i] == '<?php echo @$getitem->series;?>'){
					     		$series.append("<option value=" +  data[i] + " selected='selected'>" + data[i] + "</option>");
								}else{
									$series.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
								}
					   }
					  });

					  $.getJSON( "jsondata/typeFormat.json", function( data ) {
					   var $typeFormat = $("#edit_typeFormat");
					   $typeFormat.empty();
					   $typeFormat.append("<option value='' selected='selected'>--เลือก--</option>");
					   for(var i = 0; i < data.length; i++){
							 if(data[i] == '<?php echo @$getitem->typeFormat;?>'){
					     		$typeFormat.append("<option value=" +  data[i] + " selected='selected'>" + data[i] + "</option>");
							 }else{
								 	$typeFormat.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
							 }
					   }
					  });

					 $.getJSON( "jsondata/width.json", function( data ) {
					   var $width = $("#edit_width");
					   $width.empty();
					   $width.append("<option value='' selected='selected'>--เลือก--</option>");
					   for(var i = 0; i < data.length; i++){
							 if(data[i] == '<?php echo @$getitem->width;?>'){
					     		$width.append("<option value=" +  data[i] + " selected='selected'>" + data[i] + "</option>");
							 }else{
								  $width.append("<option value=" +  data[i] + ">" + data[i] + "</option>");
							 }
					   }
					 });*/


          });
          </script>
