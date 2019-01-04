<?php

spl_autoload_register(function( $NombreClase ) {
    include_once($NombreClase . '.php');
});

include 'Filtrado.php';

//Se comprueba que hemos pulsado actualizar o eliminar
if (isset($_GET['accion'])) {
    if ($_GET['accion'] == "e") {
        //Se elimina la película llamando al método correspondiente de BDPelicula
        CrudReserva::eliminar($_GET['id']);
        echo $_GET['id'];
        header("Location: reservas.php");
    } else if ($_GET['accion'] == "a") {
        //Se pinta el formulario para actualizar la película, fichero actualizar.php
        header("Location: actualizar.php?id=" . $_GET['id']);
    }
}

//Se comprueba que hemos recibido los datos del formulario de insertar película
if (isset($_POST['insertar'])) {

    $unaReserva = new Reserva(0, filtrado($_POST['apellidos']),filtrado($_POST['nombre']),filtrado($_POST['fecha']),filtrado($_POST['hora']), filtrado($_POST['comensales']));

    if (CrudReserva::insertar($unaReserva)) {
        header("Location: reservas.php");
    } else {
        header("Location: superado_aforo.php");
    }
} else if (isset($_POST['actualizar'])) {
    $unaReserva = new Reserva(filtrado($_POST['id']),filtrado($_POST['apellidos']),filtrado($_POST['nombre']),filtrado($_POST['fecha']),filtrado($_POST['hora']), filtrado($_POST['comensales']));
    CrudReserva::modificar($unaReserva);
    header("Location: reservas.php");
}

//Método para subir un fichero al servidor
function subir() {

    if (!isset($_FILES["cartel"])) {
        echo "No estoy recibiendo el archivo";
    } elseif ($_FILES["cartel"]["size"] == 0) {
        //Si el tamaño es 0, es porque el archivo no se envía al servidor
        //y puede ser porque supera MAX_FILE_SIZE del formulario o de php.ini
        echo "El archivo no ha llegado correctamente";
    } elseif ($_FILES["cartel"]["type"] != 'image/jpeg') {
        echo "No se permiten archivos diferentes de jpg";
        //Esto no es seguro porque sólo comprueba la extensión del fichero.
    } else {
        //Comprobación del MIME
        $mimeinfo = finfo_open(FILEINFO_MIME);
        if (!$mimeinfo) {
            echo "Por motivos de seguridad no puedo analizar el archivo";
        } else {
            $mimereal = finfo_file($mimeinfo, $_FILES["cartel"]["tmp_name"]);
            //Buscamos en la información del fichero que el mime esté, en este caso 'image/jpeg'
            if (strpos($mimereal, 'image/jpeg') !== 0) {
                echo "El mime real no corresponde. $mimereal";
            } else {
                //Nos podemos fiar completamente que el archivo es una imagen y lo movemos a su sitio
                $ruta = "";
                $ruta = "carteles/" . filtrado($_POST['titulo']) . ".jpg";
                if (move_uploaded_file($_FILES["cartel"]["tmp_name"], $ruta)) {
                    return $ruta;
                } else {
                    return null;
                }
            }
        }
    }
}

?>