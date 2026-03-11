<?php
// menu.php – Menuoverzichtspagina
// Laad de databaseverbinding en haal alle menukaartitems op via een prepared statement
include("../dbcalls/conn.php");
include("../dbcalls/menukaart/read.php");

// Groepeer gerechten per categorie zodat ze per sectie getoond worden
$per_categorie = [];
foreach ($result as $dish) {
  $per_categorie[$dish['categorie']][] = $dish;
}
?>
<!doctype html>
<html lang="nl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Genmai - Menu</title>
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
        <span>Sushi House<small>menu</small></span>
      </a>
      <nav class="nav">
        <a href="/public/index.php">home</a>
        <a class="active" href="/public/menu.php">menu</a>
        <a href="/public/galerie.php">galerie</a>
        <a href="/public/contact.php">contact</a>
        <!-- Call-to-action knoppen: reserveren en bestellen -->
        <div class="nav-cta">
          <a class="btn btn-ghost" href="/public/reserveren.php">reserveren</a>
          <a class="btn btn-primary" href="/public/bestellen.php">bestellen</a>
        </div>
      </nav>
    </div>
  </header>

  <!-- ========== HOOFDINHOUD ========== -->
  <main class="section">
    <div class="container">
      <div class="panel">
        <?php
        // Loop door elke categorie en toon de bijbehorende gerechten
        foreach ($per_categorie as $categorie => $dishes):
          ?>
          <!-- Laat categorie zien -->
          <div class="section-head" style="margin-top: 28px;">
            <h2><?php echo $categorie; ?></h2>
          </div>

          <!-- Dynamisch gegenereerde gerechten uit de database -->
          <div class="menu-grid">
            <?php foreach ($dishes as $dish): ?>
              <div class="dish">
                <!-- Toon afbeelding alleen als die is opgegeven in de database -->
                <?php if ($dish['Afbeelding']): ?>
                  <div class="dish-img">
                    <img src="<?php echo $dish['Afbeelding']; ?>" alt="<?php echo $dish['Naam']; ?>">
                  </div>
                <?php endif; ?>
                <div class="dish-content">
                  <h4><?php echo $dish['Naam']; ?></h4>
                  <p><?php echo $dish['Beschrijving']; ?></p>
                  <!-- Allergeneninformatie – alleen weergegeven als aanwezig -->
                  <?php if ($dish['Allergenen']): ?>
                    <small class="allergens">Allergenen: <?php echo $dish['Allergenen']; ?></small>
                  <?php endif; ?>
                </div>
                <!-- Prijs geformatteerd als Nederlands decimaalformaat (komma als scheidingsteken) -->
                <div class="price">€ <?php echo number_format($dish['Prijs'], 2, ',', '.'); ?></div>
              </div>
            <?php endforeach; ?>
          </div>

        <?php endforeach; ?>

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