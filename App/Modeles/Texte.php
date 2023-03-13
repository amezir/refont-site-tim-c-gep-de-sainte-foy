<?php
declare (strict_types = 1);
namespace App\Modeles;
use \PDO;
use App\App;

class Texte {

    private $id;
    private $titre;
    private $texte;
    private $epic;

    static function trouverTousTexte():array{
        $pdo = App::getPDO();
        $sql = "SELECT * FROM textes";
        $requete = $pdo->prepare($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS, Texte::class);
        $requete->execute();
        $textes = $requete->fetchAll();
        return $textes;
    }

    public function __construct(){
    }

    //GET
    public function getId(){
        return $this->id;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function getTexte(){
        return $this->texte;
    }

    public function getEpic(){
        return $this->epic;
    }

    //SET

    public function setId($id){
        $this->id = $id;
    }

    public function setTitre($titre){
        $this->titre = $titre;
    }

    public function setTexte($texte){
        $this->texte = $texte;
    }

    public function setEpic($epic){
        $this->epic = $epic;
    }

}

?>