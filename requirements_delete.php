<?php

require('config/config.php');
require('config/db.php');

if(isset($_GET['requirements_id'])) 
{$requirements_id = $_GET['requirements_id'];
$sql = "DELETE FROM `requirements` WHERE `requirements_id` = '$requirements_id'";
    if (mysqli_query($conn, $sql)) {
        header('location: requirements.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>