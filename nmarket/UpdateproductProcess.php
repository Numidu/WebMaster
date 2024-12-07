<?php
include "connection.php";
$id = $_POST["id"];
$title = $_POST["t"];
$price = $_POST["p"];
$item = $_POST["i"];
$dcost = $_POST["dc"];
$storage = $_POST["st"];
$color = $_POST["c"];
$size = $_POST["s"];
$description = $_POST["de"];

// Input validation
if (empty($title)) {
    echo "Please enter your title";
} else if (empty($price)) {
    echo "Please enter your price";
} else if (empty($item)) {
    echo "Please enter your item";
} else if (empty($dcost)) {
    echo "Please enter your cost";
} else if (empty($storage)) {
    echo "Please enter your storage";
} else if (empty($color)) {
    echo "Please enter your color";
} else if (empty($size)) {
    echo "Please enter your size";
} else if (empty($description)) {
    echo "Please enter your description";
} else {
    Database::search("UPDATE `product` SET `title`='" . $title . "', `price`='" . $price . "', `item`='" . $item . "', `dcost`='" . $dcost . "', `description`='" . $description . "', `storage_id`='" . $storage . "', `colour_id`='" . $color . "', `sized_id`='" . $size . "' WHERE `Id`= '" . $id . "' ");
    
}

$product_id = $id;

// Delete existing images for the product
Database::iud("DELETE FROM `product_image` WHERE `product_id`='" . $product_id . "'");

// Image handling
$uploaded_count = 0;
foreach ($_FILES as $key => $image_file) {
    if (isset($image_file) && $uploaded_count < 3) {
        $image_extension = $image_file["type"];
        $allowed_file_extensions = ["image/jpeg", "image/png", "image/svg+xml"];

        if (in_array($image_extension, $allowed_file_extensions)) {
            $new_image_extension = pathinfo($image_file["name"], PATHINFO_EXTENSION);
            $file_name = "resources/product_images/" . $title . "_" . uniqid() . "." . $new_image_extension;

            if (move_uploaded_file($image_file["tmp_name"], $file_name)) {
                // Insert the new image path into the database
                Database::iud("INSERT INTO `product_image` (`path`, `product_id`) VALUES ('" . $file_name . "', '" . $product_id . "')");
            } else {
                echo "Failed to upload image: " . $key;
            }
        } else {
            echo "Invalid image type for: " . $key;
        }
        $uploaded_count++;
    }
}
echo "success";
if ($uploaded_count == 0) {
    echo "Invalid image count";
}

