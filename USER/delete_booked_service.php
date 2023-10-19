<?php
session_start();
$uid = $_SESSION['uid'];
include '../connection/connect.php';
$sb_id=$_REQUEST['sb_id'];
// $cart_id=$_REQUEST['cart_id']

?>

<?php

$del="DELETE FROM `service_booking` WHERE `sb_id`='$sb_id' AND `uid`='$uid'";
if ($conn->query($del) == TRUE) {
    echo "<script>alert('Deleted Successfully'); window.location = 'view_booked_service.php';</script>";
} else {
    echo "<script>alert('Failed'); window.location = 'view_booked_service.php';</script>";
}


?>