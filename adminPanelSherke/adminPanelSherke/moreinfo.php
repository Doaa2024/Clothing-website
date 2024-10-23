<!DOCTYPE html>
<html lang="en">
<?php require_once("class/moreinfo.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $info = new MoreInfo();
$allinfo = $info->getAllInfo(); ?>


<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">More_Info</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">More_Info</li>
                </ol>
                <!-- Update Category Modal -->
                <div class="modal fade" id="updatesliderModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Info</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clos" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form id="updateForm" method="post" action="actions/update_slider.php" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Store Name</span>
                                        </div>
                                        <input type="text" placeholder="Store Name" aria-label="product" name="name" aria-describedby="basic-addon1" size="20" class="form-control" id="name" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Location</span>
                                        </div>
                                        <input type="text" placeholder="Location" aria-label="product" name="location" ariadescribedby="basic-addon1" size="20" class="form-control" id="location" required>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Phone Number</span>
                                        </div>
                                        <input type="text" placeholder="Phone Number" aria-label="product" name="number" aria-describedby="basic-addon1" size="20" class="form-control" id="number" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Facebook</span>
                                        </div>
                                        <input type="text" placeholder="Facebook Link" aria-label="product" name="facebook" aria-describedby="basic-addon1" size="20" class="form-control" id="facebook" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Instagram</span>
                                        </div>
                                        <input type="text" placeholder="Instagram Link" aria-label="product" name="instagram" aria-describedby="basic-addon1" size="20" class="form-control" id="instagram" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Twitter</span>
                                        </div>
                                        <input type="text" placeholder="Twitter Link" aria-label="product" name="twitter" aria-describedby="basic-addon1" size="20" class="form-control" id="twitter" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Pinterest</span>
                                        </div>
                                        <input type="text" placeholder="Pinterest Link" aria-label="product" name="pinterest" aria-describedby="basic-addon1" size="20" class="form-control" id="pinterest" required>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Email</span>
                                        </div>
                                        <input type="text" placeholder="Email" aria-label="product" name="email" aria-describedby="basic-addon1" size="20" class="form-control" id="email" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Shipping</span>
                                        </div>
                                        <input type="number" placeholder="Shipping Fees" aria-label="product" name="shipping" aria-describedby="basic-addon1" size="20" class="form-control" id="shipping" required min="0" step="0.1">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="confirmUpdateSliderButton">Update</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        More Info
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>

                                    <th>
                                        Store Name
                                    </th>

                                    <th>
                                        Location
                                    </th>
                                    <th>
                                        Phone Number
                                    </th>
                                    <th>
                                        Facebook
                                    </th>
                                    <th>
                                        Instagram
                                    </th>
                                    <th>
                                        Twitter
                                    </th>
                                    <th>
                                        Pinterest
                                    </th>

                                    <th>
                                        Email
                                    </th>

                                    <th>
                                        Shipping Fees
                                    </th>
                                    <th>Edit Info</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($allinfo as $info) {
                                ?>
                                    <tr>
                                        <td><?php echo $info['name'] ?></td>
                                        <td><?php echo $info['location'] ?></td>
                                        <td><?php echo $info['number'] ?></td>
                                        <td><?php echo $info['facebook'] ?></td>
                                        <td><?php echo $info['instagram'] ?></td>
                                        <td><?php echo $info['twitter'] ?></td>
                                        <td><?php echo $info['pinterest'] ?></td>
                                        <td><?php echo $info['email'] ?></td>
                                        <td><?php echo $info['shipping'] ?></td>
                                        <td>
                                            <a class="btn btn-primary edit" data-name="<?php echo $info['name'] ?>" data-number="<?php echo $info['number'] ?>" data-facebook="<?php echo $info['facebook'] ?>" data-pinterest="<?php echo $info['pinterest'] ?>" data-twitter="<?php echo $info['twitter'] ?>" data-instagram="<?php echo $info['instagram'] ?>" data-email="<?php echo $info['email'] ?>" data-location="<?php echo $info['location'] ?>" data-shipping="<?php echo $info['shipping'] ?>" data-toggle="modal" data-target="#updatesliderModal"><i class="fas fa-edit"></i></a>
                                        </td>

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
<script>
    document.getElementById('clos').addEventListener('mouseover', function() {
        this.style.boxShadow = '0 0 5px blue';

    });

    document.getElementById('clos').addEventListener('mouseout', function() {
        this.style.boxShadow = 'none';
    });

    $(document).ready(function() {

        // Open the modal and set the category name
        $('#datatablesSimple').on('click', '.edit', function() {
            var name = $(this).data('name');
            var number = $(this).data('number');
            var facebook = $(this).data('facebook');
            var instagram = $(this).data('instagram');
            var twitter = $(this).data('twitter');
            var pinterest = $(this).data('pinterest');
            var location = $(this).data('location');
            var email = $(this).data('email');
            var shipping = $(this).data('shipping');
            // Set the category ID and name in the modal
            $('#name').val(name);
            $('#number').val(number);
            $('#facebook').val(facebook);
            $('#instagram').val(instagram);
            $('#twitter').val(twitter);
            $('#pinterest').val(pinterest);
            $('#location').val(location);
            $('#email').val(email);
            $('#shipping').val(shipping);

        });


        // Perform the update action when the update button is clicked
        $('#updateForm').submit(function(e) {

            e.preventDefault(); // Prevent default form submission
            var form = new FormData(document.querySelector("#updateForm"));

            $.ajax({
                url: 'actions/update_moreinfo.php',
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'json',
                data: form,
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        }).then(function() {
                            window.location.href = 'moreinfo.php';
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        });
                    }
                },

            });

        });
    });
</script>