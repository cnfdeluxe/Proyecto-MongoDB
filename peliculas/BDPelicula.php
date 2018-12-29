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
        $listaPeliculas =[];

        foreach ($cursor as $documento) {
            $miPelicula = new Pelicula($documento["_id"],$documento["titulo"],$documento["genero"],$documento["director"],$documento["year"],$documento["sipnosis"],$documento["portada"]);
            //Almacenar cada pelicula en el array
            $listaPeliculas[]=$miPelicula;
        }

        $bd=null;

        return $listaPeliculas;
    }

    //Mostrar pelicula por id
    public static function mostrarPorId($unId){
        $dbh = Db::conectar();
        
        try {
            $stmt = $dbh->prepare("SELECT * FROM pelicula WHERE id_pelicula=:id");
            $stmt->bindValue(":id",$unId);
    //Antes de ejecutar la consulta se debe dar valor a la variable :genero
        $stmt->execute();
        $pelicula = $stmt->fetch(PDO::FETCH_OBJ);
        $mipelicula = new Pelicula($pelicula->id_pelicula,$pelicula->titulo,$pelicula->genero,$pelicula->director,$pelicula->year,$pelicula->sinopsis,$pelicula->portada);
        
        } catch (PDOExceptcion $e) {
            echo $e->getMessage();
        }
        
        $dbh = null;

        return $mipelicula;
            

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
    $dbh = db::conectar();

    $coleccion = $dbh->peliculas;

    $documento = array(
        "titulo" => $unaPelicula->getTitulo(),
        "genero" => $unaPelicula->getGenero(),
        "director" => $unaPelicula->getDirector(),
        "year" => $unaPelicula->getYear(),
        "sipnosis" => $unaPelicula->getSipnosis(),
        "portada" => $unaPelicula->getPortada()
    );

    $coleccion->insertOne($documento);

    $dbh = null;
    
}


 //Modificar pelicula
    public static function modificar($unaPelicula){
            $dbh = db::conectar();
            //Consulto con la base de datos 
            $coleccion = $dbh->peliculas;
            

            $coleccion->updateMany();


            $dbh = null;

}

//Mostrar las criticas de una pelicula
public static function mostrarCriticas($unId){
        $dbh = Db::conectar();
        
        try {
            $stmt = $dbh->prepare("SELECT * FROM critica WHERE id_pelicula=:id");
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
        
        $dbh = null;

        return $misCriticas;
            
    }




}

    
?>
