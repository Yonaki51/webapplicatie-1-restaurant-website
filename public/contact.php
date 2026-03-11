<!-- contact.php – Contactpagina met adresgegevens en Google Maps-placeholder -->
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Genmai - Contact</title>
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
      <span>Sushi House<small>contact</small></span>
    </a>
    <nav class="nav">
      <a href="/public/index.php">home</a>
      <a href="/public/menu.php">menu</a>
      <a href="/public/galerie.php">galerie</a>
      <a class="active" href="/public/contact.php">contact</a>
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
        <h2>Contact</h2>
        <p>Hier kun je later een echte Google Maps embed in zetten.</p>
      </div>

      <!-- Twee-kolomsraster: contactgegevens links, kaart rechts -->
      <div class="contact-grid">
        <!-- Adres en contactgegevens van het restaurant -->
        <div class="contact-box">
          <h3>contact informatie:</h3>
          <p style="color: #a1a1aa; margin:0;">
            Sushi Street 99<br>
            1000 AB Atlantis<br>
            06-00000000<br><br>
            info@sushihouse.nl
          </p>
        </div>

        <!-- Kaartblok – vervang de placeholder door een Google Maps iframe -->
        <div class="map">
          <!-- Vervang dit door een echte Google Maps iframe -->
          <div class="map-placeholder">google maps integratie</div>
        </div>
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
