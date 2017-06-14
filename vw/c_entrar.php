<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
</head>
<body>

<?php require_once("../class/class.new.php");

/* Para consultar cliente */
$resultado = new conSqlSelect;

$tabla="entrar";


$r_Obt = $resultado->obtResultado($tabla);
?>
<p>&nbsp; </p>
<p>&nbsp; </p>
    
    
      <p ><div class=" r col-md-offset-3"><h2>Usuario</h2></div> </p>
                  
<div class="main col-sm-12 col-xs-12 col-lg-10 col-md-10 col-md-offset-1 ">
</br>
                                <table   class="table table-hover" align="center" >

                            <thead><tr id="listar">
                            <div align="right"><input class="btn btn-primary" type="submit" name="boton" onclick="nuevo('<?php echo 'r_'.$tabla?>')" value="Registrar" /></div>
                                        
                                        <tr id="listar">

                                          <th ><div align="center" class="ta">Codigo</div></th>
                                          <th width="20%"><div align="center" class="ta">Nombres</div></th>
                                          <th><div align="center" class="ta">Apellidos</div></th>
                                          <th ><div align="center" class="ta">Cedula</div></th>
                                           
                                             <th width="20%"><div align="center" class="t">Nombre de usuario</div></th>
                                   




                                           <th width="2 px"><div align="center" class="t">Editar</div></th>
                                          <th width="2 px"><div align="center" class="t">Eliminar</div></th>
                                          
                                        </tr>
                                  </thead>
                                    <?php for ($i=0; $i< count($r_Obt); $i++){ ?>   
                                    <tr id="consultar">

<?php $codEmpleado= $r_Obt[$i]["id_empleado"]; 
$r_Empleado = $resultado->obtResultadoW("empleado","codigo",$codEmpleado); ?>

                                   <td><div align="center"><?php  echo $r_Empleado[0]["codigo"]?></div></td>
                                      <td><div align="center"><?php  echo $r_Empleado[0]["nombre"]?></div></td>
                                      <td><div align="center"><?php  echo $r_Empleado[0]["apellido"]?></div></td>
                                      <td><div align="center"><?php  echo $r_Empleado[0]["cedula"]?></div></td>
    
                                      
                                      <td><div align="center"><?php  echo $r_Obt[$i]["entrar"]?></div></td>


                                      
                                      <td width="150"><div align="center"><a onclick="del_up('<?php echo 'id_'.$tabla;?>','<?php echo $cod;?>','r_<?php echo $tabla;?>',1,'')">
                                            <img src="../img/editar.png"  height="28" title="Editar"></a></div></td>
                                             <td width="50"><div align="center"><a onclick="del_up('<?php echo $tabla;?>','<?php echo $cod;?>','<?php echo $tabla;?>',0,'<?php echo 'id_'.$tabla;?>')">
                                            <img src="../img/delete.png"  height="28" title="Eliminar"></a></div>
                                            </td>
                                      </tr>
                                    <?php
                                      }
                                    ?>
                                </table>
                                </br>              

            

</div>