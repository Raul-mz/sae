<?php include("../partes/encabezado.php");
$pagName="entrar";
$esPopUp="no";
?>
<script language="JavaScript" type="text/javascript">
<!--//BEGIN Script

function new_window(url) {

link = window.open(url,"Link","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=yes,resizable=0,width=530,height=400,left=80,top=180");

}
//END Script-->
</script> 


<!--main-->
<div id="cen" class="container">
  <div class="row">
      <!--left-->
    
     <div class="col-md-12 col-md-offset-1 ">
            <div class="well well-lg opacity"> 
              <div class="row">
                <div class="col-sm-12" id="registro">
                   <?php include 'c_'.$pagName.'.php';?>

                </div>
              
              </div>
              <div class="row">
                <div class="col-sm-8 col-sm-offset-3">

              </div>
            </div>
        </div>
        </div><!--/right-->
    </div><!--/row-->
</div><!--/container-->

<?php include("../partes/pie.php");
?>
