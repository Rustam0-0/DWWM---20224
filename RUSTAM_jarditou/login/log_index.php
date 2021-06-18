<?php
    // include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Log in</title>
</head>

<body>
<style>
    #log_input{
        width: 100%;
    }
    h2{
        text-align:center;
    }
    #button{
        width: 100px;
        color: black;
        background-color: lightgreen;
        width: 100%;
        text-align: center;
    }

</style>
<div class="d-flex justify-content-around px-2 py-5">
    <div class="col">
    </div>
    <div class="col-3">
        <h2>Log in</h2>
        <form action="script.php" method="POST" class=""><br><br>
            <input id="log_input" type="text" name="user" placeholder="Nom d'utilisateur"><br><br>
            <input id="log_input" type="password" name="pwd" placeholder="Mor de passe"><br><br>
            <button id="button" type="submit" name="login">Entrer</button><br><br>
            <a href="singup.php">Vous n'avez pas de compte?</a>
        </form>
    </div>
    <div class="col">
    </div>

</div>
</body>
<?php
    // include_once 'footer.php';
?>
