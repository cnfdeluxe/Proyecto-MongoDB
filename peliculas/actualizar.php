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
	<h1 class="text-center">Insertar pelicula</h1>
</header>
<section class=" row justify-content-md-center">


		<form action="manager.php" method="post" enctype="multipart/form-data">
		 <ul class="form-insert">
		 	<li>
    			<label>Titulo:</label>
    			<input type="text" class="form-control" name="titulo" maxlength="100" value="<?php echo $unaPelicula->getTitulo() ?>" >
			</li>
			<li>
    			<label>Genero:</label>
    			<input type="text" class="form-control" name="genero" maxlength="100" value="<?php echo $unaPelicula->getGenero() ?>" >
			</li>
			<li>
    			<label>Director:</label>
    			<input type="text" class="form-control" name="director" value="<?php echo $unaPelicula->getDirector() ?>" >
			</li>
			<li>
    			<label>Año:</label>
    			<input type="number" class="form-control" name="year" value="<?php echo $unaPelicula->getYear() ?>" >
    		</li>
   			<li>
    			<label>Sinopsis:</label>
    			<textarea name="sinopsis" class="form-control" cols="40" rows="5"><?php echo $unaPelicula->getSinopsis() ?></textarea>
    		</li>
   			<li>
    			<label>Portada:</label>
    			<input type="file" name="portada" value="<?php echo $unaPelicula->getPortada() ?>" >
    		</li>    		
			<li>
    			<input type="hidden" name="id" value="<?php echo $unaPelicula->getId() ?>">
    			<input type="submit" class="btn btn-primary" name="actualizar" value="Enviar">
			</li>
        </ul>
		</form>
    

</section>

<a href="index.php" class="back">
                <button class="btn btn-primary">
                    <i class="fas fa-reply"></i>
                    Volver
                </button>                
            </a>


<?php


include "pie.php";
?>