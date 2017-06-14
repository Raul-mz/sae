<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
</head>
<body>

<?php require_once("../class/class.new.php");

$resultado = new conSqlSelect;

$empleado_Obt = $resultado->obtResultado('empleado');
?>
<p>&nbsp; </p>

    
            <p ><h2 align= "center">Expediente Personal</h2> 

   <form class="table-responsive" method="post"  action="rpexpediente.php"> 
                   
<div class="main col-sm-12 col-xs-12 col-lg-6 col-md-6 col-md-offset-3">
</br>
                                <table width="50px" class="table table-hover" align="center">
                                <tr>
                                    <td colspan="4"><div align="left" class="t"><strong>Seleccione el Código</strong></div></td>
                                </tr>
                                <tr>
                                <td width="30px" colspan="4">
                                <select name="codigo" autofocus="autofocus" required="required">
                                  <?php for ($i=0; $i< count($empleado_Obt); $i++){ ?>   
                                    <option value="<?php echo $empleado_Obt[$i]['codigo']?>">
                                    <?php echo $empleado_Obt[$i]["codigo"];?></option>
                                <?php }?>  
                                  </select></td> 
              
              
           </tr>
<tr>
    <td colspan="4" ><div align="left" class="t"><strong>Seleccione Fecha</strong> </div></td>  
    </tr>
    <tr>          
   <td width="10px"><div align="right" class="t">Desde:</div> </td> 
   <td width="30px"><div align="left"><input name="fechad" id="fechad" required="required" onblur="comparar();" type="date" size="16" maxlength="30" value="<?php echo $r_Obt[0]['fechap']?>" /></div> </td>
<td width="10px">   <div align="right" class="t">Hasta: 
<td width="30px"> <div align="left"><input  name="fechah" id="fechah" required="required" onblur="compararh(); compararc();" type="date" size="16" maxlength="30" value="<?php echo $r_Obt[0]['fechap']?>" /></div></td>
</td>
 <tr>
                              <td colspan="4" class="text-center">
                                  <input type="submit" class="btn btn-primary" value="Continuar"> -
                                  <a class="btn btn-danger" onclick="nuevo('c_<?php echo $pag;?>')">Cancelar</a>
                              </td>
                         </tr>
                         <tr><td colspan="4"></td>
                         </tr>
                                </table>
                                </br>              

            

</div>

<script type="text/javascript">

function check(val)
{
  if (val=='d') {
        document.getElementById("mensaje").style.display = "block";
  }      
   else {
        document.getElementById("mensaje").style.display = "none";
  }
}

function comparar(){ 
    var dtFechaActual = new Date();
    var fechap=document.getElementById("fechad").value;

  if(Date.parse(fechap)> dtFechaActual){   
      alert("La fecha desde no puede ser mayor a la fecha actual, por favor cambie el dato"); 
      return false; 
    } 
    return true; 
  }

function compararh(){ 
    var dtFechaActual = new Date();
    var fechap=document.getElementById("fechah").value;

  if(Date.parse(fechap)> dtFechaActual){   
      alert("La fecha hasta no puede ser mayor a la fecha actual, por favor cambie el dato"); 
      return false; 
    } 
    return true; 
  }

  function compararc(){ 
    var fechad=document.getElementById("fechad").value;
    var fechah=document.getElementById("fechah").value;

  if(Date.parse(fechad)> Date.parse(fechah)){   
      alert("La fecha desde no puede ser mayor a la fecha hasta, por favor cambie el dato"); 
      return false; 
    } 
    return true; 
  }
</script>
</form>