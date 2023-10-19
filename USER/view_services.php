<?php
session_start();
$uid = $_SESSION['uid'];

// echo $uid."hello";
include '../connection/connect.php';
include 'header.php'
    ?>
<!-- <section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <?php
            $view = "SELECT * FROM `services`";
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
</section> -->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;600&display=swap');

    /* html {
        box-sizing: border-box;
        font-size: 100%;
    } */

    /* html,
    body {
        height: 100%;
    } */

    /* *,
    *:before,
    *:after {
        box-sizing: inherit;
    } */

    img {
        max-width: 100%;
        height: auto;
    }

    /* body {
        -webkit-text-size-adjust: 100%;
        font-variant-ligatures: none;
        text-rendering: optimizeLegibility;
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        font-size: 100%;
        font-family: 'Fira Sans', sans-serif;
    } */

    h1,
    h2,
    h3,
    h4,
    h5 {
        font-weight: 800;
        margin-top: 0;
        margin-bottom: 0;
    }

    /* body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: 0;
        height: 100vh;
        color: #1F1D42;
        background-color: #F0F8E1;
    } */

    .card-hover {
        width: 360px;
        height: 500px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 32px -10px rgba(0, 0, 0, 0.08);
    }

    .card-hover:hover {
        .card-hover__content {
            background-color: #DEE8C2;
            bottom: 100%;
            transform: translateY(100%);
            padding: 50px 60px;
            transition: all 0.35s cubic-bezier(.1, .72, .4, .97);
        }

        .card-hover__link {
            opacity: 1;
            transform: translate(-50%, 0);
            transition: all 0.3s 0.35s cubic-bezier(.1, .72, .4, .97);
        }

        img {
            transform: scale(1);
            transition: 0.35s 0.1s transform cubic-bezier(.1, .72, .4, .97);
        }
    }

    .card-hover__content {
        width: 100%;
        text-align: center;
        background-color: #86B971;
        padding: 0 60px 50px;
        position: absolute;
        bottom: 0;
        left: 0;
        transform: translateY(0);
        transition: all 0.35s 0.35s cubic-bezier(.1, .72, .4, .97);
        will-change: bottom, background-color, transform, padding;
        z-index: 1;
    }

    .card-hover__content::before,
    .card-hover__content::after {
        content: '';
        width: 100%;
        height: 120px;
        background-color: inherit;
        position: absolute;
        left: 0;
        z-index: -1;
    }

    .card-hover__content::before {
        top: -80px;
        clip-path: ellipse(60% 80px at bottom center);
    }

    .card-hover__content::after {
        bottom: -80px;
        clip-path: ellipse(60% 80px at top center);
    }

    .card-hover__title {
        font-size: 1.5rem;
        margin-bottom: 1em;
    }

    .card-hover__title span {
        color: #2d7f0b;
    }

    .card-hover__text {
        font-size: 0.75rem;
    }

    .card-hover__link {
        position: absolute;
        bottom: 1rem;
        left: 50%;
        transform: translate(-50%, 10%);
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        text-decoration: none;
        color: #2d7f0b;
        opacity: 0;
        padding: 10px;
        transition: all 0.35s;
    }

    .card-hover__link:hover {
        svg {
            transform: translateX(4px);
        }
    }

    .card-hover__link svg {
        width: 18px;
        margin-left: 4px;
        transition: transform 0.3s;
    }

    .card-hover__extra {
        height: 50%;
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;
        font-size: 1.5rem;
        text-align: center;
        background-color: #86b971;
        padding: 80px;
        bottom: 0;
        z-index: 0;
        color: #dee8c2;
        transform: translateY(100%);
        will-change: transform;
        transition: transform 0.35s;
    }

    .card-hover__extra span {
        color: #2d7f0b;
    }

    .card-hover img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: -1;
        transform: scale(1.2);
        transition: 0.35s 0.35s transform cubic-bezier(.1, .72, .4, .97);
    }
</style>



<section class="blog_area ">
    <div class="container">
        <div class="row">
            <?php
            $view = "SELECT * FROM `services`";
            $exe = mysqli_query($conn, $view);
            while ($row = mysqli_fetch_array($exe)) {

                ?>
                <div class="col-lg-4">
                    <div class="card-hover" style=" border-radius:10px;">
                        <div class="card-hover__content">
                            <h3 class="card-hover__title">
                                <!-- <img src="../assets/img/customer-service.png" width="30px" alt=""> -->
                                <?php echo $row['service'] ?>
                            </h3>
                            <p class="card-hover__text">Watch Type : <?php echo $row['wbrand'] ?></p>
                            <p class="card-hover__text">Brand : <?php echo $row['model'] ?></p>
                            <a href="sevice_book.php?ser_id=<?php echo $row['service_id'] ?>&sc_id=<?php echo $row['sid'] ?>" class="card-hover__link">
                                <span>Book Now</span>
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                        <div class="card-hover__extra">
                            <h4>Learn <span>now</span> and get <span>40%</span> discount!</h4>
                        </div>
                        <img src="../assets/image/<?php echo $row['ssimage'] ?>" alt="">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php
include 'footer.php'
    ?>