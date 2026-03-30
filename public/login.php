<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
$login_failed = isset($_GET['error']) && $_GET['error'] === '1';
?>
<!-- login.php – Simpele loginpagina zonder authenticatie -->
<!doctype html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Genmai - Login</title>
	<link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>

<header class="site-header">
	<div class="container header-inner">
		<a class="brand" href="/public/index.php">
			<span class="brand-mark">鮨</span>
			<span>Sushi House<small>login</small></span>
		</a>
		<nav class="nav">
			<a href="/public/index.php">home</a>
			<a href="/public/menu.php">menu</a>
			<a href="/public/galerie.php">galerie</a>
			<a href="/public/contact.php">contact</a>
			<div class="nav-cta">
				<?php if (!empty($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
					<a class="btn btn-primary" href="/private/admin.php">admin</a>
					<a class="btn btn-primary" href="/dbcalls/login/logout.php">uitloggen</a>
				<?php else: ?>
					<a class="btn btn-primary" href="/public/login.php">login</a>
				<?php endif; ?>
				<a class="btn btn-ghost" href="/public/reserveren.php">reserveren</a>
			</div>
		</nav>
	</div>
</header>

<main class="section">
	<div class="container">
		<div class="panel" style="max-width: 560px; margin: 0 auto;">
			<div class="section-head">
				<h2>Login</h2>
				<p>Voor nu ga je direct naar de adminpagina wanneer je op login klikt.</p>
			</div>

			<?php if ($login_failed): ?>
				<div class="form-notice form-notice--error">
					Inloggen mislukt. Controleer je gebruikersnaam en wachtwoord.
				</div>
			<?php endif; ?>

			<form method="post" action="/dbcalls/login/session.php" class="reservation-form">
				<div class="form-grid">
					<div class="form-group">
						<label for="gebruikersnaam">Gebruikersnaam</label>
						<input type="text" id="gebruikersnaam" name="gebruikersnaam" placeholder="Gebruikersnaam" />
					</div>

					<div class="form-group">
						<label for="wachtwoord">Wachtwoord</label>
						<input type="password" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord" />
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Login</button>
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
