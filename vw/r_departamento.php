<?php
require_once("../class/class.new.php");
$resultado = new conSqlSelect;
 if(isset($esPopUp)) { 
$pag="p_departamento";
}
else {
 $pag="departamento"; 
}
if(isset ($_POST['id'])==""){
  $r_Obt[0]['nombre']="";
  $r_Obt[0]['id_departamento']="";

  $r_Obt[0]['es_activo']="";
  $camp="";

  echo"<h2><p align='center'>Registrar departamento</p> </h2>";
}
else {
  echo"<h2><p align='center'>Editar departamento</p> </h2>";
  $camp=$_POST['id'];

$tabla="departamento";
$ID="id_departamento";
/* Para consultar Personas */

$r_Obt = $resultado->obtResultadoW($tabla,$ID,$camp);

}

?>
                   <form class="table-responsive" onsubmit="registrar('<?php echo $pag;?>'); return false">
                      <table class="table table-hover" height="100%">
                      
                          <tr>
                              <td class="text-right">
                                <label for="exampleInputName2">Departamento: </label>
                              </td>
                              <td>
                                  <input type="hidden" class="form-control" id="campo" value="<?php echo $r_Obt[0]['id_departamento']?>">
                                  <input type="text" class="form-control" onkeypress="return caracteres(event)" style="text-transform:uppercase"  id="texto" placeholder=""  autofocus="autofocus" required="
required" value="<?php echo $r_Obt[0]['nombre']?>">
                              </td>
                              
            <td class="text-right"><label for="exampleInputName2">Activo:</label></td>
            <td><input type="checkbox" name="option3" value="1" <?php  if($r_Obt[0]['es_activo']!=0 ) echo "checked" ?>> </input></td>

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
              <div class="row">
                <div class="col-sm-8 col-sm-offset-3">
                </div>
              </div>
            </div>
        </div>
        </div><!--/right-->
  	</div><!--/row-->
</div><!--/container-->
