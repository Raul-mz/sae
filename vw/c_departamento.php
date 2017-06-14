<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
</head>
<body>

<?php require_once("../class/class.new.php");

/* Para consultar cliente */
$resultado = new conSqlSelect;

$tabla="departamento";


$r_Obt = $resultado->obtResultado($tabla);


//PAGINACION
//Limito la busqueda 
$TAMANO_PAGINA = 10; 

//examino la página a mostrar y el inicio del registro a mostrar 
if(!isset($_GET["pagina"]))
  $pagina=1; 
else 
  $pagina = $_GET["pagina"]; 

if (!$pagina) { 
    $inicio = 0; 
    $pagina=1; 
} 
else { 
    $inicio = ($pagina - 1) * $TAMANO_PAGINA; 
}

$num_total_registros = sizeof($r_Obt); 
//calculo el total de páginas 
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
//echo "Número de registros encontrados: " . $num_total_registros . "<br>"; 
//echo "Se muestran páginas de " . $TAMANO_PAGINA . " registros cada una<br>"; 
//echo "Mostrando la página " . $pagina . " de " . $total_paginas . "<p>";

$criterio = ""; 
$txt_criterio="";
if (isset($_GET["criterio"])){ 
    $txt_criterio = $_GET["criterio"];
    // Columna debes cambiar
     $columna="codigo";

    $criterio = " ".$columna." like '%" . $txt_criterio . "%'"; 
$r_Obt = $resultado->obtResultadoB($tabla,$inicio,$TAMANO_PAGINA,$criterio);

}
else {
$r_Obt = $resultado->obtResultadoL($tabla,$inicio,$TAMANO_PAGINA);
}

?>

    
      <p ><div class=" r col-md-offset-3"><h2>Ingreso de Departamento</h2></div> </p>
          <form action="" method="get"> 
Buscar: 
<input type="text" name="criterio" size="22" maxlength="150"> 
<input type="submit" value="Buscar"> 
</form>          
<div class="main col-sm-12 col-xs-  12 col-lg-10 col-md-10 col-md-offset-1">

</br>
                                <table class="table table-hover" align="center">

                            <thead><tr id="listar"><div align="right"><input class="btn btn-primary" type="submit" name="boton" onclick="nuevo('<?php echo 'r_'.$tabla?>')" value="Registrar" /></div>
                                        
                                        <tr id="listar">

                                          <th ><div align="center" class="t">Departamento</div></th>
                                           <th width="10px"><div align="center" class="t">Activo</div></th>

                                          <th ><div align="center" class="t">Editar</div></th>
                                          <th ><div align="center" class="t">Eliminar</div></th>
                                          
                                        </tr>
                                  </thead>
                                    <?php for ($i=0; $i< count($r_Obt); $i++){ ?>   
                                    <tr id="consultar">

                                  <?php 
                      
                                      $cod=$r_Obt[$i]["id_departamento"]; ?>
                                      <td><div align="center"><?php  echo $r_Obt[$i]["nombre"]?></div></td>
                                      

                                     <td><div align="center" class="ta"><input type="checkbox" disabled="disabled" <?php  if($r_Obt[$i]["es_activo"]==1) echo "checked" ?>> </input>
                                     </div></td>

                                      
                                      <td width="50"><div align="center"><a onclick="del_up('<?php echo 'id_'.$tabla;?>','<?php echo $cod;?>','r_<?php echo $tabla;?>',1,'')">
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

            
  <?php
if ($total_paginas > 1){ 
    for ($i=1;$i<=$total_paginas;$i++){ 
        if ($pagina == $i) 
          //si muestro el índice de la página actual, no coloco enlace 
          echo $pagina . " "; 
        else 
          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
          echo "<a href='?pagina=" . $i . "&criterio=" . $txt_criterio . "'>" . $i . "</a> "; 
    } 
}

             ?>
</div>