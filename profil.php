<?php
session_start();
include("classe/DbConnect.php");
include("classe/User.php");
$db_connect = new DbConnect();

if(isset($_SESSION['id_session'])){
    $user_recup = new User($_SESSION['id_session']);
    $user = new User($_SESSION['id_session']);
}else{
    echo "Vous n'êtes pas connecté !";
}

$articles = $db_connect->GetAllArticles();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ces trois balises meta doivent être placés en première, tout le contenu suivant vient après -->
    <meta name="description" content="Projet PHP en cours de développement">
    <meta name="author" content="Laurent Rivera & Dimitri Sandron">
    <link rel="icon" href="../../favicon.ico">

    <title>Projet PHP - Profil</title>

    <!-- Fichier CSS principal -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

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
                echo '<a class="navbar-right" href="logout.php">Déconnexion</a>';
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

    <?php
    if(isset($_SESSION['id_session'])){
        if($user->getDroit() == 1){
            echo '<ul>
            <li><a href="edit_profil.php">Editer profil</a></li>
            <li><a href="manage_users.php">Gestion utilisateur</a></li>
            <li><a href="manage_articles.php">Gestion Articles</a></li>
        </ul>';
        }else{
            echo '<ul>
        <li><a href="edit_profil.php">Editer profil</a></li>
        <li><a href="manage_articles.php">Gestion Articles</a></li>
    </ul>';
        }
    }
    ?>

    <?php if(isset($_SESSION['id_session'])){ ?>
    <div id="bloc_profil">
        <strong>Nom : </strong><?php echo $user->GetFisrtLastName(); ?><br>
        <strong>Statut : </strong><?php echo $user->GetStatutUser(); ?>
    </div>
    <?php } ?>
</div>

</body>

</html>