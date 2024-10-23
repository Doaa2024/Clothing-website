<!DOCTYPE html>
<html lang="en">
<?php require_once("class/code.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $code = new Code();
$allCode = $code->getAllCode(); ?>


<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Coupon Code</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Coupon Code</li>
                </ol>
                <div align="right" class="mb-3">
                    <button type="button" class="btn btn-primary close" data-toggle="modal" data-target="#addModal">Add CouponCode</button>
                </div>

                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add CouponCode</h5>
                                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <!-- for images enctype -->
                                <form id="addForm" enctype="multipart/form-data" action="actions/add_code.php" method="post">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Code Name</span>
                                        </div>
                                        <input type="text" placeholder="Coupon Code Name" aria-label="product" name="name" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Percentage</span>
                                        </div>
                                        <input type="number" placeholder="Percentage" aria-label="product" name="percentage" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Limits</span>
                                        </div>
                                        <input type="number" placeholder="Limits" aria-label="product" name="limits" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Expiry Date</span>
                                        </div>
                                        <input type="date" placeholder="Expiry Date" aria-label="product" name="date" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>

                                    <input hidden id="id" name="id">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" value="upload-image" id="confirmAdd">Submit</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" id="closee" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this item?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDeletefaqButton">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Update Category Modal -->
                <div class="modal fade" id="updatefaqModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update CouponCode</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clos" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form id="updateForm" method="post" action="actions/update_faq.php" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Code Name</span>
                                        </div>
                                        <input type="text" id="name" placeholder="Coupon Code Name" aria-label="product" name="name" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Percentage</span>
                                        </div>
                                        <input type="number" id="percentage" placeholder="Percentage" aria-label="product" name="percentage" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <input hidden id="ids" value="" name="id">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Limits</span>
                                        </div>
                                        <input type="number" id="limits" placeholder="Limits" aria-label="product" name="limits" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Expiry Date</span>
                                        </div>
                                        <input type="date" id="date" placeholder="Expiry Date" aria-label="product" name="date" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="confirmUpdatefaqButton">Update</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        CouponCode
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>CouponCode Name</th>
                                    <th>
                                        Percentage
                                    </th>
                                    <th>Limits</th>
                                    <th>
                                        Expiry Date
                                    </th>
                                    <th>
                                        Used By
                                    </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($allCode as $code) {
                                ?>
                                    <tr>
                                        <td><?php echo $code['code_name'] ?></td>
                                        <td><?php echo $code['percentage'] ?></td>
                                        <td><?php echo $code['limits'] ?></td>
                                        <td><?php echo $code['expiry_date'] ?></td>
                                        <td><?php echo $code['used_by'] ?></td>
                                        <td>
                                            <button class="btn btn-danger close" id=<?php echo $code['code_id'] ?> data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fas fa-trash-alt"></i></button>
                                            <a class="btn btn-primary edit" data-ids="<?php echo $code['code_id'] ?>" data-name="<?php echo $code['code_name'] ?>" data-percentage="<?php echo $code['percentage'] ?>" data-limits="<?php echo $code['limits'] ?>" data-date="<?php echo $code['expiry_date'] ?>" data-toggle="modal" data-target="#updatefaqModal"><i class="fas fa-edit"></i></a>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('close').addEventListener('mouseover', function() {
        this.style.boxShadow = '0 0 5px blue';

    });

    document.getElementById('close').addEventListener('mouseout', function() {
        this.style.boxShadow = 'none';
    });
    document.getElementById('clos').addEventListener('mouseover', function() {
        this.style.boxShadow = '0 0 5px blue';

    });

    document.getElementById('clos').addEventListener('mouseout', function() {
        this.style.boxShadow = 'none';
    });
    document.getElementById('closee').addEventListener('mouseover', function() {
        this.style.boxShadow = '0 0 5px blue';

    });

    document.getElementById('closee').addEventListener('mouseout', function() {
        this.style.boxShadow = 'none';
    });
    $(document).ready(function() {
        $('#addForm').submit(function(e) {
            e.preventDefault();
            var form = new FormData(this);
            console.log(form);
            $.ajax({
                url: $(this).attr('action'),
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
                            window.location.href = 'code.php';
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
                }
            });
        });
    });
    $('#datatablesSimple').on('click', '.close', function() {
        var id = $(this).attr('id');
        console.log(id);
        $('#confirmDeletefaqButton').on('click', function() {

            $.ajax({
                url: 'actions/delete_code.php',
                type: 'POST',
                data: {
                    id: id
                },
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
                            window.location.href = 'code.php';
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
                }

            });

        });
    });
    $(document).ready(function() {

        // Open the modal and set the category name
        $('#datatablesSimple').on('click', '.edit', function() {
            var IdToUpdate = $(this).data('ids');
            console.log(IdToUpdate)
            var name = $(this).data('name');
            var percentage = $(this).data('percentage');
            var limits = $(this).data('limits');
            var date = $(this).data('date');
            // Set the category ID and name in the modal
            $('#ids').val(IdToUpdate);
            $('#name').val(name);
            $('#percentage').val(percentage);
            $('#limits').val(limits);
            $('#date').val(date);
        });


        // Perform the update action when the update button is clicked
        $('#updateForm').submit(function(e) {
            // var newtitle = $('#title').val();
            // var newid = $('#idfield').val();
            // console.log(newid);
            // var newdescription = $('#description').val();
            // var oldtitle = $('#oldtitle').val();
            //var olddescription = $('#olddescription').val();
            e.preventDefault(); // Prevent default form submission
            var form = new FormData(document.querySelector("#updateForm"));

            $.ajax({
                url: 'actions/update_code.php',
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'json',
                data: form,
                success: function(response) {
                    if (response.status === 'success') {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        }).then(function() {
                            window.location.href = 'code.php';
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
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'An error occurred while updating the FAQ.',
                        showConfirmButton: true,
                        customClass: {
                            confirmButton: 'button btn btn-primary app_style'
                        }
                    });
                }
            });

        });
    });
</script>