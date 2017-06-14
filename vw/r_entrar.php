<?php
require_once("../class/class.new.php");
$resultado = new conSqlSelect;

$pag="entrar";
if(isset ($_POST['id'])==""){
  
  $r_Obt[0]['id_entrar']="";
  $r_Obt[0]['entrar']="";

  $camp="";

  echo"<h2><p align='center'>Registrar entrar</p> </h2>";
}
else {
  echo"<h2><p align='center'>Editar entrar</p> </h2>";
  $camp=$_POST['id'];

$tabla="entrar";
$ID="id_entrar";
/* Para consultar Personas */

$r_Obt = $resultado->obtResultadoW($tabla,$ID,$camp);

}
$empleado_Obt = $resultado->obtResultado('empleado');

?>
                   <form class="table-responsive" onsubmit="registrar('<?php echo $pag;?>'); return false">
                      <table class="table table-hover" height="100%">
                      
                          <tr>


                                 <td class="text-right">
                   <label for="exampleInputName2">codigo: </label>    </td>
                                           

                              <td><input type="hidden" class="form-control" id="campo" value="<?php echo $r_Obt[0]['id_entrar']?>"</td>
                              
                                         <select>
                                  <?php for ($i=0; $i< count($empleado_Obt); $i++){ ?>   
                                    <option value="<?php echo $empleado_Obt[$i]['codigo']?>">
                                    <?php echo $empleado_Obt[$i]["codigo"];?></option>
                                <?php }?>  
                                  </select>

                              <td class="text-right">
                                <label for="exampleInputName2">usuario: </label>
                              </td>
                              <td>
                                  <input type="text" class="form-control" onkeypress="return caracteres(event)" style="text-transform:uppercase" id="texto" placeholder="" value="<?php echo $r_Obt[0]['entrar']?>">
                              </td>
                              
                              <td class="text-right">
                                <label for="exampleInputName2">contraseña: </label>
                              </td>
                              <td>
                                  <input type="password" name=“lacosa12” class="form-control" id="texto" placeholder="" value="<?php echo $r_Obt[0]['clave']?>">
                              </td>
                         </tr>
                              
                                                            <tr>
                              <td colspan="4" class="text-center">
                                  <input type="submit" class="btn btn-primary" value="Continuar"> -
                                  <a class="btn btn-danger" onclick="nuevo('c_<?php echo $pag;?>')">Cancelar</a>
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

<!--/ <label for="emailAddress">Email address</label>
//        <input type="email" el tipo de  dato name="emailAddress" id="emailAddress" placeholder="name@example ejemplo.com" required="
//required" obligatorio autofocus="autofocus" el primero en copiar maxlength="50" />
// </li>-->
