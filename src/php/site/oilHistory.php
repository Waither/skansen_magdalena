<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/languages/'.$_COOKIE["language"].'.php';
?>

<h1 class="text-center mx-5 mt-3 mb-4 fw-bold"><?php echo $language["historyOil"]; ?></h1>
<div class="container">
    <div class="container">
        <div class="row mb-5">
            <div class="col-6"><?php echo $language["oilHistory1"] ?></div>

            <div class="col-6">
                <a href="#!" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="/src/images/history/oilHistory1.jpg" class="img-fluid shadow-2-strong rounded">
                </a>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-6">
                <a href="#!" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="/src/images/history/oilHistory2.jpg" class="img-fluid shadow-2-strong rounded">
                </a>
            </div>

            <div class="col-6"><?php echo $language["oilHistory2"] ?></div>
        </div>

        <div class="row mb-5">
            <div class="col-6"><?php echo $language["oilHistory3"] ?></div>

            <div class="col-6">
                <a href="#!" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="/src/images/history/oilHistory3.jpg" class="img-fluid shadow-2-strong rounded">
                </a>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-6">
                <a href="#!" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="/src/images/history/oilHistory4.jpg" class="img-fluid shadow-2-strong rounded">
                </a>
            </div>

            <div class="col-6"><?php echo $language["oilHistory4"] ?></div>
        </div>

        <div class="row mb-2">
            <div class="col-6"><?php echo $language["oilHistory5"] ?></div>

            <div class="col-6">
                <a href="#!" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="/src/images/history/oilHistory5.jpg" class="img-fluid shadow-2-strong rounded">
                </a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 text-center"><?php echo $language["oilHistorySrc"] ?></div>
        </div>
    </div>
</div>