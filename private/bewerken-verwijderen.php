<!-- bewerken-verwijderen.php – Gecombineerde pagina voor gerecht bewerken en verwijderen. -->
<!doctype html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Genmai - Gerecht beheren</title>
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
			<a class="active" href="/private/admin.php">admin</a>
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
				<h2>Gerecht beheren</h2>
				<p>Bewerk hier een bestaand gerecht of verwijder het.</p>
			</div>

			<!-- Bewerkingsformulier -->
			<div style="margin-top:18px;">
				<div class="section-head">
					<h3 style="margin:0 0 6px;">Gerecht aanpassen</h3>
				</div>
				<form method="POST" action="/private/bewerken-verwijderen.php">
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
						<a class="btn btn-ghost" href="/private/bewerken-verwijderen.php">Annuleren</a>
					</div>
				</form>
			</div>

			<!-- Verwijdersectie -->
			<div style="margin-top:28px;">
				<div class="section-head">
					<h3 style="margin:0 0 6px;">Gerecht verwijderen</h3>
				</div>

				<div class="card" style="border-color:var(--accent);">
					<h3 style="margin:0 0 8px;">Verwijderen bevestigen</h3>
					<p>Weet je zeker dat je het geselecteerde gerecht wilt verwijderen? Dit kan niet ongedaan worden gemaakt.</p>
					<form method="POST" action="/private/bewerken-verwijderen.php">
						<input type="hidden" name="id" value="" />
						<div class="hero-actions">
							<button type="submit" class="btn btn-primary">Ja, verwijder dit gerecht</button>
							<a class="btn btn-ghost" href="/private/bewerken-verwijderen.php">Annuleren</a>
						</div>
					</form>
				</div>
			</div>

			<div class="hero-actions" style="margin-top:24px;">
				<a class="btn btn-ghost" href="/private/beheer-menu.php">← Terug naar beheer menu</a>
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
