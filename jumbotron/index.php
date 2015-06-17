<?php
session_start();
include("../classe/DbConnect.php");
include("../classe/User.php");
$db_connect = new DbConnect();
if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
    $db_query = $db_connect->startSession($_POST['pseudo'], $_POST['password']);
    if ($db_query != false)
        header('Location: ../profil.php');
}
if (isset($_SESSION['id_session']))
    $user_recup = new User($_SESSION['id_session']);
$user = new User($_SESSION['id_session']);
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

    <title>Projet PHP</title>

    <!-- Fichier CSS principal -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <a class="navbar-brand" href="#">Projet PHP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form action="index.php" method="post" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" name="pseudo" placeholder="Identifiant" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                </div>
                <input type="submit" name="btn_login" value="Connexion" class="btn btn-success"/>
            </form>
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
        <?php foreach ($articles as $row) { ?>
            <div class="col-md-4">
                <h2><?php echo $row->titre_article ?></h2>

                <p><?php echo $row->contenu_article ?></p>

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
<script src="bootstrap.min.js"></script>
<script src="collapse.js"></script>

<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>