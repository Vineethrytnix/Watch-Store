<?php
session_start();
include 'connection/connect.php';
include 'header.php'

    ?>

    <!-- <style>
        .form-control{
            
        }
    </style> -->

<!-- <section class="contact-section"> -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <center><h2 class="contact-title"><b>Register Here</b></h2><br></center>
            </div>
            <div class="col-md-2"></div>
            <div class="col-lg-8">
                <form class="form-contact" method="post"
                     enctype="multipart/form-data" style="background-color: rgb(233, 241, 247); padding: 50px;border-radius: 20px;border: 1px solid rgb(192, 220, 236);">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="name" id="name" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                    placeholder="Enter your name" style="background-color: white;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="email" id="email" type="email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                    placeholder="Email" style="background-color:  white;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="phone" id="name" type="text" maxlength="10"
                                minlength="10" pattern="[6789][0-9]{9}"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                    placeholder="Enter your Phone" style="background-color:  white;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="password" id="email" type="password"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                    placeholder="Password"  minlength="8" style="background-color:  white;" >
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="file" id="subject" type="file"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                    placeholder="Enter Subject" style="background-color:  white;">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="address" id="message" cols="30" rows="5"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                                    placeholder=" Enter your Address" style="background-color:  white;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <center><button type="submit" name="submit" class="button  boxed-btn">Register</button></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>




<?php
include 'footer.php'
    ?>

    
<?php

if (isset($_POST['submit'])) {

    $Name = $_REQUEST['name'];
    $Phone = $_REQUEST['phone'];
    $Address = $_REQUEST['address'];
    $Email = $_REQUEST['email'];
    $Password = $_REQUEST['password'];
    $currentDate = date("Y-m-d");


    $formattedDate = date("d M Y", strtotime($currentDate));
    echo $formattedDate;

    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = './assets/image/' . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $qryCheck = "SELECT COUNT(*) AS cnt FROM `user` WHERE `email` = '$Email' OR `phone` = '$Phone'";
        $qryOut = mysqli_query($conn, $qryCheck);

        $fetchData = mysqli_fetch_array($qryOut);

        if ($fetchData['cnt'] > 0) {
            echo "<script>alert('Already exist ');
                window.location = 'user_register.php';
            </script>";
        } else {

            $qryReg = "INSERT INTO `user`(`uname`,`uemail`,`uphone`,`uimage`,`uaddress`)VALUES('$Name','$Email','$Phone','$filename','$Address')";
            $qryLog = "INSERT INTO `login` (`rid`, `email`, `password`, `type`) VALUES((select max(`uid`) from `user`), '$Email', '$Password', 'USER')";


            if ($conn->query($qryReg) == TRUE && $conn->query($qryLog) == TRUE) {
                echo "<script>alert('Registration Success'); window.location = 'login.php';</script>";
            } else {
                echo "<script>alert('Registration Failed'); window.location = 'user_reg.php';</script>";
            }
        }
    } else {
        echo "ERROR FILE UPLOAD: " . $_FILES["file"]["error"];
        echo "<script>alert('Maximum File Size 2MB');
            window.location = 'user_register.php';
        </script>";
    }
}
