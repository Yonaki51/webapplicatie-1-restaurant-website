<?php
$success = false;
$errors  = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam       = trim($_POST['naam']       ?? '');
    $email      = trim($_POST['email']      ?? '');
    $datum      = trim($_POST['datum']      ?? '');
    $tijd       = trim($_POST['tijd']       ?? '');
    $personen   = (int) ($_POST['personen'] ?? 0);
    $opmerkingen = trim($_POST['opmerkingen'] ?? '');

    if ($naam === '')                          $errors[] = 'Naam is verplicht.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Vul een geldig e-mailadres in.';
    if ($datum === '' || strtotime($datum) < strtotime('today')) $errors[] = 'Kies een geldige datum (vandaag of later).';
    if ($tijd < '12:00' || $tijd > '21:30')   $errors[] = 'Tijdstip moet tussen 12:00 en 21:30 liggen.';
    if ($personen < 1 || $personen > 20)       $errors[] = 'Aantal personen moet tussen 1 en 20 zijn.';

    if (empty($errors)) {
        // TODO: save to database or send confirmation e-mail
        $success = true;
    }
}
?>
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

      <form class="reservation-form" method="post" action="/reserveren.php">
        <?php if ($success): ?>
          <div class="form-notice form-notice--success">
            Uw reservering is ontvangen! We nemen zo snel mogelijk contact op.
          </div>
        <?php endif; ?>
        <?php if (!empty($errors)): ?>
          <div class="form-notice form-notice--error">
            <?php foreach ($errors as $e): ?>
              <p><?= htmlspecialchars($e) ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="form-grid">
          <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" id="naam" name="naam" placeholder="Uw naam"
              value="<?= htmlspecialchars($_POST['naam'] ?? '') ?>" required />
          </div>

          <div class="form-group">
            <label for="email">E-mailadres</label>
            <input type="email" id="email" name="email" placeholder="uw@email.nl"
              value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required />
          </div>

          <div class="form-group">
            <label for="datum">Datum</label>
            <input type="date" id="datum" name="datum"
              value="<?= htmlspecialchars($_POST['datum'] ?? '') ?>" required />
          </div>

          <div class="form-group">
            <label for="tijd">Tijdstip</label>
            <input type="time" id="tijd" name="tijd" min="12:00" max="21:30"
              value="<?= htmlspecialchars($_POST['tijd'] ?? '') ?>" required />
          </div>

          <div class="form-group">
            <label for="personen">Aantal personen</label>
            <input type="number" id="personen" name="personen" min="1" max="20" placeholder="2"
              value="<?= htmlspecialchars($_POST['personen'] ?? '') ?>" required />
          </div>

          <div class="form-group form-group--full">
            <label for="opmerkingen">Opmerkingen</label>
            <textarea id="opmerkingen" name="opmerkingen" rows="4"
              placeholder="Allergieën, speciale wensen..."><?= htmlspecialchars($_POST['opmerkingen'] ?? '') ?></textarea>
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
