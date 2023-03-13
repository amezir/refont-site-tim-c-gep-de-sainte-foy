@extends('gabarit')

@section('contenu')

<section class="second-section">
    <h1 data-aos="fade-right" data-aos-duration="800">à propos</h1>
</section>

<section class="apropos-ctn">
    <div>
            <h2>mentions légales</h2>
    @foreach($textes as $texte)
        @if($texte->getId() == 65)
    {!!$texte->getTexte()!!}
        @endif
    @endforeach
    </div>

    <div>
        <h2>à propos</h2>

@foreach($textes as $texte)
    @if($texte->getId() == 66)
{!!$texte->getTexte()!!}
    @endif
@endforeach
    </div>

</section>

@endsection

