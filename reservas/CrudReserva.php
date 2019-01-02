<?php

spl_autoload_register(function( $NombreClase ) {
    include_once($NombreClase . '.php');
});

class CrudReserva {

    // método para mostrar todas las reservas
    public static function mostrar($unaFecha) {
        $bd = Db::conectar();
        //Dentro de la base de datos seleccionamos una colección (tabla)
        $coleccion = $bd->Reservas;
        //Buscamos todas las reservas
        $cursor = $coleccion->find(['Fecha' => $unaFecha]);
        $listaReservas = [];
        foreach ($cursor as $documento) {
            $miReserva = new Reserva($documento["_id"], $documento["Apellidos"], $documento["Nombre"], $documento["Fecha"], $documento["Hora"], $documento["Comensales"]);
            $listaReservas[] = $miReserva;
        }
        $bd = null;
        return $listaReservas;
    }

    /**
     * Muestra las reservas por id
     * @param type $unID
     * @return \Reserva
     */
    public static function mostrarID($unID) {
        $bd = Db::conectar();
        //Dentro de la base de datos seleccionamos una colección (tabla)
        $coleccion = $bd->Reservas;
        //Buscamos todas las reservas
        $cursor = $coleccion->find(['_id' => new \MongoDB\BSON\ObjectId($unID)]);
        $listaReservas = [];
        //Recorremos las reservas con ese id y las añadimos a un array
        foreach ($cursor as $documento) {
            $miReserva = new Reserva($documento["_id"], $documento["Apellidos"], $documento["Nombre"], $documento["Fecha"], $documento["Hora"], $documento["Comensales"]);
            $listaReservas[] = $miReserva;
        }

        $bd = null;
        return $listaReservas[0];
    }

    // método para mostrar todas las reservas
    public static function esPosible($unaReserva) {
        $suma = 0;

        $date = new DateTime($unaReserva->getFecha());
        $fecha = $date->format('d/m/Y');

        $reservas = CrudReserva::mostrar($fecha);
        foreach ($reservas as $reserva) {
            if ($unaReserva->getHora() == $reserva->getHora()) {
                $suma += $reserva->getComensales();
            }
        }

        if (($suma + $unaReserva->getComensales()) > Reserva::$maxcomensales)
            return false;
        else
            return true;
    }

    //Eliminar una película
    public static function eliminar($idReserva) {
        $bd = Db::conectar();
        //Dentro de la base de datos seleccionamos una colección (tabla)
        $coleccion = $bd->Reservas;
        //Buscamos todas las reservas
        $coleccion->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($idReserva)]);


        $dbh = null;
    }

    //Método para insertar una reserva que recibe un objeto Pelicula
    public static function insertar($unaReserva) {

        if (CrudReserva::esPosible($unaReserva)) {

            $bd = Db::conectar();
            //Dentro de la base de datos seleccionamos una colección (tabla)
            $coleccion = $bd->Reservas;

            $date = new DateTime($unaReserva->getFecha());
            $fecha = $date->format('d/m/Y');

            $documento = array(
                "Nombre" => $unaReserva->getNombre(),
                "Apellidos" => $unaReserva->getApellidos(),
                "Email" => "yalohare@gmail.com",
                "Tel" => 649589665,
                "Fecha" => $fecha,
                "Hora" => $unaReserva->getHora(),
                "Comensales" => $unaReserva->getComensales()
            );

            $coleccion->insertOne($documento);

            $dbh = null;
            return true;
        } else {
            return false;
        }
    }

    public static function modificar($unaReserva) {
        $bd = Db::conectar();
        //Dentro de la base de datos seleccionamos una colección (tabla)
        $coleccion = $bd->Reservas;
        //Se le da formato a la fecha para que nos la muestre correctamente en el inicio
        $date = new DateTime($unaReserva->getFecha());
        $fecha = $date->format('d/m/Y');
        //Se actualizan los datos del articulo de la coleccion con el id que le pasamos como parametro y se actualizan los valores pasados como segundo parametro
        $coleccion->updateOne(
            array('_id' => new \MongoDB\BSON\ObjectId($unaReserva->getId())),
            array('$set' => array('Comensales' => $unaReserva->getComensales(),'Fecha' => $fecha,'Hora' => $unaReserva->getHora())
            )
        );
        $bd = null;
    }

}
