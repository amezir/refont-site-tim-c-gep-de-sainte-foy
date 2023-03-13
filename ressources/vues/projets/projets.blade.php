@extends('gabarit')
@section('contenu')

<section class="first-section">
<h1 data-aos="fade-right" data-aos-duration="800">LES <span>PROJETS</span> <br> ETUDIANTS TIM</h1>
<p data-aos="fade-right" data-aos-duration="1000">Découvrez un aperçu des projets d'étudiants !</p>
</section>

<section class="projets-main" id="projets">
<div class="filtre-ctn">
<form action="" method="GET" class="filtre-form">
    <input type="hidden" name="controleur" value="projets"></input>
    <input type="hidden" name="action" value="filtre"></input>
    <div>
        <label for="Année 1" class="cont">Année 1
            <input type="checkbox" name="annee[1]" value="1"<?php if(isset($_GET['annee'][1])) echo 'checked'; ?>></input></label>
        <label for="Année 2" class="cont">Année 2
            <input type="checkbox" name="annee[2]" value="2"<?php if(isset($_GET['annee'][2])) echo 'checked'; ?>></input></label>
        <label for="Année 3" class="cont">Année 3
            <input type="checkbox" name="annee[3]" value="3"<?php if(isset($_GET['annee'][3])) echo 'checked'; ?>></input></label>
    </div>
<br>
<div>
    <label for="Médias" class="cont">Médias
        <input type="checkbox" name="categorie[4]" value="4"<?php if(isset($_GET['categorie'][4])) echo 'checked'; ?>></input></label>
    <label for="Conception" class="cont">Conception
        <input type="checkbox" name="categorie[3]" value="3"<?php if(isset($_GET['categorie'][3])) echo 'checked'; ?>></input></label>
    <label for="Programmation" class="cont">Programmation
        <input type="checkbox" name="categorie[1]" value="1"<?php if(isset($_GET['categorie'][1])) echo 'checked'; ?>></input></label>
    <label for="Intégration" class="cont">Intégration
        <input type="checkbox" name="categorie[2]" value="2"<?php if(isset($_GET['categorie'][2])) echo 'checked'; ?>></input></label>
    <label for="Autres" class="cont">Autres
        <input type="checkbox" name="categorie[5]" value="5"<?php if(isset($_GET['categorie'][5])) echo 'checked'; ?>></input></label>
    
</div>
<br>
<input type="submit" value="Filtrer">
<br>
@if (isset($_GET['action']) && $_GET['action'] == 'filtre')
    <a href="index.php?controleur=projets&action=projets">retour à la liste complète</a>
@endif
</form>
</div>

<div class="auto-grid">
    @foreach($projets as $projet)
<a href="index.php?controleur=projets&action=projets_details&id={{$projet->getId()}}">
<div>
    <img src="liaisons/images/RPNI4_Images projets/{{$projet->getDiplomeAssocie()->getId()}}_prj{{$projet->getId()}}_01.png" alt="image projet">
    <h2>
        {{$projet->getTitre()}}
    </h2>
    <p>
        @foreach ($diplomes as $diplome)
            @if ($diplome->getId() == $projet->getDiplomeId())
                {{$diplome->getNom()}} {{$diplome->getPrenom()}}
            @endif
        @endforeach
    </p>


</div>

    @endforeach

    @if (empty($projets))
        <p class="projet-erreur">Aucun projet ne correspond à votre recherche  <i class="fa-regular fa-face-sad-tear"></i></p>
    @endif
</a>
</div>
<br>
<div class="pagination">


@for ($i = 0; $i < $nbpages; $i++)
@if ($i == $nopage-1)
    <a href="<?php echo url($i+1)?>" class="active">
        {{$i+1}}
    </a>
@else
<a href="<?php echo url($i+1)?>">
    {{$i+1}}
</a>
@endif

@endfor


</div>
<?php
function url($numpage){
    $url = 'index.php?controleur=projets&action=filtre';
    $url .= '&numpages=' . $numpage;
    if(isset($_GET['annee'])){
        foreach($_GET['annee'] as $key => $value){
            $url .= '&annee['.$key.']='.$value;
        }
    }
    if(isset($_GET['categorie'])){
        foreach($_GET['categorie'] as $key => $value){
            $url .= '&categorie['.$key.']='.$value;
        }
    }
    return $url;
}
    ?>
</section>


@endsection