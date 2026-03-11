<?php
// menu-verwijderen.php – Bevestigingspagina voor het verwijderen van een gerecht.
include("../dbcalls/conn.php");
include("../dbcalls/menukaart/read.php");

// Verwerk de verwijdering alleen bij een POST-verzoek
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../dbcalls/menukaart/delete.php");
    // Herlaad de gerechtenlijst na de verwijdering
    include("../dbcalls/menukaart/read.php");
}

// Laad het geselecteerde gerecht voor de bevestiging
$selectedId   = (int)($_GET['id'] ?? 0);
$selectedDish = null;
if ($selectedId > 0) {
    foreach ($result as $dish) {
        if ((int)$dish['id'] === $selectedId) {
            $selectedDish = $dish;
            break;
        }
    }
}
?>
<!doctype html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Genmai - Gerecht verwijderen</title>
	<link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>

<!-- ========== HEADER / NAVIGATIE ========== -->
<header class="site-header">
	<div class="container header-inner">
		<a class="brand" href="/public/index.php">
			<span class="brand-mark">鮨</span>
			<span>Sushi House<small>admin</small></span>
		</a>
		<nav class="nav">
			<a href="/public/index.php">home</a>
			<a href="/public/menu.php">menu</a>
			<a href="/public/galerie.php">galerie</a>
			<a href="/public/contact.php">contact</a>
			<a class="active" href="/public/admin.php">admin</a>
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
				<h2>Gerecht verwijderen</h2>
				<p>Selecteer een gerecht uit de lijst en bevestig de verwijdering.</p>
			</div>

			<!-- Terugkoppeling na verwerking -->
			<?php if (!empty($deleteSuccess)): ?>
				<div class="form-notice form-notice--success">
					<p>Het gerecht is succesvol verwijderd uit de menukaart.</p>
				</div>
			<?php elseif (!empty($deleteError)): ?>
				<div class="form-notice form-notice--error">
					<p><?php echo htmlspecialchars($deleteError); ?></p>
				</div>
			<?php endif; ?>

			<!-- Gerechtenlijst om een gerecht te selecteren voor verwijdering -->
			<div class="section-head" style="margin-top:18px;">
				<h3 style="margin:0 0 6px;">Kies een gerecht om te verwijderen</h3>
			</div>
			<div class="menu-grid">
				<?php foreach ($result as $dish): ?>
					<a href="/public/menu-verwijderen.php?id=<?php echo (int)$dish['id']; ?>"
					   style="text-decoration:none;">
						<div class="dish <?php echo ((int)$dish['id'] === $selectedId) ? 'dish--selected' : ''; ?>"
						     style="<?php echo ((int)$dish['id'] === $selectedId) ? 'border-color:var(--accent);' : ''; ?>">
							<div class="dish-content">
								<h4><?php echo htmlspecialchars($dish['Naam']); ?></h4>
								<p><?php echo htmlspecialchars($dish['Beschrijving']); ?></p>
							</div>
							<div class="price">€ <?php echo number_format($dish['Prijs'], 2, ',', '.'); ?></div>
						</div>
					</a>
				<?php endforeach; ?>
				<?php if (empty($result)): ?>
					<p style="color:var(--muted)">Er zijn geen gerechten in de menukaart.</p>
				<?php endif; ?>
			</div>

			<!-- Bevestigingsformulier – zichtbaar wanneer een gerecht is geselecteerd -->
			<?php if ($selectedDish): ?>
				<div style="margin-top:28px;">
					<div class="card" style="border-color:var(--accent);">
						<h3 style="margin:0 0 8px;">Verwijderen bevestigen</h3>
						<p>Weet je zeker dat je <strong><?php echo htmlspecialchars($selectedDish['Naam']); ?></strong> wilt verwijderen? Dit kan niet ongedaan worden gemaakt.</p>
						<form method="POST" action="/public/menu-verwijderen.php">
							<input type="hidden" name="id" value="<?php echo (int)$selectedDish['id']; ?>" />
							<div class="hero-actions">
								<button type="submit" class="btn btn-primary">Ja, verwijder dit gerecht</button>
								<a class="btn btn-ghost" href="/public/menu-verwijderen.php">Annuleren</a>
							</div>
						</form>
					</div>
				</div>
			<?php endif; ?>

			<div class="hero-actions" style="margin-top:24px;">
				<a class="btn btn-ghost" href="/public/beheer-menu.php">← Terug naar beheer menu</a>
			</div>
		</div>
	</div>
</main>

<!-- ========== FOOTER ========== -->
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
