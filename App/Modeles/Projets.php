<?php
declare (strict_types = 1);
namespace App\Modeles;
use \PDO;
use App\App;

class Projets {
    
        private $id;
        private $titre;
        private $technologies;
        private $description;
        private $url;
        private $est_expose_galerie;
        private $diplome_id;
        private $cour_id;
        private $categorie_id;
    
        static function trouverTousProjets():array{
            $pdo = App::getPDO();
            $sql = "SELECT * FROM projets";
            $requete = $pdo->prepare($sql);
            $requete->setFetchMode(PDO::FETCH_CLASS, Projets::class);
            $requete->execute();
            $projets = $requete->fetchAll();
            return $projets;
        }

        static function trouverDerniersProjets():array{
            $pdo = App::getPDO();
            $sql = "SELECT * FROM projets ORDER BY id DESC LIMIT 3";
            $requete = $pdo->prepare($sql);
            $requete->setFetchMode(PDO::FETCH_CLASS, Projets::class);
            $requete->execute();
            $projets = $requete->fetchAll();
            return $projets;
        }
        
        static function Filtre($categorie,$debut,$fin, $page, $number_of_result):array{

            $results_per_page = 9;
            $page_first_result = ($page-1)*$results_per_page;

            $pdo = App::getPDO();
            $sql = "SELECT projets.*, categories_cours.categorie_id, categories_cours.cour_id FROM projets INNER JOIN categories_cours ON categories_cours.cour_id = projets.cours_id WHERE categories_cours.categorie_id IN $categorie AND projets.cours_id BETWEEN $debut AND $fin GROUP BY projets.id LIMIT  " . $page_first_result . ',' . $results_per_page ;
            $requete = $pdo->prepare($sql);
            $requete->setFetchMode(PDO::FETCH_CLASS, Projets::class);
            $requete->execute();
            $projets = $requete->fetchAll();
            return $projets;
        }
    
        static function trouverProjetParId(int $id): Projets{
            $pdo = App::getPDO();
            $sql = "SELECT * FROM projets WHERE id = :id";
            $requete = $pdo->prepare($sql);
            $requete->setFetchMode(PDO::FETCH_CLASS, Projets::class);
            $requete->bindParam(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            $projet = $requete->fetch();
            return $projet;
        }

        static function nombreProjets( $categorie, $debut, $fin):int{
            $pdo = App::getPDO();
            $sql = "SELECT * FROM projets INNER JOIN categories_cours ON categories_cours.cour_id = projets.cours_id WHERE categories_cours.categorie_id IN $categorie AND projets.cours_id BETWEEN $debut AND $fin GROUP BY projets.id";
            $requete = $pdo->prepare($sql);
            $requete->setFetchMode(PDO::FETCH_CLASS, Projets::class);
            $requete->execute();
            $number_of_result= $requete->fetchALL();
            $number_of_result = count($number_of_result);
            return $number_of_result;
        }

        public function getDiplomeAssocie():Diplomes{
            $diplome = Diplomes::trouverDiplomeParId((int)$this->diplome_id);
            return $diplome;
        }

        public function getProjetAssocie():Diplomes{
            $projet = Diplomes::trouverDiplomeParId((int)$this->diplome_id);
            return $projet;
        }


        static function trouverAutresProjets($id,$diplome_id){
            $pdo = App::getPDO();
            $sql = "SELECT * FROM projets WHERE id != $id AND diplome_id = $diplome_id";
            $requete = $pdo->prepare($sql);
            $requete->setFetchMode(PDO::FETCH_CLASS, Projets::class);
            $requete->execute();
            $projet = $requete->fetchAll();
            return $projet;
        }



        public function __construct(){
        }
    
        //Get
        public function getId(){
            return $this->id;
        }

        public function getTitre(){
            return $this->titre;
        }

        public function getTechnologies(){
            return $this->technologies;
        }

        public function getDescription(){
            return $this->description;
        }

        public function getUrl(){
            return $this->url;
        }

        public function getEstExposeGalerie(){
            return $this->est_expose_galerie;
        }

        public function getDiplomeId(){
            return $this->diplome_id;
        }

        public function getCourId(){
            return $this->cour_id;
        }

        public function getCategorieId(){
            return $this->categorie_id;
        }

        //Set

        public function setId(int $id){
            $this->id = $id;
        }

        public function setTitre(string $titre){
            $this->titre = $titre;
        }

        public function setTechnologies(string $technologies){
            $this->technologies = $technologies;
        }

        public function setDescription(string $description){
            $this->description = $description;
        }

        public function setUrl(string $url){
            $this->url = $url;
        }

        public function setEstExposeGalerie(int $est_expose_galerie){
            $this->est_expose_galerie = $est_expose_galerie;
        }

        public function setDiplomeId(int $diplome_id){
            $this->diplome_id = $diplome_id;
        }

        public function setCoursId(int $cour_id){
            $this->cours_id = $cour_id;
        }

        public function setCategorieId(int $categorie_id){
            $this->categorie_id = $categorie_id;
        }

}


?>