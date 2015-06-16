<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 16/06/2015
 * Time: 12:53
 */

class DbConnect {

    public $connect = null;


    function __construct()
    {
        $host = "localhost";
        $login = "root";
        $password = "";
        $dbname = "projet_php";

        try {
            $this->connect = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . "", $login, $password);
            // Description des erreurs
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connexion réussie.<br/>";
        } catch (PDOException $erreur) {
            echo "<p>Erreur : " . $erreur->getMessage() . "</p>\n";
        }
    }

    public function startSession($pseudo, $password)
    {

        $sql = "SELECT id_user, pseudo, password FROM users WHERE pseudo = '$pseudo' AND password = '$password'";
        $resultat = $this->connect->query($sql);
        $result = $resultat->fetchAll(PDO::FETCH_OBJ);

        if($result == null)
            return false;
        else
            return $_SESSION['id_session'] = $result[0]->id_user;
    }

}