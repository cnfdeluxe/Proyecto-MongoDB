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
            $miPelicula = new Pelicula($documento["_id"],$documento["titulo"],$documento["genero"],$documento["director"],$documento["year"],$documento["sinopsis"],$documento["portada"]);
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
            $miPelicula = new Pelicula($documento["_id"],$documento["titulo"],$documento["genero"],$documento["director"],$documento["year"],$documento["sinopsis"],$documento["portada"]);
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
                array('$set' => array('titulo' => $unaPelicula->getTitulo(),'genero' => $unaPelicula->getGenero(),'director' => $unaPelicula->getDirector(),'year' => $unaPelicula->getYear(), 'sinopsis' => $unaPelicula->getSinopsis(), 'portada' => $unaPelicula->getPortada())
            )
            );


            $bd = null;

}

//Mostrar las criticas de una pelicula
public static function mostrarCriticas($unId){
        $bd = Db::conectar();
        
        try {
            $stmt = $bd->prepare("SELECT * FROM critica WHERE id_pelicula=:id");
            $stmt->bindValue(":id",$unId);
    //Antes de ejecutar la consulta se debe dar valor a la variable :genero
        $stmt->execute();
        $misCriticas = array();
        $criticas = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($criticas as $critica){
            $miCritica = new Critica(0,$critica->id_pelicula,$critica->autor,$critica->texto,$critica->nota);
            $misCriticas[] = $miCritica;

        } 
        } catch (PDOExceptcion $e) {
            echo $e->getMessage();
        }
        
        $bd = null;

        return $misCriticas;
            
    }




}

    
?>
