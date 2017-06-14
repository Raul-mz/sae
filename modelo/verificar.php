<?php 
session_start();

/** **/

$campo1="entrar";
$campo2="clave";
$Tabla="entrar";
$valor1=$_POST['entrar'];
$valor2=$_POST['clave'];


$_SESSION['entrar']=$valor1;
$_SESSION['clave']=$valor2;
// Columnas de la bd. 
/** Fin **/  
require_once("../class/class.new.php");

/* Para consultar Personas */
$datosUsu = new conSqlSelect;



$usuarios_reg = $datosUsu->acceso($Tabla,$campo1,$valor1,$campo2,$valor2);
/* ************************/
if (!empty($usuarios_reg))
{//si el cliente esta registrado
$_SESSION['id_empleado']=$usuarios_reg[0]['id_empleado'];
header('location: ../vista/inicio.php');

}
else{
   
header('location: ../index1.php');
}

?>

</body>
</html>