<?php
// recogemos las variables

// paginación
if (isset($_REQUEST['paginacion']) && $_REQUEST['paginacion'] !="") {
		if (is_numeric($_REQUEST['paginacion'])==false) { ?>
		Algo va mal
		<?php exit;
		} else {
		$pg = strip_tags(sqlite_escape_string($_REQUEST['paginacion']));	
		}
	} 

// orden
// armamos un array con los valores que puede tener esta variable
$check_orderby = array("last_name ASC", "last_name DESC", "first_name ASC", "first_name DESC");
// chequeamos y recogemos

if (isset($_REQUEST['orderby']) && $_REQUEST['orderby'] !="") {	
	if (in_array($_REQUEST['orderby'], $check_orderby)) {
	$orderby = strip_tags(sqlite_escape_string($_REQUEST['orderby']));    
	} else { ?>
		Algo va mal
		<?php exit;
		}
	}

// incluimos la conexión
require_once('mi_conexion.php');

// definimos las filas a mostrar
	$cantidad=12; 
	$inicial = $pg * $cantidad;

// armamos la query
$resultado = $link_id->query("SELECT first_name, last_name FROM actor ORDER BY ".$orderby." LIMIT $inicial,$cantidad"); 	

// lista paginación
// sacamos todos los resultados que hay en total
$resultado_paginacion = $link_id->query("SELECT first_name FROM actor"); 	
// los contamos
$row_cnt = $resultado_paginacion->num_rows;
// los dividimos por el número de resultados a mostrar por página y los redondeamos
$separador = ceil($row_cnt/$cantidad);	
	
	// comprobamos que hay más resultados en la tabla que los mostrados por página
	if ($row_cnt>$cantidad) { ?>

		<ul class="lista_paginacion">
		<!-- primer número cuando la página sea cero -->		
		<li <?php if ($pg == 0) { ?> class="lista_numero_marcado" <?php } ?> >
		<span onclick="load_tablas('<?php echo $orderby; ?>', 0)"> 1 </span></li>
		<!-- los demás -->	
		<?php for($i=1; $i<$separador; $i++) { ?>
			<li <?php if ($i == $pg) { ?> class="lista_numero_marcado" <?php } ?> >
			<span onclick="load_tablas('<?php echo $orderby; ?>',<?php echo $i; ?>)">	
			<?php echo $i+1; ?> 
			</span></li>			
			<?php }  // cierra el for ?>			
			</ul>

	<?php } // cierra el if inicial ?>	
	

<table class="tabla_actores">
<thead><tr>
<th>
<div class="flechas">
<span onclick="load_tablas('last_name ASC',<?php echo $pg; ?>)"> &#9650;</span>
<span onclick="load_tablas('last_name DESC',<?php echo $pg; ?>)">&#9660; </span>
 </div> 
 <br />
 Apellido</th>
<th><div class="flechas">
<span onclick="load_tablas('first_name ASC',<?php echo $pg; ?>)"> &#9650;</span>
<span onclick="load_tablas('first_name DESC',<?php echo $pg; ?>)">&#9660; </span>
</div> 
<br />
Nombre
</th>
</tr></thead>
<?php		
	while ($filas=$resultado->fetch_assoc()) { ?>
	<tr>		
		<td><?php echo $filas['last_name'] ?></td>
		<td><?php echo $filas['first_name'] ?></td>
	</tr>
<?php } ?>
</table>