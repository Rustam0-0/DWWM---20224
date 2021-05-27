<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'oto') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$client_nom = '';
$client_prenom = '';
$person_contact = '';
$client_adress = '';
$client_num_tel= '';
$client_email = '';
$part_ou_prof = '';

if (isset($_POST['save'])) {

    $client_nom = $_POST['nom'];
    $client_prenom = $_POST['prenom'];
    $person_contact = $_POST['contact'];
    $client_adress = $_POST['adress'];
    $client_num_tel= $_POST['num_tel'];
    $client_email = $_POST['email'];
    if(isset($_POST['part_prof'])) { $part_ou_prof = $_POST['part_prof']; }
  
    if (empty($client_nom)) {
        $_SESSION['message'] = "Saissisez le nom!";
        $_SESSION['msg_type'] = "danger";
    }
    elseif (empty($client_prenom)) {
        $_SESSION['message'] = "Saissisez le prenom!";
        $_SESSION['msg_type'] = "danger";

    }
    elseif (empty($person_contact)) {
        $_SESSION['message'] = "Saissisez une personne à contacter!";
        $_SESSION['msg_type'] = "danger";
    }
    elseif (empty($client_adress)) {
        $_SESSION['message'] = "Saissisez une adresse!";
        $_SESSION['msg_type'] = "danger";
    }
    elseif (empty($client_num_tel)) {
        $_SESSION['message'] = "Saissisez une numéro de téléphone!";
        $_SESSION['msg_type'] = "danger";

    }
    elseif (empty($client_email)) {
        $_SESSION['message'] = "Saissisez email!";
        $_SESSION['msg_type'] = "danger";
    }
    elseif (empty($part_ou_prof)) {
        $_SESSION['message'] = "Vous êtes particulier ou professionel?";
        $_SESSION['msg_type'] = "danger";
    }
    else {        
        $mysqli->query("INSERT INTO clients (part_ou_prof, client_nom, client_prenom, person_contact, client_adress, client_num_tel, client_email) 
        VALUES('$part_ou_prof', '$client_nom', '$client_prenom', '$person_contact', '$client_adress', '$client_num_tel', '$client_email')")
        or die($mysqli->error);

        $_SESSION['message'] = "Sauvegardé";
        $_SESSION['msg_type'] = "success";
    }
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM clients WHERE client_id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Supprimé";
    $_SESSION['msg_type'] = "danger";
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM clients WHERE client_id=$id") or die($mysqli->error());
    if ($result){
        $row = $result->fetch_array();
        $part_ou_prof = $row['part_ou_prof'];
        $client_nom = $row['client_nom'];
        $client_prenom = $row['client_prenom'];
        $person_contact = $row['person_contact'];
        $client_adress = $row['client_adress'];
        $client_num_tel = $row['client_num_tel'];
        $client_email = $row['client_email'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $part_ou_prof = $_POST['part_prof'];
    $client_nom = $_POST['nom'];
    $client_prenom = $_POST['prenom'];
    $person_contact = $_POST['contact'];
    $client_adress = $_POST['adress'];
    $client_num_tel= $_POST['num_tel'];
    $client_email = $_POST['email'];

    $mysqli->query("UPDATE clients SET part_ou_prof='$part_ou_prof', client_nom='$client_nom', client_prenom='$client_prenom', person_contact='$person_contact', client_adress='$client_adress', client_num_tel=' $client_num_tel', client_email='$client_email' WHERE client_id=$id")
    or die($mysqli->error);

    $_SESSION['message'] = "Mis à jour";
    $_SESSION['msg_type'] = "warning";
}

?>