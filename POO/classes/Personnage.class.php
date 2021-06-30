<?php

class Personnage {
    private $_nom;
    private $_prenom;
    private $_age;
    private $_sexe;

    function __construct() {
        //
    }


    function getNom() { 
        return $this->_nom;
    }

    function setNom($set_nom) {
        return $this->_nom = $set_nom;
    }

    function getPreNom() { 
        return $this->_prenom;
    }

    function setPreNom($set_prenom) {
        return $this->_prenom = $set_prenom;
    }

    function getAge() { 
        return $this->_age;
    }

    function setAge($set_age) {
        return $this->_age = $set_age;
    }

    function getSexe() { 
        return $this->_sexe;
    }

    function setSexe($set_sexe) {
        return $this->_sexe = $set_sexe;
    }

}


?>