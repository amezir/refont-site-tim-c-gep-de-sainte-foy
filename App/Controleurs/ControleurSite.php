<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Texte;
use App\Modeles\Projets;
use App\Modeles\Diplomes;
use App\Modeles\Temoignages;

class ControleurSite
{
    public function __construct()
    {
    }

    public function accueil(): void
    {
        $projets = Projets::trouverDerniersProjets();
        $diplomes = Diplomes::trouverTousDiplomes();
        $temoignages = Temoignages::trouverTousTemoignages();
        $textes = Texte::trouverTousTexte();
        $tDonnees = array("textes"=>$textes,"projets"=>$projets,"diplomes"=>$diplomes ,"temoignages"=>$temoignages);
        echo App::getBlade()->run('accueil',$tDonnees);
    }

    public function apropos():void
    {
        $textes = Texte::trouverTousTexte();
        $tDonnees = array("textes"=>$textes);
        echo App::getBlade()->run('apropos',$tDonnees);
    }

    public function stages(): void
    {
        $textes = Texte::trouverTousTexte();
        $tDonnees = array("textes"=>$textes);
        echo App::getBlade()->run('stages.stages',$tDonnees);
    }

    public function formation(): void
    {
        $textes = Texte::trouverTousTexte();
        $tDonnees = array("textes"=>$textes);
        echo App::getBlade()->run('formations.formation',$tDonnees);
    }
}

