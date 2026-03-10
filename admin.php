<!-- admin.php – Adminpagina in dezelfde stijl als de rest van de site -->
<!doctype html>
<html lang="nl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Genmai - Admin</title>
	<link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>

<header class="site-header">
	<div class="container header-inner">
		<a class="brand" href="/index.php">
			<span class="brand-mark">鮨</span>
			<span>Sushi House<small>admin</small></span>
		</a>
		<nav class="nav">
			<a href="/index.php">home</a>
			<a href="/menu.php">menu</a>
			<a href="/galerie.php">galerie</a>
			<a href="/contact.php">contact</a>
			<a class="active" href="/admin.php">admin</a>
			<div class="nav-cta">
				<a class="btn btn-ghost" href="/reserveren.php">reserveren</a>
			</div>
		</nav>
	</div>
</header>

<main class="section">
	<div class="container">
		<div class="panel">
			<div class="section-head">
				<h2>Admin dashboard</h2>
				<p>Beheer hier onderdelen van de website en inhoud van het menu.</p>
			</div>

			<div class="cards">
				<article class="card">
					<div class="chip">Menu</div>
					<h3>Menukaart beheren</h3>
					<p>Voeg gerechten toe of werk bestaande items bij.</p>
					<div class="hero-actions">
						<a class="btn btn-primary" href="/menu.php">Bekijk menu</a>
					</div>
				</article>

				<article class="card">
					<div class="chip">Reserveringen</div>
					<h3>Reserveringen</h3>
					<p>Controleer reserveringsaanvragen en plan de tafels.</p>
					<div class="hero-actions">
						<a class="btn btn-ghost" href="/reserveren.php">Naar reserveren</a>
					</div>
				</article>

				<article class="card">
					<div class="chip">Content</div>
					<h3>Paginacontent</h3>
					<p>Loop door pagina's om teksten en afbeeldingen te controleren.</p>
					<div class="hero-actions">
						<a class="btn btn-ghost" href="/galerie.php">Galerie</a>
						<a class="btn btn-ghost" href="/contact.php">Contact</a>
					</div>
				</article>
			</div>
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
