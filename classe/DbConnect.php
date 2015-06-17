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
        $sql = "SELECT * FROM articles";
        $resultat = $this->connect->query($sql);
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }

    public function GetAllUsers()
    {
        $sql = "SELECT * FROM users";
        $resultat = $this->connect->query($sql);
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }

}