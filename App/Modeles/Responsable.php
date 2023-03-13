<?php
declare (strict_types = 1);
namespace App\Modeles;
use \PDO;
use App\App;

class Responsable{
    private $id;
    private $responsabilite;
    private $courriel;
    private $prenom;
    private $nom;
    private $telephone;

    static function trouverTousResponsable():array{
        $pdo = App::getPDO();
        $sql = "SELECT * FROM responsables";
        $requete = $pdo->prepare($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS, Responsable::class);
        $requete->execute();
        $responsables = $requete->fetchAll();
        return $responsables;
    }

    public function __construct(){
    }

    //GET
    public function getId(){
        return $this->id;
    }

    public function getResponsabilite(){
        return $this->responsabilite;
    }

    public function getCourriel(){
        return $this->courriel;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getTelephone(){
        return $this->telephone;
    }

    //SET

    public function setId($id){
        $this->id = $id;
    }

    public function setResponsabilite($responsabilite){
        $this->responsabilite = $responsabilite;
    }

    public function setCourriel($courriel){
        $this->courriel = $courriel;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }

}
?>