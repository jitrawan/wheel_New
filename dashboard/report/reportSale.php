<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-pie-chart fa-fw"></i> รายงานการขาย</h1>
     </div>
</div>
<ol class="breadcrumb">
<li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
<li><a href="?p=report">รายงาน</a></li>
 <li class="active">รายงานการขาย</li>
</ol>
<?php
   echo @$alert;?>


<nav class="navbar navbar-default" role="navigation">

  <div id="searchOther" name="searchOther">
 <form method="post" enctype="multipart/form-data" name="frmSearch" id="frmSearch">
   <div style="margin: 10px;">
      <div class="form-group row">
          <div class="col-md-3">
            <label ><b>ระบุวันที่ จาก :    </b></label>
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
  $("#datePrfrom").val('<?echo $_POST['datePrfrom'] ?>');

    $("#search_product").click(function(){
      if($("#datePrfrom").val() == ""){
        alert("กรุณาระบุวันที่ใบเสร็จ จาก!");
        return false;
      }else if($("#datePrto").val() == ""){
        alert("กรุณาระบุวันที่ใบเสร็จ ถึง!");
        return false;
      }else if($("#datePrto").val() < $("#datePrfrom").val()){
          $("#datePrto").val("");
          alert("กรุณาระบุวันที่ใบเสร็จ ถึง ให้ถูกต้อง!");
          return false;
      }else{
          window.open("../dashboard/report/printReportSale.php?from=<?echo $_POST['datePrfrom'] ?>&dateto=<?echo $_POST['datePrto'] ?>", '_blank');
      }

    });


  });



</script>
