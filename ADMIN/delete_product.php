<?php
include '../connection/connect.php';
$pid=$_REQUEST['pid'];

?>

<?php

$del="DELETE FROM `products` WHERE `pid`='$pid'";

if ($conn->query($del) == TRUE) {
    echo "<script>alert('Deleted Successfully'); window.location = 'view_products.php';</script>";
} else {
    echo "<script>alert('Failed'); window.location = 'view_products.php';</script>";
}


?>