@extends('gabarit')
@section('contenu')

<section class="formation-ctn-all">

<section class="first-section">
<h1 data-aos="fade-right" data-aos-duration="800">Tout sur la <br> formation <span>TIM!</span></h1>
</section>

<section class="info-formation-ctn">
    <div>
@foreach($textes as $texte)
    @if($texte->getId() == 52)
{!!$texte->getTexte()!!}
    @endif
@endforeach
    </div>
    <div>
@foreach($textes as $texte)
    @if($texte->getId() == 51)
{!!$texte->getTexte()!!}
    @endif
@endforeach
    </div>
</section>

<section>
    <div class="formation">
        @foreach($textes as $texte)
            @if($texte->getId() == 53)
        {!!$texte->getTexte()!!}
            @endif
        @endforeach
        <div>
@foreach($textes as $texte)
    @if($texte->getId() == 54)
{!!$texte->getTexte()!!}
    @endif
@endforeach

@foreach($textes as $texte)
    @if($texte->getId() == 55)
{!!$texte->getTexte()!!}
    @endif
@endforeach

@foreach($textes as $texte)
    @if($texte->getId() == 56)
{!!$texte->getTexte()!!}
    @endif
@endforeach
        </div>
    </div>
</section>

<section class="axes-ctn">
<h2><span>Axes</span> de la formation</h2>
<div class="axes-info">
    <div class="axes-info-ctn">
    <div>
        <img src="liaisons/images/conception.jpg" alt="">
        <br>
@foreach($textes as $texte)
    @if($texte->getId() == 57)
{!!$texte->getTexte()!!}
    @endif
@endforeach
    </div>
    <div>
        <img src="liaisons/images/intégration.jpg" alt="">
        <br>
@foreach($textes as $texte)
    @if($texte->getId() == 58)
{!!$texte->getTexte()!!}
    @endif
@endforeach
    </div>
    </div>
    @foreach($textes as $texte)
    @if($texte->getId() == 59)
{!!$texte->getTexte()!!}
    @endif
@endforeach
</div>

<div class="axes-formation">

<div class="axes-formation-div-l" data-aos="fade-up" data-aos-duration="800">
<canvas id="doughnutInsta">
    </canvas>
</div>

<div class="axes-formation-div-r" data-aos="fade-up" data-aos-duration="800">
<div class="slideshow-container-axes">
    @foreach($textes as $texte)
    @if($texte->getId() == 60)
{!!$texte->getTexte()!!}
    @endif
@endforeach

    @foreach($textes as $texte)
    @if($texte->getId() == 61)
{!!$texte->getTexte()!!}
    @endif
@endforeach

    @foreach($textes as $texte)
    @if($texte->getId() == 62)
{!!$texte->getTexte()!!}
    @endif
@endforeach

    @foreach($textes as $texte)
    @if($texte->getId() == 63)
{!!$texte->getTexte()!!}
    @endif
@endforeach

    @foreach($textes as $texte)
    @if($texte->getId() == 64)
{!!$texte->getTexte()!!}
    @endif
@endforeach
<div class="dot-container-axes">
        <span class="dot-axes" onclick="currentSlide(1)"></span>
        <span class="dot-axes" onclick="currentSlide(2)"></span>
        <span class="dot-axes" onclick="currentSlide(3)"></span>
        <span class="dot-axes" onclick="currentSlide(4)"></span>
        <span class="dot-axes" onclick="currentSlide(5)"></span>
    </div>
</div>

</div>

</div>
</section>

<section class="cour-ctn">
    <div>
        <h2>Grille de <span>cours</span></h2>
            @foreach($textes as $texte)
                @if($texte->getId() == 67)
                    {!!$texte->getTexte()!!}
                @endif
            @endforeach
    </div>
    <div class="cours-slider" >
    <div class="slideshow-container-cours" data-aos="fade-up" data-aos-duration="800">
@foreach($textes as $texte)
    @if($texte->getId() == 68)
{!!$texte->getTexte()!!}
    @endif
@endforeach

@foreach($textes as $texte)
    @if($texte->getId() == 69)
{!!$texte->getTexte()!!}
    @endif
@endforeach

@foreach($textes as $texte)
    @if($texte->getId() == 70)
{!!$texte->getTexte()!!}
    @endif
@endforeach

@foreach($textes as $texte)
    @if($texte->getId() == 71)
{!!$texte->getTexte()!!}
    @endif
@endforeach

@foreach($textes as $texte)
    @if($texte->getId() == 72)
{!!$texte->getTexte()!!}
    @endif
@endforeach

@foreach($textes as $texte)
    @if($texte->getId() == 73)
{!!$texte->getTexte()!!}
    @endif
@endforeach
    </div>
    <div class="dot-container-cours">
        <span class="dot-cours" onclick="currentSlideCours(1)"></span>
        <span class="dot-cours" onclick="currentSlideCours(2)"></span>
        <span class="dot-cours" onclick="currentSlideCours(3)"></span>
        <span class="dot-cours" onclick="currentSlideCours(4)"></span>
        <span class="dot-cours" onclick="currentSlideCours(5)"></span>
        <span class="dot-cours" onclick="currentSlideCours(6)"></span>
    </div>

    <a href="https://www.csfoy.ca/programmes/tous-les-programmes/programmes-techniques/techniques-dintegration-multimedia-web-et-apps/#grille-cours" class="btn-secondaire">En savoir plus sur les cours</a>

    </div>
</section>

<section class="taff-ctn">
    <h2>Les métiers <span>après</span> TIM</h2>

    <h3>Marché du travail</h3>
    <p class="p-main">Professions</p>

<div class="acc-ctn">

    <button class="accordion">intégrateur</button>
        <div class="panel">
            @foreach($textes as $texte)
                @if($texte->getId() == 74)
                    {!!$texte->getTexte()!!}
                @endif
            @endforeach
        </div>

    <button class="accordion">programmeur</button>
        <div class="panel">
            @foreach($textes as $texte)
                @if($texte->getId() == 75)
                    {!!$texte->getTexte()!!}
                @endif
            @endforeach
        </div>

    <button class="accordion">concepteur</button>
        <div class="panel">
            @foreach($textes as $texte)
                @if($texte->getId() == 76)
                    {!!$texte->getTexte()!!}
                @endif
            @endforeach

        </div>

</div>

<div class="type-em-ctn">
    <h2>Type d'employeurs</h2>
<div class="type-em">
 
<div>
@foreach($textes as $texte)
    @if($texte->getId() == 77)
{!!$texte->getTexte()!!}
    @endif
@endforeach
</div>

<div class="type-em-all">

    <div class="type-em-t">
       @foreach ($textes as $texte)
            @if($texte->getId() == 78)
                {!!$texte->getTexte()!!}
            @endif
        @endforeach

    </div>

    <div class="type-em-b">
        @foreach ($textes as $texte)
            @if($texte->getId() == 79)
                {!!$texte->getTexte()!!}
            @endif
        @endforeach
    </div>

</div>

</div>   


</div>

</section>

<div class="pgr-univ">
    <h2>Programmes universitaires</h2>
    @foreach($textes as $texte)
        @if($texte->getId() == 80)
            {!!$texte->getTexte()!!}
        @endif
    @endforeach


<section class="pgr-univ-ctn">
    <div>
        @foreach($textes as $texte)
            @if($texte->getId() == 81)
                {!!$texte->getTexte()!!}
            @endif
        @endforeach
    </div>
    <div>
        @foreach($textes as $texte)
            @if($texte->getId() == 82)
                {!!$texte->getTexte()!!}
            @endif
        @endforeach
    </div>
</section>
</div>
<section class="pgr-univ-more">
@foreach($textes as $texte)
    @if($texte->getId() == 83)
        {!!$texte->getTexte()!!}
    @endif
@endforeach

<a href="https://www.csfoy.ca/index.php?id=4970">En savoir plus sur les ententes universitaires <i class="fas fa-external-link-alt"></i></a>
</section>


    
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="liaisons/js/slider_axes.js"></script>
<script src="liaisons/js/slider_cours.js"></script>
<script src="liaisons/js/accordion.js"></script>
<script src="liaisons/js/graph.js"></script>
@endsection
