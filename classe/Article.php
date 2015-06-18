<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/06/2015
 * Time: 09:22
 */

class Article {

    private $id_article;
    private $titre_article;
    private $img_src_article;
    private $contenu_article;
    private $date_add;
    private $active;
    private $id_user;

    function __construct($active, $contenu_article, $date_add, $id_article, $id_user, $img_src_article, $titre_article)
    {
        $this->active = $active;
        $this->contenu_article = $contenu_article;
        $this->date_add = $date_add;
        $this->id_article = $id_article;
        $this->id_user = $id_user;
        $this->img_src_article = $img_src_article;
        $this->titre_article = $titre_article;
    }


    public function AddArticle($titre, $contenu, $auteur)
    {
        $connect_bd = new DbConnect();
        $connect_bd->ExecRequest("INSERT INTO articles (`id_article`, `titre_article`, `img_src_article`, `contenu_article`, `date_add`, `active`, `id_user`) VALUES (NULL, '$titre', 'village.jpg', '$contenu', NOW(), '1', '$auteur');");
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
    public function getContenuArticle()
    {
        return $this->contenu_article;
    }

    /**
     * @param mixed $contenu_article
     */
    public function setContenuArticle($contenu_article)
    {
        $this->contenu_article = $contenu_article;
    }

    /**
     * @return mixed
     */
    public function getDateAdd()
    {
        return $this->date_add;
    }

    /**
     * @param mixed $date_add
     */
    public function setDateAdd($date_add)
    {
        $this->date_add = $date_add;
    }

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->id_article;
    }

    /**
     * @param mixed $id_article
     */
    public function setIdArticle($id_article)
    {
        $this->id_article = $id_article;
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
    public function getImgSrcArticle()
    {
        return $this->img_src_article;
    }

    /**
     * @param mixed $img_src_article
     */
    public function setImgSrcArticle($img_src_article)
    {
        $this->img_src_article = $img_src_article;
    }

    /**
     * @return mixed
     */
    public function getTitreArticle()
    {
        return $this->titre_article;
    }

    /**
     * @param mixed $titre_article
     */
    public function setTitreArticle($titre_article)
    {
        $this->titre_article = $titre_article;
    }




} 