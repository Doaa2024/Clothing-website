<?php require_once("../class/index.class.php"); ?>
<?php $index = new Index();
$allindex = $index->getAllIndex();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Slider</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Custom CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800');

        * {
            box-sizing: border-box;
        }

        .body1 {
            background-color: #fff5dd;
            /* Slightly darker beige */
            min-height: 100vh;
            font-family: 'Fira Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .blog-slider {
            width: 95%;
            position: relative;
            max-width: 1000px;
            margin: auto;
            background: #fff8ea;
            /* Slightly darker beige */
            box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
            padding: 25px;

            border-radius: 25px;
            height: 500px;
            max-height: 100%;
            transition: all .3s;
        }

        @media screen and (max-width: 992px) {
            .blog-slider {
                max-width: 680px;
                height: 400px;
            }
        }

        @media screen and (max-width: 768px) {
            .blog-slider {
                min-height: 500px;
                height: auto;
                margin: 180px auto;
            }
        }

        @media screen and (max-height: 500px) and (min-width: 992px) {
            .blog-slider {
                height: 350px;
            }
        }

        .blog-slider__item {
            display: flex;
            align-items: center;
        }

        @media screen and (max-width: 768px) {
            .blog-slider__item {
                flex-direction: column;
            }
        }

        .blog-slider__item.swiper-slide-active .blog-slider__img img {
            opacity: 1;
            transition-delay: .3s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>* {
            opacity: 1;
            transform: none;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(1) {
            transition-delay: 0.4s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(2) {
            transition-delay: 0.5s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(3) {
            transition-delay: 0.6s;
        }

        .blog-slider__img {
            width: 350px;
            flex-shrink: 0;
            height: 350px;
            background-color: #d9b78d;
            /* Slightly darker beige */
            box-shadow: 4px 13px 30px 1px rgba(217, 183, 141, 0.2);
            border-radius: 20px;
            transform: translateX(-80px);
            overflow: hidden;
            position: relative;
        }

        .blog-slider__img:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #d9b78d;
            /* Slightly darker beige */
            border-radius: 20px;
            opacity: 0;
        }

        .blog-slider__img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            opacity: 0;
            border-radius: 20px;
            transition: all .3s;
        }

        @media screen and (max-width: 992px) {
            .blog-slider__img {
                width: 45%;
            }
        }

        @media screen and (max-width: 768px) {
            .blog-slider__img {
                transform: translateY(-50%);
                width: 90%;
            }
        }

        @media screen and (max-width: 576px) {
            .blog-slider__img {
                width: 95%;
            }
        }

        @media screen and (max-height: 500px) and (min-width: 992px) {
            .blog-slider__img {
                height: 270px;
            }
        }

        .blog-slider__content {
            padding-right: 25px;

        }

        @media screen and (max-width: 992px) {
            .blog-slider__content {
                width: 55%;
            }
        }

        @media screen and (max-width: 768px) {
            .blog-slider__content {
                margin-top: -80px;
                text-align: center;
                padding: 0 30px;
            }
        }

        @media screen and (max-width: 576px) {
            .blog-slider__content {
                padding: 0;
            }
        }

        .blog-slider__content>* {
            opacity: 0;
            transform: translateY(25px);
            transition: all .4s;
        }

        .blog-slider__code {
            color: #7b7992;
            margin-bottom: 15px;
            display: block;
            font-weight: 500;
        }

        .blog-slider__title {
            font-size: 30px;
            font-weight: 700;
            color: #0d0925;
            margin-bottom: 20px;
        }

        .blog-slider__text {
            color: #333;
            margin-bottom: 30px;
            font-size: 18px;

            line-height: 1.5em;
        }

        .blog-slider__button {
            display: inline-flex;
            background-color: #d4a162;
            /* Slightly darker beige */
            padding: 15px 35px;
            border-radius: 50px;
            color: #fff;
            box-shadow: 0px 14px 80px rgba(217, 183, 141, 0.4);
            text-decoration: none;
            font-weight: 500;
            justify-content: center;
            text-align: center;
            letter-spacing: 1px;
        }

        .blog-slider__button:hover {
            background-color: #f0cda2;
            color: white;
        }

        @media screen and (max-width: 576px) {
            .blog-slider__button {
                width: 100%;
            }

            .blog-slider__title {
                font-size: medium;
            }

            .blog-slider__text {
                font-size: small;
            }
        }

        .swiper-container-horizontal>.swiper-pagination-bullets,
        .swiper-pagination-custom,
        .swiper-pagination-fraction {
            bottom: 10px;
            left: 0;
            width: 100%;
        }

        .blog-slider__pagination {
            position: absolute;
            z-index: 21;
            right: 20px;
            width: 11px !important;
            text-align: center;
            left: auto !important;
            top: 50%;
            bottom: auto !important;
            transform: translateY(-50%);
        }

        @media screen and (max-width: 768px) {
            .blog-slider__pagination {
                transform: translateX(-50%);
                left: 50% !important;
                top: 205px;
                width: 100% !important;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }

        .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
            margin: 8px 0;
        }

        @media screen and (max-width: 768px) {
            .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
                margin: 0 5px;
            }
        }

        .swiper-pagination-bullet {
            width: 11px;
            height: 11px;
            display: block;
            border-radius: 10px;
            background: #d3a56d;
            opacity: 0.2;
            transition: all .3s;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
            background: #d3a56d;
            /* Slightly darker beige */
            height: 30px;
            box-shadow: 0px 0px 20px rgba(217, 183, 141, 0.3);
        }

        @media screen and (max-width: 768px) {
            .swiper-pagination-bullet-active {
                height: 11px;
                width: 30px;
            }
        }
    </style>
</head>


<div class="body1">
    <div class="blog-slider">
        <div class="blog-slider__wrp swiper-wrapper">
            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[6]['image'] ?>" alt="">
                </div>
                <div class="blog-slider__content">

                    <div class="blog-slider__title"><?= $allindex[6]['title'] ?></div>
                    <div class="blog-slider__text"><?= $allindex[6]['description'] ?></div>
                    <a href="about.php" class="blog-slider__button">About Us</a>
                </div>
            </div>
            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[7]['image'] ?>" alt="">
                </div>
                <div class="blog-slider__content">

                    <div class="blog-slider__title"><?= $allindex[7]['title'] ?></div>
                    <div class="blog-slider__text"><?= $allindex[7]['description'] ?></div>
                    <a href="about.php" class="blog-slider__button">About US</a>
                </div>
            </div>
            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[8]['image'] ?>" alt="">
                </div>
                <div class="blog-slider__content">

                    <div class="blog-slider__title"><?= $allindex[8]['title'] ?></div>
                    <div class="blog-slider__text"><?= $allindex[8]['description'] ?></div>
                    <a href="about.php" class="blog-slider__button">About Us</a>
                </div>
            </div>
        </div>
        <div class="blog-slider__pagination swiper-pagination" style="margin-top:-25%;"></div>
    </div>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.blog-slider', {
            spaceBetween: 30,
            effect: 'fade',
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.blog-slider__pagination',
                clickable: true,
            },
            mousewheel: false,
            keyboard: true,
        });
    </script>
</div>

</html>