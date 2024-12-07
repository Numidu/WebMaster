<?php
include "connection.php";
session_start();

if (isset($_SESSION["u"])) {
    $pid = $_GET["id"];
    $rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '" . $pid . "' AND `user_id` = '" . $_SESSION["u"]["id"] . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        Database::iud("DELETE FROM `watchlist` WHERE `product_id` = '" . $pid . "' AND `user_id` = '" . $_SESSION["u"]["id"] . "'");
        echo "Removed";
    } else {
        Database::iud("INSERT INTO `watchlist` (`product_id`, `user_id`) VALUES ('" . $pid . "', '" . $_SESSION["u"]["id"] . "')");
        echo "Added";
    }
} else {
    echo "Please log in first";
}
