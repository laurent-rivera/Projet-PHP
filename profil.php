<?php
session_start();
include("classe/DbConnect.php");
include("classe/User.php");
$user = new User($_SESSION['id_session']);
$db_connect = new DbConnect();
$articles = $db_connect->GetAllArticles();
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

    <div id="bloc_articles">
        <?php
            foreach($articles as $row){
                echo $row->titre_article;
            }
        ?>
    </div>
</div>

</body>

</html>

