<?php
include "connection.php";

$type=$_POST["t"];
$id=$_POST["i"];

if($type==1){
    Database::iud('DELETE FROM `cart` WHERE `id` = "'.$id.'" ');
    echo "success";

}else if($type==2){
    Database::iud('DELETE FROM `watchlist` WHERE `id` = "'.$id.'" ');
    echo "success";
}



?>