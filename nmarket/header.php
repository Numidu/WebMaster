<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php 
    include "connection.php";
    session_start();
    ?>

    <div class="col-12">
        <div class="container-fluid">
            <div class="row p-3 bg-black">
                <div class="col-12 col-lg-3 text-center">
                    <img src="resources/logo-no-background.png" width="160px" height="130px" />
                </div>
                <div class="col-6 col-lg-4 text-lg-end pt-5 pt-lg-2">
                <?php
                if(isset($_SESSION["u"])){
                    ?>
                    <button class="btn text-warning" style="border: 1px solid gold;" onclick="Logout()">Hi|<?php echo $_SESSION["u"]["name"]?>|Logout</button>
                    </div>
                    <?php
                }else{

                    ?>
                    <button class="btn text-white" style="border: 1px solid white;" onclick="window.location = 'login.php';">Login | Register</button>
                    </div>

                    <?Php

                }

              ?>

                <div class="col-6 col-lg-3 text-lg-center text-end pt-5 pt-lg-2">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle text-warning" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: 1px solid gold;">
                           Menu
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="myaccount.php">My Account</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-9 col-lg-1 text-end pt-4 pt-lg-2">
                    <button type="button" class="btn position-relative" style="border: none;" onclick="window.location = 'cart.php';">
                        <i class="bi bi-cart2 text-primary" style="font-size: 30px;"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php
if (isset($_SESSION["u"])) {
    $c_rs = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $_SESSION["u"]["id"] . "'");
    $c_num = $c_rs->num_rows;
    echo ($c_num);
} else {
    ?>
    0
    <?php
}
?>

                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>

                </div>
                <div class="col-3 col-lg-1 text-center pt-4 pt-lg-2">
                    <button type="button" class="btn position-relative" style="border: none;" onclick="window.location = 'watchlist.php';">
                        <i class="bi bi-heart text-primary" style="font-size: 30px;"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php
                        if(isset($_SESSION["u"])){
                            $w_rs=Database::search( "SELECT * FROM `watchlist` where `user_id`='" . $_SESSION["u"]["id"] ."'");
                            $w_num=$w_rs->num_rows;
                            echo($w_num);
                        }else{
                            ?>
                            0
                            <?php
                        }
                        ?>
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>

                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>