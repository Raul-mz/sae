
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
function buscar(field, d){
	
	campo = document.getElementById(d);
	if(field.value.length>0)
		campo.innerHTML="Buscar";

	$('#'+d).attr( 'title', 'foo' );
}

function mostrar(capa){
	
	divResultado = document.getElementById(capa);
	divResultado.style.visibility='visible';
}
function cal(){
	var mb = document.getElementById('mb').value;
	var interes = document.getElementById('interes').value;
	var im = document.getElementById('im').value;
	var st = document.getElementById('st').value;
	var coactiva = document.getElementById('coactiva').value;
	var gastos = document.getElementById('gastos').value;
	var total = document.getElementById('total').value;
	
	validaNull(mb);
	validaNull(interes);
	validaNull(im);
	validaNull(st);
	validaNull(coactiva);
	validaNull(gastos);

	st=parseInt(mb)+parseInt(interes)+parseInt(im);
	total= parseInt(st)+parseInt(coactiva)+parseInt(gastos);
	if(isNaN(total))
		total=0;
	if(isNaN(st))
		st=0;
	document.getElementById('total').value = total;
	document.getElementById('st').value = st;

}


function validaNull(v){
	if(v.length==0)
		return v = 0;
	else
		return v;
}
function inicializaCampos(caja){ 

var divResultado = opener.document.getElementById(caja);

		ajax=objetoAjax();
		ajax.open("GET","../vw/s_"+caja+".php");
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			}
		}
		//como hacemos uso del metodo GET
		//colocamos null
		ajax.send(null)

//window.close();
}
// We'll run the AJAX query when the page loads.

function nuevoModal(pag){
	
	divResultado = document.getElementById('modalbody');
	
		ajax=objetoAjax();
		ajax.open("GET","../vw/"+pag+".php");
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			}
		}
		//como hacemos uso del metodo GET
		//colocamos null
		ajax.send(null)
	
}
function regresarModal(pag,id){
	
	divResultado = document.getElementById('modalbody');
	
		ajax=objetoAjax();
		
		ajax.open("GET","../vw/"+pag+".php?cuota="+id+"&convenio_id="+id);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			}
		}
		//como hacemos uso del metodo GET
		//colocamos null
		ajax.send(null)
	
}
function registrarModal(pag){
	var x=(document.forms[1].elements.length)-1;
			texto=new Array();
		for(y=0;y<=x;y++){
			texto[y]=document.forms[1].elements[y].value;
		}
		
	divResultado = document.getElementById('modalbody');

	
	id=document.getElementById('campoC').value;
	
	deuda=document.getElementById('deuda').value;

	texto[1]=deuda;
		ajax=objetoAjax();
			ajax.open("POST","../modelo/"+pag+".php",true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				regresarModal('c_cuota',deuda);
				//divResultado.innerHTML = ajax.responseText
			}
		}

		 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("texto="+texto+"&num="+x+"&pag="+pag+"&id="+id);


}

function nuevo(pag){
	
	divResultado = document.getElementById('registro');
	
		ajax=objetoAjax();
		ajax.open("GET","../vw/"+pag+".php");
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			}
		}
		//como hacemos uso del metodo GET
		//colocamos null
		ajax.send(null)
	
}
function nuevodetalle(pag,id){
	
	divResultado = document.getElementById('registro');
	
		ajax=objetoAjax();
		ajax.open("GET","../vw/"+pag+".php?id="+id);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			}
		}
		//como hacemos uso del metodo GET
		//colocamos null
		ajax.send(null)
	
}
function detalle(pag, id){
	
	divResultado = document.getElementById('registro');
	
		ajax=objetoAjax();
		ajax.open("GET","../vw/"+pag+".php?id="+id);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			}
		}
		//como hacemos uso del metodo GET
		//colocamos null
		ajax.send(null)
	
}
function addConvenio(pag){
	var x=(document.forms[0].elements.length)-2;
			texto=new Array();
		for(y=0;y<=x;y++){
			texto[y]=document.forms[0].elements[y].value;
		}
		
	divResultado = document.getElementById('mensaje');
	var cuota="";
	id=document.getElementById('campo').value;
	
		ajax=objetoAjax();
			ajax.open("POST","../modelo/"+pag+".php",true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				divResultado.innerHTML = ajax.responseText;
				document.getElementById('linea1').style.display="table-row";
				document.getElementById('linea2').style.display="table-row";
				cuota=document.getElementById('convenio_id').value;
	ajax1=objetoAjax();
		
	deuda=document.getElementById('deuda').value;
	
			ajax1.open("GET","../vw/c_cuota.php?cuota="+deuda+"&convenio_id="+cuota,true);
			ajax1.onreadystatechange=function() {
			if (ajax1.readyState==4) {
				//alert(cuota);
				document.getElementById('modalbody').innerHTML = ajax1.responseText;
				
			}
		}

		ajax1.send(null);
			}
		}
	
		 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("texto="+texto+"&num="+x+"&pag="+pag+"&id="+id);
 


}
function registrar(pag){
	var x=(document.forms[0].elements.length)-2;
			texto=new Array();
		for(y=0;y<=x;y++){
			texto[y]=document.forms[0].elements[y].value;
		}
		
	divResultado = document.getElementById('registro');
	
	id=document.getElementById('campo').value;
	
		ajax=objetoAjax();
			ajax.open("POST","../modelo/"+pag+".php",true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				divResultado.innerHTML = ajax.responseText
			}
		}

		 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("texto="+texto+"&num="+x+"&pag="+pag+"&id="+id);


}
function registrarM(pag){
	var x=(document.forms[0].elements.length)-2;
			texto=new Array();
		for(y=0;y<=x;y++){
			texto[y]=document.forms[0].elements[y].value;
		}
		
		
	divResultado = document.getElementById('registro');
	
	id=document.getElementById('campo').value;
	
		ajax=objetoAjax();
			ajax.open("POST","../modelo/"+pag+".php",true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				divResultado.innerHTML = ajax.responseText
			}
		}

		 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("texto="+texto+"&num="+x+"&pag="+pag+"&id="+id);


}
function del_up(tabla,id,pag,accion,col){
	if(accion==1){
		var msj="Modificar";
		var carpeta="vw";
		var pagina=pag;
	} else {
		var msj="Eliminar";
		var carpeta="modelo";
		var pagina="delete"
	}

	divResultado = document.getElementById('registro');
	
	var editar = confirm("¿Desea "+msj+" Este Registro?")
	if ( editar ) {
	
		ajax=objetoAjax();
			ajax.open("POST","../"+carpeta+"/"+pagina+".php",true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				divResultado.innerHTML = ajax.responseText
			}
		}

		 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("id="+id+"&tabla="+tabla+"&col="+col+"&var="+pag);
	}

}

function eliminard(tabla,id,idd,pag,accion,col){
	if (accion==2) {
		var msj="Eliminar";
		var carpeta="modelo";
		var pagina="deliminar"
	} 

	divResultado = document.getElementById('registro');
	
	var editar = confirm("¿Desea "+msj+" Este Registro?")
	if ( editar ) {
	
		ajax=objetoAjax();
			ajax.open("POST","../"+carpeta+"/"+pagina+".php",true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				divResultado.innerHTML = ajax.responseText
			}
		}

		 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("id="+id+"&idd="+idd+"&tabla="+tabla+"&col="+col+"&var="+pag);
	}

}

function ver(id,pag){
	
	divResultado = document.getElementById('registro');

		ajax=objetoAjax();
			ajax.open("POST",pag+".php",true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				divResultado.innerHTML = ajax.responseText
			}
		}

		 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("id="+id);


}
function loadc(str1)
{
var xmlhttp;
var position;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

    document.getElementById("ciudad").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","ciudad.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("c="+str1);
}

function loadm(str)
{
var xmlhttp;
var position;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

    document.getElementById("municipio").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","municipio.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str);
}
