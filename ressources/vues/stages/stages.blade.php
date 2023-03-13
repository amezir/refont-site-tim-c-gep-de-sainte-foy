@extends('gabarit')
@section('contenu')

<section class="first-section">
<h1 data-aos="fade-right" data-aos-duration="800">EN SAVOIR PLUS <br> SUR LES <span>STAGES</span></h1>
</section>

<section class="stg-ctn-all">



<section>
<div class="stg-banner">
    <h2>Futur.e.s étudiant.e.s</h2>
</div>

<div class="stg-ctn">
    <img src="liaisons/images/NIK_9336_4000px.png" alt="">
    @foreach($textes as $texte)
    @if($texte->getId() == 42)
    {!!$texte->getTexte()!!}
    @endif
    @endforeach
</div>

</section>

<section class="stg-info-more">

<div data-aos="fade-up" data-aos-duration="1000">
@foreach($textes as $texte)
    @if($texte->getId() == 43)
    {!!$texte->getTexte()!!}
    @endif
@endforeach
</div>

<div data-aos="fade-up" data-aos-duration="1500">

@foreach($textes as $texte)
    @if($texte->getId() == 44)
    {!!$texte->getTexte()!!}
    @endif
@endforeach

</div>

</section>


<section class="stage">

<section class="empl">

<div class="employeur">
    <h2>Employeurs</h2>
</div>
<div class="employeur-ctn">
<img src="liaisons/images/employeurs.png" alt="">

<div class="employeur-ctn-one" data-aos="fade-up" data-aos-duration="800">
@foreach($textes as $texte)
    @if($texte->getId() == 45)
    {!!$texte->getTexte()!!}
    <br>
    <a href="liaisons/doc/profilCompetences_2023.pdf" class="btn-secondaire">  profil des compétences</a>
        @endif
@endforeach
</div>
</div>
</section>

</section>

<section class="stg-cntc">
    <div>
        @foreach($textes as $texte)
            @if($texte->getId() == 85)
            {!!$texte->getTexte()!!}
            @endif
        @endforeach
    </div>
    <div>
        @foreach($textes as $texte)
            @if($texte->getId() == 86)
            {!!$texte->getTexte()!!}
            @endif
        @endforeach
    </div>
</section>
@endsection
