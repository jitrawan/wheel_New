<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-pie-chart fa-fw"></i> รายงานเคลมสินค้า</h1>
     </div>
</div>
<ol class="breadcrumb">
<li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
<li><a href="?p=report">รายงาน</a></li>
 <li class="active">รายงานเคลมสินค้า</li>
</ol>

   <?php
   echo @$alert;?>


<nav class="navbar navbar-default" role="navigation">

  <div id="searchOther" name="searchOther">
 <form method="post" enctype="multipart/form-data" name="frmSearch" id="frmSearch">
   <div style="margin: 10px;">
        <div class="form-group row">
              <div class="col-md-2">
                <label ><b>Group By :    </b></label>
                <input type="radio" id="G_status" name="G_type" value="2" checked>
                <label for="wheel">สถานะ</label>
              </div>
              <div class="col-md-2">
                <input type="radio" id="G_productId" name="G_type" value="3">
                <label for="rubber">รหัสสินค้า</label>
              </div>

          </div>

        <div class="form-group row">
          <div class="col-md-3">
            <label ><b>ระบุวันที่เคลม จาก :    </b></label>
            <input type="text" id="datePrfrom" name="datePrfrom" class="form-control dpk" autocomplete="off">
          </div>
          <div class="col-md-3">
            <label ><b>ถึง :    </b></label>
            <input type="text" id="datePrto" name="datePrto" class="form-control dpk" autocomplete="off">
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


$(document).ready(function(){
  var getradio = '<?echo $_POST['G_type'] ?>'
   var $radios = $('input:radio[name=G_type]');
    $radios.filter('[value='+getradio+']').prop('checked', true);
    $("#datePrfrom").val('<?echo $_POST['datePrfrom'] ?>');
    $("#datePrto").val('<?echo $_POST['datePrto'] ?>');
    $("#search_product").click(function(){

      if($("#datePrfrom").val() != ""){
          if($("#datePrto").val() < $("#datePrfrom").val()){
              $("#datePrto").val("");
              alert("กรุณาระบุวันที่รับสินค้า ถึง ให้ถูกต้อง!");
              return false;
            }else{
              window.open("../dashboard/report/printReportClaim.php?Group=<?echo $_POST['G_type'] ?>&datefrom=<?echo $_POST['datePrfrom'] ?>&dateto=<?echo $_POST['datePrto'] ?>", '_blank');
            }
      }else{
          window.open("../dashboard/report/printReportClaim.php?Group=<?echo $_POST['G_type'] ?>", '_blank');
      }


    });

});
</script>
