<?php
include "cabecera.php";
?>

<header class="cabecera">
	<h1>Insertar pelicula</h1>
</header>
<section>

<?php
	if(!$_POST){
	 	//Si no has mandado nada pintas el formulario
?>

		<form action="manager.php" method="post" enctype="multipart/form-data">
		 	
		 	<section>
    			<label>Titulo:</label>
    			<input type="text" name="titulo" maxlength="100" required>
			</section>
			<section>
    			<label>Genero:</label>
    			<input type="text" name="genero" maxlength="100" required>
			</section>
			<section>
    			<label>Director:</label>
    			<input type="text" name="director" required>
			</section>
			<section>
    			<label>Año:</label>
    			<input type="number" name="year" required>
    		</section>
   			<section>
    			<label>Sipnosis:</label>
    			<textarea name="sipnosis" id="" cols="40" rows="5"></textarea>
    		</section>
   			<section>
    			<label>Portada:</label>
    			<input type="file" name="portada" required>
    		</section>    		
			<section>
    			<label></label>
    			<input type="submit" name="insertar" value="Enviar">
			</section>

		</form>


</section>

<?php

}

include "pie.php";
?>