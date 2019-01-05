<?php

spl_autoload_register( function( $NombreClase ) {
        include_once($NombreClase . '.php');
    } );

    class BDPelicula{


    //Listar todas las peliculas
    public static function mostrar(){
        $bd = db::conectar();
        
        //Dentro de la base de datos seleccionamos una coleccion (tabla)
        $coleccion = $bd->peliculas;

        //Buscamos todas las peliculas
        $cursor = $coleccion->find();
        $listaPeliculas = [];

        foreach ($cursor as $documento) {
            $miPelicula = new Pelicula($documento["_id"],$documento["titulo"],$documento["genero"],$documento["director"],$documento["year"],$documento["sinopsis"],$documento["portada"],$documento["critica"]);
            //Almacenar cada pelicula en el array
            $listaPeliculas[]=$miPelicula;
        }

        $bd=null;

        return $listaPeliculas;
    }

    //Mostrar pelicula por id
    public static function mostrarPorId($unId){
        //Conexión con BD
        $bd = db::conectar();

        //Dentro de la BD pelicula, selección de la colección peliculas
        $coleccion = $bd->peliculas;
        //Buscar todas las peliculas por ID
        $cursor = $coleccion->find(['_id' => new \MongoDB\BSON\ObjectId($unId)]);
        $listaPeliculas = [];
        //Recorrer las peliculas con ese id y se añaden al array $listaPeliculas
        foreach ($cursor as $documento) {
            $miPelicula = new Pelicula($documento["_id"],$documento["titulo"],$documento["genero"],$documento["director"],$documento["year"],$documento["sinopsis"],$documento["portada"],$documento["critica"]);
            $listaPeliculas []= $miPelicula;
        }
        
        $bd = null;
        return $miPelicula;

    }


    //Eliminar pelicula
    public static function eliminar($idPelicula){
            $bd = db::conectar();
            
            $coleccion = $bd->peliculas;
            $coleccion->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($idPelicula)]);

        $bd = null;
}

//Insertar una pelicula
public static function insertar($unaPelicula){

    //Se establece la conexión
    $bd = db::conectar();

    $coleccion = $bd->peliculas;

    $documento = array(
        "titulo" => $unaPelicula->getTitulo(),
        "genero" => $unaPelicula->getGenero(),
        "director" => $unaPelicula->getDirector(),
        "year" => $unaPelicula->getYear(),
        "sinopsis" => $unaPelicula->getSinopsis(),
        "portada" => $unaPelicula->getPortada()
    );

    $coleccion->insertOne($documento);

    $bd = null;
    
}


 //Modificar pelicula
    public static function modificar($unaPelicula){
            $bd = db::conectar();
            //Consulto con la base de datos 
            $coleccion = $bd->peliculas;
            
            //Se actualizan los valores
            //Primer parametro el id obtenido de la peli
            //Segundo parametro un array con todos los campos a modificar de la peli
            $coleccion->updateOne(
                array('_id' => new \MongoDB\BSON\ObjectId($unaPelicula->getId())),
                array('$set' => array('titulo' => $unaPelicula->getTitulo(),'genero' => $unaPelicula->getGenero(),'director' => $unaPelicula->getDirector(),'year' => $unaPelicula->getYear(), 'sinopsis' => $unaPelicula->getSinopsis(), 'portada' => $unaPelicula->getPortada(), 'critica' => "")
            )
            );


            $bd = null;

}



//Mostrar las criticas de una pelicula
public static function mostrarCriticas($unId){
        
    $bd = db::conectar();

    //Seleccionar la coleccion de pelicula
    $coleccion = $bd->pelicula;

     //Buscamos todas las peliculas
        $cursor = $coleccion->find();
        $listaCriticas = [];

        foreach ($cursor as $documento) {
            $miCritica = new Critica($documento["_id"],$documento[$unId],$documento["texto"],$documento["autor"],$documento["nota"]);
            //Almacenar cada pelicula en el array
            $listaCriticas[]=$miCritica;
        }
       

        $bd=null;

        return $listaCriticas;

    }

}


    
?>
