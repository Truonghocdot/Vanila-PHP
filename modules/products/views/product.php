<?php
    include "../product.php";
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'C:/xampp/htdocs/pdo_full/layouts/partials/head.php' ?>
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
    </style>
<body>
    <div class="container">
        <?php include'C:/xampp/htdocs/pdo_full/layouts/header.php'; ?>
        <div class="break-line "></div>
        <div class="row my-5">
           
            <div class="col-lg-5">
                <img class="w-100" src="/pdo_full/assets/images/products/<?php echo $data['thumbnail'] ?> " alt="132">
            </div>
            <div class="col-lg-7">
                <h3><?php echo $data['title'] ?> </h3>
                <article><?php echo $data['description'] ?></article>
                <p>Số lượng hàng: <?php echo $data['quantity'] ?></p>
                <h4>Giá sản phẩm: <?php echo $data['price'] ?></h4>
            </div>  
        </div>
    </div>
</body>
</html>