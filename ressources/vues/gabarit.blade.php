<!DOCTYPE html>
<html lang="fr-CA">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="keywords" content="Techniques d'intégration multimédia, TIM, TIM 2021, multimédia, DEC, Cégep, Cégep de Sainte-Foy, Cégep Ste-Foy, Web, CSS, HTML, Php, JavaScript, Technologies, Design, Conception, Programmation, Intégration, Informatique, Graphisme, création de sites webs, Traitement des médias, médias, Montage vidéo, Animation">


        <meta name="description" content="Le programme des Techniques d'intégration multimédia est une formation vivante et actuelle! Vous aimez relever des défis et les nouvelles technologies? Ce programme est fait pour vous!">

        <meta property="og:site_name" content="Techniques d'intégration multimédia - Web & Apps | TIM">
        <meta property="og:locale" content="fr_CA">
        <meta property="og:title" content="Techniques d'intégration multimédia - Web & Apps | TIM">
        <meta property="og:type" content="siteweb" />
        <meta property="og:image" content="">
        <meta property="og:url" content="">
        <meta property="og:description" content="Le programme des Techniques d'intégration multimédia est une formation vivante et actuelle! Vous aimez relever des défis et les nouvelles technologies? Ce programme est fait pour vous!">

        <meta name="author" content="Amézir Messaoud">

        <link rel="icon" type="icon" href="liaisons/images/favicon.ico">
        <link rel="stylesheet" href="liaisons/css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

          <!------ AOS ANIMATION ET FONTAWESOME--------->
    <script src="https://kit.fontawesome.com/092ffa659e.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <title>Techniques d&#039;intégration multimédia &#8211; Web &amp; Apps | TIM</title>

    </head>
    <body>
        <header >
            @include('fragments.entete')
        </header>

        <main>
            @yield('contenu')
        </main>

        <footer>
            @include('fragments.pieddepage')
        </footer>

    </body>
<script>
  AOS.init();
</script>
</html>
