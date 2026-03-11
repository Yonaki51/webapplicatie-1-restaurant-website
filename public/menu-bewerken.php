<!-- menu-bewerken.php – Bewerkingsformulier voor een bestaand gerecht in de menukaart. -->
<!doctype html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Genmai - Gerecht bewerken</title>
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
				<h2>Gerecht bewerken</h2>
				<p>Selecteer een gerecht uit de lijst en pas de gegevens aan.</p>
			</div>

			<!-- Gerechtenlijst – voorbeeld items (vervang later door database-inhoud) -->
			<div class="section-head" style="margin-top:18px;">
				<h3 style="margin:0 0 6px;">Kies een gerecht</h3>
			</div>
			<div class="menu-grid">
				<div class="dish">
					<div class="dish-content">
						<h4>Zalm Nigiri</h4>
						<p>Rijst met verse zalm.</p>
					</div>
					<div class="price">€ 4,50</div>
				</div>

				<div class="dish">
					<div class="dish-content">
						<h4>Tuna Sashimi</h4>
						<p>Tonijn, wasabi, gember.</p>
					</div>
					<div class="price">€ 8,50</div>
				</div>

				<div class="dish">
					<div class="dish-content">
						<h4>Gyoza (6 stuks)</h4>
						<p>Japanse dumplings met dip.</p>
					</div>
					<div class="price">€ 6,00</div>
				</div>
			</div>

			<!-- Bewerkingsformulier -->
			<div style="margin-top:28px;">
				<div class="section-head">
					<h3 style="margin:0 0 6px;">Gerecht aanpassen</h3>
				</div>
				<form method="POST" action="/public/menu-bewerken.php">
					<input type="hidden" name="id" value="" />
					<div class="form-grid">
						<div class="form-group">
							<label for="naam">Naam <span style="color:var(--accent)">*</span></label>
							<input type="text" id="naam" name="naam" required />
						</div>

						<div class="form-group">
							<label for="prijs">Prijs (€) <span style="color:var(--accent)">*</span></label>
							<input type="number" id="prijs" name="prijs" step="0.01" min="0" required />
						</div>

						<div class="form-group form-group--full">
							<label for="beschrijving">Beschrijving <span style="color:var(--accent)">*</span></label>
							<textarea id="beschrijving" name="beschrijving" rows="3" required></textarea>
						</div>

						<div class="form-group">
							<label for="allergenen">Allergenen</label>
							<input type="text" id="allergenen" name="allergenen" placeholder="bijv. gluten, vis" />
						</div>

						<div class="form-group">
							<label for="afbeelding">Afbeelding (URL)</label>
							<input type="text" id="afbeelding" name="afbeelding" placeholder="bijv. /assets/img/gerecht.jpg" />
						</div>
					</div>

					<div class="form-actions hero-actions">
						<button type="submit" class="btn btn-primary">Wijzigingen opslaan</button>
						<a class="btn btn-ghost" href="/public/beheer-menu.php">Annuleren</a>
					</div>
				</form>
			</div>

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
