<?php

class Pelicula{
    private $id;
    private $titulo;
    private $genero;
    private $director;
    private $year;
    private $sipnosis;
    private $portada;


    /*Constructor */
    public function __construct($unId,$unTitulo,$unGenero,$unDirector,$unYear,$unaSipnosis,$unaPortada){
        $this->id = $unId;
        $this->titulo = $unTitulo;
        $this->genero = $unGenero;
        $this->director = $unDirector;
        $this->year = $unYear;
        $this->sipnosis = $unaSipnosis;
        $this->portada = $unaPortada;
    }


    /*getters*/ 
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
    public function getSipnosis(){
        return $this->sipnosis;
    }

    public function getPortada(){
        return $this->portada;
    }


    /*setters*/ 
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

    public function setSipnosis($unaSipnosis){
        $this->sipnosis = $unaSipnosis;
    }
    public function setPortada($unaPortada){
        $this->portada = $unaPortada;
    }




}