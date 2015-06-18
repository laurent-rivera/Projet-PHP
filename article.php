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

	<title>Articles</title>

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

<div class="row">
    <?php foreach ($articles as $row) { ?>
        <div class="articles_page">
            <h2><?php echo $row->titre_article ?></h2>
            <div style="display: flex;">
        		<img src="img/village.jpg" height="150">
            	<p class="contenu_article" style="margin-left: 10px;"><?php echo $row->contenu_article ?></p>
            </div>
            <div>
            	<p style="text-align:right;">Ecrit par <?php echo $row->prenom; ?></p>
            </div>
        </div>
    <?php } ?>
</div>
    <footer>
        <p>&copy; Site réalisé par Laurent Rivera et Dimitri Sandron</p>
    </footer>
</div>

</body>
</html>