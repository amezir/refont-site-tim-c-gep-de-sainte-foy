@extends('gabarit')
@section('contenu')

<section class="first-section">
<h1>NOUS <span>CONTACTER</span></h1>
</section>

<section class="destinataire-main">
<h1>Destinataires possibles</h1>
<br>
<div class="destinataire">
@foreach($responsables as $responsable)
<div class="card-responsables">
    <img src="../public/liaisons/images/responsable{{$responsable->getId()}}.jpg" alt="" width="300px"
height="325px" >
    <h2>{{$responsable->getNom()}} {{$responsable->getPrenom()}} </h2>
    <h3>Poste</h3>
    <p>{{$responsable->getResponsabilite()}} </p>
    <h3>Téléphone</h3>
    <p>{{$responsable->getTelephone()}} </p>
</div>
    
@endforeach    
</div>

</section>

<section class="contact-main" id="formulaire">
    <h2>NOUS <span class="rose">CONTACTER</span></h2>
    <br>


    <form class="soumission" action="index.php?controleur=message&action=insert" method="POST" onsubmit="return ();">
        <div class="ctnForm">
            <label for="nom">Nom et Prénom</label>
            <br>
            <input type="text" name="nom" id="nom" pattern="[a-zA-ZÀ-ÿ -]+"
            value="@if(isset($tValidation['nom']['valeur'])){{$tValidation['nom']['valeur']}}@endif" class="@if(isset($tValidation['nom']['erreur'])){{'erreur'}}@endif" >
            <p class="erreur__message">@if(isset($tValidation['nom']['erreur'])){!!html_entity_decode($tValidation['nom']['erreur'])!!}@endif</p>
        </div>
        <br>

        <div class="ctnForm">
            <label for="courriel">Courriel</label>
            <br>
            <input type="email" name="courriel" id="courriel" pattern="^[a-zA-Z0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,}$" value="@if(isset($tValidation['courriel']['valeur'])){{$tValidation['courriel']['valeur']}}@endif" class="@if(isset($tValidation['courriel']['erreur'])){{'erreur'}}@endif" >
            <p class="erreur__message">@if(isset($tValidation['courriel']['erreur'])){!!html_entity_decode($tValidation['courriel']['erreur'])!!}@endif</p>
        </div>
        <br>

        <div class="ctnForm">
            <label for="destinataire">Destinataires</label>
            <br>
            <select id="responsable_id" name="responsable_id"  class="@if(isset($tValidation['responsable_id']['erreur'])){{'erreur'}}@endif">
                <option value="" disabled selected>Choisir un destinataire</option>
                <option @if(isset($tValidation['responsable_id']['valeur']) && $tValidation['responsable_id']['valeur'] == '1') {{'selected'}} @endif value="1">Sylvain Lamoureux (Coordonnateur départemental)</option>
                <option @if(isset($tValidation['responsable_id']['valeur']) && $tValidation['responsable_id']['valeur'] == '2') {{'selected'}} @endif value="2">Ève Février (Webmestre)</option>
                <option @if(isset($tValidation['responsable_id']['valeur']) && $tValidation['responsable_id']['valeur'] == '3') {{'selected'}} @endif value="3">Pascal Larose (Responsable des stages)</option>
                <option @if(isset($tValidation['responsable_id']['valeur']) && $tValidation['responsable_id']['valeur'] == '4') {{'selected'}} @endif value="4">Benoît Frigon (Responsable "Étudiant d’un jour")</option> </select>
        <p class="erreur__message">@if(isset($tValidation['destinataire']['erreur'])){!!html_entity_decode($tValidation['destinataire']['erreur'])!!}@endif</p>
        </div>
        <br>

        <div class="ctnForm">
            <label for="sujet">Sujet</label>
            <br>
            <input type="text" name="sujet" id="sujet" pattern="[a-zA-ZÀ-ÿ0-9 \-]+" value="@if(isset($tValidation['sujet']['valeur'])){{$tValidation['sujet']['valeur']}}@endif" class="@if(isset($tValidation['sujet']['erreur'])){{'erreur'}}@endif" >
            <p class="erreur__message">@if(isset($tValidation['sujet']['erreur'])){!!html_entity_decode($tValidation['sujet']['erreur'])!!}@endif</p>
        </div>
        <br>

        <div class="ctnForm">
            <label for="message">Message</label>
            <br>
            <textarea name="message" id="message" class="@if(isset($tValidation['message']['erreur'])){{'erreur'}}@endif">@if(isset($tValidation['message']['valeur'])){{$tValidation['message']['valeur']}}@endif</textarea>
            <p class="erreur__message">@if(isset($tValidation['message']['erreur'])){!!html_entity_decode($tValidation['message']['erreur'])!!}@endif</p>
        </div>
        <br>

        <div id="input-telephone" class="ctnForm">
            <div class="">
            <label for="telephone">Téléphone</label>
            <br>
            <input type="text" name="telephone" id="telephone" pattern="^\([0-9]{3}\) [0-9]{3}\-[0-9]{4}$" value="@if(isset($tValidation['telephone']['valeur'])){{$tValidation['telephone']['valeur']}}@endif" class="@if(isset($tValidation['telephone']['erreur'])){{'erreur'}}@endif">
                <p class="erreur__message">@if(isset($tValidation['telephone']['erreur'])){!!html_entity_decode($tValidation['telephone']['erreur'])!!}@endif</p>
            </div>
            <br>
<div class="ctnForm">
    <input type="checkbox" name="consentement" id="consentement"  @if(isset($tValidation['consentement']['valeur'])) {{'checked'}} @endif> Autorisez-vous le partage de ce numéro?
    <p class="erreur__message">@if(isset($tValidation['consentement']['erreur'])){!!html_entity_decode($tValidation['consentement']['erreur'])!!}@endif</p>
    <br>
</div>

        </div>
        <input type="submit" name="envoyer" id="envoyer "value="Envoyer">
    </form>
</section>

<script src="liaisons/js/validations.js"></script>
@endsection
