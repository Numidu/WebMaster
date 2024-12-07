<?php

include "connection.php";

$st = $_POST["s"];
$id = $_POST["i"];

if ($st == 1) {
    Database::iud("UPDATE `invoice` SET `status`='2' WHERE `id`='" . $id . "'");
    echo "sucess";
} elseif ($st == 2) {
    Database::iud("UPDATE `invoice` SET `status`='3' WHERE `id`='" . $id . "'");
    echo "sucess";
}

?>
