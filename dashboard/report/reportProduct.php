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
   echo @$alert;?>


<nav class="navbar navbar-default" role="navigation">

  <div id="searchOther" name="searchOther">
 <form method="post" enctype="multipart/form-data" name="frmSearch" id="frmSearch">
   <div style="margin: 10px;">
        <div class="form-group row">
              <div class="col-md-3">
                <label ><b>Group By :    </b></label>
                <input type="radio" id="" name="" value="" checked>
                <label for="wheel">ประเภทสินค้า</label>
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
          <button type="submit" name="search_product" id="search_product" class="btn btn-default"><i class="fa fa-print"></i> Print Previwe</button>
     </div>

   </div>

   </form>
   </div>
</nav>
 <div class="table-responsive">

</div>
<script language="javascript">

$("#search_product").click(function(){
    window.open("../dashboard/report/printReportProduct.php?key=<?echo $_POST['search_type'] ?>", '_blank');
});
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
