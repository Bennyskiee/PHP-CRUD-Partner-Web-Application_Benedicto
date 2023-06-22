<?php

require('config/config.php');
require('config/db.php');

if(isset($_GET['vehicle_id'])) {
    $vehicle_id = $_GET['vehicle_id'];
    $sql = "DELETE FROM `vehicle` WHERE `vehicle_id` = '$vehicle_id'";
    if (mysqli_query($conn, $sql)) {
        header('location: vehicle.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>