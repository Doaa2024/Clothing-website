<!DOCTYPE html>
<html lang="en">
<?php require_once("class/categories.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $categories = new Categories();
$allCategories = $categories->getAllCategories();
?>

<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- for images enctype -->
                    <form id="addForm" action="actions/add_categories.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Categories Name</span>
                            </div>
                            <input type="text" class="form-control" placeholder="categories" aria-label="categories" name="categories" aria-describedby="basic-addon1" size="20" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" value="upload-image" onclick="">Submit</button>

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
                    <button type="button" class="btn btn-danger" id="confirmDeleteCategoryButton">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Category Modal -->
    <div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clos" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateCategoryForm">
                        <div class="form-group">
                            <label for="categoryName">New Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                            <input type="hidden" id="categoryIdToUpdate" name="categoryIdToUpdate">
                            <input type="hidden" id="existingCategoryName">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmUpdateCategoryButton">Update</button>
                </div>
            </div>
        </div>
    </div>






    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Categories</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                </ol>
                <div align="right" class="mb-3">
                    <button type="button" class="btn btn-primary close" data-toggle="modal" data-target="#addModal">Add Category</button>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Categories
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Category id</th>
                                    <th>Category Name</th>
                                    <th>actions</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($allCategories as $category) { ?>

                                    <tr>
                                        <td><?php echo $category['categories_id'] ?></td>
                                        <td><?php echo $category['categories_name'] ?></td>
                                        <td>
                                            <button class="btn btn-danger close" id=<?php echo $category['categories_id'] ?> data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fas fa-trash-alt"></i></button>
                                            <button class="btn btn-primary edit" id=<?php echo $category['categories_id'] ?> data-name=<?php echo $category['categories_name'] ?> data-toggle="modal" data-target="#updateCategoryModal"><i class="fas fa-edit"></i></button>
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

</html>


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
                    console.log("Script is being executed");

                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        }).then(function() {
                            window.location.href = 'categories.php';
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
        var categoryIdToDelete;

        // Open the modal and store the category ID
        $('.close').on('click', function(e) {
            categoryIdToDelete = e.target.id;
            console.log(categoryIdToDelete);
        });

        // Perform the deletion action when the delete button is clicked
        $('#confirmDeleteCategoryButton').on('click', function() {
            if (categoryIdToDelete) {
                $.ajax({
                    url: 'actions/delete_categories.php',
                    type: 'POST',
                    data: {
                        categoryId: categoryIdToDelete
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
                                window.location.href = 'categories.php';
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
            }
        });
    });

    $(document).ready(function() {
        var categoryIdToUpdate;
        var existingCategoryName;
        // Open the modal and set the category name
        $('.edit').on('click', function(e) {
            categoryIdToUpdate = $(this).attr('id');
            var categoryName = $(this).data('name');
            existingCategoryName = $(this).data('name');
            console.log(existingCategoryName);
            // Set the category ID and name in the modal
            $('#categoryIdToUpdate').val(categoryIdToUpdate);
            $('#categoryName').val(categoryName);

        });

        // Perform the update action when the update button is clicked
        $('#confirmUpdateCategoryButton').on('click', function() {
            var newCategoryName = $('#categoryName').val();
            var categoryId = $('#categoryIdToUpdate').val();

            if (categoryId && newCategoryName) {
                $.ajax({
                    url: 'actions/update_categories.php',
                    type: 'POST',
                    data: {
                        categoryId: categoryId,
                        categoryName: newCategoryName,
                        existingCategoryName: existingCategoryName
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
                                window.location.href = 'categories.php';
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
                            title: 'An error occurred while updating the category.',
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        });
                    }
                });
            }
        });
    });
</script>