<?php
function calculator($entier1, $entier2, $entier3) 
{
   if ($entier2 == "+") {
    $resultat = $entier1 + $entier3;
   }
   elseif ($entier2 == '-') {
    $resultat = $entier1 - $entier3;
   }
   elseif ($entier2 == '*') {
    $resultat = $entier1 * $entier3;
   }
   elseif ($entier2 == '/') {
    $resultat = $entier1 / $entier3;
   }
   else {
       echo 'entier2 est pas correct';
   }
   return $resultat;
}

$resultat =  calculator(30,'/',6);

echo $resultat;