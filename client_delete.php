<?php

require('config/config.php');
require('config/db.php');

if(isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];
    $sql = "DELETE FROM `customer` WHERE `customer_id` = '$customer_id'";
    if (mysqli_query($conn, $sql)) {
        header('location: client.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>