<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/languages/'.$_COOKIE["language"].'.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/connectDatabase.php';
?>

<!-- Header -->
<h1 class="text-center mx-5 mt-3 mb-4 fw-bold"><?php echo $language["tickets"]; ?></h1>
<div class="container d-flex flex-wrap justify-content-around mb-5">
    <?php
        $color = "";
        if (isset($_COOKIE['MDBstyle']) && $_COOKIE['MDBstyle'] == 'dark') {
            $color = " text-light";
        }
        foreach(query("SELECT * FROM tickets;") as $ticket) {
            ?>
            <div class="card mb-2" style="width: 250px;" role="button" data-mdb-ripple-init data-mdb-ripple-color="secondary">
                
                <!-- Card header -->
                <div class="card-header">
                    <div class="flex-shrink-0 mx-auto" style="height: 200px; width: 200px;">
                        <div class="p-3 badge-secondary rounded-4 h-100 mx-auto d-flex flex-column justify-content-center">
                            <i class="fas fa-ticket fa-7x fa-fw mx-auto"></i>
                        </div>
                    </div>
                </div>

                <!-- Card body -->
                <div class="card-body<?php echo $color ?>">
                    <h3 class="card-title text-center"><?php echo $language[$ticket[1]]; ?></h3>
                    <h1 class="text-center fw-bold"><?php echo $ticket[2]; ?> zł<br></h1>
                    <h6 class="text-center"><?php if ($ticket[3]) { echo $language[$ticket[1]."Text"]; } ?></h6>
                </div>
            </div>
            <?php
        }
    ?>
</div>