<?php 

	//Para incluir todas las clases necesarias
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );

	?>


<?php

//No hace falta constructor de la clase BDPeliculas porque he hecho estatico el metodo mostrar()
if (isset($_GET['id'])){
	$unaPelicula = BDPelicula::mostrarPorId($_GET['id']);
	$listaCriticas =BDPelicula::mostrarCriticas($_GET['id']);

}


?>

	<header>
		<h1>Listado de criticas para <?php echo $unaPelicula->getTitulo(); ?></h1>

	</header>

<section>

<table>
 <tr>
	 <th>Autor</th>
	 <th>Texto</th>
	 <th>Nota</th>
	 <th>Borrar</th>
 </tr>

<?php foreach ($listaCriticas as $critica) {?>
			<tr>
				<td><?php echo $critica->getAutor() ?></td>
				<td><?php echo $critica->getTexto()?> </td>
				<td><?php echo $critica->getNota() ?></td>
				<td><a href="manager.php?accion=eliminar&id=<?php echo $critica->getIdCritica()?>">Eliminar</a></td>
				
			</tr>
<?php }?>

</table>

</section>







<?php 
	include 'pie.php';
 ?>

