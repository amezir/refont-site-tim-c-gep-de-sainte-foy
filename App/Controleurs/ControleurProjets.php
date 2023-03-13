<?php

declare (strict_types = 1);
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Projets;
use App\Modeles\Diplomes;
use App\Modeles\Categories;


class ControleurProjets
{
    public function __construct()
    {
    }

    public function projets(): void
    {
        $nopage = $_GET['numpages'] ?? 1;
        $nbprojets = Projets::nombreProjets("(1,2,3,4,5)",1,24);
        $diplomes = Diplomes::trouverTousDiplomes();
        $categorie = Categories::trouverToutCategorie();
        $projets = Projets::Filtre("(1,2,3,4,5)",1,24,1,$nbprojets);
        $tDonnees = array("projets"=>$projets, "diplomes"=>$diplomes,"nbprojets"=>$nbprojets, "nbpages"=>ceil ($nbprojets / 9), "categorie"=>$categorie, "nopage"=>$nopage);
        echo App::getBlade()->run('projets.projets',$tDonnees);
    }
    
    public function filtre(): void
    {
        $nopage = $_GET['numpages'] ?? 1;

        $categorie = isset($_GET['categorie']) ? (is_array($_GET['categorie']) ? '(' . implode(',', $_GET['categorie']) . ')' : '(' . $_GET['categorie'] . ')') : '(1, 2, 3, 4, 5)';

        

        $debut = 1;
        $fin = 24;
        if (isset($_GET['annee'])) {
            $debut = 1;
            $fin = 0;
            if(gettype($_GET['annee']) != 'string'){
                foreach($_GET['annee'] as $annee){
                    switch($annee){
                        case 1:
                            $debut = min(1, $debut);
                            $fin = max(9, $fin);
                            break;
                        case 2:
                            $debut = min(10, $debut);
                            $fin = max(17, $fin);
                            break;
                        case 3:
                            $debut = min(18, $debut);
                            $fin = max(24, $fin);
                            break;
                        default:
                            $debut = 1;
                            $fin = 24;
                            break;
                    }
                }
            }
            else{
                $debut = 1;
                $fin = 24;
            }
        }
        $nbprojets = Projets::nombreProjets($categorie,$debut,$fin);
        $diplomes = Diplomes::trouverTousDiplomes();
        $projets = Projets::Filtre($categorie,$debut,$fin,$nopage,$nbprojets);
        $categorie = Categories::trouverToutCategorie();
        $tDonnees = array("projets"=>$projets , "diplomes"=>$diplomes,"nbprojets"=>$nbprojets, "nbpages"=>ceil ($nbprojets / 9), "categorie"=>$categorie, "nopage"=>$nopage);
        echo App::getBlade()->run('projets.projets',$tDonnees);
    }

    public function projets_details(): void
    {
        $id = (int) isset($_GET['id']) ? $_GET['id'] : 1;
        $projet = Projets::trouverProjetParId((int)$id);
        $projets= Projets::trouverAutresProjets($_GET['id'], $projet->getDiplomeAssocie()->getId());
        $tDonnees = array("projet"=>$projet, "projets"=>$projets);
        echo App::getBlade()->run('projets_details.index',$tDonnees);
    }

    public function envoyerCourriel():void
    {
        $id_diplome= $_GET['id'];
        $diplome = Diplomes::trouverDiplomeParId((int)$id_diplome);
        header ("Location: mailto:" .$diplome ->getCourriel() ."");
        exit();
    }

}

?>