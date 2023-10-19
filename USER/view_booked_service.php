<?php
session_start();
$uid = $_SESSION['uid'];
// echo $uid."hello";
include '../connection/connect.php';
include 'header.php'
    ?>

<center>
    <h1><b>Booked Services</b></h1>
</center><br>
<div class="about-details ">
    <div class="container">
        <div class="row">
            <?php
            $view = "SELECT * FROM `service_booking` WHERE `uid`='$uid'";
            $exe = mysqli_query($conn, $view);
            while ($row = mysqli_fetch_array($exe)) {
                $status = $row['status'];
                $sb_id = $row['sb_id'];
                $price = $row['sprice'];
                // echo $price;

                ?>
                <div class="col-sm-6">
                    <div class="card" style="border-radius:10px">
                        <div class="card-body">
                            <h3 class="card-title"><b>
                                    <?php echo $row['serviceType'] ?>
                                </b></h4>
                                <p class="card-text">Issue :
                                    <?php echo $row['desc'] ?>
                                </p>
                                <p class="card-text">Status :
                                    <?php echo $row['status'] ?>
                                </p>
                                <?php
                                if ($price>=1) {
                                    echo "
                                <p class='card-text'>Amount :
                                    Rs.$price
                                </p>";
                                }else{
                                    echo "
                                <p class='card-text'>Status :
                                    Price No Specified
                                </p>";
                                }

                                ?>

                                <?php

                                if ($status == 'Completed') {
                                    echo "
                                    <center>
                                     <a href='payment2.php?amount=$price&sb_id=$sb_id' class='genric-btn info radius'>Make Payment <img src='../assets/img/income.png' width='20px' ></a> </center>";
                                }
                                else if($status=='Payment & Service Completed'){
                                    echo "
                                    <center>
                                    <a class='genric-btn warning radius'>Payment & Service Completed</a> </center>
                                    ";
                                }
                                
                                else  {
                                    echo "
                                    <center>
                                    <a href='delete_booked_service.php?sb_id=$sb_id'
                                    class='genric-btn danger radius'>Delete</a> </center>
                                    ";
                                }
                                ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
include 'footer.php'
    ?>