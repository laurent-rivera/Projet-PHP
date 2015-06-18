<?php
session_start();
include("classe/DbConnect.php");
include("classe/User.php");
$user = new User($_SESSION['id_session']);
if (isset($_POST['submitModify']) && $_POST['submitModify'])
    $user->EditProfil($_SESSION['id_session'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['password'], $_POST['email'], 'img_src');
    $user->GetInfosUser($_SESSION['id_session']);
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords"
          content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Projet PHP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php if(isset($_SESSION['id_session'])){ 
                echo '<div class="navbar-right" style="color:#fff;margin-top:15px;">'.$user->getPrenom()." ".$user->getNom().'</div>';
            } else { ?>
            <form action="index.php" method="post" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" name="pseudo" placeholder="Identifiant" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                </div>
                <input type="submit" name="btn_login" value="Connexion" class="btn btn-success"/>
            </form>
            <?php } ?>
        </div>
        <!--/.navbar-collapse -->
    </div>
</nav>

<div class="container">
    <h1>Modifier son profil</h1>

    <form action="edit_profil.php" method="post">
        <div class="form-group">
            <label for="image">Image de profil</label>
            <img src="upload/<?php echo $user->getImgSrc(); ?>" alt="<?php echo $user->getImgSrc(); ?>"/>
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom"
                   value="<?php echo $user->getNom(); ?>">
        </div>
        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom"
                   value="<?php echo $user->getPrenom(); ?>">
        </div>
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo"
                   value="<?php echo $user->getPseudo(); ?>">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe"
                   value="<?php echo $user->getPassword(); ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                   value="<?php echo $user->getEmail(); ?>">
        </div>
        <input type="submit" name="submitModify" value="Modifier" class="btn btn-default"/>
    </form>
</div>
</body>
</html>
