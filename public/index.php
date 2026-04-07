<?php session_start(); ?>
<!-- index.php – Startpagina van de Sushi House website -->
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Genmai - Home</title>
  <!-- Globale stylesheet voor de gehele website -->
  <link rel="stylesheet" href="/assets/css/style.css" />
  <script src="/assets/js/script/js" defer></script>
</head>
<body>

<!-- ========== HEADER / NAVIGATIE ========== -->
<!-- Sticky navigatiebalk bovenaan elke pagina -->
<header class="site-header">
  <div class="container header-inner">
    <!-- Logo en restaurantnaam -->
    <a class="brand" href="/public/index.php">
      <span class="brand-mark">鮨</span>
      <span>
        Sushi House
        <small>vers • minimal • japans</small>
      </span>
    </a>

    <!-- Hoofdnavigatie – 'active' klasse geeft de huidige pagina aan -->
    <nav class="nav">
      <a class="active" href="/public/index.php">home</a>
      <a href="/public/menu.php">menu</a>
      <a href="/public/galerie.php">galerie</a>
      <a href="/public/contact.php">contact</a>
      <!-- Call-to-action knop rechts in de navigatie -->
      <div class="nav-cta">
        <?php
        if (!empty($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        ?>
        <a class="btn btn-primary" href="/private/admin.php">admin</a>
        <a class="btn btn-primary" href="/dbcalls/login/logout.php">uitloggen</a>
        <?php
        } else{
        ?>
        <a class="btn btn-primary" href="/public/login.php">login</a>
        <?php } ?>
        <a class="btn btn-ghost" href="/public/reserveren.php">reserveren</a>

      </div>
    </nav>
  </div>
</header>

<main>
  <!-- ========== HERO SECTIE ========== -->
  <!-- Prominente welkomstbanner met een afbeelding en actieknoppen -->
  <section class="hero">
    <div class="container hero-grid">
      <!-- Tekstblok met kop, omschrijving en actieknoppen -->
      <div class="hero-card">
        <span class="kicker">🍣 Sushi & Sashimi</span>
        <h1>Authentieke sushi, strak geserveerd.</h1>
        <p>
          Donkere, rustige sfeer. Verse vis, warme gerechten en desserts.
          Reserveer een tafel of bestel om af te halen.
        </p>

        <!-- Primaire actieknoppen: naar het menu of direct reserveren -->
        <div class="hero-actions">
          <a class="btn btn-primary" href="/public/menu.php">Bekijk menu</a>
          <a class="btn btn-ghost" href="/public/reserveren.php">Reserveer</a>
        </div>
      </div>

      <!-- Heroafbeelding (assets/img/hero.jpg) -->
      <div class="hero-media">
        <img src="/assets/img/hero.jpg" alt="Sushi gerecht" class="hero-img" />
      </div>
    </div>
  </section>

  <!-- ========== VOORDELEN / KENMERKEN SECTIE ========== -->
  <!-- Drie kaarten die de kernvoordelen van het restaurant uitlichten -->
  <section class="section">
    <div class="container">
      <div class="section-head">
        <h2>Waarom hier eten?</h2>
      </div>

      <div class="cards">
        <!-- Kaart 1: dagverse ingrediënten -->
        <article class="card">
          <div class="chip">Vers</div>
          <h3>Dagverse ingrediënten</h3>
          <p>Elke dag voorbereid, met focus op smaak en kwaliteit.</p>
        </article>

        <!-- Kaart 2: afhalen en bezorgen -->
        <article class="card">
          <div class="chip">Snel</div>
          <h3>Afhalen & bezorgen</h3>
          <p>Bestel eenvoudig en haal op wanneer het jou uitkomt.</p>
        </article>

        <!-- Kaart 3: sfeer van het restaurant -->
        <article class="card">
          <div class="chip">Rust</div>
          <h3>Minimalistische sfeer</h3>
          <p>Donker thema, zacht licht en een rustige uitstraling.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ========== OVER ONS SECTIE ========== -->
  <!-- Korte introductietekst over het restaurant -->
  <section class="section">
    <div class="container">
      <div class="panel">
        <div class="section-head">
          <h2>Over ons</h2>
        </div>

        <p style="color: #a1a1aa; margin:0;">
          Wij combineren klassieke sushi met een moderne, strakke presentatie.
          Van nigiri tot warme gerechten — alles met aandacht.
        </p>
      </div>
    </div>
  </section>
</main>

<!-- ========== FOOTER ========== -->
<!-- Voettekst met contactgegevens, openingstijden en social media links -->
<footer class="site-footer">
  <div class="container footer-inner">
    <!-- Kolom 1: adres en telefoonnummer -->
    <div class="footer-col">
      <h4>contact informatie:</h4>
      <p>
        Sushi Street 99<br>
        1000 AB Atlantis<br>
        06-00000000
      </p>
    </div>
    <!-- Kolom 2: openingstijden -->
    <div class="footer-col">
      <h4>openingstijden:</h4>
      <p>
        ma-zo: 12:00 - 22:00<br>
        keuken sluit: 21:30
      </p>
    </div>
    <!-- Kolom 3: social media -->
    <div class="footer-col">
      <h4>houd contact:</h4>
      <p>instagram<br>facebook</p>
    </div>
  </div>
</footer>

</body>
</html>
