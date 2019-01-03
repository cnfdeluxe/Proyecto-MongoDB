<?php
include "cabecera.php";

//Para incluir todas las clases necesarias
spl_autoload_register( function( $NombreClase ) {
    include_once($NombreClase . '.php');
} );

    if (isset($_GET['id'])) {
       $unaPelicula =  BDPelicula::mostrarPorId($_GET['id']);
    }

?>

<header class="cabecera">
	<h1>Insertar pelicula</h1>
</header>
<section>


		<form action="manager.php" method="post" enctype="multipart/form-data">
		 	
		 	<section>
    			<label>Titulo:</label>
    			<input type="text" name="titulo" maxlength="100" value="<?php echo $unaPelicula->getTitulo() ?>" >
			</section>
			<section>
    			<label>Genero:</label>
    			<input type="text" name="genero" maxlength="100" value="<?php echo $unaPelicula->getGenero() ?>" >
			</section>
			<section>
    			<label>Director:</label>
    			<input type="text" name="director" value="<?php echo $unaPelicula->getDirector() ?>" >
			</section>
			<section>
    			<label>Año:</label>
    			<input type="number" name="year" value="<?php echo $unaPelicula->getYear() ?>" >
    		</section>
   			<section>
    			<label>Sinopsis:</label>
    			<textarea name="sinopsis" cols="40" rows="5"><?php echo $unaPelicula->getSinopsis() ?></textarea>
    		</section>
   			<section>
    			<label>Portada:</label>
    			<input type="file" name="portada" value="<?php echo $unaPelicula->getPortada() ?>" >
    		</section>    		
			<section>
    			<input type="hidden" name="id" value="<?php echo $unaPelicula->getId() ?>">
    			<input type="submit" name="actualizar" value="Enviar">
			</section>

		</form>


</section>


<?php


include "pie.php";
?>