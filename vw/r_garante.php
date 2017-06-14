<?php
require_once("../class/class.new.php");
$resultado = new conSqlSelect;
 if(isset($esPopUp)) { 
$pag="p_departamento";
}
else {
 $pag="deudor"; 
}
if(isset ($_POST['id'])==""){
  $r_Obt[0]['nombre']="";
  $r_Obt[0]['deudor_id']="";

  $r_Obt[0]['es_activo']="";
  $camp="";

  
}
else {
  $camp=$_POST['id'];

$tabla="deudor";
$ID="deudor_id";
/* Para consultar Personas */

$r_Obt = $resultado->obtResultadoW($tabla,$ID,$camp);

}

?>

                   <form class="table-responsive" onsubmit="registrar('<?php echo $pag;?>'); return false">
                      <table class="table table-hover" height="100%">
                      
                          <tr>
                              <td class="text-right">
                                <label for="exampleInputName2">Cedula/Pasaporte: </label>
                              </td>
                              <td>
                                  <input type="hidden" class="form-control" id="campo" value="<?php echo $r_Obt[0]['deudor_id']?>">
                                  <input type="text" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>">
                              </td>
                              <tr>
            <td class="text-right"><label for="exampleInputName2">Nombre:</label></td>
            <td> <input type="text" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>"></td>
                              </tr><tr>  <td class="text-right">
                                <label for="exampleInputName2">Direccion: </label>
                              </td>
                              <td colspan="3">
                                  
                                  <textarea class="form-control col-sm-8"></textarea>
                              </td>
                              
            </tr>
<tr>  <td class="text-right"><label for="exampleInputName2">Telefono:</label></td>
            <td> <input type="text" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>"></td> 
</tr><tr><td class="text-right">
                                <label for="exampleInputName2">Celular: </label>
                              </td>
                              <td>
                                  <input type="text" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>">

<input type="hidden" id="texto" value="">  
                              </td>

                                  <input type="hidden" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>"> <input type="hidden" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>">
                                  <input type="hidden" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>">
                            <tr>
                              <td colspan="4" class="text-center">
                                  <input type="submit" class="btn btn-primary" value="Continuar"> -
                                  <?php if(isset($esPopUp)) { ?> <a class="btn btn-danger" onclick= "window.close();">Cerrar<?php } else { ?> 
                                  <a class="btn btn-danger" onclick="nuevo('c_<?php echo $pag;?>')">Cancelar</a><?php } ?>
                              </td>
                          </tr>
                      </table>
                    
               