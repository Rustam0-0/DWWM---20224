<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'green') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$client_email = '';
$client_mot_de_pas = '';
$client_prenom = '';
$client_nom = '';
$client_adress = '';
$client_ad_comp = '';
$client_code_postal = '';
$client_ville = '';
$client_pays = '';


if (isset($_POST['save']))
    $client_email = $_POST['email'];
    $client_mot_de_pas = $_POST['mot_de_pas'];
    $client_prenom = $_POST['prenom'];
    $client_nom = $_POST['nom'];
    $client_adress = $_POST['adress'];
    $client_ad_comp = $_POST['ad_comp'];
    $client_code_postal = $_POST['code_postal'];
    $client_ville = $_POST['ville'];
    $client_pays = $_POST['pays'];
    
    $mysqli->query("INSERT INTO clients (client_email, client_mot_de_pas, client_prenom, client_nom, client_adress, client_ad_comp, client_code_postal, client_ville, client_pays) 
    VALUES('$client_email', '$client_mot_de_pas', '$client_prenom', '$client_nom', '$client_adress', '$client_ad_comp', '$client_code_postal', '$client_ville', '$client_pays')")
    or die($mysqli->error);

    $_SESSION['message'] = "Sauvegardé";
    $_SESSION['msg_type'] = "success";

    header("location: inscript.php");
}

?>