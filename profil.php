<?php
session_start();
if (!isset($_SESSION['id_session'])){
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

<?php }else{ ?>
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
        <div id="navbar" class="navbar-collapse collapse navbar-right" style="color:#fff">

</div>
<!--/.navbar-collapse -->
</div>
</nav>

<div class="container">

    <div id="bloc_profil">
        Veuillez vous connecter <a href="login.php">ici</a>
    </div>

</div>

</body>

</html>
<?php } ?>