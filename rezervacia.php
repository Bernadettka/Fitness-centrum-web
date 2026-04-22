<?php
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
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
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
								<input type="text" name="tel" id="tel" placeholder="Telefónne číslo v tvare 0948444..." pattern="[0-9]{10}" required />
							</div>
							<div class="col-12">
								<label for="trener">Vyber si trénera</label>
								<select name="trener" id="trener" required>
									<option value="meno1"> <?= $vybrany_trener == "meno1" ? "selected" : "" ?> Marek Kováč</option>
									<option value="meno2"> <?= $vybrany_trener == "meno2" ? "selected" : "" ?> Tomáš Urban</option>
									<option value="meno3"><?= $vybrany_trener == "meno3" ? "selected" : "" ?> Petra Bohová</option>
									<option value="meno4"><?= $vybrany_trener == "meno4" ? "selected" : "" ?> Lukáš Bielik</option>
								</select>
							</div>
							<div class="col-4 col-12-small">
								<input type="radio" id="stupen" name="stupen" value="začiatočník" checked>
								<label for="demo-priority-low">začiatočník</label>
							</div>
							<div class="col-4 col-12-small">
								<input type="radio" id="stupen" name="stupen" value="pokročilý">
								<label for="demo-priority-normal">pokročilý</label>
							</div>
							<div class="col-4 col-12-small">
								<input type="radio" id="stupen" name="stupen" value="profesionál">
								<label for="demo-priority-high">profesionál</label>
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
							<p><span class="image left"><img src="images/trener1.jpg" alt="" /></span>
							<h4>Marek Kováč</h4> Špecializácia: silový tréning a powerlifting <br> Marek je typ trénera, ktorý miluje činky viac než rannú kávu. Zameriava sa na základné cviky – drep, bench, mŕtvy ťah – a dbá na perfektnú techniku. Je prísny, ale férový, a jeho klienti si často prekonávajú osobné rekordy rýchlejšie, než čakali. Vo voľnom čase sleduje súťaže v silovom trojboji a stále na sebe maká.Okrem klasického tréningu sa venuje aj príprave na súťaže v silovom trojboji. </p>
							<p><span class="image right"><img src="images/trener2.jpg" alt="" /></span>
							<h4>Tomáš Urban </h4> Špecializácia: kondičný tréning, HIIT a spaľovanie tukov <br> Tomáš má nekonečnú energiu a jeho tréningy sú dynamické a intenzívne. Využíva kruhové tréningy, intervaly a funkčné cvičenia. Je ideálny pre ľudí, ktorí chcú schudnúť alebo zlepšiť kondičku. Vie motivovať aj tých, ktorí by to najradšej vzdali po piatich minútach. Jeho tréningy nikdy nie sú rovnaké, stále prináša nové výzvy a cviky, aby telo neupadlo do stereotypu. Okrem cvičenia kladie dôraz aj na životosprávu a regeneráciu.</p>
							<p><span class="image left"><img src="images/trener3.jpg" alt="" /></span>
							<h4>Petra Bohová</h4> Špecializácia: core, mobilita a funkčný tréning <br>Petra sa zameriava na stabilitu, správne držanie tela a prevenciu zranení. Jej tréningy kombinujú silu s mobilitou a často zahŕňajú aj prvky jogy alebo pilatesu. Má priateľský prístup, ale zároveň vie klientov potlačiť k lepším výkonom. Obľubujú ju najmä za to, že tréningy s ňou dávajú zmysel aj v bežnom živote. Pravidelne sleduje nové trendy v oblasti fitness a výživy, ktoré následne aplikuje do tréningových plánov.</p>
							<p><span class="image right"><img src="images/trener4.jpg" alt="" /></span>
							<h4>Lukáš Bielik</h4> Špecializácia: kulturistika a estetika postavy <br>Lukáš sa sústreďuje na detaily – symetria, proporcie a správne zapojenie svalov. Pomáha klientom budovať postavu krok za krokom a učí ich, ako správne cvičiť aj mimo tréningov. Je pokojný, trpezlivý a veľmi technicky založený. Zameriava sa aj na klientov, ktorí majú sedavé zamestnanie alebo problémy s chrbtom. Jej tréningy pomáhajú odstrániť bolesti a zlepšiť celkovú kvalitu pohybu. Verí, že správny základ je kľúčom ku každému ďalšiemu pokroku, a preto kladie dôraz na techniku a kontrolu pohybu.</p>

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