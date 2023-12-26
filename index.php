<?php
	// If not language cookie, create default cookie with 'pl'
	if (!isset($_COOKIE['language'])) {
		$options = array(
			'expires' => time()+3600*24*365*10,
			'path' => '/',
			'domain' => '',
			'secure' => true,
			'httponly' => false,
			'samesite' => 'None'
		);
	
		setcookie("language", "pl", $options);

		require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/languages/pl.php';
	}
	else {
		require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/languages/'.$_COOKIE["language"].'.php';
	}
	require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/connectDatabase.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Maciej Gąsior">
    <meta name="description" content="Oficjalna strona Skansenu Przemysłu Naftowego Magdalena w Gorlicach">
	<meta name="google-site-verification" content="oJ95cLyZ6ddjfkp300RBuyp-SnQP42UXPpMQM8rszQk">

    <!-- Title & icon -->
    <title><?php echo $language['name']; ?></title>
    <link rel="icon" href="src/images/logo/MagdalenaZŚrodkiem.png">

    <!-- CSS files -->
    <link type="text/css" rel="stylesheet" href="src/css/fontawesome.min.css">
    <?php
		// Choose style
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
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWVV9zKby56G_r5q9ccpvDjw5lpMRRXjc&callback=console.debug&libraries=maps,marker&v=beta" async></script>

	<script>

		// Do sth after document ready
		$(document).ready(function() {
			<?php
				// If cookies not accepted, show modal
				if (!isset($_COOKIE['cookieAccepted'])) {
					?>
					const cookieModal = new mdb.Modal(document.getElementById("cookieModal"));
					cookieModal.show();
					setCookie('cookieAccepted', true);
					<?php
				}
			?>
		})
	</script>
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
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
						<a class="nav-link" href="#" onclick="loadIndex()"><?php echo $language["home"]; ?></a>
					</li>

					<!-- History -->
					<li class="nav-item my-auto mx-2 dropdown">
						<a id="navbarDropdown1" class="nav-link dropdown-toggle" data-mdb-dropdown-init aria-expanded="false" role="button"><?php echo $language["history"]; ?></a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown1">

							<!-- History of the oil industry -->
							<li><a class="dropdown-item" href="#" onclick="loadHistoryOil()"><?php echo $language["historyOil"]; ?></a></li>

							<!-- History of the Magdalena mine -->
							<li><a class="dropdown-item" href="#" onclick="loadHistoryMine()"><?php echo $language["historyMine"]; ?></a></li>
						</ul>
					</li>

					<!-- Sightseeing -->
					<li class="nav-item my-auto mx-2 dropdown">
						<a id="navbarDropdown2" class="nav-link dropdown-toggle" data-mdb-dropdown-init aria-expanded="false" role="button"><?php echo $language["sightseeing"]; ?></a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown2">

							<!-- Opening hours -->
							<li><a class="dropdown-item" href="#" onclick="loadOpeningHours()"><?php echo $language["openingHours"]; ?></a></li>

							<!-- Tickets -->
							<li><a class="dropdown-item" href="#" onclick="loadTickets()"><?php echo $language["tickets"]; ?></a></li>
						</ul>
					</li>

					<!-- Gallery -->
					<li class="nav-item my-auto mx-2">
						<a class="nav-link" href="#" onclick="loadGallery()"><?php echo $language["gallery"]; ?></a>
					</li>

					<!-- Contact -->
					<li class="nav-item my-auto mx-2">
						<a class="nav-link" href="#" onclick="loadContact()"><?php echo $language["contact"]; ?></a>
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

					<?php
						// Get available languages
						include_once('src/php/languages/all.php');
						$lang = $language['langType'];
					?>

					<!-- Language -->
					<li class="nav-item mx-2 dropdown">
						<a data-mdb-dropdown-init class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false"><i id="selected-lang-flag" class="flag-<?php echo $availableLanguages[$lang][1]; ?> flag m-0"></i></a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">

							<!-- Selected language -->
							<li><a class="dropdown-item" href="#"><i class="flag-<?php echo $availableLanguages[$lang][1]; ?> flag"></i><?php echo $availableLanguages[$lang][2]; ?><i class="fa fa-check text-success ms-2"></i></a></li>
							<li><hr class="dropdown-divider" /></li>

							<!-- Optional language -->
							<?php
								foreach($availableLanguages as $lg) {
									if ($lg[0] != $lang) {
										?>
										<li><a class="dropdown-item" href="#" onclick="changeLanguage('<?php echo $lg[0]; ?>')"><i class="flag-<?php echo $lg[1]; ?> flag"></i><?php echo $lg[2]; ?></a></li>
										<?php
									}
								}
							?>
						</ul>
					</li>
				</div>
			</div>
		</div>
	</nav>

	<!-- Move main, so main will not uppear under navbar -->
	<div id="blankUnderNav"></div>
	
	<!-- Main div -->
	<div id="main" class="mb-2"><?php include('src/php/site/index.php'); ?></div>

	<!-- Footer -->
	<footer class="text-center text-lg-start bg-body-tertiary text-muted">

		<!-- Section: Social media -->
		<section class="d-flex justify-content-center justify-content-lg-between px-5 py-3 border-bottom">

			<!-- Left -->
			<div class="me-5 d-none d-lg-flex flex-column justify-content-center">
				<span class="fs-5"><?php echo $language['socialMedia']; ?>:</span>
			</div>

			<!-- Right -->
			<div>
				<a class="btn btn-dark btn-floating m-1" style="background-color: #3b5998" href="#!" role="button" target="_blank" data-mdb-ripple-init data-mdb-popover-init data-mdb-trigger="hover" data-mdb-placement="top" data-mdb-content="Facebook"><i class="fab fa-facebook-f"></i></a>
				<a class="btn btn-dark btn-floating m-1" style="background-color: #55acee" href="#!" role="button" target="_blank" data-mdb-ripple-init data-mdb-popover-init data-mdb-trigger="hover" data-mdb-placement="top" data-mdb-content="Twitter / X"><i class="fab fa-twitter"></i></a>
				<a class="btn btn-dark btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button" target="_blank" data-mdb-ripple-init data-mdb-popover-init data-mdb-trigger="hover" data-mdb-placement="top" data-mdb-content="Instagram"><i class="fab fa-instagram"></i></a>
			</div>
		</section>

		<!-- Section: Description -->
		<section>
			<div class="container text-center text-md-start mt-5">
				<div class="row mt-3">

					<!-- Description -->
					<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
						<h6 class="text-uppercase fw-bold mb-4"><i class="fas fa-oil-well me-2"></i><?php echo $language['name']; ?></h6>
						<p><?php echo $language['description']; ?></p>
					</div>

					<!-- Opening hours -->
					<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
						<h6 class="text-uppercase fw-bold mb-4"><?php echo $language['openingHours']; ?></h6>
						<p>
							<?php
								for ($i = 1; $i <= 2; $i++) {
									echo '<i class="fas fa-angles-down me-2"></i><span class="fw-bold">'.$language['openingHours'.$i].'</span><br>';
									foreach(query("SELECT ID, time FROM openingHours WHERE ID LIKE '$i%'") as $hour) {
										echo '<i class="fas fa-angle-right me-2"></i>'.$language['openingHours'.$hour[0]].': '.$hour[1].'<br>';
									}
									if ($i == 2) {
										echo '<i class="fas fa-angle-right me-2"></i>'.$language['openingHours'.$i.'.1'].'<br>';
									}
								}
							?>
						</p>
					</div>

					<!-- Contact -->
					<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
						<h6 class="text-uppercase fw-bold mb-4"><?php echo $language['contact']; ?></h6>
						<p><i class="fas fa-location-dot me-2"></i>ul. Lipowa 14, 38-300 Gorlice</p>
						<p><i class="fas fa-envelope me-2"></i>k.dudek1@o2.pl</p>
						<p><i class="fas fa-phone me-2"></i>(+48) 600 491 470</p>
						<p><i class="fas fa-phone me-2"></i>(+48) 723 644 117</p>
					</div>
					
					<!-- Map -->
					<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
						<h6 class="text-uppercase fw-bold mb-4"><?php echo $language["map"] ?></h6>
						<gmp-map class="w-100" style="height: 230px;" center="49.65441131591797,21.135175704956055" zoom="15" map-id="DEMO_MAP_ID">
							<gmp-advanced-marker position="49.65441131591797,21.135175704956055" title="Skansen Przemysłu Naftowego Magdalena w Gorlicach">
							</gmp-advanced-marker>
						</gmp-map>
					</div>
				</div>
			</div>
		</section>

		<!-- Copyright -->
		<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
			<span onclick="loadIndex()" role="button">© <?php echo date("Y"); ?> <?php echo $language['copyright']; ?></span>
		</div>
	</footer>

	<!-- Cookie Modal -->
	<div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true" data-mdb-backdrop="default" data-mdb-keyboard="false">
		<div class="modal-dialog modal-frame">
			<div class="modal-content">

				<!-- Modal header -->
				<div class="modal-header">
					<h5 class="modal-title" id="cookieModalLabel">Informacja o plikach cookie</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					Informujemy, że strona korzysta z plików cookie do zapisu informacji i personalizacji użytkownika.
				</div>
			</div>
		</div>
	</div>
</body>
</html>