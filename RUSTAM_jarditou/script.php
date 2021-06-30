<?php

$mysqli = new mysqli('localhost', 'root', '', 'jarditou') or die(mysqli_error($mysqli));

$id = 0;
$ref = '';
$cat = '';
$lib = '';
$desc = '';
$prix = '';
$stock = '';
$coul = '';
$photo ='';
$bloque = '';

////////////////////////////////////////// UPDATE//////////////////////////////////////////

if (isset($_POST['update'])){
        $id = $_POST['id'];
        $ref = $_POST['ref'];
        $cat = $_POST['cat'];
        $lib = $_POST['lib'];
        $desc = $_POST['description'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $coul = $_POST['coul'];
        $bloque = $_POST['custom'];

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'gif', 'tiff');

        
        //Validation du formulaire

        if (empty($ref)) {
                $_SESSION['message'] = "Saisissez une référence!";
                $_SESSION['msg_type'] = "danger";
        }
        elseif (empty($cat)) {
                $_SESSION['message'] = "Choisissez une categorie!";
                $_SESSION['msg_type'] = "danger";
        
        }
        elseif (empty($lib)) {
                $_SESSION['message'] = "Saisissez une libellé!";
                $_SESSION['msg_type'] = "danger";
        }
        elseif (empty($prix)) {
                $_SESSION['message'] = "Saisissez la prix";
                $_SESSION['msg_type'] = "danger";
        }
        elseif (empty($stock) || $stock<0) {
                $_SESSION['message'] = "Saisissez un stock!";
                $_SESSION['msg_type'] = "danger";
        }
        elseif (empty($coul)) {
                $_SESSION['message'] = "Saisissez la couleur";
                $_SESSION['msg_type'] = "danger";

        //Validation de la fichier
        }
        elseif($fileSize > 5000000) {
                $_SESSION['message'] = "Votre fichier est trop gros";
                $_SESSION['msg_type'] = "danger";
        }
        elseif($fileError === !0) {
                $_SESSION['message'] = "Une erreur";
                $_SESSION['msg_type'] = "danger";
        }

        elseif(empty($file) && !in_array($fileActualExt,$allowed)) {
                $_SESSION['message'] = "Le fichier doit être de type -jpg, -jpeg, -png, gif, tiff ou -pdf";
                $_SESSION['msg_type'] = "danger";
        }
        else {        
                
                $mysqli->query("UPDATE produits SET pro_ref='$ref', pro_cat_id='$cat', pro_libelle='$lib', pro_description='$desc', pro_prix='$prix', pro_stock='$stock', pro_couleur='$coul', pro_photo='$fileActualExt', pro_bloque='$bloque' 
                WHERE pro_id=$id")
                or die($mysqli->error);

                var_dump("test");
                var_dump($fileActualExt);
                var_dump($_FILES['file']['tmp_name']);

                $fileNameNew = $id.".".$fileActualExt;
                $fileDestination = 'img/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                header ('locatwion: tableau.php');
        }
}

////////////////////////////////////////// DELETE//////////////////////////////////////////


if (isset($_POST['delete'])){   

        $id = $_POST['id'];
        $mysqli->query("DELETE FROM produits WHERE pro_id=$id") or die($mysqli->error());

        header ('location: tableau.php');
}


////////////////////////////////////////// SAVE//////////////////////////////////////////

if (isset($_POST['save'])) {
        $id = $_POST['id'];
        $ref = $_POST['ref'];
        $cat = $_POST['cat'];
        $lib = $_POST['lib'];
        $desc = $_POST['description'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $coul = $_POST['coul'];
        $bloque = $_POST['custom'];
        $date_ad = date('y-m-d');

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'gif', 'tiff');
  
        //Validation du formulaire

        if (empty($ref)) {
                $_SESSION['message'] = "Saisissez une référence!";
                $_SESSION['msg_type'] = "danger";
                var_dump($_POST);
                }
        elseif ($cat <= 0) {
                $_SESSION['message'] = "Choisissez une categorie!";
                $_SESSION['msg_type'] = "danger";
        }
        elseif (empty($lib)) {
                $_SESSION['message'] = "Saisissez une libellé!";
                $_SESSION['msg_type'] = "danger";
        }
        elseif (empty($prix)) {
                $_SESSION['message'] = "Saisissez la prix";
                $_SESSION['msg_type'] = "danger";
        }
        elseif ($stock < 0 || empty($stock)) {
                $_SESSION['message'] = "Saisissez un stock!";
                $_SESSION['msg_type'] = "danger";
        }
        elseif (empty($coul)) {
                $_SESSION['message'] = "Saisissez la couleur";
                $_SESSION['msg_type'] = "danger";

        //Validation du fichier
        }
        elseif($fileSize > 5000000) {
                $_SESSION['message'] = "Votre fichier est trop gros";
                $_SESSION['msg_type'] = "danger";
        }
        elseif($fileError === !0) {
                $_SESSION['message'] = "Une erreur";
                $_SESSION['msg_type'] = "danger";
        }

        elseif(empty($file) && !in_array($fileActualExt,$allowed)) {
                $_SESSION['message'] = "Le fichier doit être de type -jpg, -jpeg, -png, gif, tiff ou -pdf";
                $_SESSION['msg_type'] = "danger";
        }
        else{        
                $mysqli->query("INSERT INTO produits (pro_ref, pro_cat_id, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_bloque, pro_d_ajout) 
                VALUES('$ref', '$cat', '$lib', '$desc', '$prix', '$stock', '$coul', '$fileActualExt', '$bloque', '$date_ad')")
                or die($mysqli->error);

                $id = mysqli_insert_id($mysqli);
                $fileNameNew = $id.".".$fileActualExt;
                $fileDestination = 'img/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
               
                var_dump($_POST);
                var_dump($_FILES);
                var_dump($id);
                var_dump($fileNameNew);
                var_dump($fileDestination);

                $_SESSION['message'] = "Sauvegardé";
                $_SESSION['msg_type'] = "success";
        }
}

?>