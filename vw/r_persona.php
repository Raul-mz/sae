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
  $r_Obt[0]['monto_bruto']= $r_Obt[0]['interes']= $r_Obt[0]['interes_mora']= $r_Obt[0]['suttotal']= $r_Obt[0]['coactiva']= $r_Obt[0]['gasto_cobro']= $r_Obt[0]['total']= 0;
  $camp="";

  echo"<h2><p align='center'>Registrar Deudor</p> </h2>";
}
else {
  echo"<h2><p align='center'>Editar Deudor</p> </h2>";
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
                              
            <td class="text-right"><label for="exampleInputName2">Nombre:</label></td>
            <td> <input type="text" class="form-control" onkeypress="return caracteres(event)" id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>"></td>
                       
                              <tr>
                              <th colspan="4" class="text-center"><h2>Deuda</h2>
</th></tr>  <input type="hidden" class="form-control" id="campo" value="<?php echo $r_Obt[0]['deudor_id']?>">

<tr>  <td class="text-right"><label for="exampleInputName2">Monto Bruto:</label></td>
            <td> <input type="text" class="form-control" onkeyup="cal()" id="mb" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['monto_bruto']?>"></td> 
<td class="text-right">
                                <label for="exampleInputName2">Interes: </label>
                              </td>
                              <td>
                                  <input type="text" class="form-control" onkeyup="cal()" id="interes" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['interes']?>">
                              </td></tr>
<tr>  <td class="text-right"><label for="exampleInputName2">Interes Mora:</label></td>
            <td> <input type="text" class="form-control" onkeyup="cal()" id="im" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['interes_mora']?>"></td> 
<td class="text-right">
                                <label for="exampleInputName2">Subtotal: </label>
                              </td>
                              <td>
                                  <input type="text" class="form-control" onkeyup="" id="st" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['suttotal']?>">
                              </td></tr>
<tr>  <td class="text-right"><label for="exampleInputName2">Coactiva:</label></td>
            <td> <input type="text" class="form-control" onkeyup="cal()" id="coactiva" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['coactiva']?>"></td> 
<td class="text-right">
                                <label for="exampleInputName2">Gastos de Cobro: </label>
                              </td>
                              <td>
                                  <input type="text" class="form-control" onkeyup="cal()" id="gastos" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['gasto_cobro']?>">
                              </td></tr><tr><td class="text-right">
                                <label for="exampleInputName2">Total: </label>
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="total" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['total']?>">
                              </td></tr>
                           <tr>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Garante 1</h4>
      </div>
      <div class="modal-body">
        <?php include('r_garante.php'); ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="registrarM('<?php echo $pag;?>')" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-lg" id="myModal2" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Garante 2</h4>
      </div>
      <div class="modal-body">
        <?php include('r_garante.php'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-lg" id="myModal3" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Garante 3</h4>
      </div>
      <div class="modal-body">
        <?php include('r_garante.php'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})

</script>
