<?php
include "connection.php";
session_start();

$txt = $_GET["t"];

$p_rs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $txt . "%'");
$p_num = $p_rs->num_rows;

for ($x = 0; $x < $p_num; $x++) {
    $p_data = $p_rs->fetch_assoc();
    $i_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $p_data["Id"] . "'");
    $i_data = $i_rs->fetch_assoc();
    ?>
    <div class="card col-12 col-lg-4" style="width: 18rem; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <img src="<?php echo $i_data["path"]; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $p_data["title"]; ?></h5>
            <h3 style="font-size: 22px;">Rs.<?php echo $p_data["price"]; ?></h3>
            <p class="text-success"><?php echo $p_data["item"]; ?> Items Available</p>
            <div class="col-12 d-grid mt-2">
                <button class="btn btn-primary">
                    Buy Now
                </button>
            </div>
            <div class="col-12 d-grid mt-2">
                <button class="btn btn-dark" onclick="addTocart('<?php echo $p_data['Id']; ?>')">
                    <i class="bi bi-cart2"></i>&nbsp; Add To Cart
                </button>
            </div>
            <div class="col-12 d-grid mt-2">
                <button class="btn btn-danger" onclick="addTowatchlist('<?php echo $p_data['Id']; ?>')">
                    <i class="bi bi-heart"></i>&nbsp; Add To Watchlist
                </button>
            </div>
        </div>
    </div>
    <?php
}
?>
