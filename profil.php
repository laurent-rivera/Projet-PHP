<?php

session_start();

include("classe/DbConnect.php");
include("classe/User.php");

$user = new User($_SESSION['id_session']);
$infos_user = $user->GetInfosUser($_SESSION['id_session']);

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
    <div id="bloc_profil">
        <?php echo $user->GetInfosUser($_SESSION['id_session']); ?>
    </div>
</div>

</body>

</html>

