<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<?php require_once('common/header.php'); ?>

<body id="body">

  <!-- Start Top Header Bar -->
  <?php require_once('common/navbar.php'); ?>
  <section class="user-dashboard page-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="list-inline dashboard-menu text-center">
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="order.html">Orders</a></li>
            <li><a href="address.html">Address</a></li>
            <li><a class="active" href="profile-details.html">Profile Details</a></li>
          </ul>
          <div class="dashboard-wrapper dashboard-user-profile">
            <div class="media">
              <div class="pull-left text-center" href="#!">
                <img class="media-object user-img" src="images/avater.jpg" alt="Image">
                <a href="#x" class="btn btn-transparent mt-20">Change Image</a>
              </div>
              <div class="media-body">
                <ul class="user-profile-list">
                  <li><span>Full Name:</span>Johanna Doe</li>
                  <li><span>Country:</span>USA</li>
                  <li><span>Email:</span>mail@gmail.com</li>
                  <li><span>Phone:</span>+880123123</li>
                  <li><span>Date of Birth:</span>Dec , 22 ,1991</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>