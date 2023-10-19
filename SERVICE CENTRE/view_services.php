<?php
session_start();
$sid = $_SESSION['uid'];

// echo $uid."hello";
include '../connection/connect.php';
include 'header.php'
    ?>
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <?php
            $view = "SELECT * FROM `services` WHERE `sid`='$sid'";
            $exe = mysqli_query($conn, $view);
            while ($row = mysqli_fetch_array($exe)) {

                ?>
            <div class="col-lg-4">
                <div class="blog_left_sidebar" style="border: 1px solid rgb(200, 207, 207);border-radius: 10px; box-shadow:  0 0 10px cadetblue;">
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="../assets/image/<?php echo $row['ssimage'] ?>" alt="">
                            <a href="#" class="blog_item_date">
                                <p>
                                    <?php echo $row['wbrand'] ?>
                                </p>
                            </a>
                        </div>
                        <div class="blog_details">
                            
                                <center>
                                    <h1>
                                        <?php echo $row['model'] ?>
                                    </h1>
                                </center>
                            
                            <p>
                                Service : <br>
                                <img src="../assets/img/customer-service.png" width="30px" alt="">
                                <?php echo $row['service'] ?>
                            </p>
                            <center>
                                <ul class="blog-info-link" style="margin-left: 70px;">

                                    <li><a href="delete_service.php?ser_id=<?php echo $row['service_id'] ?>"><i class="fa fa-trash"></i>Delete</a></li>
                                    <li><a href="update_service.php?ser_id=<?php echo $row['service_id'] ?>"><i class="fa fa-upload"></i>Update</a></li>
                                </ul>
                            </center>
                        </div>
                    </article>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php
include 'footer.php'
    ?>