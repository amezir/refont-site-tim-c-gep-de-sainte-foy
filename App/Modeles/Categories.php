<?php
declare (strict_types = 1);
namespace App\Modeles;
use \PDO;
use App\App;

class Categories{

    private $id;
    private $nom;

    static function trouverToutCategorie():array{
            $pdo = App::getPDO();
            $sql = "SELECT * FROM categorie INNER JOIN categories_cours ON categories_cours.categorie_id = categorie.id GROUP BY categorie.id ORDER BY categorie.nom";
            $requete = $pdo->prepare($sql);
            $requete->setFetchMode(PDO::FETCH_CLASS, Categories::class);
            $requete->execute();
            $categorie = $requete->fetchAll();
            return $categorie;
        }

    public function __construct(){
    }

    static function trouverCategorieParProjets(int $id):array{
        $pdo = App::getPDO();
        $sql = "SELECT * FROM categorie INNER JOIN categories_cours ON categories_cours.categorie_id = categorie.id WHERE categories_cours.cour_id = :id";
        $requete = $pdo->prepare($sql);
        $requete -> bindParam(':id', $id, PDO::PARAM_INT);
        $requete-> execute();
        $categorie = $requete->fetchAll();
        return $categorie;
    }



        //Get
        public function getId(){
            return $this->id;
        }
    
        public function getNom(){
            return $this->nom;
        }
    
        //Set
        public function setId($id){
            $this->id = $id;
        }
    
        public function setNom($nom){
            $this->nom = $nom;
        }
    }
?>