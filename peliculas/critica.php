<?php 
class Critica{
    private $id_critica;
    private $id_pelicula;
    private $autor;
    private $texto;
    private $nota;


    /*Constructor */
    public function __construct($unIdCritica,$unIdPelicula,$autor,$texto,$nota){
        $this->id_critica = $unIdCritica;
        $this->id_pelicula = $unIdPelicula;
        $this->autor = $autor;
        $this->texto = $texto;
        $this->nota = $nota;
    }


    /*getters*/ 
    public function getIdCritica(){
        return $this->id_critica;
    }

    public function getIdPelicula(){
        return $this->id_pelicula;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getTexto(){
        return $this->texto;
    }
    public function getNota(){
        return $this->nota;
    }


    /*setters*/ 
    public function setIdCritica($unIdCritica){
        $this->id_critica = $unIdCritica;
    }

    public function setIdPelicula($unIdPelicula){
        $this->id_pelicula = $unIdPelicula;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function setTexto($texto){
        $this->texto = $texto;
    }

    public function setNota($nota){
        $this->nota = $nota;
    }




}

 ?>