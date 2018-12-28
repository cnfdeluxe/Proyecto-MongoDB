<?php 

	//Para incluir todas las clases necesarias
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );

	?>

	<header>
		<h1>Listado de peliculas</h1>
	</header>

<?php

//No hace falta constructor de la clase BDPeliculas porque he hecho estatico el metodo mostrar()
//$bdpelicula = new BDPelicula();
$listaPeliculas = BDPelicula::mostrar();

?>


<section>

<table>
 <tr>
	 <th>Titulo</th>
	 <th>Genero</th>
	 <th>Director</th>
	 <th>Year</th>
	 <th>Sipnosis</th>
	 <th>Portada</th>
	 <th>Editar</th>
	 <th>Borrar</th>
 </tr>

<?php foreach ($listaPeliculas as $pelicula) {?>
			<tr>
				<td><?php echo $pelicula->getTitulo() ?></td>
				<td><?php echo $pelicula->getGenero()?> </td>
				<td><?php echo $pelicula->getDirector() ?></td>
				<td><?php echo $pelicula->getYear() ?> </td>
				<td><?php echo $pelicula->getSipnosis() ?></td>
				<td><img width="200px" src="<?php echo $pelicula->getPortada() ?>"></td>
				<td><a href="manager.php?accion=actualizar&id=<?php echo $pelicula->getId()?>">Actualizar</a></td>
				<td><a href="manager.php?accion=eliminar&id=<?php echo $pelicula->getId()?>">Eliminar</a></td>
				<td><a href="manager.php?accion=criticas&id=<?php echo $pelicula->getId()?>">Mostrar Criticas</a></td>
			</tr>
<?php }?>

</table>

<a href="insertar.php" class="myButton">Añadir pelicula</a>

</section>







<?php 
	include 'pie.php';
 ?>

