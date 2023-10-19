<?php
include '../connection/connect.php';
$cid=$_REQUEST['cid'];

?>

<?php

$del="DELETE FROM `category` WHERE `c_id`='$cid'";

if ($conn->query($del) == TRUE) {
    echo "<script>alert('Deleted Successfully'); window.location = 'view_products.php';</script>";
} else {
    echo "<script>alert('Failed'); window.location = 'view_products.php';</script>";
}


?>