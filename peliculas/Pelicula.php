<?php

class Pelicula{
    private $id;
    private $titulo;
    private $genero;
    private $director;
    private $year;
    private $sinopsis;
    private $portada;
    private $critica;


    //Constructor
    public function __construct($unId,$unTitulo,$unGenero,$unDirector,$unYear,$unaSinopsis,$unaPortada, $unaCritica = null){
        $this->id = $unId;
        $this->titulo = $unTitulo;
        $this->genero = $unGenero;
        $this->director = $unDirector;
        $this->year = $unYear;
        $this->sinopsis = $unaSinopsis;
        $this->portada = $unaPortada;
        $this->critica = $unaCritica;

    }


    //Getters 
    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function getDirector(){
        return $this->director;
    }
    public function getYear(){
        return $this->year;
    }
    public function getSinopsis(){
        return $this->sinopsis;
    }

    public function getPortada(){
        return $this->portada;
    }
    public function getCritica(){
        return $this->critica;
    }


    //Setters
    public function setId($unId){
        $this->id = $unId;
    }

    public function setTitulo($unTitulo){
        $this->titulo = $unTitulo;
    }

    public function setGenero($unGenero){
        $this->genero = $unGenero;
    }

    public function setDirector($unDirector){
        $this->director = $unDirector;
    }

    public function setYear($unYear){
        $this->year = $unYear;
    }

    public function setSinopsis($unaSinopsis){
        $this->sinopsis = $unaSinopsis;
    }
    public function setPortada($unaPortada){
        $this->portada = $unaPortada;
    }
    public function setCritica($unaCritica){
        $this->critica = $unaCritica;
    }




}