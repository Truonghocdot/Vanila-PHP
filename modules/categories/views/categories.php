<?php 
    include "../categories.php";

?>
<!DOCTYPE html>
<html lang="en">
    <?php include "C:/xampp/htdocs/pdo_full/layouts/partials/head.php" ?>
    <style>
        .container {
            position: relative;
        }
        .container .break-line{
            height: 1px;
            left: -300px;
            background-color: #ccc;
            position: absolute;
            width: calc(99vw - 2px);
        }
        .banner-bottom{
            width: 76vw;
        }
    </style>
    <body>
        <div class="container">
            <?php
                include "/xampp/htdocs/pdo_full/layouts/header.php"
            ?>
            <div class="break-line "></div>
            <div class="row">
                <h2 class="text-center fs-1 fw-bold my-3"><?php echo $title ?></h2>
                <img src="/pdo_full/assets/images//products//<?php echo $cat ?>//banner.jpg" alt="">
                <img class="banner-bottom my-5" src="<?php if($cat =='men'|| $cat == 'women' ){
                    echo '/pdo_full/assets/images/products/women/banner-bottom.jpg';
                }else{
                    echo '/pdo_full/assets/images/products/kids/banner-bottom.jpg';
                } ?>" />
            </div>
            <h2 class="text-center fs-1 fw-bold my-3">Danh mục sản phẩm</h2>
            <?php 
            ?>
            <div class="row">
                <div class="col-lg-5">
                    <a href="/pdo_full/modules/products/views/product.php?id=<?php echo $dataS['id'] ?>">
                        <img style="width: 88%" src="/pdo_full/assets/images/products/<?php echo $dataS['thumbnail'] ?>" alt="">
                        <h3><?php echo $dataS['title'] ?></h3>
                        <p><?php echo $dataS['description'] ?></p>
                        <span><?php echo $dataS['price'] ?></span>
                    </a>
                </div>
                <div class="col-lg-7 row">
                    <?php 
                        foreach($dataN as $products){
                            echo "
                                <div class='col-lg-4'>
                                    <a href='/pdo_full/modules/products/views/product.php?id={$products['id']}'>
                                        <img style='width: 88%' src='/pdo_full/assets/images/products/{$products["thumbnail"]}' alt=''>
                                        <h3> {$products["title"]} </h3>
                                        <p> {$products["description"]} </p>
                                        <span> {$products["price"]} </span>
                                    </a>
                                </div>
                            ";
                        }
                    ?>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </div>
    </body>
</html>