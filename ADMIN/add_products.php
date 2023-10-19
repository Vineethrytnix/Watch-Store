<?php
include '../connection/connect.php';
include 'header.php';
$cid = $_REQUEST['c_id'];
?>


<style>
    body {
        font-family: Arial, sans-serif;
    }

    form {
        max-width: 500px;
        margin: 0 auto;
        padding: 40px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: aliceblue;

    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<center>
    <h1>Add Watch Details</h1>
</center><br>

<form method="POST" enctype="multipart/form-data">
    <label for="watchName">Watch Name:</label>
    <input type="text" id="watchName" placeholder="Enter name" name="Name" required>

    <label for="watchBrand">Watch Brand:</label>
    <input type="text" id="watchBrand" name="Brand" placeholder="Enter brand" required>

    <label for="watchPrice">Price (in IND):</label>
    <input type="number" id="watchPrice" name="Price" placeholder="Price" min="0" required>

    <label for="watchImage">Upload Watch Image:</label>
    <input type="file" id="watchImage" name="file" required>

    <center><button type="submit" type="submit" name="submit">Add Watch</button></center>
</form>


<?php
include 'footer.php';
?>


<?php


if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['Name'];
    $Brand = $_REQUEST['Brand'];
    $Price = $_REQUEST['Price'];

    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = '../assets/image/' . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $qryReg = "INSERT INTO `products`(`cid`,`pname`,`brand`,`price`,`pimage`)VALUES('$cid','$name','$Brand ','$Price','$filename')";

        if ($conn->query($qryReg) == TRUE) {
            echo "<script>alert('Product Added'); window.location = 'add_products.php?c_id=$cid';</script>";
        } else {
            echo "<script>alert('Failed'); window.location = 'add_products.php?c_id=$cid';</script>";
        }
    } else {
        echo "ERROR FILE UPLOAD: " . $_FILES["file"]["error"];
        echo "<script>alert('Maximum File Size 2MB');
        window.location = 'user_register.php';
    </script>";
    }
}
?>


<?php
include 'footer.php';
?>