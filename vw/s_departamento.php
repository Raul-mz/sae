<?php
require_once("../class/class.new.php");
$resultado = new conSqlSelect;

$dep_Obt = $resultado->obtResultadordx('departamento','id_departamento',"DESC");


?>
                                <select required="
required">


                                  <?php for ($i=0; $i< count($dep_Obt); $i++){ ?>   
                                    <option value="<?php echo $dep_Obt[$i]['id_departamento']?>"><?php echo $dep_Obt[$i]["nombre"];?></option>
                                <?php }?>  
                                  </select>
   <a href="javascript:new_window('p_departamento.php')" class="btn btn-success">Nuevo</a>