<?php require_once("../class/moreinfo.class.php"); ?>
<?php $info = new Info();
$allInfo = $info->getAllInfo(); ?>
<style>
    .card3-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* Adjust as needed */
    }

    .card3 {
        display: flex;
        height: 50px;
        width: 200px;
        justify-content: center;
        align-items: center;
        margin: 10px;
        /* Gap between cards */
    }

    .card3 svg {
        display: flex;
        width: 60%;
        height: 100%;
        font-size: 24px;
        font-weight: 700;
        opacity: 1;
        transition: opacity 0.25s;
        z-index: 2;
        cursor: pointer;
    }

    .card3 .social-link1,
    .card3 .social-link2,
    .card3 .social-link3,
    .card3 .social-link4 {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 25%;
        color: whitesmoke;
        font-size: 24px;
        text-decoration: none;
        transition: 0.25s;
        border-radius: 50px;
    }

    .card3 svg {
        transform: scale(1);
    }

    .card3 .social-link1:hover {
        background: #f09433;
        color: white;
        background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        background: -webkit-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f09433', endColorstr='#bc1888', GradientType=1);
        animation: bounce_613 0.4s linear;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 25%;
        color: whitesmoke;
        font-size: 24px;
        text-decoration: none;
        transition: 0.25s;
        border-radius: 50px;
        padding: 15px;
    }

    .card3 .social-link2:hover {
        background-color: blue;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 25%;
        color: whitesmoke;
        font-size: 24px;
        text-decoration: none;
        transition: 0.25s;
        border-radius: 50px;
        padding: 15px;
        animation: bounce_613 0.4s linear;
        color: white;
    }

    .card3 .social-link3:hover {
        background-color: #5865f2;
        animation: bounce_613 0.4s linear;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 25%;
        color: whitesmoke;
        font-size: 24px;
        text-decoration: none;
        transition: 0.25s;
        border-radius: 50px;
        padding: 15px;
    }

    .card3 .social-link4:hover {
        background-color: red;
        animation: bounce_613 0.4s linear;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 25%;
        color: whitesmoke;
        font-size: 24px;
        text-decoration: none;
        transition: 0.25s;
        border-radius: 50px;
        padding: 15px;
    }

    @keyframes bounce_613 {
        40% {
            transform: scale(1.4);
        }

        60% {
            transform: scale(0.8);
        }

        80% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1);
        }
    }

    @media (max-width: 768px) {
        .card3 {
            width: 150px;
        }

        .card3 svg {
            width: 40%;
        }

        .card3 .social-link1,
        .card3 .social-link2,
        .card3 .social-link3,
        .card3 .social-link4 {
            font-size: 20px;
        }
    }

    @media (max-width: 480px) {
        .card3 {
            width: 100px;
        }

        .card3 svg {
            width: 30%;
        }

        .card3 .social-link1,
        .card3 .social-link2,
        .card3 .social-link3,
        .card3 .social-link4 {
            font-size: 18px;
        }
    }
</style>


<footer class="footer section text-center" style="background-color:#333; padding-top:2%; padding-bottom:2%; margin-top:0%; color:white; border-top:2px solid transparent;  position: relative;">
    <!-- Footer content here -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <ul class="social-media" style="margin-left:41.5%">
                    <div class="card3">
                        <a class="social-link1" href="<?= $allInfo[0]['instagram'] ?>" style="color:white;">

                            <i class="tf-ion-social-instagram"></i>
                        </a>

                        <a class="social-link2" href="<?= $allInfo[0]['twitter'] ?> " style="color:white;">
                            <i class="tf-ion-social-twitter"></i> </a>
                        <a class="social-link3" href="<?= $allInfo[0]['facebook'] ?>" style="color:white;">
                            <i class="tf-ion-social-facebook"></i>
                        </a>
                        <a class="social-link4" href="<?= $allInfo[0]['pinterest'] ?>" style="color:white;">
                            <i class="tf-ion-social-pinterest"></i>
                        </a>
                    </div>
                </ul>
                <ul class="footer-menu text-uppercase" style="color:black;">
                    <li>
                        <a href="blog-grid.php" style="font-size:medium; color:white;" class="underline">Blog</a>
                    </li>
                    <li>
                        <a href="contactus.php" style="font-size:medium; color:white;" class="underline">ContactUs</a>
                    </li>
                    <li>
                        <a href="faq.php" style="font-size:medium; color:white;" class="underline">FAQ</a>
                    </li>
                    <li>
                        <a href="about.php" style="font-size:medium; color:white;" class="underline">About US</a>
                    </li>
                </ul>
                <p class="copyright-text" style="font-size:medium; font-weight:100; color:white;">Copyright &copy;2021, Designed &amp; Developed by <a href="https://themefisher.com/" style="color:white;">Themefisher</a></p>
            </div>
        </div>
    </div>
</footer>