<?php
include '../connection/connect.php';
include 'header.php';
?>

<section class="new-product-area ">
    <div class="container">
        <!-- Section tittle -->
        <div class="row">
            <div class="col-xl-12">
                <div class="section-tittle mb-70">
                    <center><h2>Categories</h2></center>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $view = "SELECT * FROM `category`";
            $exe = mysqli_query($conn, $view);
            while ($row = mysqli_fetch_array($exe)) {

                ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-new-pro mb-30 text-center" style="border: 1px solid rgb(218, 218, 218); border-radius: 20px;"> 
                        <div class="product-img">
                            <img src="../assets/image/<?php echo $row['cimage'] ?>" alt="" style="border-radius:20px">
                        </div>
                        <div class="product-caption">
                            <h3><a href="product_details.html"><?php echo $row['cname'] ?></a></h3>
                            <span style="color : black"><?php echo $row['cdetails'] ?></span>
<br>
                            <!-- <a href="view_products.php?c_id=<?php echo $row['c_id'] ?>" class="btn btn-outline-dark" style="border-radius:10px">View </a><br><br> -->
                           <p><a href="view_products.php?cid=<?php echo $row['c_id'] ?>" class="genric-btn primary-border small" style="border-radius:3px">Explore</a></p>
                        </div>
                    </div>
                </div>

                <?php
            } ?>

        </div>
    </div>
</section>


<?php
include 'footer.php';
?>