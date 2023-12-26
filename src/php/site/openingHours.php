<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/languages/'.$_COOKIE["language"].'.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/src/php/connectDatabase.php';
?>

<!-- Header -->
<h1 class="text-center mx-5 mt-3 mb-4 fw-bold"><?php echo $language["openingHours"]; ?></h1>
<div class="container">

<div class="accordion accordion-flush" id="accordion">

    <?php
        for ($i = 1; $i <= 2; $i++) {
            ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading<?php echo $i; ?>">
                    <button type="button" class="accordion-button collapsed" data-mdb-collapse-init data-mdb-toggle="collapse" data-mdb-target="#flush-collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $i; ?>"><i class="fas fa-calendar fa-sm me-2 opacity-70"></i><?php echo $language['openingHours'.$i]; ?></button>
                </h2>
                <div id="flush-collapse<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $i; ?>" data-mdb-parent="#accordionFlush">
                    <div class="accordion-body">
                        <ul class="list-group list-group-light">
                            <?php
                                $color = "";
                                if (isset($_COOKIE['MDBstyle']) && $_COOKIE['MDBstyle'] == 'dark') {
                                    $color = " text-light";
                                }
                                foreach(query("SELECT ID, time FROM openingHours WHERE ID LIKE '$i%';") as $hour) {
                                    echo '<li class="list-group-item'.$color.'"><i class="fas fa-calendar-days fa-sm me-2 opacity-70"></i>'.$language['openingHours'.$hour[0]].': '.$hour[1].'</li>';
                                }
                                if ($i == 2) {
                                    echo '<li class="list-group-item'.$color.'"><i class="fas fa-calendar-days fa-sm me-2 opacity-70"></i>'.$language['openingHours'.$i.'.1'].'</li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
</div>
</div>