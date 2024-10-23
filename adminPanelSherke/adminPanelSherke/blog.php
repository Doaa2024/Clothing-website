<!DOCTYPE html>
<html lang="en">
<?php require_once("class/blog.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $blog = new Blog();
$allblog = $blog->getAllBlog(); ?>


<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class=" container-fluid px-4">
                <h1 class="mt-4">Blog</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
                <div align="right" class="mb-3">
                    <button type="button" class="btn btn-primary close" data-toggle="modal" data-target="#addModal">Add Blog</button>
                </div>

                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add FAQ</h5>
                                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <!-- for images enctype -->
                                <form id="addForm" enctype="multipart/form-data" action="actions/add_blog.php" method="post">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Title</span>
                                        </div>
                                        <input type="text" placeholder="FAQ title" aria-label="product" name="title" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Description</span>
                                        </div>
                                        <input type="text" placeholder="FAQ description" aria-label="product" name="description" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Type</span>
                                        </div>
                                        <input type="text" placeholder="Post Type" aria-label="product" name="type" aria-describedby="basic-addon1" size="20" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Images</span>
                                        </div>
                                        <input type="file" class="form-control input-control" placeholder="Images" aria-label="Images" name="images[]" aria-describedby="basic-addon3">
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
                <!-- Update Category Modal -->
                <div class="modal fade" id="updatefaqModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Blog</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clos" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form id="updateForm" method="post" action="actions/update_faq.php" enctype="multipart/form-data">
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
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Type</span>
                                        </div>
                                        <input type="text" placeholder="post type" aria-label="product" name="type" aria-describedby="basic-addon1" size="20" class="form-control" id="type" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Image</span>
                                        </div>
                                        <input type="file" placeholder="product_image" aria-label="product" name="images[]" aria-describedby="basic-addon1" size="20" class="form-control" id="image">
                                    </div>
                                    <input hidden id="idfield" name="idfield">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="confirmUpdatefaqButton">Update</button>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Blog
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Image
                                    </th>


                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($allblog as $blog) {
                                ?>
                                    <tr>
                                        <td><?php echo $blog['title'] ?></td>
                                        <td><?php echo $blog['description'] ?></td>
                                        <td><?php echo $blog['type'] ?></td>
                                        <td><img src="assets/img/<?php echo $blog['image'] ?>" height="100px" width="100px"></td>
                                        <td>
                                            <button class="btn btn-danger close" id=<?php echo $blog['blog_id'] ?> data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fas fa-trash-alt"></i></button>
                                            <a class="btn btn-primary edit" data-ids="<?php echo $blog['blog_id'] ?>" data-title="<?php echo $blog['title'] ?>" data-description="<?php echo $blog['description'] ?>" data-type="<?php echo $blog['type'] ?>" data-toggle="modal" data-target="#updatefaqModal"><i class="fas fa-edit"></i></a>
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
                            window.location.href = 'blog.php';
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
                url: 'actions/delete_blog.php',
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
                            window.location.href = 'blog.php';
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
            var title = $(this).data('title');
            console.log(title)
            var description = $(this).data('description');
            var type = $(this).data('type');
            // Set the category ID and name in the modal
            $('#title').val(title);
            $('#description').val(description);
            $('#type').val(type);
            $('#idfield').val(IdToUpdate);

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
                url: 'actions/update_blog.php',
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
                            window.location.href = 'blog.php';
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
</script>