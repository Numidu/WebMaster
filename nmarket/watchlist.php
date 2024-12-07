<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist</title>
</head>
<body>
    <?PHP include "header.php";?>

    <div class="col-12">
        <div class="container-fluid">
        <div class="row justify-content-center gap-3">
                        <?php
                       $rs= Database::search("SELECT * FROM `watchlist` where `user_id` = '".$_SESSION["u"]["id"]."'");
                       $num=$rs->num_rows;
                     
                       for($x=0;$x<$num;$x++){
                        $data=$rs->fetch_assoc();
                        $p_rs=Database::search("SELECT * from `product` WHERE `id`='".$data["product_id"]."' ");
                        $p_data=$p_rs->fetch_assoc();
                        $i_rs=Database::search("SELECT * FROM `product_image` where `product_id`='".$data["product_id"]."'");
                        $i_data=$i_rs->fetch_assoc();
                        ?>
                        <div class="card col-12 col-lg-4" style="width: 18rem; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <img src="<?php echo $i_data["path"]?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $p_data["title"];?></h5>
                                <h3 style="font-size: 22px;">Rs<?php echo $p_data["price"];?></h3>
                                <div class="col-12 d-grid mt-2">
                                    <button class="btn btn-primary">
                                        Buy Now
                                    </button>
                                </div>
                                <div class="col-12 d-grid mt-2">
                                    <button class="btn btn-dark" onclick="addTocart('<?php echo $p_data['Id'];?>')">
                                        <i class="bi bi-cart" ></i>&nbsp; Add To cart
                                    </button>
                                </div>
                                <div class="col-12 d-grid mt-2">
                                    <button class="btn btn-danger" onclick="remove('2','<?php echo $data['id']?>');">
                                        remove
                                    </button>
                                </div>

                            </div>
                        </div>
                        
                        <?php

                       }

                        ?>
                        
                    </div>
    </div>
    <?PHP include "footer.php";?>
</body>
</html>