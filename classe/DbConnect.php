<?php

/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 16/06/2015
 * Time: 12:53
 */
class DbConnect
{

    private $host = "localhost";
    private $login = "root";
    private $password = "";
    private $dbname = "projet_php";
    private $connect = null;


    function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . "", $this->login, $this->password);
            // Description des erreurs
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connexion réussie.<br/>";
        } catch (PDOException $erreur) {
            echo "<p>Erreur : " . $erreur->getMessage() . "</p>\n";
        }
    }

    public function GetRequest($sql)
    {
        return $this->connect->query($sql);
    }

    public function ExecRequest($sql)
    {
        return $this->connect->exec($sql);
    }

    public function GetAllArticles()
    {
        $sql = "SELECT * FROM articles ar LEFT JOIN users us ON ar.id_user = us.id_user ORDER BY id_article DESC";
        $resultat = $this->connect->query($sql);
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }

    public function GetLastArticles()
    {
        $sql = "SELECT * FROM articles ORDER BY id_article DESC LIMIT 3";
        $resultat = $this->connect->query($sql);
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }

    public function GetAllUsers()
    {
        $sql = "SELECT * FROM users";
        $resultat = $this->connect->query($sql);
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }

    public function AddArticle($titre, $contenu, $auteur)
    {
        $connect_bd = new DbConnect();
        $connect_bd->ExecRequest("INSERT INTO articles (`id_article`, `titre_article`, `img_src_article`, `contenu_article`, `date_add`, `active`, `id_user`) VALUES (NULL, '$titre', 'village.jpg', '$contenu', NOW(), '1', '$auteur');");
    }

}