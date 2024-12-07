<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Add CSS link for styling if needed -->
</head>

<body>
    <?php include "adminheader.php"; ?>

    <div class="col-12">
        <div class="container-fluid">
            <div class="col-12 col-lg-7 mx-auto p-5 mt-4 mb-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                
                <div class="col-12">
                    <label class="form-label">Product Title</label>
                    <input type="text" class="form-control" id="title">
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label class="form-label">Product Price</label>
                        <input type="text" class="form-control" id="price">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Available Items</label>
                        <input type="text" class="form-control" id="item">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label class="form-label">Delivery Cost</label>
                        <input type="text" class="form-control" id="dcost">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Select Storage</label>
                        <select class="form-select" id="storage">
                            <option selected>Select Storage</option>
                            <?php
                            $st_rs = Database::search("SELECT * FROM `storage`");
                            if ($st_rs) {
                                $st_num = $st_rs->num_rows;
                                for ($x = 0; $x < $st_num; $x++) {
                                    $st_data = $st_rs->fetch_assoc();
                                    echo "<option value='" . $st_data["Id"] . "'>" . $st_data["name"] . "</option>";
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
                            <option selected>Select Colour</option>
                            <?php
                            $color_rs = Database::search("SELECT * FROM `color`");
                            if ($color_rs) {
                                $color_num = $color_rs->num_rows;
                                for ($x = 0; $x < $color_num; $x++) {
                                    $color_data = $color_rs->fetch_assoc();
                                    echo "<option value='" . $color_data["Id"] . "'>" . $color_data["name"] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Select Size</label>
                        <select class="form-select" id="size">
                            <option selected>Select Size</option> 
                            <?php
                            $size_rs = Database::search("SELECT * FROM `size`");
                            if ($size_rs) {
                                $size_num = $size_rs->num_rows;
                                for ($x = 0; $x < $size_num; $x++) {
                                    $size_data = $size_rs->fetch_assoc();
                                    echo "<option value='" . $size_data["Id"] . "'>" . $size_data["name"] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <label for="productDescription" class="form-label">Product Description</label>
                    <textarea class="form-control" id="desc" rows="3"></textarea>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <img src="resources/noimage.png" class="img-thumbnail" id="i0" />
                    </div>
                    <div class="col-4">
                        <img src="resources/noimage.png" class="img-thumbnail" id="i1" />
                    </div>
                    <div class="col-4">
                        <img src="resources/noimage.png" class="img-thumbnail" id="i2" />
                    </div>
                </div>

                <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                    <input type="file" class="d-none" multiple id="imageUploader" />
                    <label for="imageUploader" class="col-12 btn btn-primary" onclick="UploadImages();">Upload Images</label>
                </div>

                <div class="col-12 d-grid mt-5">
                    <button class="btn btn-success" onclick="addProduct();">Add Product</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>
    <script src="script.js"></script>
</body>

</html>
