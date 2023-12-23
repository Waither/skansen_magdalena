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
	<script type="text/javascript" src="src/js/alerts.js" defer></script>
    <script type="text/javascript" src="src/js/main.js" defer></script>

	<script>
		$(document).ready(function() {
			<?php
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
					<a class="navbar-brand mt-2 mt-lg-0" href="/">
						<img src="/src/images/logo/MagdalenaZŚrodkiem.png" height="50" alt="Logo" loading="lazy">
					</a>

					<li class="nav-item my-auto">
						<a class="nav-link" href="#">Link</a>
					</li>

					<li class="nav-item my-auto dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" data-mdb-dropdown-init aria-expanded="false" role="button">Dropdown</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li>
								<a class="dropdown-item" href="#">Something else here</a>
							</li>

							<li>
								<a class="dropdown-item" href="#">Something else here</a>
							</li>

							<li><hr class="dropdown-divider"></li>

							<li>
								<a class="dropdown-item" href="#">Something else here</a>
							</li>
						</ul>
					</li>
				</ul>

				<!-- Right -->
				<div class="d-flex align-items-center navbar-nav mb-2 mb-lg-0">

					<!-- Style switch -->
					<li class="nav-item align-items-center d-flex me-2">
						<i class="fas fa-sun"></i>
						<div class="ms-2 form-check form-switch">
							<input onchange="changeMDBstyle(this.checked)" id="styleSwitch" class="form-check-input" type="checkbox" role="switch" <?php if (isset($_COOKIE['MDBstyle']) && $_COOKIE['MDBstyle'] == 'dark') { echo "checked"; }; ?>>
						</div>
						<i class="fas fa-moon" style="margin-left: -0.5rem !important;"></i>
					</li>

					<!-- Avatar -->
					<li class="nav-item align-items-center d-flex">
						<a class="d-flex align-items-center hidden-arrow nav-link" href="#" role="button" aria-expanded="false">
							<div class="rounded-circle" height="25" alt="Avatar" loading="lazy">
								<i class="fas fa-user"></i>
							</div>
						</a>
					</li>
				</div>
			</div>
		</div>
	</nav>




    

    
	<div style="height: 45.5px;"></div>
    
    
	<div style="height: 1200px;background-color:grey"></div>
	<?php echo "sieaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasda2ma123";?>

	<!-- Cookie Modal -->
	<div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true" data-mdb-backdrop="default" data-mdb-keyboard="false">
		<div class="modal-dialog modal-frame">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="cookieModalLabel">Informacja o plikach cookie</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">Strona korzysta z plików cookie. Używamy ich w celu zapisania preferencji użytkownika oraz do łatwiejszego poruszania się po samej stronie. W razie odrzucenia plików cookie, strona nie będzie zapisywać preferencji użytkownika.</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Odrzuć</button>
					<button id="acceptCookie" type="button" class="btn btn-primary">Zaakceptuj</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>