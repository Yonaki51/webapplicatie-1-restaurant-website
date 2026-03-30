<?php
// Databaseverbinding en alle gerechten ophalen.
if (session_status() === PHP_SESSION_NONE) {
	session_start();
	if (empty($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
		header("Location: /public/login.php?error=1");
		exit;
	}
}
include("../dbcalls/conn.php");
include("../dbcalls/menukaart/read.php");

// Categorieen uit de database halen.
$categorieen = array();
$show_success = isset($_GET['updated']) && $_GET['updated'] == '1';
$show_delete_success = isset($_GET['deleted']) && $_GET['deleted'] == '1';
foreach ($result as $gerecht) {
	if (!empty($gerecht['categorie']) && !in_array($gerecht['categorie'], $categorieen, true)) {
		$categorieen[] = $gerecht['categorie'];
	}
}

// Fallback als er nog geen categorieen in de database staan.
if (empty($categorieen)) {
	$categorieen = array("Voorgerecht", "Sushi rolls", "Nigiri & Sashimi", "Ramen & Soepen");
}

// ID van het gekozen gerecht uit de URL halen.
$selected_id = 0;
if (isset($_GET['id'])) {
	$selected_id = (int) $_GET['id'];
}

// Hier bewaren we het gerecht dat bij het gekozen ID hoort.
$geselecteerd_gerecht = null;

foreach ($result as $gerecht) {
	if ((int) $gerecht['ID'] === (int) $selected_id) {
		$geselecteerd_gerecht = $gerecht;
		break;
	}
}

// Alleen de bestandsnaam van de afbeelding tonen in het formulier.
$afbeelding_bestandsnaam = '';
if ($geselecteerd_gerecht && !empty($geselecteerd_gerecht['Afbeelding'])) {
	$afbeelding_bestandsnaam = str_replace('/assets/img/', '', $geselecteerd_gerecht['Afbeelding']);
}
?>


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
					<?php if (!empty($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
						<a class="btn btn-primary" href="/dbcalls/login/logout.php">uitloggen</a>
					<?php else: ?>
						<a class="btn btn-primary" href="/public/login.php">login</a>
					<?php endif; ?>
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
				<?php if ($show_success): ?>
					<div id="success-message" class="card" style="margin-top:14px; border-color:#2e7d32;">
						<h3 style="margin:0 0 6px;">Gelukt</h3>
						<p>Je wijzigingen zijn succesvol opgeslagen.</p>
					</div>
				<?php endif; ?>
				<?php if ($show_delete_success): ?>
					<div id="delete-message" class="card" style="margin-top:14px; border-color:#2e7d32;">
						<h3 style="margin:0 0 6px;">Verwijderd</h3>
						<p>Het gerecht is succesvol verwijderd.</p>
					</div>
				<?php endif; ?>
				<!-- Kies eerst welk gerecht je wilt bewerken. -->
				<form method="GET" action="/private/bewerken-verwijderen.php" style="margin-top:18px;">
					<div class="form-group form-group--full">
						<label for="id">Kies een gerecht</label>
						<select id="id" name="id" onchange="this.form.submit()" required>
							<option value="">-- Kies een gerecht --</option>
							<?php foreach ($result as $gerecht): ?>
								<option value="<?php echo (int) $gerecht['ID']; ?>" <?php echo ((int) $selected_id == (int) $gerecht['ID']) ? 'selected' : ''; ?>>
									<?php echo ($gerecht['Naam']); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
					<noscript>
						<div class="hero-actions">
							<button type="submit" class="btn btn-ghost">Laden</button>
						</div>
					</noscript>
				</form>

				<!-- Bewerkingsformulier -->
				<div style="margin-top:18px;">
					<div class="section-head">
						<h3 style="margin:0 0 6px;">Gerecht aanpassen</h3>
					</div>
					<form method="POST" action="/dbcalls/menukaart/update.php">
						<input type="hidden" name="ID"
							value="<?php echo $geselecteerd_gerecht ? (int) $geselecteerd_gerecht['ID'] : ''; ?>" />
						<div class="form-grid">
							<div class="form-group">
								<label for="naam">Naam <span style="color:var(--accent)">*</span></label>
								<input type="text" id="naam" name="naam"
									value="<?php echo $geselecteerd_gerecht ? ($geselecteerd_gerecht['Naam']) : ''; ?>"
									required />
							</div>

							<div class="form-group">
								<label for="categorie">Categorie <span style="color:var(--accent)">*</span></label>
								<select id="categorie" name="categorie" required>
									<option value="">-- Kies een categorie --</option>
									<?php foreach ($categorieen as $categorie): ?>
										<option value="<?php echo ($categorie); ?>" <?php echo ($geselecteerd_gerecht && $geselecteerd_gerecht['categorie'] === $categorie) ? 'selected' : ''; ?>>
											<?php echo htmlspecialchars($categorie); ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="prijs">Prijs (€) <span style="color:var(--accent)">*</span></label>
								<input type="number" id="prijs" name="prijs" step="0.01" min="0"
									value="<?php echo $geselecteerd_gerecht ? ($geselecteerd_gerecht['Prijs']) : ''; ?>"
									required />
							</div>

							<div class="form-group form-group--full">
								<label for="beschrijving">Beschrijving <span
										style="color:var(--accent)">*</span></label>
								<textarea id="beschrijving" name="beschrijving" rows="3"
									required><?php echo $geselecteerd_gerecht ? ($geselecteerd_gerecht['Beschrijving']) : ''; ?></textarea>
							</div>

							<div class="form-group">
								<label for="allergenen">Allergenen</label>
								<input type="text" id="allergenen" name="allergenen" placeholder="bijv. gluten, vis"
									value="<?php echo $geselecteerd_gerecht ? ($geselecteerd_gerecht['Allergenen']) : ''; ?>" />
							</div>

							<div class="form-group">
								<label for="afbeelding">Afbeelding (bestandsnaam)</label>
								<input type="text" id="afbeelding" name="afbeelding" placeholder="bijv. gerecht.jpg"
									value="<?php echo ($afbeelding_bestandsnaam); ?>" />
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
						<p>Weet je zeker dat je het geselecteerde gerecht wilt verwijderen? Dit kan niet ongedaan worden
							gemaakt.</p>
						<form method="POST" action="/dbcalls/menukaart/delete.php">
							<input type="hidden" name="id"
								value="<?php echo $geselecteerd_gerecht ? (int) $geselecteerd_gerecht['ID'] : ''; ?>" />
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
	<?php if ($show_success || $show_delete_success): ?>
		<script>
			setTimeout(function () {
				var msg = document.getElementById('success-message');
				if (msg) {
					msg.classList.add('fade-out');
					msg.addEventListener('transitionend', function () {
						msg.style.display = 'none';
					}, { once: true });
				}
				var deleteMsg = document.getElementById('delete-message');
				if (deleteMsg) {
					deleteMsg.classList.add('fade-out');
					deleteMsg.addEventListener('transitionend', function () {
						deleteMsg.style.display = 'none';
					}, { once: true });
				}
			}, 3000);
		</script>
	<?php endif; ?>
</body>

</html>