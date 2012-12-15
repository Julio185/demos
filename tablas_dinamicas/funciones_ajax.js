function load_tablas (orderby, paginacion) {
xmlhttp=new XMLHttpRequest();  
xmlhttp.onreadystatechange=function()  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    document.getElementById("muestra_contenido_ajax").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","op_tablas.php?orderby="+orderby+"&paginacion="+paginacion, true);
xmlhttp.send();
}