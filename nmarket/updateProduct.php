<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products</title>
</head>

<body>
    <?PHP include "adminheader.php";
    $p_id=$_GET["id"];
    
    $p_des=Database::search("SELECT * FROM `product` WHERE `Id`='".$p_id."'");
    $P_data=$p_des->fetch_assoc();

    $s_des=Database::search("SELECT * FROM `storage`");
    $s_row=$s_des->num_rows;

    $c_des=Database::search("SELECT * FROM `color`");
    $c_row=$c_des->num_rows;

    $z_des=Database::search("SELECT * FROM `size`");
    $z_row=$z_des->num_rows;
    
    $z_des=Database::search("SELECT * FROM `size`");
    $z_row=$z_des->num_rows;

    $i_des=Database::search("SELECT * FROM `product_image` where `product_id`='".$p_id."'");
    $i_row=$i_des->num_rows;
   
    
    ?>

    <div class="col-12">
        <div class="container-fluid">
            <div class="col-12 col-lg-7 mx-auto p-5 mt-4 mb-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <div class="col-12">
                    <label class="form-label">Product Item</label>
                    <input type="text" class="form-control"  value="<?php echo $P_data["title"]?>" id="title">
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <label class="form-label">Product price</label>
                        <input type="text" class="form-control" value="<?php echo $P_data["price"]?>" id="price">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Available items</label>
                        <input type="text" class="form-control"  value="<?php echo $P_data["item"]?>" id="item">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label class="form-label">Delivery Cost</label>
                        <input type="text" class="form-control" id="dcost" value="<?php echo $P_data["dcost"]?> " id="dcost">
                    </div>

                    <div class="col-6">
    <label class="form-label">Select Storage</label>
    <select class="form-select" id="storage">
    <?php
    for ($x = 0; $x < $s_row; $x++) {
        $s_data = $s_des->fetch_assoc();

        if ($s_data["Id"] == $P_data["storage_id"]) {
            ?>
            <option selected value="<?php echo $s_data['Id']; ?>"><?php echo $s_data['name']; ?></option>
            <?php
        } else {
            ?>
            <option value="<?php echo $s_data['Id']; ?>"><?php echo $s_data['name']; ?></option>
            <?php
        }
    }
    ?>
</select>

</div>

                </div>


                <div class="row mt-3">

                    <div class="col-6">
                        <label class="form-label">Select Colour</label>
                        <select class="form-select" id="color">
                        <?php
                        for ($x = 0; $x < $c_row; $x++) {
                            $c_data = $c_des->fetch_assoc();

                            if ($c_data["Id"] == $P_data["colour_id"]) {
                                ?>
                                <option selected value="<?php echo $c_data['Id']; ?>"><?php echo $c_data['name']; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $c_data['Id']; ?>"><?php echo $c_data['name'];?></option>
                                <?php
                            }
                        }
                        ?>
                        </select>
                    </div>



                    <div class="col-6">
                        <label class="form-label">Select size</label>
                        <select class="form-select" id="size">
                        <?php
                        for ($x = 0; $x < $c_row; $x++) {
                            $z_data = $z_des->fetch_assoc();

                            if ($z_data["Id"] == $P_data["colour_id"]) {
                                ?>
                                <option selected value="<?php echo $z_data['Id']; ?>"><?php echo $z_data['name']; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $z_data['Id']; ?>"><?php echo $z_data['name'];?></option>
                                <?php
                            }
                        }
                        ?>
                        </select>
                    </div>

                </div>

                <div class="col-12 mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                    <textarea class="form-control"  rows="3" id="desc"><?php echo $P_data["description"]?></textarea>
                </div>

                <div class="row mt-3">
                <?php
                for ($x = 0; $x < $i_row; $x++) {
                    $i_data = $i_des->fetch_assoc();
                    ?>
                    <div class="col-4">
                        <img src="<?php echo $i_data['path']; ?>" class="img-thumbnail" id="i<?php echo $x; ?>" />
                    </div>
                    <?php
                }
                ?>
                </div>


             </div>
                <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                    <input type="file" class="d-none" multiple id="imageUploader" />
                    <label for="imageUploader" class="col-12 btn btn-primary" onclick="UploadImages()">Upload Images</label>
                </div>

                <div class="col-12 d-grid mt-5">
                    <button class="btn btn-success" onclick="updateProduct('<?php echo $p_id;?>')">Update Product</button>
                </div>
            </div>
        </div>
    </div>
    <?PHP include "footer.php";?>
    <script src="script.js"></script>
</body>

</html>