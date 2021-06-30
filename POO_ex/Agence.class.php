<?php

//EX_5, EX_6
class Agence {
    private $_nom;
    private $_adresse;
    private $_code_postal;
    private $_ville;
    private $_restaurant;

    public function __construct($nom,$adresse,$code_postal,$ville, $restaurant){
        $this->_nom = $nom;
        $this->_adresse = $adresse;
        $this->_code_postal = $code_postal;
        $this->_ville = $ville;
        $this->_restaurant = $restaurant;
    }

    public function getNom(){
        return $this->_nom;
    }
    public function setNom($setNom){
        return $this->_nom = $setNom;
    }


    
}

?>