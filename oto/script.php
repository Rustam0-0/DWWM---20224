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
    $part_ou_prof = $_POST['part_prof'];
    $client_nom = $_POST['nom'];
    $client_prenom = $_POST['prenom'];
    $person_contact = $_POST['contact'];
    $client_adress = $_POST['adress'];
    $client_num_tel= $_POST['num_tel'];
    $client_email = $_POST['email'];
    
    $mysqli->query("INSERT INTO clients (part_ou_prof, client_nom, client_prenom, person_contact, client_adress, client_num_tel, client_email) 
    VALUES('$part_ou_prof', '$client_nom', '$client_prenom', '$person_contact', '$client_adress', '$client_num_tel', '$client_email')")
    or die($mysqli->error);

    $_SESSION['message'] = "Sauvegardé";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM clients WHERE client_id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Supprimé";
    $_SESSION['msg_type'] = "danger";

    // header("location: index.php");

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

    header("location: index.php");
}

?>