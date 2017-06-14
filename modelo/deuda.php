<?php session_start();?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link href="../css/main.css" rel="stylesheet">

<?php 
$texto=explode(",",$_POST['texto']);
$text=$_POST['texto'];
$num=$_POST['num'];
$pag=$_POST['pag'];
$id=$_POST['id'];
for($x=0;$x<=$num;$x++)
 $texto[$x];
array_splice($texto,2,2);

/** **/

$var="convenio";
// Columnas de la bd. 
$i=0;
 $Tabla="deuda";
// Columnas de la bd. 
$i=0;

  $cols[$i++]="deuda_id";
  $cols[$i++]="deudor_id";
  $cols[$i++]="monto_bruto";
  $cols[$i++]="interes";
  $cols[$i++]="interes_mora";
  $cols[$i++]="subtotal";
  $cols[$i++]="coactiva";
  $cols[$i++]="gasto_cobro";
  $cols[$i++]="total";


/** Fin **/  
require_once("../class/class.new.php");

/* Para consultar Personas */
$datosUsu = new conSqlSelect;



if($id==""){
$usuarios_reg = $datosUsu->obtResultadoW($Tabla,'deuda_id',$texto[0]);
/* ************************/
if (!empty($usuarios_reg))
{//si el departamento esta registrado
echo "<div id='msj' align='center' class='c'>El deudor ya está Registrado  <a onClick=\"newRecord('departamento')\">Volver</a></div>";

}
else{
   $newReg = new conSqlInsert;
   

  $registro = $newReg->new_Record($Tabla,$cols,$texto);
 $max = $datosUsu->obtResultadomax($Tabla,'deuda_id');
 
//header("location: ../vista/".$var.".php");
echo "Registrado con Exito... <a href='../vw/".$var.".php?c=".$max[0]['a']."'>Crear convenio de Pago</a>";
}
}
else{

  $editReg = new conSqlUpdate;


	$registro = $editReg->update($Tabla,$cols,$texto);
 //header("location: ../vista/".$var.".php");
echo "Editado con Exito... <a href='../vw/".$var.".php'>Continuar</a>";


?>
<?php


}

?>
<p>&nbsp; </p>

<p>&nbsp; </p>
</div>
</body>
</html>