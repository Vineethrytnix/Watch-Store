<?php
include '../connection/connect.php';
include 'header.php';
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Inter, sans-serif;
    }

    /* body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: #f5f5f5;
    } */

    .wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 20px;
        display: flex;
        align-content: center;
        justify-content: center;
        gap: 24px;
        flex-wrap: wrap;
    }

    .card {
        position: relative;
        width: 325px;
        height: 450px;
        background: #000;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
    }

    .poster {
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .poster::before {
        content: '';
        position: absolute;
        bottom: -45%;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        transition: .3s;
    }

    .card:hover .poster::before {
        bottom: 0;
    }

    .poster img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .3s;
    }

    .card:hover .poster img {
        transform: scale(1.1);
    }

    .details {
        position: absolute;
        bottom: -100%;
        left: 0;
        width: 100%;
        height: auto;
        padding: 1.5em 1.5em 2em;
        background: #000a;
        backdrop-filter: blur(16px) saturate(120%);
        transition: .3s;
        color: #fff;
        z-index: 2;
    }

    .card:hover .details {
        bottom: 0;
    }

    .details h1,
    .details h2 {
        font-weight: 700;
    }

    .details h1 {
        font-size: 1.5em;
        margin-bottom: 5px;
    }

    .details h2 {
        font-weight: 400;
        font-size: 1em;
        margin-bottom: 10px;
        opacity: .6;
    }

    .details .rating {
        position: relative;
        margin-bottom: 15px;
        display: flex;
        gap: .25em;
    }

    .details .rating i {
        color: #e3c414;
    }

    .details .rating span {
        margin-left: 0.25em;
    }

    .details .tags {
        display: flex;
        gap: .375em;
        margin-bottom: .875em;
        font-size: .85em;
    }

    .details .tags span {
        padding: .35rem .65rem;
        color: #fff;
        border: 1.5px solid rgba(255 255 255 / 0.4);
        border-radius: 4px;
        border-radius: 50px;
    }

    .details .desc {
        color: #fff;
        opacity: .8;
        line-height: 1.5;
        margin-bottom: 1em;
    }

    .details .cast h3 {
        margin-bottom: .5em;
    }

    .details .cast ul {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        gap: 0.625rem;
        width: 100%;
    }

    .details .cast ul li {
        list-style: none;
        width: 55px;
        height: 55px;
        border-radius: 50%;
        overflow: hidden;
        border: 1.5px solid #fff;
    }

    .details .cast ul li img {
        width: 100%;
        height: 100%;
    }

    h1,
    h2 {
        color: white;
    }
</style>

<div class="wrapper">
    <?php
    $view = "SELECT * FROM `service_centre`";
    $exe = mysqli_query($conn, $view);
    while ($row = mysqli_fetch_array($exe)) {
        ?>
        <div class="card">
            <div class="poster"><img src="../assets/image/<?php echo $row['simage'] ?>" alt="Location Unknown"></div>
            <div class="details">
                <h1><?php echo $row['sname'] ?></h1>
                <h2><?php echo $row['semail'] ?></h2>
                <div class="rating">

                </div>
                
                <p class="desc">
                    Contact : <?php echo $row['sphone'] ?><br>
                    <?php echo $row['saddress'] ?>
                </p>
                <div class="tags">
                    <a href="delete_sc?sc_id=<?php echo $row['s_id'] ?>" class="tag" style="color:red">Delete</span>
                    <!-- <a class="tag">Drama</span>
                    <a class="tag">Indie</span> -->
                </div>
                
            </div>
        </div>
    <?php } ?>
</div>

<?php
include 'footer.php';
?>