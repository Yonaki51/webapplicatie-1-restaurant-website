<!-- beheer-menu.php – CRUD-keuze pagina voor de menukaart -->
<!doctype html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Genmai - Beheer Menu</title>
	<!-- Globale stylesheet voor de gehele website -->
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
<!-- Drie kaarten voor de CRUD-bewerkingen op de menukaart -->
<main class="section">
	<div class="container">
		<div class="panel">
			<div class="section-head">
				<h2>Menukaart beheren</h2>
				<p>Kies een bewerking: voeg een gerecht toe, wijzig een bestaand gerecht of verwijder een gerecht.</p>
			</div>

			<!-- CRUD-kaarten -->
			<div class="cards">
				<!-- Aanmaken -->
				<article class="card">
					<div class="chip">Aanmaken</div>
					<h3>Gerecht toevoegen</h3>
					<p>Voeg een nieuw gerecht toe aan de menukaart.</p>
					<div class="hero-actions">
						<a class="btn btn-primary" href="/public/menu-aanmaken.php">Gerecht aanmaken</a>
					</div>
				</article>

				<!-- Bewerken -->
				<article class="card">
					<div class="chip">Bewerken</div>
					<h3>Gerecht bewerken</h3>
					<p>Wijzig de naam, beschrijving, prijs of allergenen van een bestaand gerecht.</p>
					<div class="hero-actions">
						<a class="btn btn-ghost" href="/public/menu-bewerken.php">Gerecht bewerken</a>
					</div>
				</article>

				<!-- Verwijderen -->
				<article class="card">
					<div class="chip">Verwijderen</div>
					<h3>Gerecht verwijderen</h3>
					<p>Verwijder een gerecht definitief uit de menukaart.</p>
					<div class="hero-actions">
						<a class="btn btn-ghost" href="/public/menu-verwijderen.php">Gerecht verwijderen</a>
					</div>
				</article>
			</div>

			<div class="hero-actions" style="margin-top:24px;">
				<a class="btn btn-ghost" href="/public/admin.php">← Terug naar dashboard</a>
				<a class="btn btn-ghost" href="/public/menu.php">Bekijk menu</a>
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
