<?php
include '../connection/connect.php';
include 'header.php';
?>


<section class="login_part ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center"
                    style="background-image: url(../assets/img/hero/back.avif); background-size: cover;background-position: center;">
                    <div class="login_part_text_iner">
                        <h2>Add Watch category?</h2>
                        <p> most watches can be categorized into a few types (such as an automatic + analog + diver's
                            watch). </p>
                        <!-- <a href="#" class="btn_3">Create an Account</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Add Your Watch <br>
                            Categories</h3>
                        <form class="row contact_form" enctype="multipart/form-data" method="post"
                            novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name" value=""
                                    placeholder="Category name">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="password" name="details" value=""
                                    placeholder="Category Details">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="file" class="form-control" id="password" name="file" value=""
                                    placeholder="Category Details">
                            </div>

                            <div class="col-md-12 form-group">
                                <!-- <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Remember me</label>
                                </div> -->
                                <button type="submit" value="Login" name="submit" class="btn_3">
                                    Add now
                                </button>
                                <!-- <a class="lost_pass" href="#">forget password?</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->
</main>


<?php
include 'footer.php'
    ?>



<?php


if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $details = $_REQUEST['details'];


    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = '../assets/image/' . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $qryReg = "INSERT INTO `category`(`cname`,`cimage`,`cdetails`)VALUES('$name','$filename','$details')";
        $exe = mysqli_query($conn, $insert);
        if ($conn->query($qryReg) == TRUE) {
            echo "<script>alert('Category Added'); window.location = 'add_category.php';</script>";
        } else {
            echo "<script>alert('Failed'); window.location = 'add_category.php';</script>";
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