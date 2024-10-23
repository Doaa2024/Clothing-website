<!DOCTYPE html>
<html lang="en">
<?php require_once("class/slider.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $slider = new Slider();
$allslider = $slider->getAllSlider(); ?>


<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Main Page</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Main_Page</li>
                </ol>
                <!-- Update Category Modal -->
                <div class="modal fade" id="updatesliderModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Main_Page</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clos" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form id="updateForm" method="post" action="actions/update_slider.php" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Title</span>
                                        </div>
                                        <input type="text" placeholder="Slider title" aria-label="product" name="title" aria-describedby="basic-addon1" size="20" class="form-control" id="title" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Description</span>
                                        </div>
                                        <input type="text" placeholder="Slider description" aria-label="product" name="description" aria-describedby="basic-addon1" size="20" class="form-control" id="description" required>

                                        <input id="id" name="id" hidden>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Update Image</span>
                                        </div>
                                        <input type="file" placeholder="slider image" aria-label="product" name="images[]" aria-describedby="basic-addon1" size="20" class="form-control" id="image">

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
                        Main_Page
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Info Location</th>
                                    <th>Title</th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Image
                                    </th>

                                    <th>Edit Info</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($allslider as $slide) {
                                ?>
                                    <tr>
                                        <td><?php echo $slide['slide_type'] ?></td>
                                        <td><?php echo $slide['title'] ?></td>
                                        <td><?php echo $slide['description'] ?></td>

                                        <td><img src="assets/img/<?php echo $slide['image'] ?>" height="100px" width="100px"></td>

                                        <td>
                                            <a class="btn btn-primary edit" data-id="<?php echo $slide['slide_id'] ?>" data-title="<?php echo $slide['title'] ?>" data-description="<?php echo $slide['description'] ?>" data-toggle="modal" data-target="#updatesliderModal"><i class="fas fa-edit"></i></a>
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
            var slider_id = $(this).data('id');
            var slider_title = $(this).data('title');
            var slider_description = $(this).data('description');
            console.log(slider_id);
            // Set the category ID and name in the modal
            $('#id').val(slider_id);
            $('#title').val(slider_title);
            $('#description').val(slider_description);

        });


        // Perform the update action when the update button is clicked
        $('#updateForm').submit(function(e) {

            e.preventDefault(); // Prevent default form submission
            var form = new FormData(document.querySelector("#updateForm"));

            $.ajax({
                url: 'actions/update_slider.php',
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
                            window.location.href = 'slide_show.php';
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