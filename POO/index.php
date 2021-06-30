<?php

require 'classes/PersonnageDefault.class.php';

$a = new PersonnageDefault("toto", "titi", 22, "feminin");

echo $a->getNom();
echo $a->getPrenom();
echo $a->getAge();
echo $a->getSexe();






/*
require 'Employe.class.php';

$a = new Employe();

$a->setNom('Trump');
$a->setPrenom('Donald');
$a->setDate (new DateTime('2017-01-20'));
$a->setPost('president');
$a->setSalary(1000000);
$a->setService('White house');

$interv = $a->getPeriod();
echo "années : ".$interv['y'] ;
echo "mois : ".$interv['m'] ;
echo "jours : ".$interv['d'] ;

var_dump($a);
*/
?>