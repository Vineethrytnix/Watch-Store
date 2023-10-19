<?php
session_start();
$sid = $_SESSION['uid'];
$sb_id=$_REQUEST['sb_id'];
// echo $uid."hello";
include '../connection/connect.php';
include 'header.php'
    ?>

<center>

    <form class="text-center" method="post" style="width:50%">

        <p class="h4 mb-4">Sign in</p>

        <!-- Email -->
        <input type="text" id="" class="form-control" name="amt"
            placeholder="Enter the Amount"><br>

        <button class="btn btn-info btn-block " name="submit" type="submit">ADD</button>


    </form>
</center>
<?php
include 'footer.php'
    ?>


<?php


if (isset($_REQUEST['submit'])) {
    $amount = $_REQUEST['amt'];

    $qryReg = "UPDATE `service_booking` SET `sprice`='3000' WHERE `sc_id`='$sb_id' AND `sc_id`='$sid'";
    if ($conn->query($qryReg) == TRUE) {
        echo "<script>alert('Payment Request Added'); window.location = 'view_booked_service.php';</script>";
    } else {
        echo "<script>alert('Failed'); window.location = 'view_booked_service.php';</script>";
    }

}
?>