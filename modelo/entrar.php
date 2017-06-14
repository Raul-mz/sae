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
$texto[5]=$_SESSION['id_empleado'];

$texto[6]=date('Y-m-d H:i:s');

/** **/

$var="entrar";
$Tabla="entrar";
// Columnas de la bd. 
$i=0;
   $cols[$i++]="id_entrar";
   $cols[$i++]="id_empleado";
   $cols[$i++]="entrar";
  $cols[$i++]="clave";
  $cols[$i++]="es_activo";
  $cols[$i++]="creado";

  $cols[$i++]="creacion";
/** Fin **/  
require_once("../class/class.new.php");

/* Para consultar Personas */
$datosUsu = new conSqlSelect;



if($id==""){
$usuarios_reg = $datosUsu->obtResultadoW($Tabla,'id_empleado',$texto[1]);
/* ************************/
if (!empty($usuarios_reg))
{//si el entrar esta registrado
echo "<div id='msj' align='center' class='c'>Este usuario ya Existe  <a onClick=\"nuevo('r_entrar')\">Volver</a></div>";
}
else{
   $newReg = new conSqlInsert;
   
	$registro = $newReg->new_Record($Tabla,$cols,$texto);
 
//header("location: ../vista/".$var.".php");
echo "<div id='msj' align='center' class='c'>Registrado con Exito... <a href='../vista/".$var.".php'>Continuar</a></div>";
}
}
else{

  $editReg = new conSqlUpdate;


	$registro = $editReg->update($Tabla,$cols,$texto);
 //header("location: ../vista/".$var.".php");
echo "<div id='msj' align='center' class='c'>Editado con Exito... <a href='../vista/".$var.".php'>Continuar</a></div>";


?>
<?php


}

?>
<p>&nbsp; </p>

<p>&nbsp; </p>
</div>
</body>
</html>