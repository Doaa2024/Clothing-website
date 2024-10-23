<!DOCTYPE html>
<html lang="en">
<?php require_once("class/about.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $about = new About();
$allabout = $about->getAllAbout(); ?>


<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
                <!-- Update Category Modal -->
                <div class="modal fade" id="updatesliderModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update About</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clos" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form id="updateForm" method="post" action="actions/update_slider.php" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Description</span>
                                        </div>
                                        <input type="text" placeholder="Description" aria-label="product" name="description" aria-describedby="basic-addon1" size="20" class="form-control" id="description" required>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Update Image</span>
                                        </div>
                                        <input type="file" placeholder="slider image" aria-label="product" name="images[]" aria-describedby="basic-addon1" size="20" class="form-control" id="image">
                                        <input hidden id="olddescription" name="olddescription">
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
                        About
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>

                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Image
                                    </th>

                                    <th>Edit About</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($allabout as $about) {
                                ?>
                                    <tr>
                                        <td><?php echo $about['description'] ?></td>


                                        <td><img src="assets/img/<?php echo $about['image'] ?>" height="100px" width="100px"></td>
                                        <td>
                                            <a class="btn btn-primary edit" data-description="<?php echo $about['description'] ?>" data-toggle="modal" data-target="#updatesliderModal"><i class="fas fa-edit"></i></a>
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
            var about_description = $(this).data('description');
            // Set the category ID and name in the modal
            $('#description').val(about_description);
            $('#olddescription').val(about_description);

        });


        // Perform the update action when the update button is clicked
        $('#updateForm').submit(function(e) {

            e.preventDefault(); // Prevent default form submission
            var form = new FormData(document.querySelector("#updateForm"));

            $.ajax({
                url: 'actions/update_about.php',
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
                            window.location.href = 'about.php';
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