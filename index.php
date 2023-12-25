<!DOCTYPE html>
<html lang="pl">
<head>

    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Maciej Gąsior">
    <meta name="description" content="Oficjalna strona Skansenu Przemysłu Naftowego Magdalena w Gorlicach">

    <!-- Title & icon -->
    <title>Skansen Przemyslu Naftowego Magdalena w Gorlicach</title>
    <link rel="icon" href="src/images/logo/MagdalenaZŚrodkiem.png">

    <!-- CSS files -->
    <link type="text/css" rel="stylesheet" href="src/css/fontawesome.min.css">
    <?php
        if (isset($_COOKIE['MDBstyle']) && $_COOKIE['MDBstyle'] == 'dark') {
            echo '<link type="text/css" rel="stylesheet" href="src/css/mdb.dark.min.css">';
        }
        else {
            echo '<link type="text/css" rel="stylesheet" href="src/css/mdb.min.css">';
        }
    ?>
    <link type="text/css" rel="stylesheet" href="src/css/main.css">

    <!-- JS files -->
    <script type="text/javascript" src="src/js/popper.min.js"></script>
    <script type="text/javascript" src="src/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="src/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="src/js/mdb.umd.min.js" defer></script>
	<script type="text/javascript" src="src/js/ajaxTemplates.js" defer></script>
    <script type="text/javascript" src="src/js/main.js" defer></script>

	<script>
		$(document).ready(function() {
			<?php
				// If cookie lastUsedFunction set, use last used function
				if (isset($_COOKIE['lastUsedFunction'])) {
					echo $_COOKIE['lastUsedFunction']."()";
				}
				else {
					?>
					loadIndex();
					<?php
				}

				// If cookies not accepted, show modal
				if (!isset($_COOKIE['cookieAccepted'])) {
					?>
					const cookieModal = new mdb.Modal(document.getElementById("cookieModal"));
					cookieModal.show();

					$("#acceptCookie").on("click", e => {
						setCookie('cookieAccepted', true);
					})
					<?php
				}
			?>
		})
	</script>
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">

		<!-- Container wrapper -->
		<div class="container-fluid">

			<!-- Toggle button -->
			<button type="button" class="navbar-toggler" data-mdb-collapse-init data-mdb-target="#navbarLeftAlign" aria-controls="navbarLeftAlign" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars fa-2x"></i>
			</button>

			<!-- Collapsible wrapper -->
			<div id="navbarLeftAlign" class="collapse navbar-collapse fs-5">

				<!-- Left -->
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<!-- Logo -->
					<a class="navbar-brand mt-2 mt-lg-0" href="#" onclick="loadIndex()">
						<img src="/src/images/logo/MagdalenaZŚrodkiem.png" height="50" alt="Logo" loading="lazy">
					</a>

					<!-- Index -->
					<li class="nav-item my-auto mx-2">
						<a class="nav-link" href="#" data-i18n="index" onclick="loadIndex()"></a>
					</li>

					<!-- History -->
					<li class="nav-item my-auto mx-2">
						<a class="nav-link" href="#" onclick="">Historia</a>
					</li>

					<!-- Sightseeing -->
					<li class="nav-item my-auto mx-2 dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" data-mdb-dropdown-init aria-expanded="false" role="button">Zwiedzanie</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">

							<!-- Sightseeing hours -->
							<li><a class="dropdown-item" href="#">Godziny otwarcia</a></li>

							<!-- Tickets -->
							<li><a class="dropdown-item" href="#">Bilety</a></li>

							<!-- Access and parking -->
							<li><a class="dropdown-item" href="#">Dojazd i parking</a></li>
						</ul>
					</li>

					<!-- Gallery -->
					<li class="nav-item my-auto mx-2">
						<a class="nav-link" href="#" onclick="">Galeria</a>
					</li>

					<!-- Contact -->
					<li class="nav-item my-auto mx-2">
						<a class="nav-link" href="#" onclick="">Kontakt</a>
					</li>
				</ul>

				<!-- Right -->
				<div class="d-flex align-items-center navbar-nav mb-2 mb-lg-0">

					<!-- Style switch -->
					<li class="nav-item mx-2 align-items-center d-flex">
						<i class="fas fa-sun"></i>
						<div class="ms-2 form-check form-switch">
							<input onchange="changeMDBstyle(this.checked)" id="styleSwitch" class="form-check-input" type="checkbox" role="switch" <?php if (isset($_COOKIE['MDBstyle']) && $_COOKIE['MDBstyle'] == 'dark') { echo "checked"; }; ?>>
						</div>
						<i class="fas fa-moon" style="margin-left: -0.5rem !important;"></i>
					</li>

					<!-- Language -->
					<li class="nav-item mx-2 dropdown">
						<a data-mdb-dropdown-init class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false"><i id="selected-lang-flag" class="flag-poland flag m-0"></i></a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">

							<!-- Selected language -->
							<li><a class="dropdown-item" href="#" data-i18n-switcher data-i18n-lang="pl"><i class="flag-poland flag"></i>Polski<i class="fa fa-check text-success ms-2"></i></a></li>
							<li><hr class="dropdown-divider" /></li>

							<!-- Optional language -->
							<li><a class="dropdown-item" href="#" data-i18n-switcher data-i18n-lang="en"><i class="flag-united-kingdom flag"></i>English</a></li>
							<li><a class="dropdown-item" href="#" data-i18n-switcher data-i18n-lang="ua"><i class="flag-ukraine flag"></i>українська</a></li>
							<li><a class="dropdown-item" href="#" data-i18n-switcher data-i18n-lang="ru"><i class="flag-russia flag"></i>Русский</a></li>
							<li><a class="dropdown-item" href="#" data-i18n-switcher data-i18n-lang="de"><i class="flag-germany flag"></i>Deutsch</a></li>
						</ul>
					</li>
				</div>
			</div>
		</div>
	</nav>

	<!-- <div id="blankUnderNav"></div> -->
	
	<div id="main"></div>

	<!-- Footer -->
	<footer class="text-center text-lg-start bg-body-tertiary text-muted">

		<!-- Section: Social media -->
		<section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

			<!-- Left -->
			<div class="me-5 d-none d-lg-block">
				<span>Odwiedź nasze social media:</span>
			</div>

			<!-- Right -->
			<div>
				<a class="btn btn-dark btn-floating m-1" style="background-color: #3b5998" href="#!" role="button" target="_blank" data-mdb-ripple-init data-mdb-popover-init data-mdb-trigger="hover" data-mdb-content="Facebook"><i class="fab fa-facebook-f"></i></a>
				<a class="btn btn-dark btn-floating m-1" style="background-color: #55acee" href="#!" role="button" target="_blank" data-mdb-ripple-init data-mdb-popover-init data-mdb-trigger="hover" data-mdb-content="Twitter / X"><i class="fab fa-twitter"></i></a>
				<a class="btn btn-dark btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button" target="_blank" data-mdb-ripple-init data-mdb-popover-init data-mdb-trigger="hover" data-mdb-content="Instagram"><i class="fab fa-instagram"></i></a>
			</div>
		</section>

		<!-- Section: Description -->
		<section>
			<div class="container text-center text-md-start mt-5">
				<div class="row mt-3">

					<!-- Description -->
					<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
						<h6 class="text-uppercase fw-bold mb-4"><i class="fas fa-oil-well me-2"></i>Skansen Przemysłu Naftowego „MAGDALENA”</h6>
						<p>Skansen został utworzony na terenie dawnej kopalni <span class="fw-bold">Magdalena</span> w Gorlicach przy ulicy Lipowej. Skansen został zaprojektowany w sposób, który ma zapewnić jak najwierniejsze odtworzenie historii gorlickiego zagłębia przemysłu naftowego i zachowania jego pamiątek.</p>
					</div>

					<!-- Opening hours -->
					<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
						<h6 class="text-uppercase fw-bold mb-4">Godziny otwarcia</h6>
						<p>
							<i class="fas fa-angles-down me-2"></i><span class="fw-bold">maj – wrzesień</span><br>
							<i class="fas fa-angle-right me-2"></i>poniedziałek – piątek: 9.00 – 14.00, 16.00 – 19.00<br>
							<i class="fas fa-angle-right me-2"></i>sobota: 9.00 – 14.00<br>
							<i class="fas fa-angle-right me-2"></i>niedziela – po uzgodnieniu telefonicznym<br>
							<i class="fas fa-angles-down me-2"></i><span class="fw-bold">październik – kwiecień</span><br>
							<i class="fas fa-angle-right me-2"></i>Skansen można zwiedzać po uzgodnieniu telefonicznym.
						</p>
					</div>

					<!-- Contact -->
					<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
						<h6 class="text-uppercase fw-bold mb-4">Kontakt</h6>
						<p><i class="fas fa-home me-2"></i>ul. Lipowa 14, 38-300 Gorlice</p>
						<p><i class="fas fa-envelope me-2"></i>k.dudek1@o2.pl</p>
						<p><i class="fas fa-phone me-2"></i>(+48) 600 491 470</p>
						<p><i class="fas fa-phone me-2"></i>(+48) 723 644 117</p>
					</div>
					
					<!-- Map -->
					<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
						<h6 class="text-uppercase fw-bold mb-4">Mapa</h6>
						<iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2110.21079925027!2d21.13414561062596!3d49.65409222796242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473dc6bd3840a069%3A0x63612fd94b5756e!2sSkansen%20Przemys%C5%82u%20Naftowego%20Magdalena!5e0!3m2!1spl!2spl!4v1703367648133!5m2!1spl!2spl" style="border: 0; min-width: 320px; min-height: 230px; height: auto;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</section>

		<!-- Copyright -->
		<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
			© <?php echo date("Y"); ?> Skansen Przemysłu Naftowego Magdalena w Gorlicach. Wszelkie prawa zastrzeżone.
		</div>
	</footer>

	<!-- Cookie Modal -->
	<div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true" data-mdb-backdrop="default" data-mdb-keyboard="false">
		<div class="modal-dialog modal-frame">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="cookieModalLabel">Informacja o plikach cookie</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">Informujemy, że strona korzysta z plików cookie do zapisu informacji i personalizacji użytkownika.</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Odrzuć</button>
					<button id="acceptCookie" type="button" class="btn btn-primary">Zaakceptuj</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>