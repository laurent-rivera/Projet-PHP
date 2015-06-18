<?php

include("classe/DbConnect.php");
include("classe/User.php");
$db_connect = new DbConnect();

session_start();

$articles = $db_connect->GetLastArticles();

if(isset($_SESSION['id_session'])){
    $user_recup = new User($_SESSION['id_session']);
    $user = new User($_SESSION['id_session']);
}else{
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $db_query = $db_connect->GetRequest("SELECT id_user, pseudo, password FROM users WHERE pseudo = '$pseudo' AND password = '$password'");
        $result = $db_query->fetchAll(PDO::FETCH_OBJ);
        if ($result == null)
            return false;
        else {
            $_SESSION['id_session'] = $result[0]->id_user;
            header('Location: profil.php');
        }
    }
}
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

    <title>Projet PHP</title>

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

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Bonjour !</h1>

        <p style="color:black; border:2px solid black; max-width:615px; background-color: rgba(0, 0, 1, 0.5);">Ceci est
            un site responsive crée par Laurent Rivera et Dimitri Sandron</p>

        <p><a class="btn btn-primary btn-lg" href="#" role="button">En savoir plus &raquo;</a></p>
    </div>
</div>

<div class="container">

    <div class="row">
        <div><h2>Les derniers articles</h2></div>
        <?php foreach ($articles as $row) { ?>
            <div class="col-md-4">
                <h2><?php echo $row->titre_article; ?></h2>

                <p><?php echo substr($row->contenu_article, 0, 40); ?></p>

                <p><a class="btn btn-default" href="#" role="button">Voir plus &raquo;</a></p>
            </div>
        <?php } ?>
    </div>

    <hr>

    <footer>
        <p>&copy; Site réalisé par Laurent Rivera et Dimitri Sandron</p>
    </footer>
</div>
<!-- /container -->


<!-- Appel des fichiers JavaScript
================================================== -->
<!-- Placés en fin de document pour que la page se charge plus rapidement -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/collapse.js"></script>

</body>
</html>