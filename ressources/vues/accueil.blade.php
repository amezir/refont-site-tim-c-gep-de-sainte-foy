@extends('gabarit')
@section('contenu')

<section class="first-section">
<h1 data-aos="fade-right" data-aos-duration="800">Techniques<br>
d'intégration <span>multimédia</span></h1>
<p data-aos="fade-right" data-aos-duration="1000">Cégep de sainte-foy</p>
<a class="btn-secondaire" href="index.php?controleur=site&action=accueil#tim" data-aos="fade-right" data-aos-duration="1400">EN SAVOIR PLUS</a>
</section>

<section class="accueil-ctn-all">


<section id="tim">
    <div class="accueil">
    @foreach($textes as $texte)
        @if($texte->getId() == 46)
    {!!$texte->getTexte()!!}
        @endif
    @endforeach
</div>
</section>

<section class="accueil-pgr-ctn">
    <div class="accueil-pgr">
        @foreach($textes as $texte)
            @if($texte->getId() == 48)
        {!!$texte->getTexte()!!}
            @endif
        @endforeach

        <div class="auto-grid-pgr">
            @foreach($textes as $texte)
                @if($texte->getId() == 49)
            {!!$texte->getTexte()!!}
                @endif
            @endforeach
        </div>

        @foreach($textes as $texte)
            @if($texte->getId() == 50)
        {!!$texte->getTexte()!!}
            @endif
        @endforeach

    </div>
</section>


<section class="accueil-edj-ctn">

    <div>
        @foreach($textes as $texte)
            @if($texte->getId() == 47)
        {!!$texte->getTexte()!!}
            @endif
        @endforeach
        <br>
        <a href="index.php?controleur=message&action=creer" class="btn-secondaire" data-aos="fade-up" data-aos-duration="800">Contacte Benoît Frigon pour en savoir plus.</a>
    </div>

    <div class="accueil-edj-img">
        
        <div>
            <img src="liaisons/images/accueil-edj-img1.png" alt="image">
        </div>

        <div>
            <img src="liaisons/images/accueil-edj-img2.png" alt="image">
        </div>

    </div>

</section>

<section class="accueil-projets-ctn">
<h2>Des <span>projets</span> réalisés par</h2>
<h2>nos étudiants</h2>

<div class="auto-grid">
@foreach($projets as $projet)
<a href="index.php?controleur=projets&action=projets_details&id={{$projet->getId()}}" data-aos="fade-up" data-aos-duration="800">
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
</a>
    @endforeach

</div>
<a href="index.php?controleur=projets&action=projets" class="btn-secondaire" >VOIR TOUS LES PROJETS</a>
</section>

<section class="temoignages-ctn">
<h2>témoignages</h2>
<h3>Ce que <span>nos étudiants</span> disent de la <span>TIM</span>.</h3>
<div class="slideshow-container">

@foreach($temoignages as $temoignage)
<div class="mySlides">


    <div class="mySlides-ctn" data-aos="fade-up" data-aos-duration="800">
        <div>
            <img src="liaisons/images/photod_temoignages_diplomees/photos_diplomee_{{$temoignage->getId()}}.jpg" alt="Image des diplomes">
        </div>
        <div>
            <p>
                {{$temoignage->getTemoignage()}}
            </p>
            <br>
            <p class="author"> {{$temoignage->getTemoin()}}</p>
            <p>{{$temoignage->getTitrePoste()}} <a href="{{$temoignage->getUrlEntreprise()}}">{{$temoignage->getEntreprise()}}</a></p>
            <p>{{$temoignage->getAnneeDiplomation()}}</p>
        </div>
    </div>

</div>
@endforeach

</div>

    <div class="dot-container">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
        <span class="dot" onclick="currentSlide(6)"></span>
    </div>
</section>

</section>
<script src="liaisons/js/slider_temoignages.js"></script>
@endsection