<!DOCTYPE html>
<html lang="en">
<?php require_once("class/employee.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $employee = new Employee();
$allEmployee = $employee->getAllEmployee(); ?>


<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Employee</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Employee</li>
                </ol>
                <div align="right" class="mb-3">
                    <button type="button" class="btn btn-primary close" data-toggle="modal" data-target="#addModal">Add Employee</button>
                </div>

                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <!-- for images enctype -->
                                <form id="addForm" enctype="multipart/form-data" action="actions/add_employee.php" method="post">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">User Name</span>
                                        </div>
                                        <input type="text" placeholder="User Name" aria-label="product" name="name" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Email</span>
                                        </div>
                                        <input type="text" placeholder="Email" aria-label="product" name="email" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Password</span>
                                        </div>
                                        <input type="password" placeholder="Password" aria-label="product" name="password" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Type</span>
                                        </div>
                                        <select id="type" name="type" class="form-control">
                                            <option value="Admin">
                                                Admin
                                            </option>
                                            <option value="Employee">
                                                Employee
                                            </option>

                                        </select>
                                    </div>


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
                <!-- First Edit Modal -->
                <div class="modal fade" id="firstEditModal" tabindex="-1" role="dialog" aria-labelledby="firstEditModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="firstEditModalLabel">Change Password</h5>
                                <button type="button" class="close" id="close4" data-dismiss="modal" aria-label="Close" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Modal content for the first employee edit -->
                                <form id="updateForm2" method="post" action="actions/update_superadmin.php" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">User Name</span>
                                            </div>
                                            <input type="text" id="name2" placeholder="User Name" aria-label="product" name="name" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Email</span>
                                            </div>
                                            <input type="text" id="email2" placeholder="Email" aria-label="product" name="email" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                        </div>
                                        <input hidden value="" id="ids2" name="id">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Password</span>
                                        </div>
                                        <input type="password" placeholder="Update Your Password!" aria-label="product" name="password" aria-describedby="basic-addon1" size="20" class="form-control">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- Update Category Modal -->
                <div class="modal fade" id="updatefaqModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clos" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form id="updateForm" method="post" action="actions/update_faq.php" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">User Name</span>
                                        </div>
                                        <input type="text" value="" id="name1" placeholder="User Name" aria-label="product" name="name" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Email</span>
                                        </div>
                                        <input type="text" id="email1" placeholder="Email" aria-label="product" name="email" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <input hidden id="ids1" value="" name="id">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Password</span>
                                        </div>
                                        <input type="password" placeholder="Enter Your New Password Here!" aria-label="product" name="password" aria-describedby="basic-addon1" size="20" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Type</span>
                                        </div>
                                        <select id="type1" name="type" class="form-control">
                                            <option value="Admin">
                                                Admin
                                            </option>
                                            <option value="Employee">
                                                Employee
                                            </option>

                                        </select>
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
                                    <th>Employee ID</th>
                                    <th>
                                        Employee UserName
                                    </th>
                                    <th>Email</th>

                                    <th>
                                        Type
                                    </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $counter = 0;
                                foreach ($allEmployee as $employee) {
                                ?>
                                    <tr>
                                        <td><?php echo $employee['id'] ?></td>
                                        <td><?php echo $employee['username'] ?></td>
                                        <td><?php echo $employee['email'] ?></td>
                                        <td><?php echo $employee['user_type'] ?></td>
                                        <td>
                                            <?php if ($counter > 0) { ?>
                                                <button class="btn btn-danger close" id="<?php echo $employee['id'] ?>" data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fas fa-trash-alt"></i></button>
                                            <?php } ?>
                                            <?php if ($counter == 0) { ?>
                                                <a class="btn btn-primary edits" data-ids="<?php echo $employee['id'] ?>" data-name="<?php echo $employee['username'] ?>" data-email="<?php echo $employee['email'] ?>" data-toggle="modal" data-target="#firstEditModal"><i class="fas fa-edit"></i></a>
                                            <?php } else { ?>
                                                <a class="btn btn-primary edit" data-ids="<?php echo $employee['id'] ?>" data-name="<?php echo $employee['username'] ?>" data-email="<?php echo $employee['email'] ?>" data-type="<?php echo $employee['user_type'] ?>" data-toggle="modal" data-target="#updatefaqModal"><i class="fas fa-edit"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                    $counter++;
                                }
                                ?>





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
    document.getElementById('close4').addEventListener('mouseover', function() {
        this.style.boxShadow = '0 0 5px blue';

    });

    document.getElementById('close4').addEventListener('mouseout', function() {
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
                            window.location.href = 'employee.php';
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
                url: 'actions/delete_employee.php',
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
                            window.location.href = 'employee.php';
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
            console.log(name)
            var email = $(this).data('email');
            console.log(email)
            var type = $(this).data('type');
            console.log(type)
            // Set the category ID and name in the modal
            $('#ids1').val(IdToUpdate);
            $('#name1').val(name);
            $('#email1').val(email);
            $('#type1').val(type);
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
                url: 'actions/update_employee.php',
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
                            window.location.href = 'employee.php';
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
    $(document).ready(function() {

        // Open the modal and set the category name
        $('#datatablesSimple').on('click', '.edits', function() {
            var IdToUpdate = $(this).data('ids');
            console.log(IdToUpdate)
            var name = $(this).data('name');
            console.log(name)
            var email = $(this).data('email');
            console.log(email)
            // Set the category ID and name in the modal
            $('#ids2').val(IdToUpdate);
            $('#name2').val(name);
            $('#email2').val(email);
        });


        // Perform the update action when the update button is clicked
        $('#updateForm2').submit(function(e) {
            e.preventDefault();
            var form = new FormData(document.querySelector("#updateForm2"));

            $.ajax({
                url: 'actions/update_superadmin.php',
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
                            window.location.href = 'employee.php';
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
                        title: 'An error occurred while updating the SuperAdmin Info.',
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