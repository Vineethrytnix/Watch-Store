<?php
session_start();
$sid = $_SESSION['uid'];
include '../connection/connect.php';
$sb_id=$_REQUEST['sb_id'];


?>

<?php

$del="UPDATE `service_booking` SET 'Completed' WHERE `sb_id`='$sb_id'";

if ($conn->query($del) == TRUE) {
    echo "<script>alert('Completed'); window.location = 'view_booked_service.php';</script>";
} else {
    echo "<script>alert('Failed'); window.location = 'view_booked_service.php';</script>";
}


?>