<!DOCTYPE html>
<html lang="en">
<?php require_once("class/users.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $user = new User();
$allCustomers = $user->getAllUsers(); ?>

<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Users</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">FAQ</li>
                </ol>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        FAQ
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>CustomerID</th>
                                    <th>
                                        User Name
                                    </th>

                                    <th>Email Address</th>
                                    <th>Address</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($allCustomers as $customer) {
                                ?>
                                    <tr>
                                        <td><?php echo $customer['CustomerID'] ?></td>
                                        <td><?php echo $customer['UserName'] ?></td>
                                        <td><?php echo $customer['Email'] ?></td>
                                        <td><?php echo $customer['Address'] ?></td>
                                    </tr>

                                <?php } ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php require_once('components/footer.php'); ?>
    </div>
    </div>
    <?php require_once('components/script.php'); ?>
</body>