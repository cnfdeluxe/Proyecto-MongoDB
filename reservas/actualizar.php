<?php
spl_autoload_register(function ( $NombreClase) {
    include_once($NombreClase . '.php');
});
include "./includes/cabecera.php";
?>

<header class="cabecera">
    <h1>Actualizar reserva</h1>
</header>
<section>

    <?php
    if (isset($_GET["id"])) {
        $unaReserva = CrudReserva::mostrarID($_GET['id']);
        echo $_GET['id'];
        echo $unaReserva->getFecha();
    }
    ?>
    <form action="manager.php" method="post" enctype="multipart/form-data">
        <section>
            <label>Fecha:</label>
            <input type="text" name="fecha" required>
        </section>
        <section>
            <label>Hora:</label>
            <input type="text" name="hora" required>
        </section>
        <section>
            <label>Comensales:</label>
            <input type="text" name="comensales" required>
        </section>
        <section>
            <input type="hidden" name="id" value="<?php echo $unaReserva->getId() ?>">
        </section>
        <section>

            <input type="hidden" name="apellidos" value="<?php echo $unaReserva->getApellidos() ?>">
        </section>
        <section>

            <input type="hidden" name="nombre" value="<?php echo $unaReserva->getNombre() ?>">
        </section>
        <label></label>
        <input type="submit" name="actualizar" value="Enviar">
        </section>
    </form>
</section>
<?php
include "./includes/pie.php";
?>