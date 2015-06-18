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
}if (isset($_POST['submitArticle']) && $_POST['submitArticle']){
	$db_connect->AddArticle($_POST['titre_article'], $_POST['contenu_article'], $_SESSION['id_session']);
}
?>

<!DOCTYPE html>
<html>
<head><!-- CDN hosted by Cachefly -->
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

	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>tinymce.init({selector:'textarea'});</script>
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

		<h2 style="text-align: center;">Ajouter un article sur le site</h2>
		<form action="manage_articles.php" method="post" id="create_article">
        	<div class="form-group">
	        	<label for="titre_article">Titre de l'article </label>
	        	<input class="form-control" id="titre_article" type="text" name="titre_article" placeholder="Titre de l'article"/>
			</div>
        	<textarea class="form-control" name="contenu_article">Tapez ici le contenu de l'article (formattage du texte possible)</textarea>
        	<input type="submit" class="btn btn-default" name="submitArticle"/>
</body>
</html>