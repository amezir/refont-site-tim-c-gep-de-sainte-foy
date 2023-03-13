@extends('gabarit')
@section('contenu')

<section class="second-section">
<h1 data-aos="fade-down" data-aos-duration="800">{{$projet->getTitre()}}</h1>
<p data-aos="fade-down" data-aos-duration="1000">Réalisé par <span><a href="http://localhost/rpni-4-2023-messaoud-amezir/projet_mvc_depart/public/index.php?controleur=projets&action=projets_details&id={{$projet-> getId()}}#diplome">{{$projet->getDiplomeAssocie()->getNom()}} {{$projet->getDiplomeAssocie()->getPrenom()}}</a></span>
Avec {!!$projet->getTechnologies()!!}</p>
</section>
<div class="breadcrumbs">
    <a href="http://localhost/rpni-4-2023-messaoud-amezir/projet_mvc_depart/public/index.php?controleur=projets&action=projets">Projets</a> > <a href="http://localhost/rpni-4-2023-messaoud-amezir/projet_mvc_depart/public/index.php?controleur=projets&action=projets_details&id={{$projet-> getId()}}">{{$projet->getTitre()}}</a> 
</div>

<section class="projets-details-main">
<div class="main-projets-info">
<div >
    <img src="liaisons/images/RPNI4_Images projets/{{$projet->getDiplomeAssocie()->getId()}}_prj{{$projet->getId()}}_01.png" alt="image du projet">
</div>
<div>
    {!!$projet->getDescription()!!}
</div>
</div>
<h2>Autres Images</h2>

<div class="auto-grid-img">

@for($i = 2; $i <= 4; $i++)

            @if(file_exists("liaisons/images/RPNI4_Images projets/".$projet->getDiplomeAssocie()->getId()."_prj".$projet->getId()."_0".$i.".png"))
<div>
                    <img id="myImg{{$i-1}}" src="liaisons/images/RPNI4_Images projets/{{$projet->getDiplomeAssocie()->getId()}}_prj{{$projet->getId()}}_0{{$i}}.png" alt="Image {{$i}} du projet {{$projet->getTitre()}}"></div>
                @endif
@endfor
</div>

    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>
<br>
<h2 id="diplome">En savoir plus sur </h2>
<br>
<div class="more-info-diplomes" >
    <h2>{{$projet->getDiplomeAssocie()->getNom()}} {{$projet->getDiplomeAssocie()->getPrenom()}}</h2>
    <br>
    <p>
    {!!$projet->getDiplomeAssocie()->getPresentation()!!}
    </p>
    <br>
<div class="more-info-reseaux">

    <a href="{{$projet->getDiplomeAssocie()->getLinkedin()}} "><i class="fab fa-linkedin"></i></a>
    <a href="{{$projet->getDiplomeAssocie()->getSite_Web()}} "><i class="fas fa-globe"></i></a>
    <a href="index.php?controleur=projets&action=envoyerCourriel&id={{$projet->getDiplomeAssocie()->getId()}} "><i class="fas fa-envelope"></i></a>
</div>
    
</div>
<br>

<h3>Autres projets de {{$projet->getDiplomeAssocie()->getNom()}} {{$projet->getDiplomeAssocie()->getPrenom()}}</h3>

<div class="auto-grid">
@foreach($projets as $projet)
<a href="index.php?controleur=projets&action=projets_details&id={{$projet->getId()}}" data-aos="fade-up" data-aos-duration="800">
<div>
    <img src="liaisons/images/RPNI4_Images projets/{{$projet->getDiplomeAssocie()->getId()}}_prj{{$projet->getId()}}_01.png" alt="image projet">
    <h2>
        {{$projet->getTitre()}}
    </h2>
<p>{{$projet->getDiplomeAssocie()->getNom()}} {{$projet->getDiplomeAssocie()->getPrenom()}}</p>


</div>
</a>
    @endforeach
</div>
<br>
</section>
<script src="liaisons/js/img_modal.js"></script>
@endsection