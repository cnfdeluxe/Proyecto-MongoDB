<?php
include "cabecera.php";
?>

<header class="cabecera">
	<h1>Insertar crítica</h1>
</header>
<section>

<?php
	if(!$_POST){
	 	//Si no has mandado nada pintas el formulario
?>

		<form action="manager.php" method="post" enctype="multipart/form-data">
		 	
		 	<section>
    			<label>Autor:</label>
    			<input type="text" name="autor" maxlength="100" required>
			</section>
			<section>
    			<label>Texto:</label>
    			<input type="text" name="genero" maxlength="100" required>
			</section>
			<section>
    			<label>Nota:</label>
    			<input type="text" name="director" required>
			</section>
    			<label></label>
    			<input type="submit" name="insertar" value="Enviar">
			</section>
		</form>
</section>

<?php

}

include "pie.php";
?>