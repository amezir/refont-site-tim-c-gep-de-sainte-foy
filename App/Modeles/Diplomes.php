<?php

declare (strict_types = 1);
namespace App\Modeles;
use \PDO;
use App\App;

class Diplomes{

    private $id;
    private $nom;
    private $prenom;
    private $presentation;
    private $courriel;
    private $pseudo_twitter;
    private $linkedin;
    private $site_web;

    static function trouverTousDiplomes():array{
        $pdo = App::getPDO();
        $sql = "SELECT * FROM diplomes";
        $requete = $pdo->prepare($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS, Diplomes::class);
        $requete->execute();
        $diplomes = $requete->fetchAll();
        return $diplomes;
    }

    static function trouverDiplomeParId(int $id): Diplomes{
        $pdo = App::getPDO();
        $sql = "SELECT * FROM diplomes WHERE id = :id";
        $requete = $pdo->prepare($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS, Diplomes::class);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $diplome = $requete->fetch();
        return $diplome;
    }

    public function __construct(){
    }

    //Get
    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getPresentation(){
        return $this->presentation;
    }

    public function getCourriel(){
        return $this->courriel;
    }

    public function getPseudo_twitter(){
        return $this->pseudo_twitter;
    }

    public function getLinkedin(){
        return $this->linkedin;
    }

    public function getSite_web(){
        return $this->site_web;
    }

    //Set

    public function setId(int $id){
        $this->id = $id;
    }

    public function setNom(string $nom){
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom){
        $this->prenom = $prenom;
    }

    public function setPresentation(string $presentation){
        $this->presentation = $presentation;
    }

    public function setCourriel(string $courriel){
        $this->courriel = $courriel;
    }

    public function setPseudo_twitter(string $pseudo_twitter){
        $this->pseudo_twitter = $pseudo_twitter;
    }

    public function setLinkedin(string $linkedin){
        $this->linkedin = $linkedin;
    }

    public function setSite_web(string $site_web){
        $this->site_web = $site_web;
    }

}

?>