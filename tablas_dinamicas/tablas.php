<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>
tablas dinámicas
</title>

<script src="funciones_ajax.js"></script>

<style type="text/css">

body {
	margin: 5%;
	font-family: verdana, arial;
	font-size: 100%;
}

.tabla_actores {
	font-size: 0.8em;
	border-spacing:0;
	border-collapse: collapse;	
	}

.tabla_actores th {
	border: 1px solid #666;
	background-color: #999;
	color: #fff;
	padding: 0.4em;
	width:150px;
	}

.tabla_actores td {
	border: 1px solid #ccc;
	margin:0;
	padding: 0.4em;	
	}

.tabla_actores tr:nth-child(2n+1) {
	background-color: #ededed;
	}

.flechas {
	cursor: pointer;
	}


ul.lista_paginacion li {
	list-style-type: none;
	display:inline-block;
	width: 1.5em;
	text-align: center;
	cursor: pointer;
	border: 1px solid #ccc;
	padding: 0.2em;	
}

.lista_numero_marcado {
	color:#c00;
	font-weight: 900;	
}


</style>

</head>

<body onload="load_tablas('last_name ASC', 0)">

<a href="http://www.mmfilesi.com/?p=1480">volver a The Bit Jazz Band</a>

<h3>Actores</h3>

<div id="muestra_contenido_ajax">
</div>  

</body>
</html>