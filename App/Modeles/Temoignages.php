<?php
declare (strict_types = 1);
namespace App\Modeles;
use \PDO;
use App\App;

class Temoignages {

private $id;
private $temoin;
private $titre_poste;
private $entreprise;
private $url_entreprise;
private $temoignage;
private $annee_diplomation;

static function trouverTousTemoignages():array{
    $pdo = App::getPDO();
    $sql = "SELECT * FROM temoignages";
    $requete = $pdo->prepare($sql);
    $requete->setFetchMode(PDO::FETCH_CLASS, Temoignages::class);
    $requete->execute();
    $temoignages = $requete->fetchAll();
    return $temoignages;

}

// Get
public function getId(){
    return $this->id;
}

public function getTemoignage(){
    return $this->temoignage;
}

public function getTemoin(){
    return $this->temoin;
}

public function getTitrePoste(){
    return $this->titre_poste;
}

public function getEntreprise(){
    return $this->entreprise;
}

public function getUrlEntreprise(){
    return $this->url_entreprise;
}

public function getAnneeDiplomation(){
    return $this->annee_diplomation;}

// Set
public function setId(int $id){
    $this->id = $id;
}

public function setTemoignage(string $temoignage){
    $this->temoignage = $temoignage;
}

public function setTemoin(string $temoin){
    $this->temoin = $temoin;
}

public function setTitrePoste(string $titre_poste){
    $this->titre_poste = $titre_poste;
}

public function setEntreprise(string $entreprise){
    $this->entreprise = $entreprise;
}

public function setUrlEntreprise(string $url_entreprise){
    $this->url_entreprise = $url_entreprise;
}

public function setAnneeDiplomation(int $annee_diplomation){
    $this->annee_diplomation = $annee_diplomation;
}

}

?>