<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>oto</title>
    <style>
        html, body{
            width: 90%;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body class="body">
    <?php require_once 'script.php';?>

    <?php
    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

        <?php
            $mysqli = new mysqli('localhost','root','','oto') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM clients") or die($mysqli->error);
        ?>      

        <form action ="script.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $id; ?>">         

            <div class="form-group">
                <div class="form-row justify-content-between">
                    <input class="col-3" type="text" value="<?php echo $client_nom; ?>" name="nom" id="client_nom" placeholder="Nom">
                    <input class="col-3" type="text" value="<?php echo $client_prenom; ?>"  name="prenom" id="client_prenom" placeholder="Prénom">
                    <input class="col-3" type="text" value="<?php echo $person_contact; ?>"  name="contact" id="person_contact" placeholder="Personne à contacter">
                </div><br>
                <div class="form-row justify-content-between">
                    <input class="col-3" type="text" value="<?php echo $client_adress; ?>"  name="adress" id="client_adress" placeholder="Adresse">
                    <input class="col-3" type="text" value="<?php echo $client_num_tel; ?>"  name="num_tel" id="client_num_tel" placeholder="Numéro de téléphone">
                    <input class="col-3" type="text" value="<?php echo $client_email; ?>"  name="email" id="client_email" placeholder="Email">
                </div>               
            </div>
  
            <div class="form-row justify-content-between">
                <div class="col-3">
                    <input class="col-3" type="radio" value="part" name="part_prof" id="part_ou_prof" <?php if($part_ou_prof == 'part'): echo 'checked'; endif;?>>Particulier</input>
                </div>
                <div class="col-3">
                    <input class="col-3" type="radio" value="prof" name="part_prof" id="part_ou_prof" <?php if($part_ou_prof == 'prof'): echo 'checked'; endif;?>>Professionel</input>
                </div>            
                <div class="col-3">
                    <?php
                    if ($update == true):
                    ?>
                    <button type="submit" class="btn btn-info" name="update">Mettre à jour</button>
                    <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="save">Sauvegarder</button>
                    <?php endif; ?>
                </div>
            </div>

        </form><br>
        <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Part ou Prof</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Persone de contact</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                    while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['client_id']; ?></td>
                        <td><?php echo $row['part_ou_prof']; ?></td>
                        <td><?php echo $row['client_nom']; ?></td>
                        <td><?php echo $row['client_prenom']; ?></td>
                        <td><?php echo $row['person_contact']; ?></td>
                        <td><?php echo $row['client_adress']; ?></td>
                        <td><?php echo $row['client_num_tel']; ?></td>
                        <td><?php echo $row['client_email']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['client_id']; ?>"
                                class="btn btn-info">Editer</a>
                            <a href="index.php?delete=<?php echo $row['client_id']; ?>"
                                class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
        </table>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
</body>
</html>