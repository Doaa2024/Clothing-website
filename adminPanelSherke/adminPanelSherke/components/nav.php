<?php
session_start();
?>
<style>
    /* Modal overlay */
    .profile-modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        /* Black with opacity */
    }

    /* Modal content box */
    .profile-modal-content {
        background-color: white;
        margin: 15% auto;
        /* 15% from top and centered */
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 400px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Close button */
    .profile-modal-close {
        color: #aaa;
        float: right;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        margin-left: 90%;
        margin-bottom: 20px;
    }

    .profile-modal-close:hover,
    .profile-modal-close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    /* Modal title */
    .profile-modal-title {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    /* Modal name text */
    .profile-modal-name {
        font-size: 25px;
        color: #333;
    }
</style>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 text-white" href="index.php">Ecommerce</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white icon-custom" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <!-- Add search input if needed -->
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white icon-custom" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <!-- Profile Dropdown Item -->
                <li><a class="dropdown-item" href="#" id="profileLink">Profile</a></li>

                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>

<!-- Profile Modal -->
<div id="profileModal" class="profile-modal">
    <div class="profile-modal-content">
        <span class="profile-modal-close">&times;</span>
        <div style="border-radius:100px; background:#333; padding: 5px;"></div>
        <h2 class="profile-modal-title"><?= $_SESSION['username'] ?></h2>
        <p class="profile-modal-name"><?= $_SESSION['user_type'] ?></p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the modal, link, and close elements
        var modal = document.getElementById("profileModal");
        var link = document.getElementById("profileLink");
        var closeBtn = document.getElementsByClassName("profile-modal-close")[0];

        // Function to open the modal
        function openModal() {
            modal.style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Open the modal when the link is clicked
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            openModal();
        });

        // Close the modal when the close button is clicked
        closeBtn.addEventListener('click', function() {
            closeModal();
        });

        // Close the modal when clicking outside of the modal content
        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                closeModal();
            }
        });
    });
</script>