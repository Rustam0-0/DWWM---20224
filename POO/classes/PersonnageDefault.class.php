<?php

class PersonnageDefault {
    private $_nom;
    private $_prenom;
    private $_age;
    private $_sexe;

    function __construct($nom = "Loper", $prenom = Null, $age = Null, $sexe = Null) {
        $this->_nom = $nom;
        ($prenom != Null) ? $this->_prenom = $prenom : $this->_prenom = "Dave";
        ($age != Null) ? $this->_age = $age : $this->_age = 25;
        ($sexe != Null) ? $this->_sexe = $sexe : $this->_sexe = "masculin";
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