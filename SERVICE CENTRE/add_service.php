<?php
session_start();
$sid = $_SESSION['uid'];

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
    <form id="watchServiceForm" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="watchBrand">Watch Brand:</label>
            <input type="text" id="watchBrand" placeholder="Enter Watch Brand" name="watchBrand" class="form-control"
                required>
        </div>
        <div class="form-group">
            <label for="watchModel">Watch Model:</label>
            <input type="text" id="watchModel" name="watchModel" placeholder="Enter Watch Model" class="form-control"
                required>
        </div>
        <div class="form-group">
            <label for="watchModel">Service File:</label>
            <input type="file" id="watchModel" name="file" class="form-control" required>
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
        <!-- <div class="form-group">
            <label for="contactNumber">Contact Number:</label>
            <input type="tel" id="contactNumber" name="contactNumber" class="form-control" pattern="[0-9]{10}" required>
        </div> -->
        <center><button type="submit" name="submit">Add Service</button></center>
    </form>
</div>




<?php
include 'footer.php'
    ?>


<?php


if (isset($_REQUEST['submit'])) {
    $watchBrand = $_REQUEST['watchBrand'];
    $watchModel = $_REQUEST['watchModel'];
    $serviceType = $_REQUEST['serviceType'];

    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = '../assets/image/' . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $qryReg = "INSERT INTO `services`(`sid`,`wbrand`,`model`,`ssimage`,`service`)VALUES('$sid','$watchBrand','$watchModel','$filename','$serviceType')";
        if ($conn->query($qryReg) == TRUE) {
            echo "<script>alert('Service Added'); window.location = 'add_service.php';</script>";
        } else {
            echo "<script>alert('Failed'); window.location = 'add_service.php';</script>";
        }
    } else {
        echo "ERROR FILE UPLOAD: " . $_FILES["file"]["error"];
        echo "<script>alert('Maximum File Size 2MB');
            window.location = 'user_register.php';
        </script>";
    }
}
?>