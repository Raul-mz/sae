<?php
require_once("../class/class.new.php");
$resultado = new conSqlSelect;
 if(isset($esPopUp)) { 
$pag="p_departamento";
}
else {
 $pag="convenio"; 
}
if(isset ($_POST['id'])==""){
  $r_Obt[0]['nombre']="";
  $r_Obt[0]['deudor_id']="";
  
  $r_Obt[0]['es_activo']="";
  $camp=$_GET['c'];

  $tabla="deuda";
$ID="deuda_id";
/* Para consultar Personas */

$r_Obt2 = $resultado->obtResultadoW($tabla,$ID,$camp);

  $tabla="deudor";
$ID="cedula";
  $camp=$r_Obt2[0]['deudor_id'];
$r_Obt = $resultado->obtResultadoW($tabla,$ID,$camp);
$r_Obt[0]['convenio_id']="";

  echo"<h2><p align='center'>Registrar Convenio</p> </h2>";
}
else {
  echo"<h2><p align='center'>Editar Convenio</p> </h2>";
  $camp=$_POST['id'];

$tabla="deudor";
$ID="deudor_id";
/* Para consultar Personas */

$r_Obt = $resultado->obtResultadoW($tabla,$ID,$camp);

}

?>
<input type="hidden" id="deuda" value="<?php echo $r_Obt2[0]['deuda_id']?>" name="">
                   <form class="table-responsive" onsubmit="registrar('<?php echo $pag;?>'); return false">
                      <table class="table table-hover" height="100%">
                      
                          <tr>
                              <td class="text-right">
                                <label for="exampleInputName2">Cedula/Pasaporte: </label>
                              </td>
                              <td>
                                  <input type="hidden" class="form-control" id="campo" value="<?php echo $r_Obt[0]['convenio_id']?>">
                                  <input type="text" class="form-control" id="campo" value="<?php echo $r_Obt2[0]['deuda_id']?>">
                                  <input type="text" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['cedula']?>">
                              </td>
                              
            <td class="text-right"><label for="exampleInputName2">Nombre:</label></td>
            <td> <input type="text" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>"></td>
                              </tr><tr>  <td class="text-right">
                                <label for="exampleInputName2">Total: </label>
                              </td>
                              <td colspan="3">
                                  
                                 <input type="text" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt2[0]['total']?>">
                              </td>
                              
            </tr>
            <tr>
            <td colspan="4">
            <div class="text-center" id="mensaje"><a class="btn btn-primary" onclick="addConvenio('<?php echo $pag;?>')">Guardar Convenio</a></div></td>
            <td></td></tr>


<tr id="linea1" style="display:none">  <td class="text-right"><label for="exampleInputName2">Números de Cuotas:</label></td>
            <td> <input type="text" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value=""></td> 
  <td class="text-right">
                                
                              </td>
                              <td>
                              <a data-toggle="modal" data-target="#myModal">Agregar Cuotas</a>
                              </td>
</tr>                                                      <tr id="linea2" style="display: none">
                              <td colspan="4" class="text-center">
                                  <input type="submit" class="btn btn-primary" value="Continuar"> -
                                  <?php if(isset($esPopUp)) { ?> <a class="btn btn-danger" onclick= "window.close();">Cerrar<?php } else { ?> 
                                  <a class="btn btn-danger" onclick="nuevo('c_<?php echo $pag;?>')">Cancelar</a><?php } ?>
                              </td>
                          </tr>
                      </table>
                    </form>
                </div>
              
              
            </div>
        </div>
        </div><!--/right-->
  	</div><!--/row-->
</div><!--/container-->


<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cuotas</h4>
      </div>
      <div class="modal-body" id="modalbody">
        <?php include('c_cuota.php'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})

</script>