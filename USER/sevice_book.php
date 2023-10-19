<?php
session_start();
$uid = $_SESSION['uid'];
$ser_id = $_REQUEST['ser_id'];
$sc_id = $_REQUEST['sc_id'];
// echo $uid."hello";
include '../connection/connect.php';
include 'header.php'
    ?>


<style>
    /* body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    } */

    .containers {
        background-color: #fff;
        max-width: 500px;
        margin: 50px auto;
        padding: 50px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(26, 85, 245, 0.1);
        border: 1px solid #c3d6eb;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    input[type="text"],
    input[type="tel"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    textarea {
        resize: vertical;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    .custom-select {
        width: 100%;
        /* or specify the width you want */
    }
</style>

<div class="containers">
    <h2><b>Add Your Services</b></h2><br>
    <?php
    $view = "SELECT * FROM `services` WHERE `service_id`='$ser_id'";
    $exe = mysqli_query($conn, $view);
    while ($row = mysqli_fetch_array($exe)) {
        ?>
    <form id="watchServiceForm" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="watchBrand">Watch Brand:</label>
            <input type="text" id="watchBrand" placeholder="Enter Watch Brand" readonly value="<?php echo $row['wbrand'] ?>" name="watchBrand" class="form-control"
                required>
        </div>
        <div class="form-group">
            <label for="watchModel">Watch Model:</label>
            <input type="text" id="watchModel" name="watchModel" readonly value="<?php echo $row['model'] ?>" placeholder="Enter Watch Model" class="form-control"
                required>
        </div>

        <div class="form-group">
            <label for="serviceType">Service Type:</label>
            <select id="serviceType" name="serviceType" required class="form-control custom-select">
                <option value="" selected disabled><b>Select Service</b></option>
                <option value="Battery Replacement">Battery Replacement</option>
                <option value="Cleaning and Lubrication">Cleaning and Lubrication</option>
                <option value="Repairs">Repairs</option>
                <option value="Strap Change">Strap Change</option>
                <option value="Other">Other</option>
            </select>
        </div>



        <!-- <div class="form-group">
            <label for="appointmentDate">Preferred Appointment Date:</label>
            <input type="date" id="appointmentDate" name="appointmentDate">
        </div> -->
        <br><br>
        <div class="form-group">
            <label for="contactNumber">Discribe your issue:</label>
            <textarea name="desc" id="" placeholder="Discribe your issue" class="form-control" cols="30" rows="5"></textarea>
        </div>
        <center><button type="submit" name="submit">Book Service</button></center>
    </form>
    <?php } ?>
</div>


<?php


if (isset($_REQUEST['submit'])) {
    $desc = $_REQUEST['desc'];
    // $watchModel = $_REQUEST['watchModel'];
    $serviceType = $_REQUEST['serviceType'];

    $qryReg = "INSERT INTO `service_booking`(`uid`,`service_id`,`sc_id`,`serviceType`,`desc`,`status`,`payment`)VALUES('$uid','$ser_id','$sc_id','$serviceType','$desc','Requested','Not Paid')";
    if ($conn->query($qryReg) == TRUE) {
        echo "<script>alert('Service Booked'); window.location = 'view_services.php';</script>";
    } else {
        echo "<script>alert('Failed'); window.location = 'view_services.php';</script>";
    }

}
?>

<?php
include 'footer.php'
    ?>