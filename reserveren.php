<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sushi Restaurant - Reserveren</title>
  <link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>

<header class="site-header">
  <div class="container header-inner">
    <a class="brand" href="/index.php">
      <span class="brand-mark">鮨</span>
      <span>Sushi House<small>reserveren</small></span>
    </a>
    <nav class="nav">
      <a href="/index.php">home</a>
      <a href="/menu.php">menu</a>
      <a href="/galerie.php">galerie</a>
      <a href="/contact.php">contact</a>
      <div class="nav-cta">
        <a class="btn btn-ghost active" href="/reserveren.php">reserveren</a>
      </div>
    </nav>
  </div>
</header>

<main class="section">
  <div class="container">
    <div class="panel">
      <div class="section-head">
        <h2>Tafel reserveren</h2>
        <p>Vul het formulier in en wij bevestigen uw reservering zo snel mogelijk.</p>
      </div>

      <div class="form-notice form-notice--error">
        Online reserveren is tijdelijk niet beschikbaar. Bel ons op 06-00000000 of stuur een e-mail naar info@sushihouse.nl.
      </div>

      <form class="reservation-form" method="post" action="#">
        <div class="form-grid">
          <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" id="naam" name="naam" placeholder="Uw naam" required />
          </div>

          <div class="form-group">
            <label for="email">E-mailadres</label>
            <input type="email" id="email" name="email" placeholder="uw@email.nl" required />
          </div>

          <div class="form-group">
            <label for="datum">Datum</label>
            <input type="date" id="datum" name="datum" required />
          </div>

          <div class="form-group">
            <label for="tijd">Tijdstip</label>
            <input type="time" id="tijd" name="tijd" min="12:00" max="21:30" required />
          </div>

          <div class="form-group">
            <label for="personen">Aantal personen</label>
            <input type="number" id="personen" name="personen" min="1" max="20" placeholder="2" required />
          </div>

          <div class="form-group form-group--full">
            <label for="opmerkingen">Opmerkingen</label>
            <textarea id="opmerkingen" name="opmerkingen" rows="4"
              placeholder="Allergieën, speciale wensen..."></textarea>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Reservering versturen</button>
        </div>
      </form>
    </div>
  </div>
</main>

<footer class="site-footer">
  <div class="container footer-inner">
    <div class="footer-col">
      <h4>contact informatie:</h4>
      <p>Sushi Street 99<br>1000 AB Atlantis<br>06-00000000</p>
    </div>
    <div class="footer-col">
      <h4>openingstijden:</h4>
      <p>ma-zo: 12:00 - 22:00<br>keuken sluit: 21:30</p>
    </div>
    <div class="footer-col">
      <h4>houd contact:</h4>
      <p>instagram<br>facebook</p>
    </div>
  </div>
</footer>

</body>
</html>
