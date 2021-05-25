<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="style.css" type="text/css" rel="stylesheet" :>
    <title>inscription</title>
</head>
<body class="body">
<div class="corp">
    
    <?php require_once 'script.php';?>

    <?php if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <?php
        $mysqli = new mysqli('localhost','root','','green') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM clients") or die($mysqli->error);
    ?>

    <div class="container-fluid text-center py-5">
        <p>Créez vos identifiants</p>
    </div>
    <form class="" action ="script.php" method="POST">
        <div class="container-fluid d-flex flex-wrap pt-3">
            <div class="col-6 px-5">
                <div class="form-group row">
                    <label class="control-label col-3 text-right" for="client_nom">E-mail</label>
                    <div class="col-9"><input class="form-control" type="text" value="<?php echo $client_email; ?>"  name="email" id="client_email"></div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid d-flex flex-wrap">
            <div class="col-6 px-5">
                <div class="form-group row">
                    <label class="control-label col-3 text-right" for="client_nom">Créez votre mot de passe</label>
                    <div class="col-9"><input class="form-control" type="text" value="<?php echo $client_mot_de_pas; ?>"  name="mot_de_pas" id="client_mot_de_pas" required></div>
                </div>  
            </div>
            <div class="col-6 px-5">
                <div class="form-group row">
                    <label class="control-label col-3" for="client_nom">Confirmation mot de passe</label>
                    <div class="col-9"><input class="form-control" type="text" value=""  name="" id=""></div>
                </div>
            </div>
        </div>

        <div class="container-fluid d-flex flex-wrap py-3">
            
            <div class="col-6 px-5">
                <input type="hidden" name="id" value="<?php echo $id; ?>">         

                <div class="form-group row">
                    <label class="control-label col-3" for="client_nom">Prénom</label>
                    <div class="col-9"><input class="form-control" type="text" value="<?php echo $client_prenom; ?>"  name="prenom" id="client_prenom" required></div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-3" for="client_nom">Nom</label>
                    <div class="col-9"><input class="form-control" type="text" value="<?php echo $client_nom; ?>" name="nom" id="client_nom" required></div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-3" for="client_nom">Adresse</label>
                    <div class="col-9"><input class="form-control" type="text" value="<?php echo $client_adress; ?>"  name="adress" id="client_adress" required></div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-3" for="client_nom">Complément d’adresse</label>
                    <div class="col-9"><input class="form-control" type="text" value="<?php echo $client_ad_comp; ?>"  name="ad_comp" id="client_ad_comp" required></div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-3" for="client_nom">Code postal</label>
                    <div class="col-9"><input class="form-control" type="text" value="<?php echo $client_code_postal; ?>"  name="code_postal" id="client_code_postal" required></div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-3" for="client_nom">Ville</label>
                    <div class="col-9"><input class="form-control" type="text" value="<?php echo $client_ville; ?>"  name="ville" id="client_ville" required></div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-3" for="client_nom">Pays</label>
                    <div class="col-9"><input class="form-control" type="text" value="<?php echo $client_pays; ?>"  name="pays" id="client_pays" required></div>
                </div>
            </div>
            <div class="col-6 px-5"><img class="img-fluid" src="images/BODY/ESPACE CLIENT/CADRE numero.png"></div>
        </div>
        <div class="container-fluid text-center py-5">
            <?php
            if ($update == true):
            ?>
            <button type="submit" class="btn btn-info" name="update">Mettre à jour</button>
            <?php else: ?>
            <button type="submit" class="btn valider" name="save">Valider</button>
            <!-- <a type="submit" name="save" type="submit"><img class="img-fluid" src="images/BODY/ESPACE CLIENT/bouton valider.png"></a> -->
            <?php endif; ?>
        </div>
    </form>
    <?php
        
        ?>   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
</body>
</html>