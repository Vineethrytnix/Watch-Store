<?php
session_start();
$sid = $_SESSION['uid'];
include '../connection/connect.php';
$ser_id=$_REQUEST['ser_id'];
// $cart_id=$_REQUEST['cart_id']

?>

<?php

$del="DELETE FROM `services` WHERE `service_id`='$ser_id' AND `sid`='$sid'";

if ($conn->query($del) == TRUE) {
    echo "<script>alert('Deleted Successfully'); window.location = 'view_services.php';</script>";
} else {
    echo "<script>alert('Failed'); window.location = 'view_services.php';</script>";
}


?>