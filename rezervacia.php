<!DOCTYPE HTML>
<html>
	<head>
		<title>Iron Gym naši tréneri</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
									
							
<!--
								<section>
									<h4>Buttons</h4>
									<ul class="actions">
										<li><a href="#" class="button primary">Primary</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button large">Large</a></li>
										<li><a href="#" class="button">Default</a></li>
										<li><a href="#" class="button small">Small</a></li>
									</ul>
									<ul class="actions fit">
										<li><a href="#" class="button fit">Fit</a></li>
										<li><a href="#" class="button primary fit">Fit</a></li>
										<li><a href="#" class="button fit">Fit</a></li>
									</ul>
									<ul class="actions fit small">
										<li><a href="#" class="button primary fit small">Fit + Small</a></li>
										<li><a href="#" class="button fit small">Fit + Small</a></li>
										<li><a href="#" class="button primary fit small">Fit + Small</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button primary icon solid fa-download">Icon</a></li>
										<li><a href="#" class="button icon solid fa-download">Icon</a></li>
									</ul>
									<ul class="actions">
										<li><span class="button primary disabled">Disabled</span></li>
										<li><span class="button disabled">Disabled</span></li>
									</ul>
								</section>
-->
								<section>
									<h4>Formulár rezervácia</h4>
									<p>individuálny tréning v dĺžke 1 hodiny. Platba na mieste 30 eur v hotovosti</p>
									<form method="post" action="data.php">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
												<input type="text" name="demo-name" id="demo-name" value="" placeholder="Meno" required/>
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="text" name="demo-lastname" id="demo-lastname" value="" placeholder="Priezvisko" required />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" required/>
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="text" name="demo-telcislo" id="demo-telcislo" value="" placeholder="Telefónne číslo v tvare 0948444..." pattern="[0-9]{10}" required/>
											</div>
											<div class="col-12">
												<select name="demo-category" id="demo-category" required>
													<option value="">- Tréneri -</option>
													<option value="1">Manufacturing</option>
													<option value="1">Shipping</option>
													<option value="1">Administration</option>
													<option value="1">Human Resources</option> 
												</select>
											</div>
											<div class="col-4 col-12-small">
												<input type="radio" id="demo-priority-low" name="demo-priority" value="začiatočník" checked>
												<label for="demo-priority-low">začiatočník</label>
											</div>
											<div class="col-4 col-12-small">
												<input type="radio" id="demo-priority-normal" name="demo-priority" value="pokročilý">
												<label for="demo-priority-normal">pokročilý</label>
											</div>
											<div class="col-4 col-12-small">
												<input type="radio" id="demo-priority-high" name="demo-priority" value="profesionál">
												<label for="demo-priority-high">profesionál</label>
											</div>
											<!--
											<div class="col-6 col-12-small">
												<input type="checkbox" id="demo-copy" name="demo-copy">
												<label for="demo-copy">Email me a copy</label>
											</div>
											<div class="col-6 col-12-small">
												<input type="checkbox" id="demo-human" name="demo-human" checked>
												<label for="demo-human">Not a robot</label>
											-->
											</div>
											<div class="col-12">
												<textarea name="demo-message" id="demo-message" placeholder="Napíš sem niečo o sebe a o tvojich skúsenostiach s cvičením" rows="6" required></textarea>
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
								<section class="wrapper style5">
									<div class="inner">
										<h5>Naši Tréneri</h5>
										<p><span class="image left"><img src="images/pic04.png" alt="" /></span>Morbi mattis mi consectetur tortor elementum, varius pellentesque velit convallis. Aenean tincidunt lectus auctor mauris maximus, ac scelerisque ipsum tempor. Duis vulputate ex et ex tincidunt, quis lacinia velit aliquet. Duis non efficitur nisi, id malesuada justo. Maecenas sagittis felis ac sagittis semper. Curabitur purus leo, tempus sed finibus eget, fringilla quis risus. Maecenas et lorem quis sem varius sagittis et a est. Maecenas iaculis iaculis sem. Donec vel dolor at arcu tincidunt bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce ut aliquet justo. Donec id neque ipsum. Integer eget ultricies odio. Nam vel ex a orci fringilla tincidunt. Aliquam eleifend ligula non velit accumsan cursus. Etiam ut gravida sapien. Morbi mattis mi consectetur tortor elementum, varius pellentesque velit convallis. Aenean tincidunt lectus auctor mauris maximus, ac scelerisque ipsum tempor. Duis vulputate ex et ex tincidunt, quis lacinia velit aliquet. Duis non efficitur nisi, id malesuada justo. Maecenas sagittis felis ac sagittis semper. Curabitur purus leo, tempus sed finibus eget, fringilla quis risus. Maecenas et lorem quis sem varius sagittis et a est. Maecenas iaculis iaculis sem. Donec vel dolor at arcu tincidunt bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce ut aliquet justo. Donec id neque ipsum. Integer eget ultricies odio. Nam vel ex a orci fringilla tincidunt. Aliquam eleifend ligula non velit accumsan cursus. Etiam ut gravida sapien.</p>
										<p><span class="image right"><img src="images/pic05.g" alt="" /></span>Vre dui eget i.</p>
									</div>
								</section>

							</div>
						</section>
					</article>
				<?php include "footer.php" ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>