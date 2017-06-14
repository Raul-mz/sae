<?php session_start();?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 
<?php 
$texto=explode(",",$_POST['texto']);
$text=$_POST['texto'];
$num=$_POST['num'];
$pag=$_POST['pag'];
$id=$_POST['id'];
for($x=0;$x<=$num;$x++)
 $texto[$x];


/** **/

$var="convenios";
$Tabla="convenio";
// Columnas de la bd. 
$i=0;
  $cols[$i++]="convenio_id";
  $cols[$i++]="deudor_id";
  $cols[$i++]="nombre";
  $cols[$i++]="cedula";
  $cols[$i++]="total";
  $cols[$i++]="num_cuotas";
  
/** Fin **/  
require_once("../class/class.new.php");

/* Para consultar Personas */
$datosUsu = new conSqlSelect;



if($id==""){
$usuarios_reg = $datosUsu->obtResultadoW($Tabla,'cedula',$texto[1]);
/* ************************/
if (!empty($usuarios_reg))
{//si el departamento esta registrado
echo "<div id='msj' align='center' class='c'>El deudor ya está Registrado  <a onClick=\"newRecord('departamento')\">Volver</a></div>";

}
else{
   $newReg = new conSqlInsert;
   
	$registro = $newReg->new_Record($Tabla,$cols,$texto);
 $max = $datosUsu->obtResultadomax($Tabla,'convenio_id');
//header("location: ../vista/".$var.".php");
echo "Registrado con Exito...";
echo "<input type='hidden' value='".$max[0]['a']."' id='convenio_id'>";
}
}
else{

  $editReg = new conSqlUpdate;


	$registro = $editReg->update($Tabla,$cols,$texto);
 //header("location: ../vista/".$var.".php");
echo "Editado con Exito... <a href='../vista/".$var.".php'>Continuar</a>";


?>
<?php


}

?>

</div>
</body>
</html>