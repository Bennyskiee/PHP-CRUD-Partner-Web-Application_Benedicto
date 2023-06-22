<?php

require('config/config.php');
require('config/db.php');

if(isset($_GET['rent_id'])) {
    $rent_id = $_GET['rent_id'];
    $sql = "DELETE FROM `rent` WHERE `rent_id` = '$rent_id'";
    if (mysqli_query($conn, $sql)) {
        header('location: rent.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>