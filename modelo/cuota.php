<?php session_start();?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<script type="text/javascript" src="../js/accion.js"></script>

<?php 
$texto=explode(",",$_POST['texto']);
$text=$_POST['texto'];
$num=$_POST['num'];
$pag=$_POST['pag'];
echo $id=$_POST['id'];
for($x=0;$x<=$num;$x++)
 $texto[$x];


/** **/

$var="c_cuota";
$Tabla="cuota";
// Columnas de la bd. 
$i=0;
  $cols[$i++]="cuota_id";
  $cols[$i++]="convenio_id";
  $cols[$i++]="monto";
  $cols[$i++]="fecha";
  
/** Fin **/  
require_once("../class/class.new.php");

/* Para consultar Personas */
$datosUsu = new conSqlSelect;

?>
<div ></div>
<?php
if($id==""){
//$usuarios_reg = $datosUsu->obtResultadoW($Tabla,'cedula',$texto[1]);
/* ************************/
//if (!empty($usuarios_reg))
////si el departamento esta registrado
//echo "<div id='msj' align='center' class='c'>El deudor ya está Registrado  <a onClick=\"newRecord('departamento')\">Volver</a></div>";

//}
//else{
   $newReg = new conSqlInsert;
   
	$registro = $newReg->new_Record($Tabla,$cols,$texto);

//header("location: ../vista/".$var.".php");
echo "Registrado con Exito... "; ?><a onClick="regresarModal('<?php echo $var ?>',<?php echo $texto[1]?>)">Continuar</a><?php
//}
}
else{

  $editReg = new conSqlUpdate;


	$registro = $editReg->update($Tabla,$cols,$texto);
 //header("location: ../vista/".$var.".php");
echo " Editado con Exito... <a href='../vista/".$var.".php'>Continuar</a>";


?>
<?php


}

?>

<p>&nbsp; </p>

<p>&nbsp; </p>
</div>
</body>
</html>