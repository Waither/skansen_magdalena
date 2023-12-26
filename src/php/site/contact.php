<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/languages/'.$_COOKIE["language"].'.php';
?>

<!-- Header -->
<h1 class="text-center mx-5 mt-3 mb-4 fw-bold"><?php echo $language["contact"]; ?></h1>
<div class="container mb-5">
    <div class="row">

        <!-- Contact data -->
        <div class="col-lg-6 col-md-12 my-2">
            <section class="mb-2">
                <div class="row gx-lg-5">

                    <!-- Localization -->
                    <div class="col-lg-12 mb-2">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="p-3 badge-info rounded-4">
                                    <i class="fas fa-location-dot fa-lg fa-fw"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <p class="fw-bold mb-1"><?php echo $language["localization"]; ?></p>
                                <p class="text-muted mb-1">ul. Lipowa 14, 38-300 Gorlice</p>
                            </div>
                        </div>
                    </div>

                    <!-- Mail -->
                    <div class="col-lg-12 mb-2">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="p-3 badge-info rounded-4">
                                    <i class="fas fa-envelope fa-lg fa-fw"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <p class="fw-bold mb-1"><?php echo $language["mail"]; ?></p>
                                <p class="text-muted mb-1">k.dudek1@o2.pl</p>
                            </div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="col-lg-12 mb-2">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="p-3 badge-info rounded-4">
                                    <i class="fas fa-phone fa-lg fa-fw"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <p class="fw-bold mb-1"><?php echo $language["phone"]; ?></p>
                                <p class="text-muted mb-1">(+48) 600 491 470 / (+48) 723 644 117</p>
                            </div>
                        </div>
                    </div>

                    <!-- Fax -->
                    <div class="col-lg-12 mb-2">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="p-3 badge-info rounded-4">
                                    <i class="fas fa-fax fa-lg fa-fw"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <p class="fw-bold mb-1">Fax</p>
                                <p class="text-muted mb-1">###</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Map -->
        <div class="col-lg-6 col-md-12 my-2">
            <gmp-map style="min-height: 420px;" center="49.65441131591797,21.135175704956055" zoom="15" map-id="DEMO_MAP_ID">
                <gmp-advanced-marker position="49.65441131591797,21.135175704956055" title="Skansen Przemysłu Naftowego Magdalena w Gorlicach">
                </gmp-advanced-marker>
            </gmp-map>
        </div>
    </div>
</div>