<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>
    <?PHP include "header.php"; 
    if(isset($_SESSION["u"])){
        ?>
        <div class="col-12">
        <div class="container-fluid">
            <div class="row pt-5 pb-5">
                <div class="col-12 col-lg-8">

                    <div class="row justify-content-center gap-3">
                        <?php
                       $rs= Database::search("SELECT * FROM `cart` where `user_id` = '".$_SESSION["u"]["id"]."'");
                       $num=$rs->num_rows;
                     
                       $total=0;
                       $delivery=0;

                       for($x=0;$x<$num;$x++){
                        $data=$rs->fetch_assoc();
                        $p_rs=Database::search("SELECT * from `product` WHERE `id`='".$data["product_id"]."' ");
                        $p_data=$p_rs->fetch_assoc();
                        

                     
                        $total=$total+$p_data["price"]*$data["quentity"];
                        $delivery=$delivery+$p_data["dcost"];

                        $i_rs=Database::search("SELECT * FROM `product_image` where `product_id`='".$data["product_id"]."'");
                        $i_data=$i_rs->fetch_assoc();
                        ?>
                        <div class="card col-12 col-lg-4" style="width: 18rem; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <img src="<?php echo $i_data["path"]?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $p_data["title"];?></h5>
                                <h3 style="font-size: 22px;">Rs<?php echo $p_data["price"];?></h3>
                                <p class="text-success">qty:<?php echo $data["quentity"];?></p>
                                <div class="col-12 d-grid mt-2">
                                    <button class="btn btn-primary">
                                        Buy Now
                                    </button>
                                </div>
                                <div class="col-12 d-grid mt-2">
                                    <button class="btn btn-dark" onclick="addTowatchlist('<?php echo $p_data['Id'];?>')">
                                        <i class="bi bi-heart" ></i>&nbsp; Add To Watchlist
                                    </button>
                                </div>
                                <div class="col-12 d-grid mt-2">
                                    <button class="btn btn-danger" onclick="remove('1','<?php echo $data['id']?>');">
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
                <div class="col-12 col-lg-4 text-center mt-4 mt-lg-0" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

                    <div class="col-12 pt-2 pb-2 text-primary">
                        <h3> <i class="bi bi-cart2"></i>&nbsp;Cart</h3>
                        <hr>
                    </div>
                    <div class="col-12 mt-3" style="font-family: sans-serif;">
                        <h4><?php echo $num; ?></h4>
                        <h4>Price : Rs.<?php echo $total ; ?></h4>
                        <h4>Delivery : Rs.<?php echo $delivery; ?></h4>
                    </div>
                    <hr>
                    <div class="col-12 pt-3 pb-3" style="background-color: lightgray;">

                        <h4>Subtotal : Rs.<?php echo $delivery+$total; ?></h4>

                    </div>
                    <hr>
                    <div class="col-12 d-grid pb-4">
                        <button class="btn btn-primary" onclick="buyproduct()">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?PHP include "footer.php";?>
        
        <?php

    }else{
        ?>
        <script>window.location="loging.php";</script>
        <?php
    }
    
    ?>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script src="script.js"></script> 
</body>

</html>