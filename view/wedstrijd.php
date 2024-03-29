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
          <li class="nav-links"><a href="/">Home</a></li>
          <li class="nav-links"><span>&nbsp;&#8226;</span><li>
          <li class="nav-links active"><a href="/wedstrijd">Wedstrijd</a></li>
        </ul>
      </nav>

      <?php
        if ($registered === 1) {
          ?>
            <div class="alert">
              <strong>Succes!</strong> Je bent succesvol geregistreerd. Het boek wordt zo snel mogelijk opggestuurd.
            </div>
          <?php
        }
      ?>

      <?php if ($wronglogin === 1) {
        ?>
          <div class="alert-fail">
            <strong>Uh oh!</strong> De login gegevens waren niet juist.
          </div>
        <?php
      } ?>

      <img src="assets/img/wedstrijd.png" class="headerimg" width="350">

    </header>
  </div>

  <div class="background-purple">
    <div class="container">

      <section class="part1">
        <div class="content-wed-part1">
          <h1 class="title">Hoe werkt het?</h1>

          <ul class="wedstrijd-uitleg">

            <li class="wedstrijd-uitleg-item">
                <img src="assets/img/wedstrijd-part1-1.png">
                <h2>Inschrijven</h2>
                <hr/>
                <p>De eerste stap is de eenvoudigste stap. Je klas en jij beslissen samen om mee te doen. De bedoeling is dat iedereen van de klas het boek wel leest, maar enkel jij moet jezelf en je klas inschrijven op onze website.
                <br/><br/>
                Eenmaal ingeschreven ontvang je in je opgegeven email-adres een PDF-bestand met daarin het boek “The hitchhiker’s guide to the galaxy”.</p>
            </li>

            <li class="wedstrijd-uitleg-item">
                <img src="assets/img/wedstrijd-part1-2.png">
                <h2>Lezen</h2>
                <hr/>
                <p>Eenmaal je de PDF hebt ontvangen, is het de
                  bedoeling dat elke leerling in je klas het volledige boek leest.
                  <br/><br/>
                  Zo simpel is het, iedereen moet een eigen mening kunnen uitbrengen over het boek en er een eigen visie op hebben, dit kan je enkel bereiken indien iedereen in je klas het boek
                  effectief heeft gelezen</p>
            </li>

            <li class="wedstrijd-uitleg-item">
                <img src="assets/img/wedstrijd-part1-3.png">
                <h2>Boekbespreking</h2>
                <hr/>
                <p>Als iedereen van je klas het boek heeft gelezen, is het tijd voor een boekbespreking. Laat iedereen apart een eigen boekbespreking schrijven, van één tot twee pagina’s.
                <br/><br/>
                Hierna overloop je de besprekingen klassikaal. De bedoeling is dat er uiteindelijk één bespreking ingediend wordt. Dit kan doormiddel van verschillende besprekingen van meerdere leerlingen samen te voegen of door klassikaal te beslissen wie de beste bespreking heeft geschreven. Hoe dan ook, er mag uiteindelijk maar één bespreking ingediend worden!</p>
            </li>

            <li class="wedstrijd-uitleg-item">
                <img src="assets/img/wedstrijd-part1-4.png">
                <h2>Uploaden</h2>
                <hr/>
                <p>Als je klassikaal de uitverkoren boekbespreking hebt bepaald, is het ook nog eens tijd om je beste glimlach boven te halen! Maak een klasfoto die mee ingediend zal worden met jullie
                boekbespreking.
                <br/><br/>
                Deze foto wordt hieronder dan toegevoegd aan de foto’s van alle deelnemende klassen. Veel succes!</p>
            </li>

          </ul>
        </div>
      </section>
    </div>
  </div>

<div class="container2">
    <section class="part3 resize">
      <hr class="border-part3" />
      <h3>Wij doen mee!</h3>
      <p>Hebben jij en je klas er al zin in? Vul dan alvast onderstaande formulier in en ontvang zo snel mogelijk het boek in je inbox.</p>

      <?php if (empty($_SESSION['user'])) {
        ?>
          <form method="post" class="register" action="/register">
            <input type="text" placeholder="Voornaam" class="input-fields" name="voornaam">
            <input type="text" placeholder="Achernaam" class="input-fields" name="achternaam">
            <input type="text" placeholder="School" class="input-fields" name="school">
            <input type="text" placeholder="Klas" class="input-fields" name="klas">
            <input type="email" placeholder="Email" class="input-fields" name="email">
            <input type="password" placeholder="Wachtwoord" class="input-fields" name="wachtwoord">
            <input type="submit" value="Registreer" class="rounded-orange"/>
            <p><a class="change_forms-register">Heb je al een account? Log hier in.</a></p>
          </form>

          <form method="post" class="login hidden" action="/login">
            <input type="email" placeholder="Email" class="input-fields" name="email">
            <input type="password" placeholder="Wachtwoord" class="input-fields" name="wachtwoord">
            <input type="submit" value="Inloggen" class="rounded-orange"/>
            <p><a class="change_forms-login">Heb je nog geen account?</a></p>
          </form><br/>
        <?php
      } else { ?>
        <form method="post" class="register" action="/upload" enctype="multipart/form-data">
          <label class="input-fields" for="pdf">Upload hier uw review</label>
          <input type="file" class="input-fields" name="pdf" />
          <label class="input-fields" for="foto">Upload hier uw klasfoto</label>
          <input type="file" class="input-fields" name="foto" />
          <input type="submit" value="Uploaden" class="rounded-orange"/>
        </form>
      <?php }
      if(!empty($_SESSION['test'])){
        print_r($_SESSION['test']);
      }else {
        print_r($_SESSION['test']);
      } ?>

    </section>
</div>

<div class="container">
  <header class="deelnames">
    <img src="assets/img/wij-nemen-ook-deel.png" class="headerimg" >
  </header>

  <div class="polaroids">

    <?php

    $users = json_decode($users, true);

    if (is_array($users)) {
      foreach ($users as $user) {

        ?>
          <article>
            <div>
              <img src="assets/uploads/img/<?php echo $user['image'] ?>" alt="Polaroid">
              <h2><?php echo $user['klas']; ?> <br /> <?php echo $user['school']; ?></h2>
            </div>
          </article>
        <?php
      }
    }

  ?>
  </div>
</div>
<script src="js/script.js"></script>
</body>
</html>
