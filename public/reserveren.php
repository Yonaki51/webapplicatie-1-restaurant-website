<!-- reserveren.php – Reserveringspagina met een formulier voor tafelreserveringen -->
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sushi Restaurant - Reserveren</title>
  <!-- Globale stylesheet voor de gehele website -->
  <link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>

<!-- ========== HEADER / NAVIGATIE ========== -->
<!-- Sticky navigatiebalk – 'active' klasse op de reserveerknop geeft de huidige pagina aan -->
<header class="site-header">
  <div class="container header-inner">
    <!-- Logo en restaurantnaam -->
    <a class="brand" href="/public/index.php">
      <span class="brand-mark">鮨</span>
      <span>Sushi House<small>reserveren</small></span>
    </a>
    <nav class="nav">
      <a href="/public/index.php">home</a>
      <a href="/public/menu.php">menu</a>
      <a href="/public/galerie.php">galerie</a>
      <a href="/public/contact.php">contact</a>
      <div class="nav-cta">
        <a class="btn btn-ghost active" href="/public/reserveren.php">reserveren</a>
      </div>
    </nav>
  </div>
</header>

<!-- ========== HOOFDINHOUD ========== -->
<main class="section">
  <div class="container">
    <div class="panel">
      <div class="section-head">
        <h2>Tafel reserveren</h2>
        <p>Vul het formulier in en wij bevestigen uw reservering zo snel mogelijk.</p>
      </div>

      <!-- Foutmelding: online reserveren is momenteel uitgeschakeld -->
      <div class="form-notice form-notice--error">
        Online reserveren is tijdelijk niet beschikbaar. Bel ons op 06-00000000 of stuur een e-mail naar info@sushihouse.nl.
      </div>

      <!-- Reserveringsformulier – verstuurt data via POST (verwerking nog te implementeren) -->
      <form class="reservation-form" method="post" action="#">
        <!-- Twee-kolomsraster voor formuliervelden (één kolom op mobiel) -->
        <div class="form-grid">
          <!-- Naam van de gast -->
          <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" id="naam" name="naam" placeholder="Uw naam" required />
          </div>

          <!-- E-mailadres voor bevestiging -->
          <div class="form-group">
            <label for="email">E-mailadres</label>
            <input type="email" id="email" name="email" placeholder="uw@email.nl" required />
          </div>

          <!-- Gewenste reserveringsdatum -->
          <div class="form-group">
            <label for="datum">Datum</label>
            <input type="date" id="datum" name="datum" required />
          </div>

          <!-- Gewenst tijdstip (tussen openingstijd 12:00 en laatste bestelling 21:30) -->
          <div class="form-group">
            <label for="tijd">Tijdstip</label>
            <input type="time" id="tijd" name="tijd" min="12:00" max="21:30" required />
          </div>

          <!-- Aantal personen (minimaal 1, maximaal 20) -->
          <div class="form-group">
            <label for="personen">Aantal personen</label>
            <input type="number" id="personen" name="personen" min="1" max="20" placeholder="2" required />
          </div>

          <!-- Vrij tekstveld voor allergieën of speciale wensen – neemt volledige breedte in -->
          <div class="form-group form-group--full">
            <label for="opmerkingen">Opmerkingen</label>
            <textarea id="opmerkingen" name="opmerkingen" rows="4"
              placeholder="Allergieën, speciale wensen..."></textarea>
          </div>
        </div>

        <!-- Verzendknop voor het formulier -->
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Reservering versturen</button>
        </div>
      </form>
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
