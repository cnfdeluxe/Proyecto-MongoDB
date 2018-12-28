<?php

    class BDPelicula{
    //Listar todas las peliculas
    public static function mostrar(){
        $dbh = Db::conectar();

        

       /* try {
            $stmt = $dbh->prepare("SELECT * FROM pelicula");
    //Antes de ejecutar la consulta se debe dar valor a la variable :genero
        $stmt->execute();
        $peliculas = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($peliculas as $pelicula){
            $peliculaObj = new Pelicula($pelicula->id_pelicula, $pelicula->titulo, $pelicula->genero, $pelicula->director,$pelicula->year,$pelicula->sinopsis,$pelicula->portada);
            $listaPeliculas[] = $peliculaObj;
        } 

        } catch (PDOExceptcion $e) {
            echo $e->getMessage();
        }
        
        $dbh = null;

        return $listaPeliculas;*/
            
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
            $dbh = Db::conectar();
            try {
                $stmt = $dbh->prepare("DELETE FROM pelicula WHERE id_pelicula=:id");
                $stmt->bindValue(':id',$idPelicula);
                $stmt->execute();
            }catch (PDOExceptcion $e) {
                echo $e->getMessage();
            }

        $dbh = null;

}

//Insertar una pelicula
public static function insertar($unaPelicula){
    //Se establece la conexión
    $dbh = Db::conectar();
    try{
        //Preparar
        $stmt = $dbh->prepare("INSERT INTO pelicula (titulo,genero,director,year,sinopsis,portada) VALUES (:titulo,:genero,:director,:year,:sinopsis,:portada)");
    // Bind
    $stmt->bindValue(':titulo', $unaPelicula->getTitulo());
    $stmt->bindValue(':genero', $unaPelicula->getGenero());
    $stmt->bindValue(':director', $unaPelicula->getDirector());
    $stmt->bindValue(':year', $unaPelicula->getYear());
    $stmt->bindValue(':sinopsis', $unaPelicula->getSipnosis());
    $stmt->bindValue(':portada',null);
    
    // Excecute
    $stmt->execute();
    
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
    
}


 //Modificar pelicula
    public static function modificar($unaPelicula){
            $dbh = Db::conectar();
            try {
                $stmt = $dbh->prepare("UPDATE pelicula SET titulo=:titulo, genero=:genero, director=:director, year=:year, sinopsis=:sinopsis, portada=:portada WHERE id_pelicula=:id");
                $stmt->bindValue(':id',$unaPelicula->getId());
                $stmt->bindValue(':titulo',$unaPelicula->getTitulo());
                $stmt->bindValue(':genero',$unaPelicula->getGenero());
                $stmt->bindValue(':director',$unaPelicula->getDirector());
                $stmt->bindValue(':year',$unaPelicula->getYear());
                $stmt->bindValue(':sinopsis',$unaPelicula->getSipnosis());
                $stmt->bindValue(':portada',$unaPelicula->getPortada());
                $stmt->execute();
            }catch (PDOExceptcion $e) {
                echo $e->getMessage();
            }

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