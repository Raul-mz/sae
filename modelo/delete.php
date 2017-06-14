<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="../css/main.css" rel="stylesheet">

<style type="text/css">
	#delete{
		font-size: 30px;
		padding: 15% 30%;
		color: #222729;
	}
</style>
<p>&nbsp; </p>
<p>&nbsp; </p>
<p>&nbsp; </p>
<p>&nbsp; </p>
<div class="main col-sm-12 col-xs-12 col-lg-6 col-md-6 col-md-offset-3 white sombra"><p>&nbsp; </p>

<p>&nbsp; </p>
<?php
require_once("../class/class.new.php");

//variable GET
$id=$_POST['id'];
$col=$_POST['col'];
$var=$_POST['var'];
$Tabla=$_POST['tabla'];

/* Para Eliminar Registro */
   $deleteReg = new conSqlDelete;
	//$delete = $deleteReg->delete($Tabla,$col,$id);
	$delete = $deleteReg->delete($Tabla,$col,$id);
	//<div id='delete' >Eliminado con Éxito... <a href='../vista/".$var.".php'>Continuar</a></div>";

echo "<div align='center' class='c'>Eliminado con Éxito... <a href='../vista/".$var.".php'>Continuar</a></div>";
?><p>&nbsp; </p>
<p>&nbsp; </p>
</div>