<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/languages/'.$_COOKIE["language"].'.php';
?>

<h1 class="text-center mx-5 mt-3 mb-4 fw-bold"><?php echo $language["historyMine"]; ?></h1>
<div class="container">
    <div class="container">
        <div class="row mb-5">
            <div class="col-6">
                <a href="#!" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="/src/images/history/mineHistory1.jpg" class="img-fluid shadow-2-strong rounded">
                </a>
            </div>

            <div class="col-6"><?php echo $language["mineHistory1"] ?></div>
        </div>

        <div class="row mb-5">
            <div class="col-6"><?php echo $language["mineHistory2"] ?></div>

            <div class="col-6">
                <a href="#!" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="/src/images/history/mineHistory2.jpg" class="img-fluid shadow-2-strong rounded">
                </a>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-6">
                <a href="#!" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="/src/images/history/mineHistory3.jpg" class="img-fluid shadow-2-strong rounded">
                </a>
            </div>
            
            <div class="col-6"><?php echo $language["mineHistory3"] ?></div>
        </div>
    </div>
</div>