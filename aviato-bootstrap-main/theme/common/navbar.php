<?php

require_once("../class/moreinfo.class.php"); ?>
<?php $info = new Info();
$allInfo = $info->getAllInfo(); ?>

<style>
    .circular-btn {
        display: inline-block;
        width: 30px;
        height: 30px;
        background-color: #444444;
        border-radius: 50%;
        margin-left: 50%;
        margin-top: 5%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        transition: transform 0.2s, filter 0.2s, background-color 0.2s;
    }

    .circular-btn:hover {
        transform: scale(1.05);
        background-color: #555555;
    }

    .circular-btn svg {
        fill: white;
    }

    .tooltip-custom {
        display: none;
        position: absolute;
        bottom: 120%;
        left: 50%;
        transform: translateX(-50%);
        background-color: #444;
        color: white;
        padding: 3px 3px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-size: 12px;
        white-space: nowrap;
    }

    .circular-btn:hover .tooltip-custom {
        display: block;
    }

    .input-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        position: relative;
    }

    .input {
        border-style: none;
        height: 50px;
        width: 50px;
        padding: 10px;
        outline: none;
        border-radius: 50%;
        transition: .5s ease-in-out;
        background-color: #7e4fd4;
        box-shadow: 0px 0px 3px #f3f3f3;
        padding-right: 40px;
        color: #fff;
    }

    .input::placeholder,
    .input {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 17px;
    }

    .input::placeholder {
        color: #8f8f8f;
    }

    .icon {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        right: 0px;
        cursor: pointer;
        width: 50px;
        height: 50px;
        outline: none;
        border-style: none;
        border-radius: 50%;
        pointer-events: painted;
        background-color: transparent;
        transition: .2s linear;
    }

    .icon:focus~.input,
    .input:focus {
        box-shadow: none;
        width: 250px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 3px solid #7e4fd4;
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    /* Override old CSS */
    .dropdown.search.dropdown-slide .dropdown-menu {
        background: transparent !important;
        border: none !important;
        padding: 0px !important;
    }

    .search-input-group {
        display: flex;
        align-items: center;
        background-color: transparent;
        border-bottom: 5px solid black;

        font-size: large;
        border-radius: 0px !important;

    }

    .search-input {
        flex-grow: 1;
        background: transparent !important;
        border: none !important;
        border-right: none !important;
        border-radius: 40px !important;
        box-shadow: none !important;
        padding: 5px 8px;
        /* Add some padding for better appearance */
        color: black;
        /* Ensure text color is visible */
        border-bottom: 10px solid black;
        /* Add black border-bottom */
    }

    .search-input::placeholder {
        color: black;
        font-size: 17px;
        /* Placeholder color */
    }

    .btn-search {
        background: transparent !important;
        border: none !important;
        border-radius: 0 4px 4px 0 !important;
        margin-left: 0px;
        /* Adjust to remove double border */
        box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.1) !important;
        /* Bottom shadow */
    }

    .btn-search i {
        color: black !important;
        font-weight: bolder;
        font-size: x-large;
    }

    /* Ensure no borders or backgrounds on top or behind the dropdown */
    .dropdown-menu:before,
    .dropdown-menu:after {
        display: none !important;
    }

    .underline {
        text-decoration: none !important;
        /* No underline initially */
    }

    .underline:hover {
        text-decoration: underline !important;
        /* Underline on hover */
    }

    /* CSS for the circle */
    /* Cart count styling */
    #cart-count {
        position: absolute;
        top: -10px;
        /* Adjust position as needed */
        right: -8px;
        /* Adjust to align properly with icon */
        width: 20px;
        /* Ensure the width and height are equal to make a perfect circle */
        height: 20px;
        /* Ensure the width and height are equal to make a perfect circle */
        background-color: #333;
        /* Circle background color */
        color: white;
        /* Text color */
        border-radius: 50%;
        /* Makes the span a circle */
        text-align: center;
        /* Center text horizontally */
        line-height: 24px;
        /* Center text vertically */
        font-size: 12px;
        /* Adjust font size */
        font-weight: bold;
        /* Bold text */
        display: flex;
        /* Center content */
        align-items: center;
        /* Center vertically */
        justify-content: center;
        /* Center horizontally */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        #cart-count {
            width: 20px;
            height: 20px;
            font-size: 10px;
            line-height: 20px;
            right: -8px;
            /* Adjust position for smaller screens */
        }
    }

    @media (max-width: 480px) {
        #cart-count {
            width: 18px;
            height: 18px;
            font-size: 8px;
            line-height: 18px;
            right: -6px;
            /* Adjust position for very small screens */
        }
    }

    @media (max-width: 768px) {
        .small {
            align-items: center;
            justify-content: center;
            margin-left: -25%;
            width: 100%;
        }
    }
</style>
<section class="top-header" style="background-color:#fff">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span><?= $allInfo[0]['number'] ?></span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center" style="margin-left:14%;">
                    <a href="index.html">
                        <!-- replace logo here -->
                        <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO" class="avt">
                                        <tspan x="108.94" y="325"><?= $allInfo[0]['name'] ?></tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4 small">
                <!-- Cart -->

                <ul class="top-menu text-right list-inline" style="display:flex; flex-direction:row; margin-left:60%; align-items:center">

                    <a onclick="location.href='wishlist.php'" class="wishlist" style="margin-right: 20px; margin-top:2%;" data-toggle="tooltip" data-placement="top" title="View Wishlist">
                        <i class="tf-ion-ios-heart" style="font-size: 20px; color:#333;"></i>
                    </a>

                    <script>
                        $(document).ready(function() {
                            $('[data-toggle="tooltip"]').tooltip();
                        });
                    </script>

                    <li class="dropdown cart-nav dropdown-slide">
                        <?php $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                        ?>
                        <a onclick="location.href='cart.php'" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" style="position: relative; display: inline-flex; align-items: center; font-size: 23px; margin-top: 10%;">
                            <i class="tf-ion-android-cart" style="font-size: larger;"></i>
                            <span id="cart-count"><?= $cartCount ?></span>
                        </a>



                        <!-- Cart Item You will loop there soon-->


                    </li>

                    <!--   
                     <nav>
                       

                      
                    </nav>
                    -->


                    <!-- / Search -->
                    <?php if (isset($_SESSION['username']) && $_SESSION['login'] === true) : ?>
                        <div onclick="window.location.href='http://localhost/adminPanelSherke/adminPanelSherke/logout.php'" class="d-flex justify-content-center align-items-center vh-100">
                        <?php else : ?>
                            <div onclick="window.location.href='http://localhost/adminPanelSherke/adminPanelSherke/login.php'" class="d-flex justify-content-center align-items-center vh-100">
                            <?php endif; ?>

                            <div class="circular-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 512 512">
                                    <path d="M256 256a112 112 0 1 0-112-112a112 112 0 0 0 112 112m0 32c-69.42 0-208 42.88-208 128v64h416v-64c0-85.12-138.58-128-208-128" />
                                </svg>
                                <?php if (isset($_SESSION['username']) && $_SESSION['login'] === true) : ?>
                                    <div class="tooltip-custom">Logout</div>

                                <?php else : ?>
                                    <div class="tooltip-custom">Login</div>
                                <?php endif; ?>

                            </div>
                            </div>
                </ul><!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu" style="background-color:#fff">
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 class="menu-title">Main Menu</h2>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- / .navbar-header -->

            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse collapse text-center" style="margin-left:34%;">
                <ul class="nav navbar-nav">

                    <!-- Home -->
                    <li class="dropdown underline ">
                        <a href="index.php">Home</a>
                    </li><!-- / Home -->


                    <!-- Elements -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Shop <span class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Basic -->
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Pages</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="shop-sidebar.php">Shop</a></li>

                                        <li><a href="wishlist.php">Wishlist</a></li>


                                    </ul>
                                </div>

                                <!-- Layout -->
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Bill</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="cart.php">Cart</a></li>

                                    </ul>
                                </div>

                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Elements -->


                    <!-- Pages -->
                    <li class="dropdown full-width dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Introduction -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Introduction</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="blog-grid.php">Blog</a></li>
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="faq.php">FAQ</a></li>
                                    </ul>
                                </div>

                                <!-- Contact -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Dashboard</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="order.php">Orders</a></li>
                                        <li><a href="cart.php">Cart</a></li>
                                        <li><a href="wishlist.php">Wishlist</a></li>
                                    </ul>
                                </div>

                                <!-- Utility -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Utility</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="contactus.php">Contact Us</a></li>
                                        <li><a href="http://localhost/adminPanelSherke/adminPanelSherke/login.php">Login Page</a></li>
                                        <li><a href="http://localhost/adminPanelSherke/adminPanelSherke/logout.php">Logout Page</a></li>
                                    </ul>
                                </div>

                                <!-- Mega Menu -->
                                <div class="col-sm-3 col-xs-12">
                                    <a href="shop.html">
                                        <img class="img-responsive" src="page.jpg" alt="menu image" />
                                    </a>
                                </div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Pages -->



                    <!-- Blog -->
                    <li class="dropdown dropdown-slide">
                        <a href="blog-grid.php" class="dropdown-toggle underline" style="text-decoration: none; ">Blog </a>

                    </li><!-- / Blog -->

                    <!-- Shop -->
                    <li class="dropdown search dropdown-slide" style="margin-left:295px;">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                            <i class="tf-ion-ios-search-strong"></i> Search
                        </a>
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                <form action="../theme/search.php" method="post">
                                    <div class="input-group search-input-group">
                                        <input type="search" name="search" class="form-control search-input" placeholder="Search...">
                                        <button class="btn btn-search" type="submit" name="submit"><i class="tf-ion-ios-search"></i></button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>


                </ul><!-- / .nav .navbar-nav -->

            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>