<?php
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
foreach ($result as $gerecht) {
	if (!empty($gerecht['categorie']) && !in_array($gerecht['categorie'], $categorieen, true)) {
		$categorieen[] = $gerecht['categorie'];
	}
}

// Fallback als er nog geen categorieen in de database staan.
if (empty($categorieen)) {
	$categorieen = array("Voorgerecht", "Sushi rolls", "Nigiri & Sashimi", "Ramen & Soepen");
}
// Controleer of create succes was
$show_create_success = isset($_GET['created']) && $_GET['created'] == '1';
?>


<!-- menu-aanmaken.php – Formulier om een nieuw gerecht toe te voegen aan de menukaart. -->
<!doctype html>
<html lang="nl">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Genmai - Gerecht aanmaken</title>
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
					<h2>Gerecht aanmaken</h2>
					<p>Vul de onderstaande gegevens in om een nieuw gerecht aan de menukaart toe te voegen.</p>
					<?php if ($show_create_success): ?>
						<div id="success-message" class="card" style="margin-top:14px; border-color:#2e7d32;">
							<h3 style="margin:0 0 6px;">Gelukt</h3>
							<p>Het gerecht is succesvol toegevoegd.</p>
						</div>
					<?php endif; ?>
				</div>

				<!-- Aanmaakformulier -->
				<form action="/dbcalls/menukaart/create.php" method="POST">
					<div class="form-grid">
						<div class="form-group">
							<label>Naam <span style="color:var(--accent)">*</span></label>
							<input type="text" id="naam" name="naam" required />
						</div>

						<div class="form-group">
							<label>Categorie <span style="color:var(--accent)">*</span></label>
							<select id="categorie" name="categorie" required>
								<option value="">-- Kies een categorie --</option>
								<?php foreach ($categorieen as $categorie): ?>
									<option value="<?php echo htmlspecialchars($categorie); ?>">
										<?php echo htmlspecialchars($categorie); ?>
									</option>
								<?php endforeach; ?>
							</select>
							<div class="form-group">
								<label>Prijs (€) <span style="color:var(--accent)">*</span></label>
								<input type="number" id="prijs" name="prijs" step="0.01" min="0" required />
							</div>

							<div class="form-group form-group--full">
								<label>Beschrijving <span style="color:var(--accent)">*</span></label>
								<textarea id="beschrijving" name="beschrijving" rows="3" required></textarea>
							</div>

							<div class="form-group">
								<label>Allergenen</label>
								<input type="text" id="allergenen" name="allergenen" placeholder="bijv. gluten, vis" />
							</div>

							<div class="form-group">
								<label>Afbeelding (bestandsnaam)</label>
								<input type="text" id="afbeelding" name="afbeelding" placeholder="bijv. gerecht.jpg" />
							</div>
						</div>

						<div class="form-actions hero-actions">
							<button type="submit" class="btn btn-primary">Gerecht opslaan</button>
							<a class="btn btn-ghost" href="/private/beheer-menu.php">Annuleren</a>
						</div>
				</form>
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

	<?php if ($show_create_success): ?>
		<script>
			setTimeout(function () {
				var msg = document.getElementById('success-message');
				if (msg) {
					msg.classList.add('fade-out');
					msg.addEventListener('transitionend', function () {
						msg.style.display = 'none';
					}, { once: true });
				}
			}, 3000);
		</script>
	<?php endif; ?>
</body>

</html>