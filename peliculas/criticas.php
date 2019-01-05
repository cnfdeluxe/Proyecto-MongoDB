<?php 

	//Para incluir todas las clases necesarias
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );

	include 'cabecera.php';
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
<?php 
	$cont = 0;
	foreach ($unaPelicula->getCritica() as $critica) {
		$cont++;
			print "<h4>Critica nº ". $cont ."</h4>";
		foreach ($critica as $campo => $valor) {
			print $campo.": ".$valor."<br>";
		}
	}
 ?>

</section>







<?php 
	include 'pie.php';
 ?>

