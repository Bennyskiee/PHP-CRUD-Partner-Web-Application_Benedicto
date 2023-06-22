<?php

require('config/config.php');
require('config/db.php');

if(isset($_GET['payment_id'])) 
{$payment_id = $_GET['payment_id'];
$sql = "DELETE FROM `payment` WHERE `payment_id` = '$payment_id'";
    if (mysqli_query($conn, $sql)) {
        header('location: payment.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>