<!DOCTYPE html>
<html lang="en">
<?PHP include "header.php"; 
$pid=$_GET["id"];
if(isset($pid)){
    $p_rs=Database::search("SELECT * from `product` WHERE  `Id`= '".$pid."'");
    $p_data=$p_rs->fetch_assoc();
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
   
    
    <div class="col-12 mt-2 overflow-hidden">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="row">
                            <?php
                            $i_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id` = '" . $pid . "'");
                            $i_num = $i_rs->num_rows;

                            for ($x = 0; $x < $i_num; $x++) {
                                $i_data = $i_rs->fetch_assoc();
                                ?>
                                <div class="col-4 col-lg-12 text-center mt-lg-3">
                                    <img src="<?php echo $i_data["path"]; ?>" class="img-thumbnail" style="border: none;" />
                                </div>
                                <?php
                            }
                            ?>

                            </div>
                        </div>

                        <div class="col-12 col-lg-9">
                            <div class="col-lg-12 text-center mt-lg-2 mt-4">
                                <img src="<?php echo $i_data["path"];?>" class="img-thumbnail" style="border: none;" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-1">
                    <h1 class="d-none">SPACE</h1>
                </div>

                <div class="col-12 col-lg-5">

                    <div class="col-12 mt-4">
                        <h1 style="font-size: 23px; font-family: sans-serif;"><?php echo $p_data["title"]?></h1>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-5 col-lg-3">
                                <h1 style="font-size: 30px; font-family: sans-serif;">Rs.<?php echo $p_data["price"]?></h1>
                            </div>

                            <div class="col-4 mt-1 mt-lg-2 ms-2">
                                <p style="font-size: 19px; font-family: sans-serif; color: red; text-decoration: line-through;">Rs.1100.00</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 mt-2 p-3 text-warning " style="background-color: #ff001f; border-radius: 10px;">

                        <h1 style="font-size: 19px; font-family: sans-serif;"><i class="bi bi-truck text-black"></i>&nbsp;&nbsp;Delivery By 12 - 14 Days </h1>

                        <h1 style="font-size: 19px; font-family: sans-serif;"><i class="bi bi-coin text-black"></i>&nbsp;&nbsp;Delivery Cost : Rs.<?php echo $p_data["dcost"]?> </h1>

                    </div>

                    <div class="col-12">

                        <div class="row mt-4">
                            <div class="col-6 col-lg-5">
                                <p style="font-size: 19px; font-family: sans-serif; color: green; "><?php echo $p_data["item"]?> Items Available</p>
                            </div>
                            <div class="col-6">
                                <div class="row text-warning" style="font-size: 19px;">
                                    <div class="col-1">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-black">5/5</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 ">


                        <div class="col-6 col-lg-5">

                        </div>

                        <div class="row justify-content-center">
                            <div class="col-4">
                                <p style="font-size: 17px; font-family: sans-serif;  ">Colour:</p>
                                <button class="btn btn-primary text-primary">00</button>
                            </div>

                            <div class="col-4">
                                <p style="font-size: 17px; font-family: sans-serif;  ">Size:</p>
                                <button class="btn btn-outline-dark">SM</button>
                            </div>

                            <div class="col-2">
                                <p style="font-size: 17px; font-family: sans-serif;  ">Storage:</p>
                                <button class="btn btn-outline-dark">8GB</button>
                            </div>

                        </div>


                    </div>



                   
                    <hr>
                    <div class="col-12 mt-4 mb-3">

                        <div class="row" style="font-family: Quicksand;">
                            <div class="col-6 d-grid">
                                <button class="btn btn-warning" type="submit" id="payhere-payment" onclick="buyNow('<?php echo $pid?>')">Buy Now</button>
                            </div>
                            <div class="col-6 d-grid">
                                <button class="btn btn-primary" onclick="addtocart('<?php echo $p_data['Id']?>')">Add To Cart</button>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>
    </div>

    <hr>

    <div class="col-12 overflow-hidden">
        <div class="container-fluid">
            <div class="col-12">
                <p style="font-size: 23px; font-family: Quicksand;  ">Product Description :</p>

                <p><?php echo $p_data["description"]?></p>
            </div>

        </div>
    </div>

    
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="script.js"></script>

</body>
<?PHP include "footer.php"; ?>



    <?php
}
?>


</html>