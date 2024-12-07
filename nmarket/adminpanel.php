<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <?PHP include "adminheader.php"; 
    ?>

    <div class="col-12">
        <div class="row mx-auto p-2 p-lg-5 gap-3 justify-content-center" style="background-color: black;">
            <div class="col-12 col-lg-3 text-center p-2 p-lg-5" style="background-color: white;">
                <h3>Total Users : 1</h3>
            </div>
            <div class="col-12 col-lg-3 text-center p-2 p-lg-5" style="background-color: white;">
                <h3>Total Products : 4</h3>
            </div>
            <div class="col-12 col-lg-3 text-center p-2 p-lg-5" style="background-color: white;">
                <h3>Orders to deliver :2</h3>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered table-hover w-75 mx-auto p-3 mt-4">
    <thead> 
        <tr  class="table-primary " >
            <th class="text-center p-3">Title</th>
            <th class="text-center p-3">Item</th>
            <th class="text-center p-3">Price</th>
            <th class="text-center p-3">Dcost</th>
            <th class="text-center p-3">Description</th>
            <th class="text-center p-3">Images</th>
            <th class="text-center p-3">Update</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $p_des = Database::search("SELECT * FROM `product`");
        $p_row = $p_des->num_rows;

        for ($x = 0; $x < $p_row; $x++) {
            $p_data = $p_des->fetch_assoc();
            $p_img = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $p_data["Id"] . "'");
            $i_data = $p_img->fetch_assoc();
        ?>
            <tr>
                <td class="text-center"><?php echo $p_data["title"]; ?></td>
                <td class="text-center"><?php echo $p_data["item"]; ?></td>
                <td class="text-center"> RS. <?php echo $p_data["price"]; ?></td>
                <td class="text-center"><?php echo $p_data["dcost"]; ?></td>
                <td class="text-center"><?php echo $p_data["description"]; ?></td>
                <td class="text-center"><img src="<?php echo $i_data['path']; ?>" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;"></td>
                <td class="text-center"><a href="<?php echo 'updateProduct.php?id=' . $p_data["Id"] ?>" class="btn btn-primary btn-sm">Update</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>




<?PHP include "footer.php";?>
</body>

</html>