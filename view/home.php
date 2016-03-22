<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bookworm</title>
  <script>
    WebFontConfig = {
      custom: {
        families: ['moon_light', 'moon_bold'],
        urls: ['assets/fonts/fonts.css']
      }
    };

    (function() {
      var wf = document.createElement('script');
      wf.src = 'js/vendor/webfontloader/webfontloader.js';
      wf.type = 'text/javascript';
      wf.async = 'true';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })();
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $basePath;?>/css/style.css"/>
</head>
<body>
  <div class="background-purple">
    <header>
      <h1 class="logo"><span>Boek.be</span></h1>
      <nav>
        <ul>
          <li class="nav-links active"><a href="/">Home</a></li>
          <li class="nav-links"><span>&nbsp;&#8226;</span><li>
          <li class="nav-links"><a href="/wedstrijd">Wedstrijd</a></li>
        </ul>
      </nav>

      <h2 class="title-top">Hitchhiker’s guide</h2>
      <h2 class="title-bottom">to the galaxy</h2>

      <section class="headerimage">

        <img src="assets/img/moon.png" width="200">
      </section>

    </header>
    <hr/>
  </div>

<div class="background-purple">
  <div class="container">

      <section class="part1">
        <div class="content-part1"><br/>
          <h1 class="title">KLASSIEKERS IN JE KLAS</h1>
          <p>Boek.be presenteert ‘Klassiekers in je klas’, een initiatief om klassieke boeken te promoten in het middelbaar   onderwijs. Ben jij een leerkracht Nederlands op een school in het secundair onderwijs en heb je zin om jouw leerlingen  kennis te laten maken met de klassiekers?</p>
        </div>
        <img src="assets/img/boek.png">
      </section>

      <section class="part2">
        <ul class="home-step">
          <li>
            <img src="assets/img/home-stap1.png">
            <h1 class="subtitle">Inschrijven</h1>
            <p>Stap één is de eenvoudigste stap. Jij schrijft als leerkracht
            Nederlands je klas in, wij sturen je een PDF-bestand met daarin het boek.
            </p>
          </li>

          <li>
            <img src="assets/img/home-stap2.png">
            <h1 class="subtitle">lezen, lezen, lezen</h1>
            <p>Hierna is het de bedoeling dat je volledige klas het boek uitleest. Je leerlingen maken allemaal een boekbespreking  die jullie klassikaal bespreken en samenvoegen tot één uiteindelijke boekbespreking.
            </p>
          </li>

          <li>
            <img src="assets/img/home-stap3.png">
            <h1 class="subtitle">Uploaden</h1>
            <p>Als je de boekbespreking hebt, is het tijd voor een leuke klasfoto! Verzamel de twee samen en upload ze hier. Elke   deelnemende klas krijgt zijn klasfoto op onze website te zien.
            </p>
          </li>
        </ul>

        <div>
          <button class="empty-white">Inschrijven</button>
        </div>
      </section>
  </div>
</div>

<div class="container2">
    <section class="part3">
      <hr class="border-part3" />
      <h3>Hitchhiker’s<br/> guide to the galaxy?</h3>
      <p>“The hitchhiker’s guide to the galaxy” is het eerste boek uit een reeks van vijf boeken uit de “Hitchhiker’s guide to the galaxy”-trilogie, geschreven door Douglas Adams, uitgebracht op 12 oktober 1979.</p>

      <div class="part3-content">
        <img src="assets/img/home-part3.png">
        <div>
          <h1 class="subtitle red">Klassieker?</h1>
          <p>The hitchhiker’s guide to the galaxy is een ware klassieker. Alleen al in de eerste drie maanden na het uitkomen van   het eerste boek uit de reeks, werden er al meer dan 250.000 exemplaren verkocht wereldwijd. Daarnaast won het boek ook nog  eens maar liefst vier verschillende awards!</p>
        </div>
      </div>

      <ul class="awards">
        <li>
          <img src="assets/svg/trofee.svg">
          <p>#1 Sunday Times best seller</p>
        </li>

        <li>
          <img src="assets/svg/trofee.svg">
          <p>“Golden Pan” 1.000.000 boeken verkocht</p>
        </li>

        <li>
          <img src="assets/svg/trofee.svg">
          <p>Nummer 24 in 'One Hundred Greatest Books of the Century'</p>
        </li>

        <li>
          <img src="assets/svg/trofee.svg">
          <p>BBC’s “big read”</p>
        </li>
      </ul>

      <div class="button">
        <button class="rounded-orange">lees een preview</button>
      </div>

      <div class="part3-content">
        <div>
          <h1 class="subtitle red">Wie is Douglas adams?</h1>
          <p>Douglas Adams (11 maart 1952 - 11 mei 2001) was een schrijver afkomstig uit het Verenigd Koninkrijk. Als schrijver staat hij het meest bekend om zijn trilogie van “The hitchhiker’s guide to the galaxy”. Daarnaast was hij ook nog bezig met comedy en drama, maar in veel mindere mate.<br/><br/>

          Naast het schrijven van boeken schreef hij ook vaker mee aan verhaallijnen voor films en series. Zo schreef hij bijvoorbeeld mee aan 3 verhalen uit de bekende Britse televisiereeks “Doctor Who?”</p>
        </div>
        <img src="assets/img/home-part3.1.png" >
      </div>

      <h2>Douglas adams: things you should know</h2>

      <ul class="douglas-items">
        <li>
          <h3>25 miljoen</h3>
          <p>Aantal verkochte boeken</p>
        </li>

        <li>
          <h4>34</h4>
          <p>Totaal aantal geschrevenwerken</p>
        </li>

        <li>
          <img src="assets/svg/towel.svg" width="70">
          <p>Annual towel day - een feestdag ter herinnering van douglas adams</p>
        </li>
      </ul>

    </section>
</div>

</body>
</html>

