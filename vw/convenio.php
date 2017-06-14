<?php include("../partes/encabezado.php");
$pagName="convenio";
$tabla="convenio";

?>
<!--main-->
<div id="cen" class="container">
  <div class="row">
      <!--left-->
    
     <div class="col-md-12">
            <div class="well well-lg opacity"> 
              <div class="row">
                <div class="col-sm-12" id="registro">
                   <?php include 'r_'.$pagName.'.php';?>

                </div>
              
              </div>
              <div class="row">
                <div class="col-sm-8 col-sm-offset-3">
                </div>
              </div>
            </div>
        </div>
        </div><!--/right-->
    </div><!--/row-->
</div><!--/container-->

<?php include("../partes/pie.php");
?>
