<?php 

session_start();

if( $_SESSION["entrar"] !="")
{
?>


<?php
include("../partes/encabezado.php");
$pagName="inicio";
$esPopUp="no";
?>


<?php include("../partes/pie.php");
?>

<?php
}
else {
	echo "<script type='text/javascript'>window.location='../index.html'</script>";
}
?>