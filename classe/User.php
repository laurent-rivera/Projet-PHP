<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 16/06/2015
 * Time: 15:12
 */

class User {

    private $id_user;
    private $prenom;
    private $nom;
    private $pseudo;
    private $password;
    private $email;
    private $img_src;
    private $droit;
    private $active;

    function __construct($id_user)

    {
        $connect_bd = new DbConnect();

        $resultat = $connect_bd->GetRequest("SELECT * FROM users WHERE id_user = '$id_user'");
        $result = $resultat->fetchAll(PDO::FETCH_OBJ);

        $this->id_user = $result[0]->id_user;
        $this->prenom = $result[0]->prenom;
        $this->nom = $result[0]->nom;
        $this->pseudo = $result[0]->pseudo;
        $this->pseudo = $result[0]->pseudo;
        $this->password = $result[0]->password;
        $this->email = $result[0]->email;
        $this->img_src = $result[0]->img_src;
        $this->droit = $result[0]->droit;
        $this->active = $result[0]->active;
    }

    public function GetInfosUser($id_user)
    {
        $connect_bd = new DbConnect();

        $resultat = $connect_bd->GetRequest("SELECT * FROM users WHERE id_user = '$id_user'");
        $result = $resultat->fetchAll(PDO::FETCH_OBJ);

        $this->id_user = $result[0]->id_user;
        $this->prenom = $result[0]->prenom;
        $this->nom = $result[0]->nom;
        $this->pseudo = $result[0]->pseudo;
        $this->pseudo = $result[0]->pseudo;
        $this->password = $result[0]->password;
        $this->email = $result[0]->email;
        $this->img_src = $result[0]->img_src;
        $this->droit = $result[0]->droit;
        $this->active = $result[0]->active;
    }

    public function GetFisrtLastName()
    {
        return $this->prenom."  ".$this->nom;
    }

    public function GetStatutUser()
    {
        // 1 Modification Article autorisé - 0 Modification Article non autorisé
        // 1 Modifications Users autorisé - 0 Modification Users non autorisé
        if($this->droit == 1)
            return "Admin";
        elseif($this->droit == 0)
            return "Membre simple";
    }

    public function EditProfil($id_user, $prenom, $nom, $pseudo, $password, $email, $img_src)
    {
        $connect_bd = new DbConnect();
        $connect_bd->ExecRequest("UPDATE users SET nom = '$nom', prenom = '$prenom', pseudo = '$pseudo', password = '$password', email = '$email', img_src = '$img_src' WHERE id_user = $id_user;");
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getDroit()
    {
        return $this->droit;
    }

    /**
     * @param mixed $droit
     */
    public function setDroit($droit)
    {
        $this->droit = $droit;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getImgSrc()
    {
        return $this->img_src;
    }

    /**
     * @param mixed $img_src
     */
    public function setImgSrc($img_src)
    {
        $this->img_src = $img_src;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }



}