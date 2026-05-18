<?php

require_once "../databaza/db.php";

$databaza = new databaza();
$pdo = $databaza->pripojit_k_databaze();

$sql = "SELECT * FROM treneri";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$treneri = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET["trener"])) {
	$vybrany_trener = $_GET["trener"];
} else {
	$vybrany_trener = "";
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Iron Gym naši tréneri</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="../assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<?php include "header.php" ?>

	<!-- Main -->
	<article id="main">
		<header>
			<h2>NAŠI TRÉNERI</h2>
			<p>rezervuj si osobný tréning s jedným našich klasifikovaných trénerov!</p>
		</header>
		<section class="wrapper style5">
			<div class="inner">

				<section>
					<h4>Rezervácia</h4>
					<p>Naši tréneri sú kvalifikovaní odborníci s dlhoročnými skúsenosťami v oblasti fitness. Každý z nich sa zameriava na individuálny prístup, správnu techniku a bezpečný tréning, aby si dosiahol čo najlepšie výsledky. <br> <br> Ak si chceš rezervovať osobný tréning, stačí si vybrať trénera a vyplniť jednoduchý rezervačný formulár. Zadáš svoje meno a priezvisko, vyberieš dátum,čas tréningu,trénera s ktorým budeš cvičiť a rezervácia sa uloží do systému. <br>
					<section>
						<h4>Formulár rezervácia</h4>
						<p>individuálny tréning v dĺžke 1 hodiny. Platba na mieste 30 eur v hotovosti</p>
						<div id="formular">
							<form action="spracovanie rezervacie.php" method="post">
						</div>
						<div class="row gtr-uniform">
							<div class="col-6 col-12-xsmall">
								<input type="text" name="meno" id="meno" placeholder="Meno" required />
							</div>
							<div class="col-6 col-12-xsmall">
								<input type="text" name="priezvisko" id="priezvisko" placeholder="Priezvisko" required />
							</div>
							<div class="col-6 col-12-xsmall">
								<input type="email" name="email" id="email" placeholder="Email" required />
							</div>
							<div class="col-6 col-12-xsmall">
								<input type="text" name="tel" id="tel" placeholder="Telefónne číslo v tvare 0948444..." required />
							</div>
							<div class="col-12">
								<label for="trener">Vyber si trénera</label>
								<select name="trener" id="trener" required>
									<?php foreach ($treneri as $trener): ?>

										<option value="<?= $trener['id'] ?>">
											<?= htmlspecialchars($trener['meno']) ?>
										</option>

									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-4 col-12-small">
								<input type="radio" id="stupen1" name="stupen" value="začiatočník" checked>
								<label for="stupen1">začiatočník</label>
							</div>
							<div class="col-4 col-12-small">
								<input type="radio" id="stupen2" name="stupen" value="pokročilý">
								<label for="stupen2">pokročilý</label>
							</div>
							<div class="col-4 col-12-small">
								<input type="radio" id="stupen3" name="stupen" value="profesionál">
								<label for="stupen3">profesionál</label>
							</div>
							<div class="col-12">
								<textarea name="sprava" id="sprava" placeholder="Napíš sem niečo o sebe a o tvojich skúsenostiach s cvičením" rows="6"></textarea>
							</div>
							<p>Po odoslaní formulára je rezervácia považovaná za záväznú!</p>
							<div class="col-12">
								<ul class="actions">
									<li><input type="submit" value="Rezervovať" class="primary" /></li>
									<li><input type="reset" value="Vymazať" /></li>

								</ul>
							</div>
						</div>
						</form>
					</section>
					<section class="vysledok-ziadosti"></section>
					<?php if (isset($_GET["status"]) && $_GET["status"] == "success"): ?>
						<div style="background: #c1121f; color: black; padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center; font-weight: bold;">
							Žiadosť bola úspešne odoslaná!
						</div>
					<?php endif; ?>
					<section class="wrapper style5">
						<div class="inner">
							<h2>Naši Tréneri</h2>
							<?php foreach ($treneri as $index => $trener): ?>

								<?php
								$pozicia = ($index % 2 == 0) ? "left" : "right";
								?>
								<p>

									<span class="image <?= $pozicia ?>">

										<img
											src="<?= htmlspecialchars($trener['obrazok']) ?>"
											alt="<?= htmlspecialchars($trener['meno']) ?>" />

									</span>

								<h4>
									<?= htmlspecialchars($trener['meno']) ?>
								</h4>

								<?= htmlspecialchars($trener['opis']) ?>

								</p>

							<?php endforeach; ?>
						</div>
					</section>

			</div>
		</section>
	</article>
	<?php include "footer.php" ?>

	<!-- Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/jquery.scrollex.min.js"></script>
	<script src="../assets/js/jquery.scrolly.min.js"></script>
	<script src="../assets/js/browser.min.js"></script>
	<script src="../assets/js/breakpoints.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<script src="../assets/js/main.js"></script>

</body>

</html>