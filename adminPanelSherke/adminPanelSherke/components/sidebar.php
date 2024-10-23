<?php
session_start();
// Start the session to access session variables
$hasAccess = isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'Admin' || $_SESSION['user_type'] == 'SuperAdmin');
?>
<style>
    #layoutSidenav_nav {
        background-color: #333;
        /* Dark background color for the sidebar */
    }

    .nav-link.active {
        background-color: cornflowerblue;
        color: black !important;
        /* Text color for active link */
    }

    .sb-nav-link-icon {
        color: white !important;
        /* Icon color */
    }

    .nav-link,
    .sb-sidenav-menu-heading {
        color: white !important;
        /* Text color for all links and headings */
    }
</style>



</style>
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- Include your CSS files here -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-primary" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'categories.php' ? 'active' : ''; ?>" href="categories.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div> Category
                        </a>
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'blog.php' ? 'active' : ''; ?>" href="blog.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div> Blog
                        </a>
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'faq.php' ? 'active' : ''; ?>" href="faq.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div> FAQ
                        </a>
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'active' : ''; ?> <?php echo basename($_SERVER['PHP_SELF']) == 'update_form_products.php' ? 'active' : ''; ?>" href="products.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div> Product
                        </a>
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'moreinfo.php' ? 'active' : ''; ?>" href="moreinfo.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div> More Info
                        </a>
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'slide_show.php' ? 'active' : ''; ?>" href="slide_show.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div> Main Page
                        </a>
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" href="about.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div> About
                        </a>
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'code.php' ? 'active' : ''; ?>" href="code.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-gift"></i></div> Coupon Code
                        </a>

                    </div>
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'orders.php' ? 'active' : ''; ?><?php echo basename($_SERVER['PHP_SELF']) == 'orderitems.php' ? 'active' : ''; ?>" href="orders.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                        Orders
                    </a>
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : ''; ?>" href="users.php">
                        <div class="sb-nav-link-icon"> <i class="fas fa-user"></i></div>
                        Users
                    </a>
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'customers.php' ? 'active' : ''; ?>" href="customers.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Customers
                    </a>
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'employee.php' ? 'active' : ''; ?>" href="<?php echo $hasAccess ? 'employee.php' : '#'; ?>" onclick="<?php echo !$hasAccess ? 'event.preventDefault(); Swal.fire({title: \'Access Denied\', text: \'You do not have permission to view this page.\', icon: \'error\', confirmButtonText: \'OK\'});' : ''; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                        Employee
                    </a>
                </div>
        </nav>
    </div>