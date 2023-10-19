<?php
include '../connection/connect.php';
include 'header.php';
?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,300,400,500,600,700,800, 800i, 900&display=swap');

    * {
        padding: 0;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }

    /* body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #131313;
    } */

    .container {
        position: relative;
    }

    .container .card {
        position: relative;
        width: 320px;
        height: 450px;
        background: #232323;
        border-radius: 20px;
        overflow: hidden;
    }

    .container .card:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #1BBFE9;
        clip-path: circle(150px at 80% 20%);
        transition: 0.5s ease-in-out;
    }

    .container .card:hover:before {
        clip-path: circle(300px at 80% -20%);
    }

    .container .card:after {
        content: "Watch";
        position: absolute;
        top: 30%;
        left: -20%;
        font-size: 12em;
        font-weight: 800;
        font-style: italic;
        color: rgba(255, 255, 255, 0.04);

    }

    .container .card .imgBx {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1000;
        width: 100%;
        height: 100%;
        transition: .5s;
    }

    .container .card:hover .imgBx {
        top: 0%;
        transform: translateY(-25%);
        /* bug  */
    }

    .container .card .imgBx img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(20deg);
        width: 160px;
    }

    .container .card .contentBx {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 100px;
        text-align: center;
        transition: 1s;
        z-index: 90;
    }

    .container .card:hover .contentBx {
        height: 210px;
    }

    .container .card .contentBx h2 {
        position: relative;
        font-weight: 600;
        letter-spacing: 1px;
        color: #fff;
        /* z-index: -1; */
    }

    .container .card .contentBx .size,
    .container .card .contentBx .color {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 8px 20px;
        transition: .5s;
        opacity: 0;
        visibility: hidden;
    }

    .container .card:hover .contentBx .size {
        opacity: 1;
        visibility: visible;
        transition-delay: .5s;
    }

    .container .card:hover .contentBx .color {
        opacity: 1;
        visibility: visible;
        transition-delay: .6s;
    }

    .container .card .contentBx .size h3,
    .container .card .contentBx .color h3 {
        color: white;
        font-weight: 300;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-right: 10px;
    }

    .container .card .contentBx .size span {
        width: 26px;
        height: 26px;
        text-align: center;
        line-height: 26px;
        font-size: 14px;
        display: inline-block;
        color: #111;
        background: #fff;
        margin: 0 5px;
        transition: .5s;
        color: #111;
        border-radius: 4px;
        cursor: pointer;
    }

    .container .card .contentBx .size span:hover {
        /* other bug */
        background: #B90000;
    }

    .container .card .contentBx .color span {
        width: 20px;
        height: 20px;
        background: #ff0;
        border-radius: 50%;
        margin: 0 5px;
        cursor: pointer;
    }

    .container .card .contentBx .color span:nth-child(2) {
        background: #1BBFE9;
    }

    .container .card .contentBx .color span:nth-child(3) {
        background: #1B2FE9;
    }

    .container .card .contentBx .color span:nth-child(4) {
        background: #080481;
    }

    .container .card .contentBx a {
        display: inline-block;
        padding: 10px 20px;
        background: #fff;
        border-radius: 4px;
        margin-top: 10px;
        text-decoration: none;
        font-weight: 600;
        color: #111;
        opacity: 0;
        transform: translateY(50px);
        transition: .5s;
    }

    .container .card:hover .contentBx a {
        opacity: 1;
        transform: translateY(0px);
        transition-delay: .7s;
    }

    .imgs {
        width: 150px;
    }

    pre {
        color: #fff;
    }
</style>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title>Product Card UI Design</title>

</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            $view = "SELECT * FROM `products`";
            $exe = mysqli_query($conn, $view);
            while ($row = mysqli_fetch_array($exe)) {
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="imgBx">
                            <img src="../assets/image/<?php echo $row['pimage'] ?>" alt="nike-air-shoe" class="imgs">
                        </div>
                        <div class="contentBx">
                            <h2>
                                <?php echo $row['pname'] ?>
                            </h2>
                            <div class="size">
                                <pre>Brand: <?php echo $row['brand'] ?></pre>
                            </div>
                            <div class="color">
                                <pre>Price: &#8377;<?php echo $row['price'] ?></pre>
                            </div>
                            <a href="delete_product.php?pid=<?php echo $row['pid'] ?>">Delete</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>

<?php
include 'footer.php';
?>