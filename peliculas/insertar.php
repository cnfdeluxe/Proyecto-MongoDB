<?php
include "cabecera.php";
?>

<header class="cabecera">
	<h1>Insertar pelicula</h1>
</header>
<section class="form-insertar">

<?php
	if(!$_POST){
	 	//Si no has mandado nada pintas el formulario
?>

		<form action="manager.php" method="post" enctype="multipart/form-data">
		 <ul>
		 	<li>
    			<label>Titulo:</label>
    			<input type="text" name="titulo" maxlength="100" required>
			</li>
			<li>
    			<label>Genero:</label>
    			<input type="text" name="genero" maxlength="100" required>
			</li>
			<li>
    			<label>Director:</label>
    			<input type="text" name="director" required>
			</li>
			<li>
    			<label>Año:</label>
    			<input type="number" name="year" required>
    		</li>
   			<li>
    			<label>Sipnosis:</label>
    			<textarea name="sipnosis" id="" cols="40" rows="5"></textarea>
    		</li>
   			<li>
    			<label>Portada:</label>
    			<input type="file" name="portada" required>
    		</li>    		
			<li>
    			<label></label>
    			<input type="submit" name="insertar" value="Enviar">
			</li>
        </ul>
		</form>


</section>

<?php

}

include "pie.php";
?>