<?php
    $username = isset($_SESSION['username'])? $_SESSION['username'] :'';
?>
<style>
    .navbar{
        height: 80px;
        align-items: center;
    }
    .navbar .container-fluid .navbar-nav .navigate{
        column-gap: 22px;
    }
    .navbar .container-fluid .navbar-nav{
        justify-content: space-between;
    }
    .navbar .container-fluid .navbar-nav .nav-link{
        font-size: 22px;
        font-weight: 500;
    }
    .navbar .container-fluid .navbar-nav .tools{    
        column-gap: 22px;
    } .navbar .container-fluid .navbar-nav .tools a i{  
        color: #000;  
        font-size: 22px;
    }
    .dropdown-toggle::after{
        display: none;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid ">
        <div class="navbar-nav w-100">
            <?php 
            ?>
            <div class="navigate d-flex">
                <a class="navbar-brand" href="/pdo_full/index.php"><img src="/pdo_full/assets/icons/logo.svg" alt="" srcset=""/></a>
                <a class="nav-link " aria-current="page" href="/pdo_full/modules/categories/views/categories.php?categories=women">NỮ</a>
                <a class="nav-link" href="/pdo_full/modules/categories/views/categories.php?categories=men">NAM</a>
                <a class="nav-link" href="/pdo_full/modules/categories/views/categories.php?categories=kids">TRẺ EM</a>
                <a class="nav-link" href="/pdo_full/modules/categories/views/categories.php?categories=infant">TRẺ SƠ SINH</a>
            </div>
            <div class="tools d-flex align-items-center ">
                <a href="" class="nav-link">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
                <?php 
                    if(isset($_SESSION['username'])){
                        echo '
                            <li class="nav-item dropdown">
                                <a href="" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-user"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/pdo_full/modules/authenticator/logout/">Đăng xuất</a></li>
                                </ul>
                            </li>
                        ';
                    }else{
                        echo '
                        <a href="/pdo_full/modules/authenticator/login" class="nav-link">
                            <i class="fa-regular fa-user"></i>
                        </a>';
                    }
                ?>
                <a href="" class="nav-link">
                    <i class="fa-regular fa-heart"></i>
                </a>
                <a href="" class="nav-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>
    </div>
</nav>