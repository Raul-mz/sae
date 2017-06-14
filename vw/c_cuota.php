<?php require_once("../class/class.new.php");

if(!isset($_GET['cuota']))
  $_GET['cuota']=$r_Obt2[0]['deuda_id'];

echo $convenio_id=$_GET['convenio_id'];;

echo $deuda=$_GET['cuota'];
/* Para consultar cliente */
$resultado = new conSqlSelect;
$pagName="cuota";
$tabla="cuota";

$ID="convenio_id";

$r_Obt = $resultado->obtResultadoW($tabla,$ID,$deuda);


?>

    
<?php
require_once("../class/class.new.php");
$resultado = new conSqlSelect;
 if(isset($esPopUp)) { 
$pag="cuota";
}
else {
 $pag="cuota"; 
}
if(isset ($_POST['id'])==""){

 
}
else {
  $camp=$_POST['id'];

$tabla="cuota";
$ID="cuota_id";
/* Para consultar Personas */

$r_Obt = $resultado->obtResultadoW($tabla,$ID,$camp);

}

?>
                   <form class="table-responsive" onsubmit=" return false">
                      <table class="table table-hover" height="100%">
                      
                          <tr>
<td class="text-right">
                                <label for="exampleInputName2">Monto: </label>
                              </td>
                              <td>
                              <input type="text" class="form-control" id="campoC" value="<?php echo $r_Obt[0]['convenio_id']?>">
                              <input type="text" class="form-control" id="campoConv" value="<?php echo $convenio_id?>">
                                  <input type="text" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="">
                              </td>
    
            <td class="text-right"><label for="exampleInputName2">Fecha:</label></td>
            <td> 
            <input type="date" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>">
            </td>
</tr>                                                      <tr>
                              <td colspan="4" class="text-center">
                                  <a onclick="registrarModal('<?php echo $pag;?>');">Agregar</a> -
                              </td>
                          </tr>
                      </table>
                    </form>
<div class="main col-sm-12 col-xs-  12 col-lg-10 col-md-10 col-md-offset-1">

                                        
                                <table class="table table-hover" align="center">

                            <thead><tr id="listar">
                                        <tr id="listar">

                                          <th ><div align="center" class="t">Fecha</div></th>
                                           <th width="10px"><div align="center" class="t">Monto</div></th>
                                           <th ><div align="center" class="t">Eliminar</div></th>
                                          
                                        </tr>
                                  </thead>
                                    <?php for ($i=0; $i< count($r_Obt); $i++){ ?>   
                                    <tr id="consultar">

                                  <?php 
                      
                                      $cod=$r_Obt[$i]["cuota_id"]; ?>
                                      <td><div align="center"><?php  echo $r_Obt[$i]["fecha"]?></div></td>
                                      

                                     <td><div align="center" class="ta"><?php  echo $r_Obt[$i]["monto"]?> </div></td>
                                    

                                    
                                      <td width="50"><div align="center"><a onclick="del_up('<?php echo $tabla;?>','<?php echo $cod;?>','<?php echo $tabla;?>',0,'<?php echo $tabla.'_id';?>')">
                                            <img src="../img/delete.png"  height="28" title="Eliminar"></a></div>
                                            </td>
                                      </tr>
                                    <?php
                                      }
                                    ?>
                                </table>
                                </br>              

            
 
</div>