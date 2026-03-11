<!-- galerie.php – Fotogalerie van het restaurant -->
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Genmai - Galerie</title>
  <!-- Globale stylesheet voor de gehele website -->
  <link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>

<!-- ========== HEADER / NAVIGATIE ========== -->
<!-- Sticky navigatiebalk – 'active' geeft de huidige pagina aan -->
<header class="site-header">
  <div class="container header-inner">
    <!-- Logo en restaurantnaam -->
    <a class="brand" href="/public/index.php">
      <span class="brand-mark">鮨</span>
      <span>Sushi House<small>galerie</small></span>
    </a>
    <nav class="nav">
      <a href="/public/index.php">home</a>
      <a href="/public/menu.php">menu</a>
      <a class="active" href="/public/galerie.php">galerie</a>
      <a href="/public/contact.php">contact</a>
      <div class="nav-cta">
        <a class="btn btn-ghost" href="/public/reserveren.php">reserveren</a>
      </div>
    </nav>
  </div>
</header>

<!-- ========== HOOFDINHOUD ========== -->
<main class="section">
  <div class="container">
    <div class="panel">
      <div class="section-head">
        <h2>Galerie</h2>
        <p>Vervang "foto" blokken later door echte afbeeldingen.</p>
      </div>

      <!-- Fotoraster – responsief: 1 kolom → 2 kolommen → 3 kolommen -->
      <!-- Vervang elk .photo-blok door een <img>-tag met een echte afbeelding -->
      <div class="gallery">
        <div class="photo">foto</div>
        <div class="photo">foto</div>
        <div class="photo">foto</div>
        <div class="photo">foto</div>
        <div class="photo">foto</div>
        <div class="photo">foto</div>
      </div>
    </div>
  </div>
</main>

<!-- ========== FOOTER ========== -->
<!-- Voettekst met contactgegevens, openingstijden en social media links -->
<footer class="site-footer">
  <div class="container footer-inner">
    <!-- Kolom 1: adres en telefoonnummer -->
    <div class="footer-col">
      <h4>contact informatie:</h4>
      <p>Sushi Street 99<br>1000 AB Atlantis<br>06-00000000</p>
    </div>
    <!-- Kolom 2: openingstijden -->
    <div class="footer-col">
      <h4>openingstijden:</h4>
      <p>ma-zo: 12:00 - 22:00<br>keuken sluit: 21:30</p>
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
