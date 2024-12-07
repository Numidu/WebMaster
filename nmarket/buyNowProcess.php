<?php
include "connection.php";
session_start();

if (isset($_SESSION["u"])) {
    $pid = $_GET["id"];

    $u_rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $_SESSION["u"]["id"] . "'");
    $u_data = $u_rs->fetch_assoc();

    if (isset($u_data["mobile"]) && isset($u_data["address"])) {
        $fname = $_SESSION["u"]["name"];
        $lname = $_SESSION["u"]["name"];
        $email = $_SESSION["u"]["email"];
        $address = $u_data["address"];
        $mobile = $u_data["mobile"];
        $city = 'colombo';
        $country = "Sri Lanka";
        $order_id = uniqid();
        $currency = "LKR";

        $p_rs = Database::search("SELECT * FROM `product` WHERE `Id` = '" . $pid . "'");
        $p_data = $p_rs->fetch_assoc();

        $item = $p_data["title"];
        $amount = $p_data["price"] + $p_data["dcost"];
        $merchant_id = "1228683";
        $merchant_secret = "MzI1Mjg5MjY5NTIxMjA2OTYxMDUxNDYwNTE2Mjg2MzE0Nzc1MjI0Mw==";

        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );

        $array = [
            "id" => $order_id,
            "fname" => $fname,
            "lname" => $lname,
            "mobile" => $mobile,
            "address" => $address,
            "city" => $city,
            "country" => $country,
            "currency" => $currency,
            "item" => $item,
            "amount" => $amount,
            "m_id" => $merchant_id,
            "m_secret" => $merchant_secret,
            "hash" => $hash,
            "email" => $email
        ];

        echo json_encode($array);

    } else {
        echo ("1");
    }

} else {
    echo ("2");
}
?>
