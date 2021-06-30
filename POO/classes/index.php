<?php
require 'Personnage.class.php';

$a = new Personnage();

var_dump($a);

$a->setNom('Loper');
$a->setPrenom('Dave');
$a->setAge('25');
$a->setSexe('male');

var_dump($a);

echo $a->getNom();




$b = new Personnage();

//var_dump($a);

$b->setNom('Rustam');

var_dump($b);

echo "Personnage A = ". $a->getPrenom()." ". $a->getNom().", ".$a->getAge()." ans".", ".$a->getSexe() . 
" <br> Personnage B = " . $b->getNom();

?>