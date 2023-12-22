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
    <link rel="icon" href="src/images/icon.ico">

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
    <script type="text/javascript" src="src/js/main.js" defer></script>
    
</head>
<body>






<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">

  	<!-- Container wrapper -->
  	<div class="container-fluid">

    	<!-- Toggle button -->
    	<button type="button" class="navbar-toggler" data-mdb-collapse-init data-mdb-target="#navbarLeftAlignExample"aria-controls="navbarLeftAlignExample"aria-expanded="false"aria-label="Toggle navigation">
      		<i class="fas fa-bars"></i>
    	</button>

		<!-- Collapsible wrapper -->
		<div class="collapse navbar-collapse" id="navbarLeftAlignExample">

			<!-- Left links -->
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>

				<!-- Navbar dropdown -->
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" data-mdb-dropdown-init aria-expanded="false" role="button">Dropdown</a>

					<!-- Dropdown menu -->
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li>
							<button class="btn btn-success bg-" onClick="changeMDBstyle('light')">Normal style</button>
						</li>
						<li>
							<button class="btn btn-danger" onClick="changeMDBstyle('dark')">Dark style</button>
						</li>
						<li><hr class="dropdown-divider" /></li>
						<li>
						<a class="dropdown-item" href="#">Something else here</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>




    

    
	<div style="height: 200px;"></div>
    
    
	<div style="height: 1200px;"></div>
	<?php echo "sieaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasda2ma123";?>
</body>
</html>