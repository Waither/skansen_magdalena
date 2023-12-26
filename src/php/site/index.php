<?php
    // Get all images from directory
    $path = "/src/images/index";
    $files = scandir("/home/php/code/".$path);
?>

<!-- Carousel wrapper -->
<div id="carouselBasic" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>
    
    <!-- Indicators -->
    <div class="carousel-indicators">
        <?php
            $first = true;
            $i = 0;
            foreach($files as $file) {
                if ($file[0] != '.') {
                    ?>
                    <button <?php if ($first) { echo 'class="active" '; $first = false; } ?>type="button" data-mdb-target="#carouselBasic" data-mdb-slide-to="<?php echo $i; ?>" aria-current="true" aria-label="Slide <?php echo ++$i; ?>"></button>
                    <?php
                }
            }
        ?>
    </div>

    <!-- Inner -->
    <div class="carousel-inner">
        <?php
            $first = true;
            foreach($files as $file) {
                if ($file[0] != '.') {
                    ?>
                    <div class="carousel-item<?php if ($first) { echo " active"; $first = false; }; ?>">
                        <img src="<?php echo $path."/".$file ?>" class="d-block w-100">
                    </div>
                    <?php
                }
            }
        ?>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasic" data-mdb-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasic" data-mdb-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>