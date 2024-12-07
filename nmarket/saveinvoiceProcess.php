<?php
include "connection.php";
session_start();

$oid = $_POST["oi"];
$item = $_POST["it"];
$total = $_POST["to"];
$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

Database::iud("INSERT INTO `invoice` (`id`, `title`, `total`, `date`, `status`, `user_id`) VALUES ('" . $oid . "', '" . $item . "', '" . $total . "', '" . $date . "', '1', '" . $_SESSION["u"]["id"] . "')");
echo "success";
?>
