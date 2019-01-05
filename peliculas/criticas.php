<?php 

	//Para incluir todas las clases necesarias
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );

	include 'cabecera.php';
	?>

<?php
//Si existe el id, obtener la pelicula de dicho id
if (isset($_GET['id'])){
	$unaPelicula = BDPelicula::mostrarPorId($_GET['id']);
}

?>

	<header>
		<h1>Listado de criticas para <?php echo $unaPelicula->getTitulo(); ?></h1>

	</header>

<section>
<?php 
	$cont = 0;
	//Recorrer todas las criticas almacenadas en el array
	foreach ($unaPelicula->getCritica() as $critica) {
		$cont++;
			print "<h4>Critica nº ". $cont ."</h4>";
			//Imprimir cada critica con su campo y valor
		foreach ($critica as $campo => $valor) {
			print $campo.": ".$valor."<br>";
		}
	}
 ?>

</section>







<?php 
	include 'pie.php';
 ?>

