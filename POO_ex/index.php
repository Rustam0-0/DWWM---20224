<?php

require 'Employe.class.php';
require 'Agence.class.php';

$trump = new Employe('Trump', 'Donald', new DateTime('2017-01-20'), 'president', 1000000, 'White house');
$macron = new Employe('Macron', 'Emmanuel', new DateTime('2014-05-14'), 'president', 750000, "Palais de l'Elysée");
$merkel = new Employe('Merkel', 'Angela', new DateTime('2005-11-22'), 'chancelier', 900000, 'Bundestag');
$sanchez = new Employe('Sanchez', 'Pedro', new DateTime('2018-06-02'), 'premier ministre', 690000, 'Palacio de la Moncloa');
$mattarella = new Employe('Mattarella', 'Sergio', new DateTime('2015-02-03'), 'president', 880000, 'Palazzo del Quirinale');

// $trump->setNom('Trump');
// $trump->setPrenom('Donald');
// $trump->setDate (new DateTime('2017-01-20'));
// $trump->setPost('president');
// $trump->setSalary(1000000);
// $trump->setService('White house');

// EX_2
$interv = $trump->getPeriod();
echo "années : ".$interv['y']."<br>" ;
echo "mois : ".$interv['m']."<br>" ;
echo "jours : ".$interv['d']."<br>" ;

// EX_3
echo '<br> Versez la prime annuelle ('.$trump->prime().'€) sur le compte de '.$trump->getPrenom().' '.$trump->getNom() ;
echo '<br> Versez la prime annuelle ('.$macron->prime().'€) sur le compte de '.$macron->getPrenom().' '.$macron->getNom() ;
echo '<br> Versez la prime annuelle ('.$merkel->prime().'€) sur le compte de '.$merkel->getPrenom().' '.$merkel->getNom() ;
echo '<br> Versez la prime annuelle ('.$sanchez->prime().'€) sur le compte de '.$sanchez->getPrenom().' '.$sanchez->getNom() ;
echo '<br> Versez la prime annuelle ('.$mattarella->prime().'€) sur le compte de '.$mattarella->getPrenom().' '.$mattarella->getNom() ;

// EX_6
$usa = new Agence('usa', '1600 Pennsylvania Avenue', '20500', 'Washington', true);
$trump->setAgence($usa);
echo '<br>';


// $trump->getNomAgence() == $usa
// echo $trump->getAgence()->getNom();
// echo '<br>';
// echo $usa->getNom();

// var_dump($trump->getAgence());
// var_dump($usa);

// $france = new Agence();
// $macron->setNomAgence($france);

// $germany = new Agence();
// $merkel->setNomAgence($germany);

// $spain = new Agence();
// $sanchez->setNomAgence($spain);

// $italy = new Agence();
// $mattarella->setNomAgence($italy);

var_dump($trump);
// var_dump($macron);
// var_dump($merkel);
// var_dump($sanchez);
// var_dump($mattarella);


// EX_7
$trump->vacance();

?>