<?php
spl_autoload_register(function ($NombreClase) {
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
    }
    ?>
    <form action="manager.php" method="post" enctype="multipart/form-data">
        <section>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo $unaReserva->getApellidos() ?>" readonly>
        </section>
        <section>
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $unaReserva->getNombre() ?>" readonly>
        </section>
        <section>
            <label>Fecha:</label>
            <input type="date" name="fecha" value="<?php echo $unaReserva->getFecha() ?>" required>
        </section>
        <section>
            <label>Hora:</label>
            <input type="time" name="hora" value="<?php echo $unaReserva->getHora() ?>" required>
        </section>
        <section>
            <label>Comensales:</label>
            <input type="number" name="comensales" value="<?php echo $unaReserva->getComensales() ?>" required>
        </section>
        <section>
            <input type="hidden" name="id" value="<?php echo $unaReserva->getId()?>">
        </section>
        <section>
            <input type="submit" name="actualizar" value="Enviar">
        </section>
    </form>
</section>
<?php
include "./includes/pie.php";
?>