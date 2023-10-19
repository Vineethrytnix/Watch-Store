<?php
session_start();
$uid = $_SESSION['uid'];
// echo $uid."hello";
include '../connection/connect.php';
include 'header.php'
    ?>

<style>
    table {
        text-align: center;
    }
</style>

<section class="confirmation_part ">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="order_details_iner">
                    <h2>Order Details</h2>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>

                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $view = "SELECT `cart`.*,`payment`.*,`products`.* FROM `payment`,`cart`,`products` WHERE `cart`.`pid`=`products`.`pid` AND `cart`.`status`='Purchased' AND `payment`.`uid`='$uid'";
                            $exe = mysqli_query($conn, $view);
                            while ($row = mysqli_fetch_array($exe)) {
                                $cart_id=$row['cart_id'];
                                $pay_id=$row['pay_id'];


                                ?>
                                <tr>
                                    <th><span>
                                            <img src="../assets/image/<?php echo $row['pimage'] ?>" width="80px" alt="">
                                        </span></th>
                                    <th>
                                    <th><span>
                                            <?php echo $row['pname'] ?>
                                        </span></th>
                                    <th>

                                        <?php echo $row['quantity'] ?>x
                                    </th>
                                    <th> <span>&#8377;
                                            <?php echo $row['price'] ?>
                                        </span></th>
                                    <th><a href="delete_ordered.php?cart_id=<?php echo $cart_id ?>&pay_id=<?php echo $pay_id ?>"><img src="../assets/img/delete1.png" width="30px" alt=""></a></th>
                                </tr>
                                <?php
                            }
                            ?>
                            <?php
                            $view = "SELECT * FROM `payment` WHERE `uid`='$uid'";
                            $exe = mysqli_query($conn, $view);
                            while ($row = mysqli_fetch_array($exe)) {
                                ?>
                               
                                <tr>
                                    <th scope="col" colspan="4">Total Amount Of Purchase</th>
                                    <th scope="col">Total Rs.
                                        <?php echo $row['amount'] ?>.00
                                    </th>
                                </tr>
                                <?php
                            }
                            ?>


                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include 'footer.php'
    ?>