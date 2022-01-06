<style>
    .wrapper {

        background-color: #333647;
        min-height: 100vh;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: 'Raleway'sans-serif;
        color: #fff;
    }

    .wrapper #head h1 {
        font-size: 600px;
        font-weight: 500;
        margin-top: 36px;
        margin-bottom: 25px;
        text-align: center;

    }

    .wrapper h5 {
        font-size: 15px;
        text-align: center;
        font-weight: 300;
        margin-bottom: 50px;
    }

    .card1 {
        width: 350px;
        /* height: 250px; */
        border-radius: 15px;
        /* margin: 110px 0 80px 0; */
        padding: 20px 30px;
        position: relative;
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 20px 25px 30px rgba(0, 0, 0, 0.2);
        transition: 0.5s;

    }

    .card1 img {
        border: 2px solid #f87652;
        border-radius: 50%;
        position: absolute;
        top: -18%;
        left: 20px;
        z-index: 2;
    }


    .card1 p {
        font-size: 16px;
        margin-top: 25px;
        margin-bottom: 10px;
    }

    .card1 h2 {
        font-weight: 500;
        margin-bottom: 5px;
    }

    .card1 h4 {
        color: rgb(66, 9, 5);
        font-weight: 400;
        font-size: 16px;
    }

    .card1 i {
        font-size: 60px;
        position: absolute;
        bottom: 20px;
        right: 25px;
        color: rgb(196, 121, 93);

    }

    .card1:hover {
        transform: scale(1.2) !important;
        background: #fff;
        opacity: 2;
        z-index: 3;
    }

    .card1:hover p,
    .card1:hover h2 {
        color: #333 !important;
    }

    .owl-stage-outer {
        overflow: visible !important;
    }

    /* responsive design */

    @media (max-width: 763px) and (min-width:400px) {
        .card1 {
            width: 100%;
            flex-direction: column;
            flex-wrap: wrap
        }

        .card1 {
            margin: 20px 0;
        }
    }

    .owl-carousel .owl-stage-outer {
        /* override */
        overflow: visible;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="wrapper" id="testimonial" style="width:100%">

    <!-- <h1 id="head">Testimonials</h1>
    <h3> d</h3> -->
    <div class="owl-carousel">
        <?php
        $sql = "SELECT * FROM testimonials";
        $result = $con->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="card1">
                <img src="./Images/testimonials/<?php echo $row['image']; ?>" style="height: 90px; width: 90px;z-index: 2;overflow: visible;" alt="3st reviews customer image">
                <p><?php echo $row['message']; ?></p>
                <h2><?php echo $row['name']; ?></h2>
                <h4 id="occupation"><?php echo $row['position']; ?></h4>
                <i class="fa fa-quote-left"></i>
            </div>
        <?php } ?>


    </div>
</div>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        dots: true,
        margin: 10,
        autoplayHoverPause: true,
        autoplay: true,
        autoplayTimeout: 2000,
        nav: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            }
        }
    })
</script>