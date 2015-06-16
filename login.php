<?php

session_start();

include("classe/DbConnect.php");
include("classe/User.php");

$db_connect = new DbConnect();
$db_query = $db_connect->startSession($_POST['pseudo'], $_POST['password']);

$user_recup = new User($_SESSION['id_session']);
//$infos_user = $user_recup->GetInfosUser($_SESSION['id_session']);

var_dump($db_query);
var_dump($user_recup);
//var_dump($infos_user);

if($db_query != false)
    header('Location: profil.php');
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">
    <div id="bloc_connection">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-default">Connexion</button>
        </form>
    </div>
</div>

</body>

</html>