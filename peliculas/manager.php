<?php
//Para incluir todas las clases necesarias
spl_autoload_register( function( $NombreClase ) {
    include_once($NombreClase . '.php');
} );

include 'Filtrado.php';

//Comprobamos que hemos pulsado actualizar o borrar
if (isset($_GET['accion'])) {
    if($_GET['accion'] == "eliminar"){
        //Se elimina la pelicula llamando al metodo correspondiente de BDPelicula
        BDPelicula::eliminar($_GET['id']);
        header('Location: index.php');
    
    }else if($_GET['accion'] == "actualizar"){
        //Se pinta el formulario para actualizar la pelicula
        header("Location: actualizar.php?id=".$_GET['id']);
        //Se comprueba si hay criticas
    }else if ($_GET['accion'] == 'criticas') {
        header("Location: criticas.php?id=".$_GET['id']);
    }
    
}

//Se comprueba que hemos recibido los datos del formulario de inserter pelicula
if (isset($_POST['insertar'])) {
    $pelicula = new Pelicula(0,$_POST['titulo'],$_POST['genero'],$_POST['director'],$_POST['year'],$_POST['sinopsis'],subir());
    BDPelicula::insertar($pelicula);
    header('Location: index.php');
    
}else if (isset($_POST['actualizar'])) {
    $pelicula = new Pelicula(filtrado($_POST['id']),filtrado($_POST['titulo']),filtrado($_POST['genero']),filtrado($_POST['director']),filtrado($_POST['year']),filtrado($_POST['sinopsis']),subir());

    BDPelicula::modificar($pelicula);
    header('Location: index.php');
    
}

//Metodo para subir un fichero al servidor
function subir(){

    //Lo primero es comprobar si recibimos algún fichero
        if(!isset($_FILES["portada"])) {
            echo "No estoy recibiendo el archivo";
        }elseif($_FILES["portada"]["size"] == 0) {
            //Si el tamaño es 0, es porque el archivo no se envía al servidor
            //y puede ser porque supera MAX_FILE_SIZE del formulario o de php.ini
            echo "El archivo no ha llegado correctamente";
        }elseif($_FILES["portada"]["type"] != 'image/jpeg') {
            echo "No se permiten archivos diferentes de jpg";
            //Esto no es seguro porque sólo comprueba la extensión del fichero.
        } else {
            //Comprobación del MIME
            $mimeinfo = finfo_open(FILEINFO_MIME);
            if(!$mimeinfo){
                echo "Por motivos de seguridad no puedo analizar el archivo";
            }else{
                $mimereal = finfo_file($mimeinfo, $_FILES["portada"]["tmp_name"]);
                //Buscamos en la información del fichero que el mime esté, en este caso 'image/jpeg'
                if(strpos($mimereal, 'image/jpeg') !== 0) {
                    echo "El mime real no corresponde. $mimereal";
                }else{          
                    //Nos podemos fiar completamente que el archivo es una imagen y lo movemos a su sitio
                        $ruta = "";
                        $ruta = "portadas/".filtrado($_POST['titulo']).".jpg";

                    if(move_uploaded_file($_FILES["portada"]["tmp_name"], $ruta)) {
                        return $ruta;
                    }else{
                        return null;
                    }
                }
            }

        }
}


