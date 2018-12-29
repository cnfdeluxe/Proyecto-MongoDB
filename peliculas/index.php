<?php 

	//Para incluir todas las clases necesarias
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );
	include 'cabecera.php';

	?>

	<header class="container">
		<div class="row">
			<h1 class="display-3">Listado de peliculas</h1>
		</div>
		
	</header>

<?php

//No hace falta constructor de la clase BDPeliculas porque he hecho estatico el metodo mostrar()
//$bdpelicula = new BDPelicula();
$listaPeliculas = BDPelicula::mostrar();

?>


<section class="container">
<div class="row">
		<!-- Boton añadir -->
		<div class="boton col-12">
			<a href="insertar.php"><button class="btn anadir btn-success">
			<i class="fas fa-plus-circle"></i>
			Añadir pelicula</button></a>
		</div>
	</div>

<div class="row">
<table class="table table-bordered col-12">
 <tr class="table-primary">
	 <th>Titulo</th>
	 <th>Genero</th>
	 <th>Director</th>
	 <th>Year</th>
	 <th>Sipnosis</th>
	 <th>Portada</th>
	 <th>Editar</th>
	 <th>Borrar</th>
	 <th>Mostrar Criticas</th>
 </tr>

<?php foreach ($listaPeliculas as $pelicula) {?>
			<tr>
				<td><?php echo $pelicula->getTitulo() ?></td>
				<td><?php echo $pelicula->getGenero()?> </td>
				<td><?php echo $pelicula->getDirector() ?></td>
				<td><?php echo $pelicula->getYear() ?> </td>
				<td><?php echo $pelicula->getSipnosis() ?></td>
				<td><img width="200px" src="<?php echo $pelicula->getPortada() ?>"></td>
				<td>
				<a href="manager.php?accion=actualizar&id=<?php echo $pelicula->getId()?>">
					<button class="btn btn-primary">
					<i class="fas fa-wrench"></i>
					Modificar</button>
				</a>
			</td>
				<td>
				<a href="manager.php?accion=eliminar&id=<?php echo $pelicula->getId()?>">
					<button class="btn btn-danger">
					<i class="fas fa-trash-alt"></i>
					Eliminar</button>
				</a>
				</td>
				<td>
				<a href="manager.php?accion=criticas&id=<?php echo $pelicula->getId()?>">Mostrar Criticas</a></td>
			</tr>
<?php }?>

</table>
</div>
</section>







<?php 
	include 'pie.php';
 ?>

