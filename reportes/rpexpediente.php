<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>

 <img src="../img/mpps.jpg" width="100%" height="50px" >
 <img src="../img/lineaenc.jpg" width="100%" height="30px" >
<p align= "left">HOSPITAL GENERAL Dr. MIGUEL ORAÁ</p>
<p align= "left">OFICINA DE RECURSOS HUMANOS</p> 

<p align= "right">
<?php //Ejemplo curso PHP aprenderaprogramar.com
$time = time();
echo "Guanare,". date("d-m-Y (H:i:s)", $time);
?>
</p>
</head>
<body >


<?php require_once("../class/class.new.php");


/* Para consultar cliente */
$resultado = new conSqlSelect;

$tabla="descanso";
$tablae="empleado";
$tablae="departamento";

$desde=$_POST['fechad']; //selecciona todos los campos de la tabla descanso donde 
"<p>".$hasta=$_POST['fechah'];

$dep=$_POST['codigo'];
//$r_Obt = $resultado->obtSentenciaW("select * from descanso where fecha_inicio>= '".$desde."' or  (fecha_final >= '".$desde."' and fecha_final <= '".$hasta."' )");
$r_Obt = $resultado->obtSentenciaW("select * from descanso AS d, empleado AS e
where e.codigo = d.id_empleado and e.codigo='".$dep."' and 
(d.fecha_inicio>= '".$desde."' and  (d.fecha_final >= '".$desde."' or d.fecha_final <= '".$hasta."' ))");


?>
<p>&nbsp; </p>
<p>&nbsp; </p>
    
      <p ><h2 align= "center">Relación de Ausencia   </h2> </p>
                   <p ><h3 align= "center">Desde el <?php echo $desde ?> al <?php echo $hasta ?></h3> </p>                  
   
</br>
 <table width="50%" align="center" >
 <tr id="listar">
<th ><div align="center" class="t">Cédula: <?php echo $r_Obt[0]["cedula"]?></div></th>
 <th ><div align="center" class="t">Nombre: <?php echo $r_Obt[0]["nombre"]?>  <?php echo $r_Obt[0]["apellido"]?></div></th>
 <?php
 $coddep= $r_Obt[0]["id_departamento"]; 
$r_depr = $resultado->obtResultadoW("departamento","id_departamento",$coddep); ?>
<th ><div align="center" class="t">Departamento: <?php echo $r_depr[0]["nombre"]?></div></th>
 
</tr>
</table>    
</br>                                
                                <table width="40%" align="center" border="1">

       
                            <thead>                                        
                                        <tr id="listar">
                                          <th width="40%"><div align="center" class="t">Fecha de inicio</div></th>
                                          <th width="40%"><div align="center" class="t">Fecha final</div></th>
                                          <th width="40%"><div align="center" class="t">Motivo</div></th>

</tr>
                                  </thead>
            <?php for ($i=0; $i< count($r_Obt); $i++){ ?>   
                                    <tr id="consultar">
<?php //$coddep= $r_Obt[$i]["id_departamento"]; 
//$r_dep = $resultado->obtResultadoW("departamento","id_departamento",$coddep); ?>
                                      <td width="40%"><div align="center"><?php  echo $r_Obt[$i]["fecha_inicio"]?></div></td>
                                      <td width="40%"><div align="center"><?php  echo $r_Obt[$i]["fecha_final"]?></div></td>
                                      <td width="40%"><div align="center">Descanso</div></td>
                                 

                                      </tr>

                                    <?php
                                      }
                                    ?>
<!--Vacaciones -->
<?php
$tabla="vacaciones";
$tablae="empleado";
$tablae="departamento";

$desde=$_POST['fechad']; //selecciona todos los campos de la tabla descanso donde 
"<p>".$hasta=$_POST['fechah'];

$dep=$_POST['codigo'];
//$r_Obt = $resultado->obtSentenciaW("select * from descanso where fecha_inicio>= '".$desde."' or  (fecha_final >= '".$desde."' and fecha_final <= '".$hasta."' )");
$r_vac = $resultado->obtSentenciaW("select * from vacaciones AS d, empleado AS e
where e.codigo = d.id_empleado and e.codigo='".$dep."' and 
(d.fecha_inicio>= '".$desde."' and  (d.fecha_final >= '".$desde."' or d.fecha_final <= '".$hasta."' ))");
                               ?>
 <?php for ($i=0; $i< count($r_vac); $i++){ ?>   
                                    <tr id="consultar">
<?php //$coddep= $r_Obt[$i]["id_departamento"]; 
//$r_dep = $resultado->obtResultadoW("departamento","id_departamento",$coddep); ?>
                                      <td width="40%"><div align="center"><?php  echo $r_vac[$i]["fecha_inicio"]?></div></td>
                                      <td width="40%"><div align="center"><?php  echo $r_vac[$i]["fecha_final"]?></div></td>
                                      <td width="40%"><div align="center">Vacaciones</div></td>
                                 

                                      </tr>

                                    <?php
                                      }
                                    ?>                               
<!--Permisos -->
<?php
$tabla="permiso";
$tablae="empleado";
$tablae="departamento";

$desde=$_POST['fechad']; //selecciona todos los campos de la tabla descanso donde 
"<p>".$hasta=$_POST['fechah'];

$dep=$_POST['codigo'];
//$r_Obt = $resultado->obtSentenciaW("select * from descanso where fecha_inicio>= '".$desde."' or  (fecha_final >= '".$desde."' and fecha_final <= '".$hasta."' )");
$r_per = $resultado->obtSentenciaW("select * from permiso AS d, empleado AS e
where e.codigo = d.id_empleado and e.codigo='".$dep."' and 
(d.fecha_inicio>= '".$desde."' and  (d.fecha_final >= '".$desde."' or d.fecha_final <= '".$hasta."' ))");
                               ?>
 <?php for ($i=0; $i< count($r_per); $i++){ ?>   
                                    <tr id="consultar">
<?php //$coddep= $r_Obt[$i]["id_departamento"]; 
//$r_dep = $resultado->obtResultadoW("departamento","id_departamento",$coddep); ?>
                                      <td width="40%"><div align="center"><?php  echo $r_per[$i]["fecha_inicio"]?></div></td>
                                      <td width="40%"><div align="center"><?php  echo $r_per[$i]["fecha_final"]?></div></td>
                                      <td width="40%"><div align="center">Permiso</div></td>
                                 

                                      </tr>

                                    <?php
                                      }
                                    ?>                               
<!--Permisos -->
<?php
$tabla="reposo";
$tablae="empleado";
$tablae="departamento";

$desde=$_POST['fechad']; //selecciona todos los campos de la tabla descanso donde 
"<p>".$hasta=$_POST['fechah'];

$dep=$_POST['codigo'];
//$r_Obt = $resultado->obtSentenciaW("select * from descanso where fecha_inicio>= '".$desde."' or  (fecha_final >= '".$desde."' and fecha_final <= '".$hasta."' )");
$r_rep = $resultado->obtSentenciaW("select * from reposo AS d, empleado AS e
where e.codigo = d.id_empleado and e.codigo='".$dep."' and 
(d.fecha_inicio>= '".$desde."' and  (d.fecha_final >= '".$desde."' or d.fecha_final <= '".$hasta."' ))");
                               ?>
 <?php for ($i=0; $i< count($r_rep); $i++){ ?>   
                                    <tr id="consultar">
<?php //$coddep= $r_Obt[$i]["id_departamento"]; 
//$r_dep = $resultado->obtResultadoW("departamento","id_departamento",$coddep); ?>
                                      <td width="40%"><div align="center"><?php  echo $r_rep[$i]["fecha_inicio"]?></div></td>
                                      <td width="40%"><div align="center"><?php  echo $r_rep[$i]["fecha_final"]?></div></td>
                                      <td width="40%"><div align="center">Reposo</div></td>
                                 

                                      </tr>

                                    <?php
                                      }
                                    ?>                               


                                </table>
                                </br>              

 
 <TR>
<br><br><br><br><br><br><br><br><br><br><br><br><b                                         <hr width="30%" size="2" align = center”/>
<p align= "center"> FIRMA DEL JEFE DE RECURSOS HUMANOS</p>
<p align= "center">  DEL HOSPITAL UNIVERSITARIO DR. MIGUEL ORAÀ           </p>
</TR>
