<?php 
    require('./config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php  include "./layouts/partials/head.php" ?>
    <body >
        <header class="container">
            <?php include "./layouts/header.php" ?>
        </header>
        <section>
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="true" data-bs-interval="true">
                <div class="carousel-inner d-flex flex-column">
                    <div class="carousel-item active">
                        <img src="/pdo_full/assets//images//carousel/carousel4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/pdo_full/assets//images//carousel/carousel2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/pdo_full/assets//images//carousel/carousel3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/pdo_full/assets//images//carousel/carousel4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/pdo_full/assets//images//carousel/carousel5.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/pdo_full/assets//images//carousel/carousel6.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </body>
</html>