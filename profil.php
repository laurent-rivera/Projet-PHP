<?php
session_start();
include("classe/DbConnect.php");
include("classe/User.php");
$user = new User($_SESSION['id_session']);
$db_connect = new DbConnect();
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
            <a class="navbar-brand" href="jumbotron/index.php">Projet PHP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right" style="color:#fff">
            <?php echo "Bonjour ".$user->GetFisrtLastName(); ?>
        </div>
        <!--/.navbar-collapse -->
    </div>
</nav>

<div class="container">
    <br><br><br><br>
    <a href="logout.php">Déconnexion</a>

    <?php
    if($user->getDroit() == 11){
        echo '<ul>
        <li><a href="edit_profil.php">Editer profil</a></li>
        <li><a href="manage_users.php">Gestion utilisateur</a></li>
        <li><a href="manage_articles.php">Gestion Articles</a></li>
    </ul>';
    }elseif($user->getDroit() == 10){
        echo '<ul>
    <li><a href="edit_profil.php">Editer profil</a></li>
    <li><a href="manage_articles.php">Gestion Articles</a></li>
</ul>';
    }else{
        echo '<ul>
    <li><a href="edit_profil.php">Editer profil</a></li>
</ul>';
    }
    ?>

    <div id="bloc_profil">
        <strong>Nom : </strong><?php echo $user->GetFisrtLastName(); ?><br>
        <strong>Statut : </strong><?php echo $user->GetStatutUser(); ?>
    </div>

</div>

</body>

</html>

